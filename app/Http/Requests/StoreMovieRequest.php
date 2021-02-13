<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();;
    }

    // public function attributes()
    // {
    //     return [
    //         'duration' => 'email address',
    //     ];
    // }
    protected function failedValidation(Validator $validator) {
        return $validator->errors()->all();
    }
    public function messages()
    {
        return [
            'movie_name.unique'=>'Ten movie da ton tai',
            'duration.regex' => 'Sai dinh dang',
            'poster.required' => 'Thieu hinh',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'movie_name' => 'required|unique:movies|max:255',
            'duration' => ['required', 'regex:/^(?:([01]?\d|2[0-3]):([0-5]?\d):)?([0-5]?\d)$/'],
            'poster'=>'required',
            'release'=>['required','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'],
        ];
    }
}
