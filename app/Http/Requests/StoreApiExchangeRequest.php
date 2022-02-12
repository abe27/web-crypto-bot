<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApiExchangeRequest extends FormRequest
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
            'exchange_id' => 'required',
            'expire_date' => 'required',
            'api_key' => 'required|min:10|unique:api_exchanges',
            'api_secret' => 'required|min:10|unique:api_exchanges',
        ];
    }
}
