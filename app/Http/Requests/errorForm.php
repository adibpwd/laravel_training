<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class errorForm extends FormRequest
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
            'name' => 'required|max:255|min:5',
            'email' => 'required',
            'alamat' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nama harus diisi',
            'name.max' => 'nama maximal 255 huruf',
            'name.min' => 'nama harus minimal 5 huruf',
            'email.required'  => 'email harus diisi',
            'alamat.required'  => 'alamat harus diisi'
        ];
    }
}
