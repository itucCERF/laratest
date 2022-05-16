<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('members')->ignore($this->email)],
            'birthday' => ['date', 'nullable'],
            'address' => ['string', 'max:255', 'nullable'],
            'profile' => ['string', 'max:255', 'nullable'],
            'id_card' => ['string', 'max:255', 'nullable'],
        ];
    }
}
