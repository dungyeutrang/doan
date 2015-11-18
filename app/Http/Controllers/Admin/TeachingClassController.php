<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassModel;
use App\Models\TeacherLearningSubject;
use App\Models\TeachingClass;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Teacher;
use App\Http\Requests\Admin\TeachingClassRequest;

class TeachingClassController extends PageController {

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index() {
        $teachingClasses = TeachingClass::whereNull('deleted_at')->paginate(config('doan.number_teachingclass_per_page'));

        return view('admin.teaching_class.index', [
            'teachingClasses' => $teachingClasses,
            'id' => $teachingClasses->currentPage() == 1 ? 0 : ($teachingClasses->currentPage() - 1) * config('doan.number_teachingclass_per_page')
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id        	
     * @return view
     */
    public function edit($id = null) {
        $edit = true;
        if (!$id) {
            $teachingClass = new TeachingClass ();
            $edit = false;
        } else {
            $teachingClass = TeachingClass::getTeachingClassById($id);
            if (!$teachingClass) {
                return redirect(route('admin.teachingclass.index'));
            }
        }
        $classes = ClassModel::getAllClass();
        $teacherSubjects = TeacherLearningSubject::getAllTeacherSubject();

        if (!$classes->count() || !$teacherSubjects->count()) {
            return redirect(route('admin.teachingclass.index'));
        }

        if (request()->isMethod("post")) {
            $validate = Validator::make(Input::get(), TeachingClassRequest::rules());
            if ($validate->fails()) {
                return redirect(route('admin.teachingclass.edit', [
                            'id' => $id
                        ]))->withErrors($validate)->withInput();
            }
            if ($id) {
                $save = $teachingClass->update(Input::get());
            } else {
                $save = $teachingClass::createTeachingClass(Input::get());
            }
            if ($save) {
                return redirect(route('admin.teachingclass.index'));
            }
        }
        return view('admin.teaching_class.edit', [
            'teachingClass' => $teachingClass,
            'edit' => $edit,
            'id' => $id,
            'classes' => $classes,
            'teacherSubjects' => $teacherSubjects
                ]);
    }

    /**
     * get teacher
     */
    public function getTeacher() {
        $index = Input::get('index');
        $teacher = Teacher::getAllTeacher()->find($index);
        return view('admin.teacher_subject.get_teacher', [
            'teacher' => $teacher
                ]);
    }

}
