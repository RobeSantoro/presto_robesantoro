<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            // La prima stringa corrisponde all'attributo name="" del tag input del form
            'product_name' => 'required|min:3|max:32',
            'product_description' => 'required',
            /* 'img' => 'required' */

        ];
    }


    //TODO :NON FUNZIONA
    public function message()
    {
        return [
            'product_name.required' => 'Inserire Nome Prodotto',
            'product_name.min' => 'Inserisci un nome lungo almeno 2 caratteri',
            'product_description.required' => 'Inserisci una descrizione',
            /* 'img.required' => 'Inserisci almeno una immagine' */
        ];
    }
}
