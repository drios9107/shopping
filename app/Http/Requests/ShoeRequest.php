<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoeRequest extends FormRequest
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
            'color' => ['required', 'string'],
            'size' => ['required', 'numeric', 'min:20', 'max:50'],
            'price' => ['required', 'numeric', 'min:0'],
            'brand_id' => ['required', 'numeric', 'min:0'],
        ];
    }
}
