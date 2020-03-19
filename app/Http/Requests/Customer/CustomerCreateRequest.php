<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'contact_number' => 'required|string|max:50',
            'address' => 'nullable|string|max:255',
            'thana_id' => 'nullable|numeric',
            'district_id' => 'nullable|numeric',
            'country_id' => 'nullable|numeric',
            'status' => 'boolean'
        ];
    }
}
