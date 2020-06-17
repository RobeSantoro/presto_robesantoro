<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class GuestController extends Controller
{
    public function home(){

        return view('home'); //Questo è il nome della vista blade /resources/views/home.blade.php

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

    public function submit(Request $request) {

        //dd($request->all());

        $Nome= $request->input('name');
        $Cognome= $request->input('surname');
        $Email= $request->input('email');
        $Mobile= $request->input('mobile');

        $contacts = compact('name','surname','email','mobile');

        //dd($Nome,$Cognome,$Email,$Mobile );

        Mail::to($Email)->send(new ContactMail($contacts));

        return redirect(route('thankyou')); //Redirect dopo una rotta POST

    }

    public function thankyou() {

        return view('thankyoupage');

    }

}

