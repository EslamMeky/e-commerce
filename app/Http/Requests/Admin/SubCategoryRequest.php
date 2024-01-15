<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'photo'=>'required_without:id|mimes:jpg,jpeg,png',
            'name_ar'=>'required_without:id',
            'name_en'=>'required_without:id',
            'category_id'=>'required_without:id|exists:main_categories,id',
            'price'=>'required_without:id',
            'description_ar'=>'required_without:id',
            'description_en'=>'required_without:id',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'This filed is required',

        ];
    }
}
