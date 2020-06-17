<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class GuestController extends Controller
{
    public function home_function(){
        return view('homeView'); //Questo è il nome della vista blade /resources/views/home.blade.php
    }

    public function products(){
        return view('products'); //Questo è il nome della vista blade /resources/views/home.blade.php
    }

    public function categories(){
        return view('categories'); //Questo è il nome della vista blade /resources/views/home.blade.php
    }

    public function contacts() {
        return view('contacts');
    }

    public function showCards() {

        $contacts = Contact::all();
        //dd($contacts);
        return view('cards', compact('contacts'));

    }


    public function submit(Request $request) {

        //dd($request->all());
        //dd($Nome,$Cognome,$Email,$Mobile );

        // Cattura i dati del form, le stringhe sono il name del tag <input>
        $name= $request->input('name');
        $surname= $request->input('surname');
        $email= $request->input('email');
        $mobile= $request->input('mobile');

        // Compact ??? cosa sono quelle stringhe nei paramtri? Sono le variabili $name, $surname, $email...
        $contacts = compact('name','surname','email','mobile');

        // Spedisce la mail
        Mail::to($email)->send(new ContactMail($contacts));

        // Creo un instance della classe Contact (.php)
        $contact = new Contact;

        // Assegno all'instance i field usando i dati già catturati
        $contact->name = $name;
        $contact->surname = $surname;
        $contact->email = $email;
        $contact->mobile = $mobile;

        $contact->save();

        return redirect(route('thankyou')); //Redirect dopo una rotta POST

    }

    public function thankyou() {

        return view('thankyoupage');

    }

}

