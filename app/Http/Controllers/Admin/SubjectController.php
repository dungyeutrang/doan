<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\Subject;
use App\Http\Requests\Admin\SubjectRequest;
use DB;
use App\Models\TeacherLearningSubject;
use App\Models\Score;

class SubjectController extends PageController {

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index() {
        $subjects = Subject::paginate(config('doan.number_subject_per_page'));
        return view('admin.subject.index', [
            'subjects' => $subjects,
            'id' => $subjects->currentPage() == 1 ? 0 : ($subjects->currentPage() - 1) * config('doan.number_subject_per_page')
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
            $subject = new Subject ();
            $edit = false;
        } else {
            $subject = Subject::getSubjectById($id);
            if (!$subject) {
                return redirect(route('admin.subject.index'));
            }
        }
        if (request()->isMethod("post")) {
            $validate = Validator::make(Input::get(), SubjectRequest::rules());
            if ($validate->fails()) {
                return redirect(route('admin.subject.edit', [
                            'id' => $id
                        ]))->withErrors($validate)->withInput();
            }
            if ($id) {
                $save = $subject->update(Input::get());
            } else {
                $save = subject::createSubject(Input::get());
            }
            if ($save) {
                return redirect(route('admin.subject.index'));
            }
        }
        return view('admin.subject.edit', [
            'subject' => $subject,
            'edit' => $edit,
            'id' => $id
        ]);
    }

    public function delete($id) {

        DB::beginTransaction();
        try {
            $subject = Subject::getSubjectById(intval($id));
            if (!$subject) {
                return redirect(route('admin.subject.index'));
            }
            $teacherLearningSubjects = TeacherLearningSubject::getAllBySubjectId(intval($id));
            foreach ($teacherLearningSubjects as $teacherLearningSubject) {
                $teacherLearningSubject->destroy($teacherLearningSubject->id);
            }
            $scores = Score::getScoreBySubjectId(intval($id));
            foreach ($scores as $score) {
                $score->destroy($score->id);
            }

            $subject->destroy($subject->id);
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
        }
        return redirect(route('admin.subject.index'));
    }

}
