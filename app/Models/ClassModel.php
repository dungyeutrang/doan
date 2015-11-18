<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassModel extends Model {

    use SoftDeletes;

    protected $table = 'tbl_class';
    protected $dates = [
        'deleted_at'
    ];
    protected $guarded = [
        '_token'
    ];

    /**
     * relation with teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher() {
        return $this->belongsTo('App\Models\Teacher', 'teacher_manage_id');
    }

    public function priod() {
        return $this->belongsTo('App\Models\Priod', 'priod_id');
    }

    /**
     * find class by primary key
     *
     * @param type $id        	
     * @return model
     */
    public static function getClassById($id) {
        return ClassModel::all()->find($id);
    }

    /**
     * create priod
     *
     * @param type $data        	
     * @return type
     */
    public static function createClass($data) {
        return ClassModel::create($data);
    }

    /**
     * return all class
     * 
     * @return array
     */
    public static function getAllClass() {
        return ClassModel::all();
    }

    /**
     * get class by priod id
     * @param type $priodId
     * @return type
     */
    public static function getClassByPriod($priodId) {
        return ClassModel::all()->where('priod_id', $priodId)->all();
    }

    
    public static function getClassByTeacherId($id) {
        return ClassModel::all()
                        ->where('teacher_manage_id', $id)
                        ->all();
    }

}
