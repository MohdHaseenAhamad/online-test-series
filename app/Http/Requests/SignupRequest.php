<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => [
                'required',
            ],
            'gender' => [
                'required',
            ],
            'email' => [
                'required',
                'email',
                'nullable',
            ],
            'password' => [
                'nullable',
            ],
            'phone' => [
                'required',
            ],
            'institute_name' => [
                'nullable',
            ],
            'city' => [
                'required',
            ],
            'state' => [
                'required',
            ],
            'country' => [
                'required',
            ],
            'address' => [
                'nullable',
            ]
        ];

        return $rules;
    }
    public function getStorePayload()
    {
        $collect = collect($this->validated())
            ->only([
                'usr_name',
                'usr_phone',
                'usr_email',
                'usr_gender',
                'usr_institute_name',
                'usr_cnt_id',
                'usr_sts_id',
                'usr_dis_id',
                'usr_password'
            ]);

        return $collect->toArray();
    }
}
