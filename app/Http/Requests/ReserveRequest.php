<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
{

    public function authorize()
    {
        return true; 
    }
    public function rules()
    {
        $rules = [];
        if ($this->has('reserve_date')) {
            $rules['reserve_date'] = 'required|after:yesterday';
        }
        if ($this->has('reserve_time')) {
            $rules['reserve_time'] = 'required|date_format:H:i';
        }
        if ($this->has('users_number')) {
            $rules['users_number'] = 'required|numeric';
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'reserve_date.required' => '日にちを選んでください',
            'reserve_date.after' => '今日以降の日にちで選んでください',
            'reserve_time.required' => '時間を選んでください',
            'users_number.required' => '人数を選んでください'
        ];
    }   
}