<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransitionRequest extends FormRequest
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
            'member_id' => ['required', 'string', 'exists:members,id'],
            'department_id' => ['required', 'string', 'exists:departments,id'],
            'user_id' => ['required', 'string', 'exists:users,id'],
            'decided_img' => ['string', 'max:255', 'nullable'],
            'start_date' => ['required', 'date'],
            'end_date' => ['date', 'after:start_date', 'nullable'],
        ];
    }
}
