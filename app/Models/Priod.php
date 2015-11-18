<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Priod extends Model {

    use SoftDeletes;

    protected $table = 'tbl_priods';
    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];

    /**
     * find priod by primary key
     * @param type $id
     * @return model
     */
    public static function getPriodById($id) {
        return Priod::all()->find($id);
    }

    /**
     * create priod 
     * @param type $data
     * @return type
     */
    public static function createPriod($data) {
        return Priod::create($data);
    }
    
    /**
     * get all priod 
     * @return array
     */
    public static function getAllPriod(){
    	return Priod::query()->orderBy('date_begin', 'DESC')->get();
    }

}
