<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
