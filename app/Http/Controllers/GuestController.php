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
    
    public function contacts() {
        
        return view('contacts'); 
        
    }
    
    public function submit(Request $request) {
        
        //dd($request->all()); 
        
        $Nome= $request->input('Nome');
        $Cognome= $request->input('Cognome');
        $Email= $request->input('Email');
        $Mobile= $request->input('Mobile');
        
        $contacts = compact('Nome','Cognome','Email','Mobile');
        
        //dd($Nome,$Cognome,$Email,$Mobile );
        
        Mail::to($Email)->send(new ContactMail($contacts));
        
        return redirect(route('thankyou')); //Redirect dopo una rotta POST
        
    }
    
    public function thankyou() {

        return view('thankyoupage');    

    }      
        
    }
    