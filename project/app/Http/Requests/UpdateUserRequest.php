<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UpdateUserRequest extends FormRequest
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
        // dd($this->request->get('new_password'));
        if ($this->request->get('new_password') != null) {
            return [
                'name' => ['required', 'string', 'max:255'],
                'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
                'address' => ['max:255'],
            ];
        } else {
            return [
                'name' => ['required', 'string', 'max:255'],
                'address' => ['max:255'],
            ];
        }    
    }
}
