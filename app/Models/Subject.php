<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model {
	use SoftDeletes;
	protected $table = 'tbl_subjects';
	protected $dates = [ 
			'deleted_at' 
	];
	protected $guarded = [ 
			'_token' 
	];
	
	/**
	 * find subject by primary key
	 *
	 * @param type $id        	
	 * @return model
	 */
	public static function getSubjectById($id) {
		return Subject::all ()->find ( $id );
	}
	
	/**
	 * create subject
	 *
	 * @param type $data        	
	 * @return type
	 */
	public static function createSubject($data) {
		return Subject::create ( $data );
	}
	
	/**
	 * get all subject
	 *
	 * @return array
	 */
	public static function getAllSubject() {
		return Subject::all ();
	}
}
