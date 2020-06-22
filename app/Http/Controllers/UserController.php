<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function publishProduct_function(Request $product)
    {
        $product = Product::create([

                'product-name' => $product->input('product-name'),
                'product-description' => $product->input('product-description')/* ,
                'user_id' => Auth::id() */

                ]);

        return redirect(route('thankyou_publish_route')); //Redirect dopo una rotta POST
    }

    public function thankyou_publish_function()
    {
        return view('thankyoupublish_view');
    }



}
