<?php

namespace App\Http\Controllers\Admin;

use App\Models\Conduct;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\ConductRequest;
use DB;
use App\Models\Summary;

class ConductController extends PageController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $conducts = Conduct::paginate(10);
        return view('admin.conduct.index', [
            'conducts' => $conducts,
            'id' => $conducts->currentPage() == 1 ? 0 : ($conducts->currentPage() - 1) * 10
        ]);
    }

    /**
     * create or update conduct
     * @param type $id
     * @return view
     */
    public function edit($id = null) {
        $edit = true;
        if (!$id) {
            $conduct = new Conduct ();
            $edit = false;
        } else {
            $conduct = Conduct::getConductById($id);
            if (!$conduct) {
                return redirect(route('admin.conduct.index'));
            }
        }
        if (request()->isMethod("post")) {
            $validate = Validator::make(Input::get(), ConductRequest::rules());
            if ($validate->fails()) {
                return redirect(route('admin.conduct.edit', [
                            'id' => $id
                        ]))->withErrors($validate)->withInput();
            }
            if ($id) {
                $save = $conduct->update(Input::get());
            } else {
                $save = Conduct::createConduct(Input::get());
            }
            if ($save) {
                return redirect(route('admin.conduct.index'));
            }
        }
        return view('admin.conduct.edit', [
            'conduct' => $conduct,
            'edit' => $edit,
            'id' => $id
        ]);
    }

    public function delete($id) {
        DB::beginTransaction();
        try {
            $sumary = Summary::all()->where('conduct_id', intval($id))->lists('id')->toArray();
            foreach ($sumary as $sum) {
                Summary::destroy($sum);
            } 
            Conduct::destroy($id);
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
        }
        return redirect(route('admin.conduct.index'));
    }

}
