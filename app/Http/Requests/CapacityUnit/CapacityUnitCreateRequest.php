<?php

namespace App\Http\Requests\CapacityUnit;

use Illuminate\Foundation\Http\FormRequest;

class CapacityUnitCreateRequest extends FormRequest
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
            'name' => 'string|required|max:20|unique:capacity_units',
            'short_name' => 'string|required|max:10',
        ];
    }
}
