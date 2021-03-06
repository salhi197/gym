<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivreur extends FormRequest
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
            'name'=>'required',
            'prenom'=>'required',
            'email'=>'required|unique:livreurs',
            'telephone'=>'required',
            'adress'=>'required',
            'password'=>'required',
            'wilaya_id'=>'required',
            'commune_id'=>'required'            
        ];
    }
}
