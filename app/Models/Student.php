<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model {

    use SoftDeletes;

    protected $table = 'tbl_students';
    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];

    /**
     * relation with student learning 
     * @return relation
     */
    public function studentLearning() {
        return $this->hasMany('App\Models\StudentLearning', 'student_id');
    }

    /**
     * find student by primary key
     * @param type $id
     * @return model
     */
    public static function getStudentById($id) {
        return Student::all()->find($id);
    }

    /**
     * create student 
     * @param type $data
     * @return type
     */
    public static function createStudent($data) {
        return Student::create($data);
    }

    /**
     * get all student with status learning 
     * @return array model
     */
    public static function getAllStudent() {
        return Student::where('status', 1)->paginate(10);
    }

    public static function getClassCurrent($id) {
        return StudentLearning::all()->where("student_id", $id)->where("is_current", 1)->first();
    }
 
    
}
