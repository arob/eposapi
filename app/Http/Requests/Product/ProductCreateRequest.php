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
            'code' => 'string|required|max:20|unique:products',
            'name' => 'string|required|max:50',
            'model' => 'string|required|max:20|unique:products',
            // 'capacity' => 'numeric',
            // 'capacity_unit_id' => 'integer',
            // 'uom' => 'numeric',
            // 'description' => 'string|max:255',
            // 'sales_rate' => 'required|numeric',
            // 'vat_pct' => 'required|numeric',
            // 'tax_pct' => 'required|numeric',
            // 'discount_pct' => 'numeric',
            // 'stock_qty' => 'numeric',
            // 'warranty_period' => 'numeric',
            // 'reorder_level' => 'numeric',
            // 'supplier_id' => 'integer',
            // 'manufacturer_id' => 'integer',
            // 'country_id' => 'integer',
            // 'status' => 'boolean',
            // 'user_id' => 'integer'
        ];
    }
}
