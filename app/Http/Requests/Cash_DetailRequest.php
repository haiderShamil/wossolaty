<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Cash_DetailRequest extends FormRequest
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
            //
            'cash_type_id' =>'required',
            'name' =>'required',
            'amount' =>'required',
            'date' =>'date',
        ];
    }
}
