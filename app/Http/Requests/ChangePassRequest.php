<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CurrentPassword;

class ChangePassRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'currentPass' => ['required', new CurrentPassword],
            'newPass' => 'required|min:5|max:255'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Ты тупой'
        ];
    }
}
