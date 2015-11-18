<?php

namespace App\Http\Controllers\Admin;

use App\Models\Priod;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\PriodRequest;
use App\Models\ClassModel;
use App\Models\Award;
use App\Models\Summary;
use App\Models\Score;
use App\Models\StudentLearning;
use App\Models\TeachingClass;
use DB;

class PriodController extends PageController {

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index() {
        $priods = Priod::paginate(config('doan.number_priod_per_page'));
        return view('admin.priod.index', [
            'priods' => $priods,
            'id' => $priods->currentPage() == 1 ? 0 : ($priods->currentPage() - 1) * config('doan.number_priod_per_page')
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
            $priod = new Priod ();
            $edit = false;
        } else {
            $priod = Priod::getPriodById($id);
            if (!$priod) {
                return redirect(route('admin.priod.index'));
            }
        }
        if (request()->isMethod("post")) {
            $validate = Validator::make(Input::get(), PriodRequest::rules());
            if ($validate->fails()) {
                return redirect(route('admin.priod.edit', [
                            'id' => $id
                        ]))->withErrors($validate)->withInput();
            }
            if ($id) {
                $save = $priod->update(Input::get());
            } else {
                $save = $priod::createPriod(Input::get());
            }
            if ($save) {
                return redirect(route('admin.priod.index'));
            }
        }
        return view('admin.priod.edit', [
            'priod' => $priod,
            'edit' => $edit,
            'id' => $id
        ]);
    }

    public function delete($id) {

        DB::beginTransaction();
        try {
            $classModels = ClassModel::getClassByPriod(intval($id));
            foreach ($classModels as $classModel) {
                $classModel->destroy($classModel->id);
            }

            $awards = Award::getAwardByPriod(intval($id));
            foreach ($awards as $award) {
                $award->destroy($award->id);
            }

            $summaries = Summary::getAllSumaryByPriod(intval($id));
            foreach ($summaries as $summary) {
                $summary->destroy($summary->id);
            }

            $scores = Score::getByPriod(intval($id));
            foreach ($scores as $score) {
                $score->destroy($score->id);
            }

            $studentLearnings = StudentLearning::getByPriodId(intval($id));

            foreach ($studentLearnings as $studentLearning) {
                
                $student = $studentLearning->student;
                $student->status=0;
                $student->save();
                $studentLearning->destroy($studentLearning->id);
            }

            $teachingClasses = TeachingClass::getAllTeachingClassByPriodId(intval($id));
            foreach ($teachingClasses as $teachingClass) {

                $teachingClass->destroy($teachingClass->id);
            }
            Priod::destroy(intval($id));
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
        }
        return redirect(route('admin.priod.index'));
    }

}
