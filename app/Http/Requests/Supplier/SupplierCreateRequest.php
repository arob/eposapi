<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class SupplierCreateRequest extends FormRequest
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
            'name' => 'required|string|max:50|unique:suppliers',
            'contact_person' => 'required|string|max:50',
            'contact_number' => 'required|string|max:50',
            // 'email' => 'email|max:100',
            // 'address' => 'string|max:255',
            // 'thana_id' => 'integer',
            // 'district_id' => 'integer',
            // 'country_id' => 'integer',
            // 'website' => 'string|max:255',
            // 'status' => 'boolean',
            // 'user_id' => 'integer'
        ];
    }
}
