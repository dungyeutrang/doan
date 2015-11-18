<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class TeachingClassRequest extends Request {
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
				'class_id' => 'required|integer',
				'teacher_leaning_subjects_id' => 'required|integer' 
		];
	}
}
