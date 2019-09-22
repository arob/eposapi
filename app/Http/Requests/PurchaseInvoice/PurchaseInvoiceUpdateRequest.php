<?php

namespace App\Http\Requests\PurchaseInvoice;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PurchaseInvoiceUpdateRequest extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'supplier_id.required' => 'Select a supplier',
            'invoice_date.required'  => 'Required',
            'invoice_date.date'  => 'Invalid date',
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'invoice_number' => [
                'required', 'string', 'max:20',
                Rule::unique('purchase_invoices')->ignore($this->purchase_invoice)
            ],

            'invoice_date' => 'required|date',
            'supplier_id' => 'numeric',
            'invoice_total' => 'numeric',
            'paid_amount' => 'numeric',
            'user_id' => 'numeric',
            'items' => 'array'
        ];
    }
}
