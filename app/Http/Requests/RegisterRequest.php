<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        if ($this->path() == 'register') {
            return true;
        } else {
            return false; 
        } 
    }         
    public function rules()
    {
        return [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:8|confirmed'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.string' => '文字で入力くしてださい',
            'name.max' => '255字以内で入力してください',
            'email.email' => 'メールアドレスが正しくありません',
            'email.string' => '文字で入力くしてださい',            
            'email.unique' => 'メールアドレスは既に使用されています',             
            'email.required' => 'メールアドレスを入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.confirmed' => 'パスワードが異なります',
            'password.min(8)' => '8文字以上でパスワードを入力くしてださい',
            'password.string' => '文字で入力くしてださい'                                                         
        ];     
    }
}