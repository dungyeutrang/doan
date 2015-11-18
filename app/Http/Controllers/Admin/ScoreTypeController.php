<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use App\Models\ScoreType;
use App\Http\Requests\Admin\ScoreTypeRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Score;
use DB;

class ScoreTypeController extends PageController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $scoreTypes = ScoreType::paginate(10);
        return view('admin.scoretype.index', [
            'scoreTypes' => $scoreTypes,
            'id' => $scoreTypes->currentPage() == 1 ? 0 : ($scoreTypes->currentPage() - 1) * 10
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null) {
        $edit = true;
        if (!$id) {
            $scoreType = new ScoreType ();
            $edit = false;
        } else {
            $scoreType = ScoreType::getScoreTypeById($id);
            if (!$scoreType) {
                return redirect(route('admin.scoretype.index'));
            }
        }
        if (request()->isMethod("post")) {
            $validate = Validator::make(Input::get(), ScoreTypeRequest::rules());
            if ($validate->fails()) {
                return redirect(route('admin.scoretype.edit', [
                            'id' => $id
                        ]))->withErrors($validate)->withInput();
            }
            if ($id) {
                $save = $scoreType->update(Input::get());
            } else {
                $save = ScoreType::createScoreType(Input::get());
            }
            if ($save) {
                return redirect(route('admin.scoretype.index'));
            }
        }
        return view('admin.scoretype.edit', [
            'scoreType' => $scoreType,
            'edit' => $edit,
            'id' => $id
        ]);
    }

    public function delete($id) {
        DB::beginTransaction();
        try {
            $scores = Score::all()->where('score_type_id', intval($id))->lists('id')->toArray();
            foreach ($scores as $score) {
                Score::destroy($score);                
            }
            ScoreType::destroy($id);
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
        }
        return redirect(route('admin.scoretype.index'));
    }

}
