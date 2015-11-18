<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use App\Models\Score;
use App\Http\Requests\Admin\ScoreRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ScoreType;
use App\Models\Priod;
use App\Models\Student;

class ScoreController extends PageController {

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index($studentId) {
        $student = Student::all()->find($studentId);
        $scores = Score::where('student_id', $studentId)
                ->orderBy('priod_id', 'DESC')
                ->orderBy('subject_id', 'DESC')
                ->paginate(10);
        return view('admin.score.index', [
            'scores' => $scores,
            'studentId' => $studentId,
            'student' => $student,
            'id' => $scores->currentPage() == 1 ? 0 : ($scores->currentPage() - 1) * 10
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($studentId, $id = null) {
        $edit = true;
        if (!$id) {
            $score = new Score ();
            $edit = false;
        } else {
            $score = Score::getScoreById($id);
            if (!$score) {
                return redirect(route('admin.score.index'));
            }
        }
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $scoreTypes = ScoreType::all();
        $priods = Priod::all();

        if (!count($subjects) || !count($teachers) || !count($scoreTypes)) {
            return ('/admin');
        }

        if (request()->isMethod("post")) {
            $validate = Validator::make(Input::get(), ScoreRequest::rules());
            if ($validate->fails()) {
                return redirect(route('admin.score.edit', [
                            'id' => $id
                        ]))->withErrors($validate)->withInput();
            }
            if ($id) {
                $save = $score->update(Input::get());
            } else {
                $save = Score::createScore(Input::get());
            }
            if ($save) {
                return redirect(route('admin.score.index', ['student_id' => $studentId]));
            }
        }
        return view('admin.score.edit', [
            'score' => $score,
            'subjects' => $subjects,
            'teachers' => $teachers,
            'scoreTypes' => $scoreTypes,
            'priods' => $priods,
            'edit' => $edit,
            'id' => $id,
            'studentId' => $studentId
        ]);
    }

    public function delete($id) {
        $studentId = Score::getScoreById(intval($id))->student->id;
        Score::destroy($id);
        return redirect(route('admin.score.index', ['student_id' => $studentId]));
    }

}
