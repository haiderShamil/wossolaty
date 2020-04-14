<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'invoice_type_id' => 'required',
            'payment_type_id' => 'required',
            'account_id' => 'required',
            'product_id' => 'required',
            // 'accountname' => 'required',
            // 'productname' => 'required',
            // 'price' => 'required',
            'amount' => 'required',
            // 'total' => 'required',
            'no'=>'required',

            
            	

        ];
    }
}
