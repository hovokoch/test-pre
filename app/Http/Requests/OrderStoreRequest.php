<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'shipping_address_1' => 'required|string',
            'shipping_address_2' => 'required|string',
            'shipping_address_3' => 'required|string',
            'city' => 'required|string',
            'country_code' => 'required|string|min:2|max:2',
            'zip_postal_code' => 'required|string|min:4|max:5',
            'quantity' => 'required|integer|min:1',
        ];
    }
}
