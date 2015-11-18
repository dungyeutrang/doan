<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class TeacherLearningSubjectRequest extends Request {
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
				'subject_id' => 'required|integer',
				'teacher_id' => 'required|integer' 
		];
	}
}
