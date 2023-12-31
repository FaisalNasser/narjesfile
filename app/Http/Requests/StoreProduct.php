<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => ['required'],
            'code.*' => ["max:10"],
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>  __('validation.required'),
            // 'code.required' => __('validation.required'),
            'code.max' => __('validation.max')
            ,
        ];
    }
}
