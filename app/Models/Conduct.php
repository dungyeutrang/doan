<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conduct extends Model {

    use SoftDeletes;

    protected $table = 'tbl_conducts';
    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];

    /**
     * find conduct by primary key
     * @param type $id
     * @return model
     */
    public static function getConductById($id) {
        return Conduct::all()->find($id);
    }

    /**
     * create conduct 
     * @param type $data
     * @return type
     */
    public static function createConduct($data) {
        return Conduct::create($data);
    }

}
