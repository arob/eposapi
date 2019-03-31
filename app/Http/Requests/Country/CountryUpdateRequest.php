<?php

namespace App\Http\Requests\Country;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CountryUpdateRequest extends FormRequest
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
                Rule::unique('countries')->ignore($this->country)
            ],

            'short_name' => [
                'string', 'max:50',
                Rule::unique('countries')->ignore($this->country)
            ],

        ];
    }
}
