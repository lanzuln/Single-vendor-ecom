<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id'=>"required",
            'name'=>"required|string|max:150",
            'product_code'=>"required",
            'product_price'=>"required|numeric|min:0",
            'product_stock'=>"required|numeric|min:1",
            'alert_quantity'=>"required|numeric|min:1",
            'short_desc'=>"nullable|string",
            'long_desc'=>"nullable|string",
            'addtional_info'=>"nullable|string",
            'product_image'=>"nullable|image|max:1024",
        ];
    }
}
