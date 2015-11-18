<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherLearningSubject extends Model {

    use SoftDeletes;

    protected $table = 'tbl_teacher_leaning_subjects';
    protected $dates = [
        'deleted_at'
    ];
    protected $guarded = [
        '_token'
    ];

    /**
     * relation with teacher
     */
    public function teacher() {

        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }

    /**
     * relation with subject 
     */
    public function subject() {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }

    /**
     * find TeacherSubject by primary key
     * 
     * @param type $id        	
     * @return model
     */
    public static function getTeacherSubjectById($id) {
        return TeacherLearningSubject::all()->find($id);
    }

    /**
     * create TeacherSubject
     * 
     * @param type $data        	
     * @return type
     */
    public static function createTeacherSubject($data) {
        return TeacherLearningSubject::create($data);
    }

    /**
     * get all teacher subject 
     */
    public static function getAllTeacherSubject() {
        return TeacherLearningSubject::all();
    }

    public static function getTeacherLearningByTeacherId($teacherId){        
        return TeacherLearningSubject::all()->where('teacher_id',$teacherId)->all();
    }
    
    public static function getAllBySubjectId($subjectId){        
        return TeacherLearningSubject::all()->where('subject_id', $subjectId)->all();
                    
    }
    


}
