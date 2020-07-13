<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.revisor');
    }

    public function index()
    {
        $products = Product::where('is_accepted', null)->orderBy('created_at', 'desc')->paginate(3);;
        return view('products.index_products' , compact('products'));
    }

    private function setAccepted($product_id, $value)
    {
        $product = Product::find($product_id);
        $product->is_accepted = $value;
        $product->save();

        return redirect(route('revisor.home'));
    }

    public function accept($product_id)
    {
        return $this->setAccepted($product_id , true);
    }

    public function reject($product_id)
    {
        return $this->setAccepted($product_id , false);
    }

}
