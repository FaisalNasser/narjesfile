<?php

namespace App\Http\Requests;

use App\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class StoreCustomer extends FormRequest
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
        $customer_id = $this->segment(2);
        return [
            'name' => ['required'],
            // 'address' => ['required'],
            'phone' => ['required','unique:customers,phone,'.$customer_id],
        ];
    }

    public function messages(){
        return [
            'name.required' => __('validation.required'),
            'address.required' => __('validation.required'),
            'phone.required' => __('validation.required'),


            // 'phone.unique' => __('menu.phone_exist')
        ];
    }
}
