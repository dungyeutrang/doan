<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Http\Requests\Admin\TeacherRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\TeachingClass;
use App\Models\TeacherLearningSubject;
use App\Models\Summary;
use App\Models\StudentLearning;
use App\Models\ClassModel;
use DB;

class TeacherController extends PageController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $teachers = Teacher::paginate(config('doan.number_teacher_per_page'));
        return view('admin.teacher.index', [
            'teachers' => $teachers,
            'id' => $teachers->currentPage() == 1 ? 0 : ($teachers->currentPage() - 1) * config('doan.number_teacher_per_page')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id        	
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null) {
        $edit = true;
        if (!$id) {
            $teacher = new Teacher ();
            $edit = false;
        } else {
            $teacher = Teacher::getTeacherById($id);
            if (!$teacher) {
                return redirect(route('admin.teacher.index'));
            }
        }
        if (request()->isMethod("post")) {
            $validate = Validator::make(Input::get(), TeacherRequest::rules());
            if ($validate->fails()) {
                return redirect(route('admin.teacher.edit', [
                            'id' => $id
                        ]))->withErrors($validate)->withInput();
            }
            if ($id) {
                $save = $teacher->update(Input::get());
            } else {
                $save = $teacher::createTeacher(Input::get());
            }
            if ($save) {
                return redirect(route('admin.teacher.index'));
            }
        }
        return view('admin.teacher.edit', [
            'teacher' => $teacher,
            'edit' => $edit,
            'id' => $id
        ]);
    }

    public function delete($id) {

        DB::beginTransaction();
        try {
            $teacher = Teacher::getTeacherById(intval($id));
            $teachingClasses = TeachingClass::getTeachingClassByTeacherId(intval($id));
            if (!$teacher) {
                return redirect(route('admin.teacher.index'));
            }
            foreach ($teachingClasses as $teachingClass) {
                $teachingClass->destroy($teachingClass->id);
            }

            $teacherLearningSubjects = TeacherLearningSubject::getTeacherLearningByTeacherId(intval($id));
            foreach ($teacherLearningSubjects as $teacherLearningSubject) {
                $teacherLearningSubject->destroy($teacherLearningSubject->id);
            }

            $summaries = Summary::getSummaryByTeacherId(intval($id));

            foreach ($summaries as $summary) {
                $summary->destroy($summary->id);
            }

            $studentLearnings = StudentLearning::getStudentLearningByTeacherId(intval($id));
            foreach ($studentLearnings as $studentLearning) {
                $studentLearning->destroy($studentLearning->id);
            }

            $classModels = ClassModel::getClassByTeacherId(intval($id));
            foreach ($classModels as $classModel) {

                $classModel->destroy($classModel->id);
            }

            $teacher->destroy(intval($id));
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
        }
        return redirect(route('admin.teacher.index'));
    }

}
