<?php 
 
namespace App\Http\Requests; 
 
use Illuminate\Foundation\Http\FormRequest; 
use PhpParser\Node\Stmt\Return_; 
 
class StoreProdukRequest extends FormRequest 
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
     * @return array<string, mixed> 
     */ 
    public function rules() 
    { 
        return [ 
            'nama_produk' => 'required' 
        ]; 
    } 
 
    public function messages() 
    { 
        Return[ 
            'nama_produk.required' => 'Data nama produk belum diisi!' 
        ]; 
    } 
}