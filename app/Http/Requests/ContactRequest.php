<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

//------------------------------------------------------------------------//
//-----------------------------VALIDATION---------------------------------//
//------------------------------------------------------------------------//


class ContactRequest extends FormRequest
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
            'name' => 'required|min:2|max:16',
            'surname' => 'required',
            'mobile' => 'required',
            'email' => 'required|email:rfc,dns',
            'photo' => 'required'


        ];
    }


    //TODO :NON FUNZIONA
    public function message()
    {
        return [
            'name.required' => 'Inserire Nome',
            'name.min' => 'Inserisci un nome lungo almeno 2 caratteri',
            'photo.required' => 'Inserisci una tua foto'
        ];
    }
}
