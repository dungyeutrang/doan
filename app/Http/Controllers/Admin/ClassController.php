<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\Teacher;
use App\Models\Priod;
use App\Http\Requests\Admin\ClassRequest;

class ClassController extends PageController {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return view
	 */
	public function index() {
		$classes = ClassModel::paginate ( config ( 'doan.number_class_per_page' ) );
		return view ( 'admin.class.index', [ 
				'classes' => $classes,
				'id' => $classes->currentPage () == 1 ? 0 : ($classes->currentPage () - 1) * config ( 'doan.number_class_per_page' ) 
		] );
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return view
	 */
	public function edit($id = null) {
		$edit = true;
		if (! $id) {
			$class = new ClassModel ();
			$edit = false;
		} else {
			$class = ClassModel::getClassById ( $id );
			if (! $class) {
				return redirect ( route ( 'admin.class.index' ) );
			}
		}
		$teachers = Teacher::getAllTeacher ();
		$priods = Priod::getAllPriod ();
		if (! $teachers->count () || ! $priods->count ()) {
			return redirect ( route ( 'admin.class.index' ) );
		}
		if (request ()->isMethod ( "post" )) {
			$validate = Validator::make ( Input::get (), ClassRequest::rules () );
			if ($validate->fails ()) {
				return redirect ( route ( 'admin.class.edit', [ 
						'id' => $id 
				] ) )->withErrors ( $validate )->withInput ();
			}
			if ($id) {
				$save = $class->update ( Input::get () );
			} else {
				$save = $class::createClass ( Input::get () );
			}
			if ($save) {
				return redirect ( route ( 'admin.class.index' ) );
			}
		}
		return view ( 'admin.class.edit', [ 
				'class' => $class,
				'edit' => $edit,
				'id' => $id,
				'teachers' => $teachers,
				'priods' => $priods 
		] );
	}
}
