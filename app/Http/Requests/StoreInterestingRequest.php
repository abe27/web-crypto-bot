<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInterestingRequest extends FormRequest
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
            'asset_id' => 'required',
            'exchange_id' => 'required',
            'currency_id' => 'required',
            'trend' => 'required',
            'last_price' => 'required|numeric',
            'last_percent' => 'required|numeric',
        ];
    }
}
