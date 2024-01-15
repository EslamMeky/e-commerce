<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'photo'=>'required_without:id|mimes:jpg,png,jpeg',
            'name'=>'required_without:id',
            'email'=>'required_without:id|email|unique:users,email,'.$this->id,
            'password'=>'required_without:id',
            'con_password'=>'required_without:id',
            'address'=>'required_without:id',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'this filed is required',
            'required_without'=>'this filed is required',
            'email.email'=>'must be email filed',
            'unique'=>'The email has already been taken',
        ];

    }
}
