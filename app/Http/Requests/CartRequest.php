<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'shoe_id' => ['required', 'numeric'],
            'amount' => ['required', 'numeric', 'min:0'],
            'value' => ['required', 'numeric', 'min:0'],
        ];
    }
}
