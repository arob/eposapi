<?php

namespace App\Http\Requests\Manufacturer;

use Illuminate\Foundation\Http\FormRequest;

class ManufacturerCreateRequest extends FormRequest
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
            'name' => 'required|string|max:50|unique:manufacturers',
            'short_name' => 'string|max:10|',
            'webiste' => 'string|max:100',
            'status' => 'boolean',
            'user_id' => 'numeric'
        ];
    }
}
