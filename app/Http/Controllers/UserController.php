<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addProduct_function()
    {
        return view('add_product_view');
    }

    public function publishProduct_function(ProductRequest $product)
    {
        $product = Product::create([

                'product_name' => $product->input('product_name'),
                'product_description' => $product->input('product_description'),
                'user_id' => Auth::id()

                ]);

        return redirect(route('thankyou_publish_route')); //Redirect dopo una rotta POST
    }

    public function thankyou_publish_function()
    {
        return view('thankyoupublish_view');
    }



}
