<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeachingClass extends Model {

    use SoftDeletes;

    protected $table = 'tbl_teaching_class';
    protected $dates = [
        'deleted_at'
    ];
    protected $guarded = [
        '_token'
    ];

    /**
     * create relation with tbl_class table
     */
    public function classModel() {
        return $this->belongsTo('App\Models\ClassModel', 'class_id');
    }

    /**
     * create relation with tbl_teacher_learning_subject table
     */
    public function teacherSubject() {
        return $this->belongsTo('App\Models\TeacherLearningSubject', 'teacher_leaning_subjects_id');
    }

    /**
     * find teaching class by primary key
     *
     * @param type $id        	
     * @return model
     */
    public static function getTeachingClassById($id) {
        return TeachingClass::all()->find($id);
    }

    /**
     * create teaching class
     *
     * @param type $data        	
     * @return type
     */
    public static function createTeachingClass($data) {
        return TeachingClass::create($data);
    }

    /**
     * get teaching class
     *
     * @return array
     */
    public static function getAllTeachingClass() {
        return TeachingClass::all();
    }

}
