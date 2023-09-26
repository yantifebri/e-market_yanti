<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemasokRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules() 
    { 
        return [ 
            'nama_pemasok' => 'required' 
        ]; 
    } 
 
    public function messages() 
    { 
        Return[ 
            'nama_pemasok.required' => 'Data nama pemasok belum diisi!' 
        ]; 
    } 
}
