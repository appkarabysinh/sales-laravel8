<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardUpdateRequest extends FormRequest
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
            'card_title' => ['required', 'max:255', 'string'],
            'card_description' => ['required', 'max:255', 'string'],
            'product_count' => ['required', 'max:255'],
            'card_price_sale' => ['required', 'max:255'],
            'product_id' => ['required', 'exists:products,id'],
        ];
    }
}
