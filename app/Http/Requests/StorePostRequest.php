<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 23.05.18
 * Time: 21:12
 */
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required|max:10',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Ты тупой'
        ];
    }
}