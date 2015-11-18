<?php

namespace App\Http\Controllers\Admin;

use App\Models\TeacherLearningSubject;
use Illuminate\Support\Facades\Input;
use App\Models\Subject;
use App\Models\Teacher;

class TeacherLearningSubjectController extends PageController {

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index() {
        $teacherSubjects = TeacherLearningSubject::paginate(config('doan.number_teachersubject_per_page'));
        return view('admin.teacher_subject.index', [
            'teacherSubjects' => $teacherSubjects,
            'id' => $teacherSubjects->currentPage() == 1 ? 0 : ($teacherSubjects->currentPage() - 1) * config('doan.number_teachersubject_per_page')
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
            $teacherSubject = new TeacherLearningSubject ();
            $edit = false;
        } else {
            $teacherSubject = TeacherLearningSubject::getTeacherSubjectById($id);
            if (!$teacherSubject) {
                return redirect(route('admin.teachersubject.index'));
            }
        }
        $subjects = Subject::getAllSubject();
        $teachers = Teacher::getAllTeacher();
        if (!$subjects->count() || !$teachers->count()) {
            return redirect(route('admin.teachersubject.index'));
        }
        if (request()->isMethod("post")) {
            $teacherSubject->teacher_id = Input::get('teacher_id');
            $teacherSubject->subject_id = Input::get('subject_id');
            if ($teacherSubject->save()) {
                return redirect(route('admin.teachersubject.index'));
            }
        }
        return view('admin.teacher_subject.edit', [
            'teacherSubject' => $teacherSubject,
            'edit' => $edit,
            'id' => $id,
            'subjects' => $subjects,
            'teachers' => $teachers
        ]);
    }

    /**
     * get teacher
     *
     */
    public function getTeacher() {
        $index = Input::get('index');
        $teacher = Teacher::getAllTeacher()->find($index);
        return view('admin.teacher_subject.get_teacher', [
            'teacher' => $teacher
        ]);
    }

    public function delete($id) {
        $teacherSubject = TeacherLearningSubject::getTeacherSubjectById(intval($id));
        if ($teacherSubject) {
            $teacherSubject->destroy($teacherSubject->id);
        }
        return redirect(route('admin.teachersubject.index'));
    }

}
