<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Summary extends Model {

    use SoftDeletes;

    protected $table = 'tbl_summaries';
    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];

    /**
     * create relation with tbl_summary table
     */
    public function studentLearning() {
        return $this->belongsTo('App\Models\StudentLearning', 'student_learning_class_id');
    }

    /**
     * relation with conduct table
     */
    public function conduct() {
        return $this->belongsTo('App\Models\Conduct', 'conduct_id');
    }

    /**
     * relation with ranking academic table
     */
    public function rankingAcademic() {
        return $this->belongsTo('App\Models\RankingAcademic', 'ranking_academic_id');
    }

    /**
     * find summary by primary key
     * @param type $id
     * @return model
     */
    public static function getSummaryById($id) {
        return Summary::all()->find($id);
    }

    /**
     * create summary 
     * @param type $data
     * @return type
     */
    public static function createSummary($data) {
        return Summary::create($data);
    }

    public static function getAllSumaryByStudentId($studentId) {
        return Summary::query()
                        ->join('tbl_student_learning_class', function($join)use($studentId) {
                            $join->on('tbl_student_learning_class.id', '=', 'tbl_summaries.student_learning_class_id')
                            ->where('student_id', '=', $studentId)
                            ->whereNull('tbl_student_learning_class.deleted_at');
                        })
                        ->whereNull('tbl_summaries.deleted_at')
                        ->select(array('tbl_summaries.*', DB::raw('tbl_student_learning_class.id as student_learning_id')))
                        ->orderBy('priod_id', 'DESC')
                        ->paginate(10);
    }

    public static function getSummaryByStudentLearningCurrent($studentLearning) {
        return Summary::all()->where('student_learning_class_id', $studentLearning)->first();
    }

    public static function getAllSumaryByStudentIdAndPriod($studentId, $priodId) {
        return Summary::query()
                        ->join('tbl_student_learning_class', function($join)use($studentId, $priodId) {
                            $join->on('tbl_student_learning_class.id', '=', 'tbl_summaries.student_learning_class_id')
                            ->where('student_id', '=', $studentId)
                            ->where('priod_id', '=', $priodId)
                            ->whereNull('tbl_student_learning_class.deleted_at');
                        })
                        ->whereNull('tbl_summaries.deleted_at')
                        ->select(array('tbl_summaries.*', DB::raw('tbl_student_learning_class.id as student_learning_id')))
                        ->orderBy('priod_id', 'DESC')
                        ->paginate(10);
    }

    public static function getAllSumaryByPriod($priodId) {
        return Summary::query()
                        ->join('tbl_student_learning_class', function($join)use($priodId) {
                            $join->on('tbl_student_learning_class.id', '=', 'tbl_summaries.student_learning_class_id')
                            ->where('priod_id', '=', $priodId)
                            ->whereNull('tbl_student_learning_class.deleted_at');
                        })
                        ->whereNull('tbl_summaries.deleted_at')
                        ->select(array('tbl_summaries.*', DB::raw('tbl_student_learning_class.id as student_learning_id')))
                        ->get();
    }

    public static function getSummaryByStudentId($studentId) {
        return Summary::query()->
                        join('tbl_student_learning_class', function($join)use($studentId) {
                            $join->on('tbl_student_learning_class.id', '=', 'tbl_summaries.student_learning_class_id')
                            ->where('student_id', '=', $studentId)
                            ->whereNull('tbl_student_learning_class.deleted_at');
                        })
                        ->whereNull('tbl_summaries.deleted_at')
                        ->get();
    }

    public static function getSummaryByTeacherId($teacherId) {
        return Summary::query()
                        ->join('tbl_student_learning_class', function($join) {
                            $join->on('tbl_student_learning_class.id', '=', 'tbl_summaries.student_learning_class_id')
                            ->whereNull('tbl_student_learning_class.deleted_at');
                        })
                        ->join('tbl_class', function($join) use($teacherId) {
                            $join->on('tbl_class.id', '=', 'tbl_student_learning_class.class_id')
                            ->where('teacher_manage_id', '=', $teacherId)
                            ->whereNull('tbl_class.deleted_at');
                        })
                        ->whereNull('tbl_summaries.deleted_at')
                        ->get();
    }

    public static function getSummaryByClassId($classId) {
        return Summary::query()
                        ->join('tbl_student_learning_class', function($join)use($classId) {
                            $join->on('tbl_student_learning_class.id', '=', 'tbl_summaries.student_learning_class_id')
                            ->where('class_id', '=', $classId)
                            ->whereNull('tbl_student_learning_class.deleted_at');
                        })
                        ->whereNull('tbl_summaries.deleted_at')
                        ->get();
    }

}
