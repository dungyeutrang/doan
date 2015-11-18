<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class StudentLearning extends Model {

    use SoftDeletes;

    protected $table = 'tbl_student_learning_class';
    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];

    public function student() {

        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    public function priod() {

        return $this->belongsTo('App\Models\Priod', 'priod_id');
    }

    /**
     * relation with subject 
     */
    public function classModel() {
        return $this->belongsTo('App\Models\ClassModel', 'class_id');
    }

    public static function getStudentForCreateStudentLearning() {
        $studentNews = DB::table('tbl_students')->select(array('*', DB::raw('is_new as orderStudent')))->where('is_new', 1);
        $students = Student::query()
                ->join('tbl_student_learning_class', function($join) {
                    $join->on('tbl_student_learning_class.student_id', '=', 'tbl_students.id')
                    ->where('is_current', '=', 1)
                    ->whereNull('tbl_students.deleted_at');                            
                })
                ->where('is_new', 0)
                ->whereNull('tbl_student_learning_class.deleted_at')
                ->select(array('tbl_students.*', DB::raw('tbl_student_learning_class.class_id as orderStudent')))
                ->union($studentNews)
                ->orderBy('status', 'DESC')
                ->orderBy('orderStudent', 'ASC')
                ->simplePaginate(10);
        return $students;
    }

    public static function insert($studentId, $classId, $priodId) {
        DB::beginTransaction();
        try {
            $classCurrent = self::findClassCurrent($studentId);
            if ($classCurrent) {
                $classCurrent->is_current = 0;
                $classCurrent->save();
            }
            $student = new StudentLearning();
            $student->student_id = $studentId;
            $student->class_id = $classId;
            $student->priod_id = $priodId;
            $student->is_current = 1;
            $student->save();
            $studentClass = Student::all()->find($studentId);
            $studentClass->is_new = 0;
            $studentClass->save();
            DB::commit();
            return true;
        } catch (Exception $ex) {
            DB::rollback();
            return false;
        }
    }

    public static function insertMulti($students, $classId, $priodId) {
        DB::beginTransaction();
        try {
            foreach ($students as $studentId) {
                $classCurrent = self::findClassCurrent(intval($studentId));
                if ($classCurrent) {
                    $classCurrent->is_current = 0;
                    $classCurrent->save();
                }
                $student = new StudentLearning();
                $student->student_id = intval($studentId);
                $student->class_id = $classId;
                $student->priod_id = $priodId;
                $student->is_current = 1;
                $student->save();
                $studentClass = Student::all()->find(intval($studentId));
                $studentClass->is_new = 0;
                $studentClass->save();
            }
            DB::commit();
            return true;
        } catch (Exception $ex) {
            DB::rollback();
            return false;
        }
    }

    public static function findClassCurrent($studentId) {
        return StudentLearning::all()->where('student_id', $studentId)->where('is_current', 1)->first();
    }

    public static function getStudentLearning() {
        return StudentLearning::all()->where('is_current', 1)->sortBy('class_id')->all();
    }

    public static function getStudentLearningByStudentNotNew() {

        $data = StudentLearning::where('is_current', 1)
                ->join('student', function($join) {
                    $join->on('tbl_students.id', "=", 'tbl_student_learning_class')
                    ->where('tbl_students.status', 1)
                    ->where('tbl_students.is_new', 0)
                    ->whereNull('tbl_students.deleted_at');        
                })
                ->whereNull('tbl_student_learning_class.deleted_at')
                ->orderBy('class_id', 'asc')
                ->paginate(10);
        return $data;
    }

    public static function getStudentLearningByPriod($priodId) {
        $data = StudentLearning::where('priod_id', $priodId)
                ->join('tbl_summaries', function($join) {
                    $join->on('tbl_summaries.student_learning_class_id', '=' ,'tbl_student_learning_class.id')
                          ->whereNull('tbl_summaries.deleted_at');
                })
                ->orderBy('class_id', 'asc')
                ->whereNull('tbl_student_learning_class.deleted_at')
                ->get();
       return $data;         
    }
    
    public static function getTeacherOfStudent($studentId,$priodId){        
        return StudentLearning::all()
                                ->where('student_id', $studentId)
                                ->where('priod_id', $priodId)
                                ->first();
    }

}
