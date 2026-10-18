<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            [
            'name'    => 'required|string|min:3|max:255',
            'phone'   => 'required|string|min:6|max:20',
            'email'   => 'required|email|max:255',
            'reason'  => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]
        ];
    }
    public function messages(){
        return[
        [
            'name.required'    => 'الاسم مطلوب.',
            'phone.required'   => 'رقم الهاتف مطلوب.',
            'email.required'   => 'البريد الإلكتروني مطلوب.',
            'reason.required'  => 'سبب التواصل مطلوب.',
            'message.required' => 'نص الرسالة مطلوب.',
        ]];
    }
}
