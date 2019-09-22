<?php

namespace App\Http\Requests\SalesInvoice;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SalesInvoiceUpdateRequest extends FormRequest
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
            'invoice_number' => [
                'required', 'string', 'max:20',
                Rule::unique('sales_invoices')->ignore($this->sales_invoice)
            ],



            'invoice_date' => 'required|date',
            // 'customer_id' => 'required|numeric',
            'user_id' => 'numeric',
            // 'notes' => 'string|max:255',
            // 'items' => 'array'
        ];
    }
}
