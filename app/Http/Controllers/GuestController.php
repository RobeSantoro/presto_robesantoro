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
        //dd($contacts);

        $contacts = Contact::where('surname','Yates')->paginate(4);
        return view('cards', compact('contacts'));

    }

    public function submit(Request $request) {

        /*
        // Creo un nuovo oggetto della classe Contact (il Model .php che sta in /App)
        $contact = new Contact;

        // MAGIC METHOD, L'oggetto Contact appena creato può essere anche vuoto.
        // Cattura i dati del form, le stringhe sono il name del tag <input> nella vista blade
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
            'mobile' => $request->input('mobile')

            ]);

        // Spedisce la mail
        Mail::to($contact->email)->send(new ContactMail($contact));
        return redirect(route('thankyou')); //Redirect dopo una rotta POST

    }

    public function thankyou() {

        return view('thankyoupage');

    }

}

