<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'code.unique' => 'Code already exists!',
            'model.unique' => 'Model already exists!',
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'string|required|max:50',
            'model' => 'string|required|max:20|unique:products',
            'capacity' => 'nullable|numeric',
            'capacity_unit_id' => 'nullable|integer',
            'description' => 'nullable|string|max:255',
            'sales_rate' => 'required|numeric',
            'vat_pct' => 'nullable|numeric',
            'tax_pct' => 'nullable|numeric',
            'discount_pct' => 'nullable|numeric',
            'stock_qty' => 'nullable|numeric',
            'warranty_period' => 'nullable|numeric',
            'reorder_level' => 'nullable|numeric',
            'supplier_id' => 'nullable|integer',
            'manufacturer_id' => 'nullable|integer',
            'country_id' => 'nullable|integer',
            'status' => 'boolean',
        ];
    }
}
