<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RankingAcademic extends Model {

    use SoftDeletes;

    protected $table = 'tbl_ranking_academics';
    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];
    
     /**
     * find raning academic by primary key
     * @param type $id
     * @return model
     */
    public static function getRankingAcademicById($id) {
        return RankingAcademic::all()->find($id);
    }

    /**
     * create ranking academic
     * @param type $data
     * @return type
     */
    public static function createRankingAcademic($data) {
        return RankingAcademic::create($data);
    }

}
