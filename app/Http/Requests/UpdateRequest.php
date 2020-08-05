<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'type' => 'required|max:45',
            'find_user_code' => 'required|max:50',
            'content' => 'required',
            'note' => 'required|max:54',
            'transport_fee' => 'required',
            'discount' => 'required',
            'status' => 'required|max:45',
            'final_price' => 'required',
            'reason' => 'required|max:45',
            'cancel_by' => 'required',
            'price' => 'required',
            'voucher' => 'required',
            'shop' => 'required'
        ];
    }
}
