<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProduct extends FormRequest
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
        $product_id = $this->segment(2);
        $rules = Product::$rules;

        $rules['name'] = 'required' ;
        $rules['code.*'] = 'max:10';
        // $rules['code'] = function($attribute, $value, $onFailure) {
        //     if(count($value) > count(array_unique($value))){
        //         $onFailure(__("site.duplicatesCode"));
        //     }
        //     foreach($value as $item){

        //         $isExist = Product::where('codes','LIKE',"%\"".$item."\"%")
        //         ->Where("id", "!=", $this->product)
        //         ->first();
        //         if($isExist != null){
        //             $onFailure(__("validation.codeUniqueError"));
        //         }
        //     }
        //   };
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' =>  __('validation.required'),
            'code.max' => __('validation.max')
        ];
    }
}
