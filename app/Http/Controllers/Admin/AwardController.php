<?php

namespace App\Http\Controllers\Admin;

use App\Models\Award;
use App\Http\Requests\Admin\AwardRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\Priod;
use App\Models\Student;

class AwardController extends PageController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $awards = Award::paginate(10);
        return view('admin.award.index', [
            'awards' => $awards,
            'id' => $awards->currentPage() == 1 ? 0 : ($awards->currentPage() - 1) * 10
        ]);
    }

    public function edit($id = null) {
        $edit = true;
        if (!$id) {
            $award = new Award ();
            $edit = false;
        } else {
            $award = Award::getAwardById($id);
            if (!$award) {
                return redirect(route('admin.award.index'));
            }
        }
        $priod = Priod::getAllPriod();
        $student = Student::getAllStudent();
        if (!$priod->count() || !$student) {
            return redirect('/');
        }
        if (request()->isMethod("post")) {
            $validate = Validator::make(Input::get(), AwardRequest::rules());
            if ($validate->fails()) {
                return redirect(route('admin.award.edit', [
                            'id' => $id
                        ]))->withErrors($validate)->withInput();
            }
            if ($id) {
                $save = $award->update(Input::get());
            } else {
                $save = $award::createAward(Input::get());
            }
            if ($save) {
                return redirect(route('admin.award.index'));
            }
        }
        return view('admin.award.edit', [
            'award' => $award,
            'edit' => $edit,
            'priods' => $priod,
            'id' => $id,
            'students' => $student
        ]);
    }

    public function delete($id) {
        Award::destroy($id);
        return redirect(route('admin.award.index'));
    }

}
