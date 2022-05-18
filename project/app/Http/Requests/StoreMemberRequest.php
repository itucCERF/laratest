<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'birthday' => ['date', 'nullable'],
            'address' => ['string', 'max:255', 'nullable'],
            'profile' => ['image', 'max:200', 'nullable'],
            'id_card' => ['string', 'max:255', 'nullable'],
        ];
    }
}
