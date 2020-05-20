<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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

           'Contract_No'=>'required|string|min:3',
            'AirLine'=>'required|String|min:2|max:10',
            'Symbol'=>'required|String|min:2|max:4'
        ];
    }
}
