<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Product;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Helpers\General\CollectionHelper as Helper;

class GuestController extends Controller
{

    public function home_function(){
        return view('home_view'); //Questo è il nome della vista blade /resources/views/home.blade.php
    }

    public function products_function(){

        $products = Product::all();
        //$products = DB::table('products')->simplePaginate(3);
        return view('products_view', compact('products'));
    }

    public function product_details_function($id)
    {
        $product = Product::find($id);
        return view( 'product_details_view',compact('product') );

    }

    public function categories_function(){
        return view('categories_view');
    }

    public function contacts_function() {
        return view('contacts_view');
    }

    public function submit_function(ContactRequest $request) {

        /*
        // Creo un nuovo oggetto della classe Contact (il Model .php che sta in /App)
        $contact = new Contact;

        // MAGIC METHOD, L'oggetto Contact appena creato può essere anche vuoto.
        // Cattura i dati del form, le stringhe sono l'attributo name="" del tag <input> nella vista blade
        $contact->name = $request->input('name');
        $contact->surname = $request->input('surname');
        $contact->email = $request->input('email');
        $contact->mobile = $request->input('mobile');
        // Gli attibuti ->name, ->surname vengono creati al momento in cui gli viene assegnato il valore.

        //dd($request->all());

        // Salvo i dati nel database
        $contact->save();
        */

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
            return redirect(route('thankyou_route')); //Redirect dopo una rotta POST

    }

    public function thankyou_function() {

        // Come posso passare i dati qua?
        return view('thankyou_view');

    }

    public function showContacts_function() {


        $contacts = Contact::where('surname','Yates')->paginate(3);

        //$contacts = Contact::all()->take(4);
        //$contacts = Contact::all();
        //dd($contacts , $contactsPagOK);

        return view('showContacts_view', compact('contacts'));

    }
}


