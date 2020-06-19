<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Definisco quali saranno gli attributi della classe Contact
    protected $fillable = ['name','surname','email','mobile'];

    //protected $garded = ['']; // attributo opzionale

}
