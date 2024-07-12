<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ProductKey' => 'required|integer',
            'ProductSubcategoryKey' => 'required|integer',
            'ProductSKU' => 'required|string|max:50',
            'ProductName' => 'required|string|max:100',
            'ModelName' => 'nullable|string|max:100',
            'ProductDescription' => 'nullable|string',
            'ProductColor' => 'nullable|string|max:50',
            'ProductSize' => 'nullable|string|max:10',
            'ProductStyle' => 'nullable|string|max:50',
            'ProductCost' => 'required|numeric',
            'ProductPrice' => 'required|numeric',
        ];
    }
}
