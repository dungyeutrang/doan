<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class SummaryRequest extends Request {

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
            'student_learning_class_id' => 'required|integer',
            'conduct_id' => 'required|integer',
            'ranking_academic_id' => 'required|integer',
            'score_average' => 'required',
        ];
    }

}
