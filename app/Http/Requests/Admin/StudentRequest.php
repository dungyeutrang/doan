<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class StudentRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules() {
        return [
            'name' => 'required|max:128',
            'birth_day' => 'date',
            'address' => 'required|max:256',
            'native_place' => 'required|max:256',
            'gender' => 'boolean',
            'ethnic' => 'required|max:64',
            'religion' => 'required|max:64',
            'date_in' => 'required|date',
            'name_father' => 'required|max:128',
            'job_father' => 'required|max:128',
            'name_mother' => 'required|max:128',
            'job_mother' => 'required|max:128',
        ];
    }         
}
