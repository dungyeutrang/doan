<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model {

    use SoftDeletes;

    protected $table = 'tbl_scores';
    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];

    /**
     * create relative with tbl_student table
     * @return ralation
     */
    public function student(){
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
    
    /**
     * create relation with tbl_subject table
     */
    public function subject() {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }

    /**
     * create relation with tbl_priod table
     */
    public function priod() {
        return $this->belongsTo('App\Models\Priod', 'priod_id');
    }

    /**
     * create relation with tbl_teacher table
     */
    public function teacher() {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }

    /**
     * create relation with tbl_scoretype table
     */
    public function scoreType() {
        return $this->belongsTo('App\Models\ScoreType', 'score_type_id');
    }

    /**
     * find score by primary key
     * @param type $id
     * @return model
     */
    public static function getScoreById($id) {
        return Score::all()->find($id);
    }

    /**
     * create score 
     * @param type $data
     * @return type
     */
    public static function createScore($data) {
        return Score::create($data);
    }

    /**
     * get all score 
     * @return array
     */
    public static function getAllScore() {
        return Score::query()->whereNull('deleted_at')->orderBy('date_begin', 'DESC')->get();
    }

    /**
     * get score of user by studentid and priod id
     * @param type $studentId
     * @param type $priodId
     * @return array
     */
    public static function getTeacherByStudentAndPriod($studentId,$priodId){      
        return Score::query()
                ->where('student_id', $studentId)
                ->where('priod_id',$priodId)
                ->whereNull('deleted_at')
                ->groupBy("teacher_id")
                ->get();
    }
}
