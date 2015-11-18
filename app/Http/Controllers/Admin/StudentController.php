<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\StudentRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Award;
use App\Models\Score;
use App\Models\Summary;
use App\Models\StudentLearning;
use DB;

class StudentController extends PageController {

    /**
     * Display a listing of the resource.	 
     * @return view
     */
    public function index() {
        $students = Student::orderBy('status', 'DESC')->paginate(config('doan.number_student_per_page'));
        return view('admin.student.index', [
            'students' => $students,
            'id' => $students->currentPage() == 1 ? 0 : ($students->currentPage() - 1) * config('doan.number_student_per_page')
        ]);
    }

    /**
     * add or edit student	
     * @param type $id        	
     * @return view
     */
    public function edit($id = null) {
        $edit = true;
        if (!$id) {
            $student = new Student ();
            $edit = false;
        } else {
            $student = Student::getStudentById($id);
            if (!$student) {
                return redirect(route('admin.student.index'));
            }
        }
        if (request()->isMethod("post")) {
            $validate = Validator::make(Input::get(), StudentRequest::rules());
            if ($validate->fails()) {
                return redirect(route('admin.student.edit', [
                            'id' => $id
                        ]))->withErrors($validate)->withInput();
            }
            if ($id) {
                $save = $student->update(Input::get());
            } else {
                $save = Student::createStudent(Input::get());
            }
            if ($save) {
                return redirect(route('admin.student.index'));
            }
        }
        return view('admin.student.edit', [
            'student' => $student,
            'edit' => $edit,
            'id' => $id
        ]);
    }

    /**
     * get student by id
     * @return view
     */
    public function getStudent() {
        $student = Student::getStudentById(Input::get('index'));
        return view('admin.student.getstudent', ['student' => $student]);
    }

    public function delete($id) {

        DB::beginTransaction();
        try {
            $student = Student::all()->find(intval($id));
            if (!$student) {
                return redirect(route('admin.student.index'));
            }
            $scores = Score::getScoreByStudentId(intval($id));
            foreach ($scores as $score) {
                $score->destroy($score->id);
            }

            $awards = Award::getAwardByStudentId(intval($id));
            foreach ($awards as $award) {
                $award->destroy($award->id);
            }

            $summaries = Summary::getSummaryByStudentId(intval($id));
            foreach ($summaries as $summary) {
                $summary->destroy($summary->id);
            }

            $studentLearnings = StudentLearning::getStudentLearningByStudentId(intval($id));
            foreach ($studentLearnings as $studentLearning) {

                $studentLearning->destroy($studentLearning->id);
            }

            $student->destroy(intval($id));
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
        }
        return redirect(route('admin.student.index'));
    }

}
