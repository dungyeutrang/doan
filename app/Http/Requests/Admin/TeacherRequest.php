<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class TeacherRequest extends Request {

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
            'identity_number' => 'required|max:32',
            'birth_day' => 'required|date',
            'address' => 'required|max:256',
            'native_place' => 'required|max:256',
            'gender' => 'boolean',
            'date_in' => 'required|date',       
        ];
    }

}
