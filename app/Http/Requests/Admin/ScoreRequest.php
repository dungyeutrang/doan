<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ScoreRequest extends Request {

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
            'score' => 'required',
            'student_id' => 'required|integer',
            'priod_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'score_type_id' => 'required|integer',
            'subject_id'=>'required|integer'
        ];
    }

}
