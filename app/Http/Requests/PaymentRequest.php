<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'users_id' => 'required|integer|exists:users,id',
            'transaction_tours_id' => 'integer|exists:transaction_tours,id',
            'transaction_transportations_id' => 'integer|exists:transaction_transportations,id',
            'transaction_hotel_id' => 'integer|exists:transaction_hotels,id',
            'image' => 'required',
            'name' => 'required|max:255',
            'type' => 'required|max:255'
        ];
    }
}
