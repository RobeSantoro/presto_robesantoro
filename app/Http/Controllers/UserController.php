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
        return view('products.add_product_view');
    }

    public function publishProduct_function(ProductRequest $req)
    {
        $product = Product::create([

                'product_name' => $req->input('product_name'),
                'product_description' => $req->input('product_description'),
                'user_id' => Auth::id(),
                /* 'img' => $req->file('img')->store('public/img'), */
                'category_id' => $req->input('category_id')

                ]);

        return redirect( route('thankyou_publish_route') )->with('message' , 'Grazie per pubblicato il tuo annuncio');
    }

    public function thankyou_publish_function()
    {
        return view('thankyou_view');
    }

}
