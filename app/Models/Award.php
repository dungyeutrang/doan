<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Award extends Model {

    use SoftDeletes;

    protected $table = 'tbl_awards';
    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];
    
    public function student(){
        
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
    
    public function priod(){        
        return $this->belongsTo('App\Models\Priod','priod_id');
    }
    
     /**
     * find student by primary key
     * @param type $id
     * @return model
     */
    public static function getAwardById($id) {
        return Award::all()->find($id);
    }

    /**
     * create student 
     * @param type $data
     * @return type
     */
    public static function createAward($data) {
        return Award::create($data);
    }  
    
    public static function getAwardByPriod($id){
        return Award::all()->where('priod_id',$id)->all();        
    }
    
    public static function getAwardByStudentId($studentId){
        
        return Award::all()->where('student_id',$studentId)->all();
    }

}
