<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerApplyRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name_en' => 'required',
            'name_bn' => 'required',
            'email' => 'required|email|unique:Volunteers,email',
            'mobile' => 'required|unique:Volunteers,mobile',
            'father_name' => 'required',
            'mother_name' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required',
            'occupation' => 'required',
            'prDivison' => 'required',
            'prDistrict' => 'required',
            'prThana' => 'required',
            'prVillage' => 'required',
            'image' => 'required|mimes:png,jpg,webp,jpeg',
            'captcha' => 'required|captcha',
        ];
    }
    public function messages(){

        return [
            'name_en.required' => 'Name(EN) is required',
            'name_bn.required' => 'Name(BN) is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter valid email address',
            'email.unique' => 'You have already applied by using this email',
            'mobile.required' => 'Mobile is required',
            'mother_name.required' => 'Mother name is required',
            'father_name.required' => 'Father name is required',
            'mobile.unique' => 'You have already applied by using this mobile Number',
            'sex.required' => 'Sex is required',
            'date_of_birth.required' => 'Date of Birth is required',
            'occupation.required' => 'Occupation is required',
            'prDivison.required' => 'Present Division is required',
            'prDistrict.required' => 'Present District is required',
            'prThana.required' => 'Present Thana is required',
            'prVillage.required' => 'Present Village/Area is required',
            'image.required' => 'Image is required',
            'captcha.required' => 'Captcha is required',
            'captcha.captcha' => 'You entered invalid captcha',

        ];
    }
}
