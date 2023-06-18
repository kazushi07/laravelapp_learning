<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\Myrule; //追記

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->path() == 'hello')
        {
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'mail' => 'email',
            'age'  => 'numeric|hello',
            // 'age'  => ['numeric', new Myrule(5)],

        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入れてください',
            'mail.email' => 'メールアドレス',
            'age.numeric' => '年齢は整数で',
            'age.hello' => 'Hello! 入力は偶数のみです',
        ];
    }
}
