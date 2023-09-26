<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
            'kode_pelanggan' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'kode_pelanggan.required' => 'Data nama produk belum diisi!',
            'nama.required' => 'Data nama produk belum diisi!',
            'alamat.required' => 'Data nama produk belum diisi!',
            'no_telp.required' => 'Data nama produk belum diisi!',
            'email.required' => 'Data nama produk belum diisi!',
        ];
    }
}
