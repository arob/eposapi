<?php

namespace App\Http\Requests\CapacityUnit;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CapacityUnitUpdateRequest extends FormRequest
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
                Rule::unique('capacity_units')->ignore($this->capacity_unit)
            ],
            'short_name' => 'string|required|max:10',
        ];
    }
}
