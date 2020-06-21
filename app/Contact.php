<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Definisco quali dovranno essere gli attributi della classe Contact
    protected $fillable = ['name','surname','email','mobile'];

    //protected $garded = ['']; // attributo opzionale

}
