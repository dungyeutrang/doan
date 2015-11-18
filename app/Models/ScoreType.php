<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScoreType extends Model {

    use SoftDeletes;

    protected $table = 'tbl_score_types';
    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];

    /**
     * find scoretype by primary key
     * @param type $id
     * @return model
     */
    public static function getScoreTypeById($id) {
        return ScoreType::all()->find($id);
    }

    /**
     * create ScoreType
     * @param type $data
     * @return type
     */
    public static function createScoreType($data) {
        return ScoreType::create($data);
    }

}
