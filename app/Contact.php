<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Definisco quali dovranno essere gli attributi della classe Contact
    protected $fillable = [
        'name',
        'surname',
        'email',
        'mobile',
        'photo'
    ];



    // mettere qua una altro fillable per user 'user_id'

    //protected $garded = ['']; // attributo opzionale

}
