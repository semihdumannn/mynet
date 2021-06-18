<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StoreAddressRequest extends FormRequest
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
            'address' => ['required'],
            'people_id' => ['required'],
            'post_code' => ['required'],
            'country_name' => ['required','integer'],
            'city_name' => ['integer'],
        ];
    }
    public function messages()
    {
        return [
            'address.required' => ':attribute boş bırakılmamalıdır.',
            'people_id.required' => ':attribute boş bırakılmamalıdır.',
            'post_code.required' => ':attribute boş bırakılmamalıdır.',
            'country_name.required' => ':attribute boş bırakılmamalıdır.',
        ];
    }

    public function attributes()
    {
        return [
            'address' => 'Adres',
            'people_id' => 'Kullanıcı',
            'post_code' => 'Posta Kodu',
            'city_name' => 'Şehir',
            'country_name' => 'Ülke',
        ];
    }

    public function getRedirectUrl()
    {
//        return route('address.index');
    }

    protected function failedValidation(Validator $validator)
    {
        Log::debug(json_encode($validator->errors(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        parent::failedValidation($validator);
    }
}
