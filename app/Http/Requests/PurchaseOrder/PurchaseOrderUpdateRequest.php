<?php

namespace App\Http\Requests\PurchaseOrder;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PurchaseOrderUpdateRequest extends FormRequest
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
            'order_number' => [
                'required', 'string', 'max:20',
                Rule::unique('purchase_orders')->ignore($this->purchase_order)
            ],
            'order_date' => 'date',
            'supplier_id' => 'integer',
            'status' => 'integer',
            'user_id' => 'integer',
            'notes' => 'string|max:255'
        ];
    }
}
