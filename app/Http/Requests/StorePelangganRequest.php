<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'kode_pelanggan' => ['required', 'digits_between:1,50', 'numeric'],
            'nama' => ['required', 'max:50', 'string'],
            'alamat' => ['required', 'max:50', 'string'],
            'no_telp' => ['required', 'max:20', 'string'],
            'email' => ['required', 'max:50', 'string']
        ];
    }

    public function messages()
    { {
            return [
                'kode_pelanggan.required' => 'Data kode pelanggan belum diisi!',
                'nama.required' => 'Nama belum diisi!',
                'alamat.required' => 'Alamat  belum diisi!',
                'no_telp.required' => 'No Telepon belum diisi!',
                'email.required' => 'Data email belum diisi!',

            ];
        }
    }
}
