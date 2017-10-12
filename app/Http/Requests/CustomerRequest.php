<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'cust_name'     => 'required|min:4|max:25',
            'cust_gender'   => '',
            'cust_tel'      => 'min:9|max:10',
            'cust_address'  => 'min:2|max:100',
            'city'          => 'min:2|max:50',
            'company'       => 'min:2|max:50',

        ];
    }
}
