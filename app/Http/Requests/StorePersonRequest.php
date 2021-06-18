<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Validation\Validator;

class StorePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'birthday' => ['required', 'date','before_or_equal:now'],
            'gender' => ['required', 'integer',],
        ];
    }


    public function messages()
    {
        return [
            'name.required' => ':attribute boş bırakılmamalıdır.',
            'name.min' => ':attribute :min karekterden az olamaz.',
            'birthday.required' => ':attribute boş bırakılmamalıdır.',
            'birthday.before_or_equal' => ':attribute bugünün tarihinden büyük olamaz.',
            'gender.required' => ':attribute boş bırakılmamalıdır.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Ad Soyad',
            'gender' => 'Cinsiyet',
            'birthday' => 'Doğum Tarihi',
        ];
    }

    public function getRedirectUrl()
    {
        return route('person.create');
    }

    protected function failedValidation(Validator $validator)
    {
        Log::debug(json_encode($validator->errors(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        parent::failedValidation($validator);
    }
}
