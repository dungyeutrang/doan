<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model {

    use SoftDeletes;

    protected $table = 'tbl_teachers';
    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];   
    
    /**
     * get teacher by primary key
     * @param type $id
     * @return model
     */
    public static function getTeacherById($id) {
        return Teacher::all()->find($id);
    }

    /**
     * create teacher 
     * @param type $data
     * @return model
     */
    public static function createTeacher($data) {
        return Teacher::create($data);
    }

    /**
     * get all teacher
     * @return array 
     */
    public static function getAllTeacher() {
        return Teacher::all();
    }

}
