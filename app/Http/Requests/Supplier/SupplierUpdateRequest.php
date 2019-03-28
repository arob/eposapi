<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SupplierUpdateRequest extends FormRequest
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
            'name' => [
              'required', 'string', 'max:50',
              Rule::unique('products')->ignore($this->supplier)
            ],
            
            'contact_person' => 'required|string|max:50',
            'contact_number' => 'required|string|max:50',
            'email' => 'string|max:100',
            'address' => 'string|max:255',
            'thana_id' => 'integer',
            'district_id' => 'integer',
            'country_id' => 'integer',
            'website' => 'string|max:255',
            'status' => 'boolean',
            'user_id' => 'integer'
        ];
    }
}
