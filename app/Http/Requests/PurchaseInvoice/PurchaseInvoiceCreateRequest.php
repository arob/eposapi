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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'invoice_number' => 'required|string|max:20|unique:purchase_invoices',
            'invoice_date' => 'required|date',
            'supplier_id' => 'numeric',
            'user_id' => 'numeric',
            'notes' => 'string|max:255',
            'items' => 'array'
        ];
    }
}
