<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Product;
use App\Category;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class GuestController extends Controller
{

    public function search_function (Request $request) {

        $query = $request->input('query');
        $products = Product::search($query)->get();

        return view('search_result', compact('query' , 'products'));

    }

    public function home_function()
    {
        return view('home_view'); //Questo è il nome della vista blade /resources/views/home.blade.php
    }

    public function products_function()
    {
        $products = Product::where('is_accepted', true)
        ->orderBy('created_at', 'desc')
        ->paginate(3);

        return view('products.products_view', compact('products'));
    }

    public function product_details_function($id)
    {
        $product = Product::find($id);
        return view('products.product_details_view', compact('product'));
    }

    public function categories_function($name, $category_id)
    {
        $category = Category::find($category_id);                       // Restistuisc lìinterno record dell'Id cliccato
        $products = $category->products()
            /* ->where('is_accepted', true) */
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('categories_view' , compact('category','products'));
    }

    public function contacts_function()
    {
        return view('contacts_view');
    }

    public function submit_function(ContactRequest $request)
    {

        // MASS ASSIGNMENT
        $contact = Contact::create([

            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'photo' => $request->file('photo')->store('public/photo')

        ]);

        // Spedisce la mail
        Mail::to($contact->email)->send(new ContactMail($contact));
        return redirect(route('thankyou_route'))->with('message', 'Grazie per averci contattato');
    }

    public function thankyou_function()
    {
        return view('thankyou_view');
    }

    public function showContacts_function()
    {
        //$contacts = Contact::where('surname','Yates')->paginate(3);
        //$contacts = Contact::all()->take(4);
        $contacts = Contact::all();
        //dd( $contacts );
        return view('showContacts_view', compact('contacts'));
    }
}
