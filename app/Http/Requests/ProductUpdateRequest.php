<?php

namespace App\Http\Requests;

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
            'user_id' => ['required', 'exists:users,id'],
            'pd_name' => ['required', 'max:255', 'string'],
            'price_head' => ['required', 'max:255'],
            'number_box' => ['required', 'max:255'],
            'number_in_one_box' => ['required', 'max:255'],
        ];
    }
}
