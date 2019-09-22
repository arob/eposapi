<?php

namespace App\Http\Requests\PurchaseInvoice;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseInvoiceCreateRequest extends FormRequest
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
            'invoice_number' => 'required|string|max:20|unique:purchase_invoices',
            'invoice_date' => 'required|date',
            'supplier_id' => 'required',
            'user_id' => 'numeric',
            'invoice_total' => 'numeric',
            'paid_amount' => 'numeric',
            'items' => 'array'
        ];
    }
}
