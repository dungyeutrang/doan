<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Summary;
use App\Http\Requests\Admin\SummaryRequest;
use App\Models\RankingAcademic;
use App\Models\Conduct;
use App\Models\Student;
use App\Models\StudentLearning;

class SummaryController extends PageController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($student_id) {
        $summaries = Summary::getAllSumaryByStudentId(intval($student_id));
        $studentLearning = StudentLearning:: findClassCurrent(intval($student_id));
        $existStudentLearning = Summary::getSummaryByStudentLearningCurrent($studentLearning->id);
        $student = Student::all()->find(intval($student_id));
        return view('admin.summary.index', [
            'summaries' => $summaries,
            'studentLearning' => $studentLearning,
            'student' => $student,
            'existStudentLearning' => $existStudentLearning,
            'id' => $summaries->currentPage() == 1 ? 0 : ($summaries->currentPage() - 1) * 10
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($student_learning_id, $id = null) {
        $edit = true;
        if (!$id) {
            $summary = new Summary ();
            $edit = false;
        } else {
            $summary = Summary::getSummaryById(intval($id));
            if (!$summary) {
                return redirect(route('admin.summary.index', ['student_id' => StudentLearning::all()->find(intval($student_learning_id))->student->id]));
            }
        }
        $existStudentLearning = Summary::getSummaryByStudentLearningCurrent(intval($student_learning_id));
        if ($existStudentLearning) {
            return redirect(route('admin.summary.index', ['student_id' => StudentLearning::all()->find($student_learning_id)->student->id]));
        }

        $rankingAcademics = RankingAcademic::all();
        $conducts = Conduct::all();
        if (!count($rankingAcademics) || !count($conducts)) {
            return redirect('/admin');
        }

        if (request()->isMethod("post")) {
            $validate = Validator::make(Input::get(), SummaryRequest::rules());
            if ($validate->fails()) {
                return redirect(route('admin.summary.edit', [
                            'id' => $id,
                            'student_learning_id' => $student_learning_id
                        ]))->withErrors($validate)->withInput();
            }
            if ($id) {
                $save = $summary->update(Input::get());
            } else {
                $save = Summary::createSummary(Input::get());
            }
            if ($save) {
                return redirect(route('admin.summary.index', ['student_id' => StudentLearning::all()->find(intval($student_learning_id))->student->id]));
            }
        }
        return view('admin.summary.edit', [
            'student_learning_id' => $student_learning_id,
            'summary' => $summary,
            'conducts' => $conducts,
            'rankingAcademics' => $rankingAcademics,
            'edit' => $edit,
            'id' => $id
        ]);
    }

    /**
     * remove summary
     * @param type $studentId
     * @param type $id
     * @return route
     */
    public function delete($studentId, $id) {
        Summary::destroy($id);
        return redirect(route('admin.summary.index', ['student_id' => $studentId]));
    }

}
