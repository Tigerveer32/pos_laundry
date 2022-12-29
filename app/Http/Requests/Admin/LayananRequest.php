<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class LayananRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_layanan'      =>  'required|string|min:5|max:50',
            'thumbnail'         =>  'nullable|mimes:png,jpg,jpeg,svg|max:1048',
            'harga'             =>  'required|numeric',
            'berat'             =>  'required|numeric',
            'status'            =>  'required',
        ];
    }
}