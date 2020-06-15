<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){

        return view('home'); //Questo è il nome della vista blade /resources/views/home.blade.php

    }
}
