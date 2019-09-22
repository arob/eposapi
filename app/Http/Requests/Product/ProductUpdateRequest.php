<?php

namespace App\Http\Requests\Product;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'code' =>[
              'string', 'required', 'max:20',
              Rule::unique('products')->ignore($this->product)
            ],
            
            'name' => 'string|required|max:50',
            
            'model' => [
              'string', 'required', 'max:20',
              Rule::unique('products')->ignore($this->product)
            ],

            // 'capacity' => 'numeric',
            // 'capacity_unit_id' => 'integer',
            // 'uom' => 'numeric',
            // 'description' => 'string|max:255',
            // 'sales_rate' => 'required|numeric',
            // 'vat_pct' => 'numeric',
            // 'tax_pct' => 'numeric',
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
