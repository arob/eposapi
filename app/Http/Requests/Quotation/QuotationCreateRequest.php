<?php

namespace App\Http\Requests\Quotation;

use Illuminate\Foundation\Http\FormRequest;

class QuotationCreateRequest extends FormRequest
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
            'quotation_number' => 'required|string|max:20|unique:quotations',
            'quotation_date' => 'date',
            'validity_period' => 'integer',
            'customer_id' => 'integer',
            'user_id' => 'integer',
            'notes' => 'string|max:255'
        ];
    }
}
