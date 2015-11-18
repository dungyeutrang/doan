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

    public static function getAllTeachingClassByPriodId($priodId) {
        return TeachingClass::query()
                        ->join('tbl_class', function($join) use($priodId) {
                            $join->on('tbl_class.id', '=', 'tbl_teaching_class.class_id')
                            ->where('priod_id', '=', $priodId)
                            ->whereNull('tbl_class.deleted_at');
                        })
                        ->whereNull('tbl_teaching_class.deleted_at')
                        ->get();
    }

    public static function getTeachingClassByTeacherId($teacherId) {

        return TeachingClass::query()
                        ->join('tbl_class', function($join) use($teacherId) {
                            $join->on('tbl_class.id', '=', 'tbl_teaching_class.class_id')
                            ->where('teacher_manage_id', '=', $teacherId)
                            ->whereNull('tbl_class.deleted_at');
                        })
                        ->whereNull('tbl_teaching_class.deleted_at')
                        ->get();
    }

    public static function getTeachingClassByClassId($classId) {
        return TeachingClass::all()->where('class_id', $classId)->all();
    }

}
