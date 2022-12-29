<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'nama_lengkap'  =>  'required|min:3|max:50',
            'email'         =>  'required|unique:users,email',
            'jenis_kelamin' =>  'required',
            'no_handphone'  =>  'required|min:11|max:13',
            'tempat_lahir'  =>  'required|min:2|max:15',
            'tanggal_lahir' =>  'required',
            'alamat'        =>  'nullable',
            'profile'       =>  'nullable|mimes:png,jpg,jpeg,svg,gif|max:1080',
            'password'      =>  'required|min:8'            
        ];
    }
}