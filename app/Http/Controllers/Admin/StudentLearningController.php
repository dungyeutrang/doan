<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassModel;
use App\Models\Priod;
use App\Models\StudentLearning;
use Illuminate\Support\Facades\Input;

class StudentLearningController extends PageController {

    /**
     * Display a listing of the resource.     
     * @return view
     */
    public function index() {
        $classes = ClassModel::getAllClass();
        $priods = Priod::getAllPriod();
        $students = StudentLearning::getStudentForCreateStudentLearning();
        $firstClassPriods = ClassModel::getClassByPriod($priods[0]->id);
        if (!$students->count() || !$classes->count() || !$priods->count()) {
            return redirect('/admin');
        }
        return view('admin.student_learning.index', ['students' => $students, "firstClassPriods" => $firstClassPriods, 'priods' => $priods, 'classes' => $classes, 'id' => $students->currentPage() == 1 ? 0 : ($students->currentPage() - 1) * 10]);
    }

    public function changePriod() {
        $id = Input::get('id');
        $classes = ClassModel::getClassByPriod(intval($id));
        return view('admin.student_learning.change_priod', ['classes' => $classes]);
    }

    public function addClass() {
        $response = array();
        $studentId = Input::get('studentId');
        $classId = Input::get('classId');
        $priodId = Input::get('priodId');
        $result = StudentLearning::insert(intval($studentId), intval($classId), intval($priodId));
        if ($result) {
            $response['status'] = 1;
        } else {

            $response['status'] = 0;
        }
        echo json_encode($response);
    }

    public function addMultiClass() {

        $students = Input::get('students');
        $classId = Input::get('classId');
        $priodId = Input::get('priodId');
        $result = StudentLearning::insertMulti($students, $classId, $priodId);
         if ($result) {
            $response['status'] = 1;
        } else {
            $response['status'] = 0;
        }
        echo json_encode($response);
    }

}
