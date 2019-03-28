<?php

namespace App\Http\Requests\Manufacturer;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ManufacturerUpdateRequest extends FormRequest
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
                Rule::unique('manufacturers')->ignore($this->manufacturer)
            ],

            'short_name' => 'string|max:10|',
            'webiste' => 'string|max:100',
            'country_id' => 'integer',
            'status' => 'boolean',
            'user_id' => 'numeric'
        ];
    }
}
