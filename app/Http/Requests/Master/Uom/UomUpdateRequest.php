<?php

namespace App\Http\Requests\Master\Uom;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UomUpdateRequest extends FormRequest
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
                'required', 'string', 'max:20',
                Rule::unique('uoms')->ignore($this->uom)
            ],

            'short_name' => [
                'required', 'string', 'max:20',
                Rule::unique('uoms')->ignore($this->uom)
            ]
        ];
    }
}
