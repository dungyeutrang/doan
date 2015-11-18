<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\RankingAcademic;
use App\Http\Requests\Admin\RankingAcademicRequest;
use App\Models\Summary;
use DB;

class RankingAcademicController extends PageController {

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index() {
        $rankingAcademics = RankingAcademic::paginate(10);
        return view('admin.ranking_academic.index', [
            'rankingAcademics' => $rankingAcademics,
            'id' => $rankingAcademics->currentPage() == 1 ? 0 : ($rankingAcademics->currentPage() - 1) * 10
        ]);
    }

    public function edit($id = null) {
        $edit = true;
        if (!$id) {
            $rankingAcademic = new RankingAcademic ();
            $edit = false;
        } else {
            $rankingAcademic = RankingAcademic::getRankingAcademicById($id);
            if (!$rankingAcademic) {
                return redirect(route('admin.rankingacademic.index'));
            }
        }
        if (request()->isMethod("post")) {
            $validate = Validator::make(Input::get(), RankingAcademicRequest::rules());
            if ($validate->fails()) {
                return redirect(route('admin.rankingacademic.edit', [
                            'id' => $id
                        ]))->withErrors($validate)->withInput();
            }
            if ($id) {
                $save = $rankingAcademic->update(Input::get());
            } else {
                $save = RankingAcademic::createRankingAcademic(Input::get());
            }
            if ($save) {
                return redirect(route('admin.rankingacademic.index'));
            }
        }
        return view('admin.ranking_academic.edit', [
            'rankingAcademic' => $rankingAcademic,
            'edit' => $edit,
            'id' => $id
        ]);
    }

    public function delete($id) {
        DB::beginTransaction();
        try {
            RankingAcademic::destroy($id);
            $data = Summary::all()->where('ranking_academic_id', intval($id));
            foreach($data as $dt){
                Summary::destroy($dt->id);
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
        }
        return redirect(route('admin.rankingacademic.index'));
    }

}
