<?php

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */
Route::get('/', function () {
    return view('frontend.welcome');
});

Route::group([
    'prefix' => 'admin'
        ], function () {

    Route::get('login', 'Admin\UserController@getLogin');
    Route::post('login', 'Admin\UserController@postLogin');
    Route::get('logout', 'Admin\UserController@getLogout');
    // Registration routes...
    Route::get('register', 'Admin\UserController@getRegister');
    Route::post('register', 'Admin\UserController@postRegister');

    Route::get('/sendata', [
        'uses' => 'Admin\SendDataController@index',
        'as' => 'admin.sendata.index'
    ]);

    Route::group([
        'prefix' => 'student'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\StudentController@index',
            'as' => 'admin.student.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\StudentController@edit',
            'as' => 'admin.student.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\StudentController@delete',
            'as' => 'admin.student.delete'
        ]);
        Route::post('/getstudent', [
            'uses' => 'Admin\StudentController@getStudent',
            'as' => 'admin.student.getstudent'
        ]);
    });

    // teacher
    Route::group([
        'prefix' => 'teacher'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\TeacherController@index',
            'as' => 'admin.teacher.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\TeacherController@edit',
            'as' => 'admin.teacher.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\TeacherController@delete',
            'as' => 'admin.teacher.delete'
        ]);
    });

    // priod
    Route::group([
        'prefix' => 'priod'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\PriodController@index',
            'as' => 'admin.priod.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\PriodController@edit',
            'as' => 'admin.priod.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\PriodController@delete',
            'as' => 'admin.priod.delete'
        ]);
    });

    // class

    Route::group([
        'prefix' => 'class'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\ClassController@index',
            'as' => 'admin.class.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\ClassController@edit',
            'as' => 'admin.class.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\ClassController@delete',
            'as' => 'admin.class.delete'
        ]);
    });

    // class

    Route::group([
        'prefix' => 'subject'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\SubjectController@index',
            'as' => 'admin.subject.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\SubjectController@edit',
            'as' => 'admin.subject.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\SubjectController@delete',
            'as' => 'admin.subject.delete'
        ]);
    });

    // teacher subject

    Route::group([
        'prefix' => 'teachersubject'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\TeacherLearningSubjectController@index',
            'as' => 'admin.teachersubject.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\TeacherLearningSubjectController@edit',
            'as' => 'admin.teachersubject.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\TeacherLearningSubjectController@delete',
            'as' => 'admin.teachersubject.delete'
        ]);
        Route::post('/getteacher', [
            'uses' => 'Admin\TeacherLearningSubjectController@getTeacher',
            'as' => 'admin.teachersubject.getteacher'
        ]);
    });

    //teaching class

    Route::group([
        'prefix' => 'teachingclass'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\TeachingClassController@index',
            'as' => 'admin.teachingclass.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\TeachingClassController@edit',
            'as' => 'admin.teachingclass.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\TeachingClassController@delete',
            'as' => 'admin.teachingclass.delete'
        ]);
        Route::post('/getteacher', [
            'uses' => 'Admin\TeachingClassController@getTeacher',
            'as' => 'admin.teachingclass.getteacher'
        ]);
    });

    // student learning class

    Route::group([
        'prefix' => 'studentlearning'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\StudentLearningController@index',
            'as' => 'admin.studentlearning.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\StudentLearningController@edit',
            'as' => 'admin.studentlearning.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\StudentLearningController@delete',
            'as' => 'admin.studentlearning.delete'
        ]);

        Route::post('/changepriod', [
            'uses' => 'Admin\StudentLearningController@changePriod',
            'as' => 'admin.studentlearning.changePriod'
        ]);

        Route::post('/addClass', [
            'uses' => 'Admin\StudentLearningController@addClass',
            'as' => 'admin.studentlearning.addClass'
        ]);

        Route::post('/addMultiClass', [
            'uses' => 'Admin\StudentLearningController@addMultiClass',
            'as' => 'admin.studentlearning.addMultiClass'
        ]);
    });

//award
    Route::group([
        'prefix' => 'award'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\AwardController@index',
            'as' => 'admin.award.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\AwardController@edit',
            'as' => 'admin.award.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\AwardController@delete',
            'as' => 'admin.award.delete'
        ]);
    });

    // conduct    
    Route::group([
        'prefix' => 'conduct'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\ConductController@index',
            'as' => 'admin.conduct.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\ConductController@edit',
            'as' => 'admin.conduct.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\ConductController@delete',
            'as' => 'admin.conduct.delete'
        ]);
    });

    // score type
    Route::group([
        'prefix' => 'scoretype'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\ScoreTypeController@index',
            'as' => 'admin.scoretype.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\ScoreTypeController@edit',
            'as' => 'admin.scoretype.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\ScoreTypeController@delete',
            'as' => 'admin.scoretype.delete'
        ]);
    });

    // score  
    Route::group([
        'prefix' => 'score'
            ], function () {
        Route::get('/{student_id}', [
            'uses' => 'Admin\ScoreController@index',
            'as' => 'admin.score.index'
        ]);
        Route::any('/edit/{student_id}/{id?}', [
            'uses' => 'Admin\ScoreController@edit',
            'as' => 'admin.score.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\ScoreController@delete',
            'as' => 'admin.score.delete'
        ]);
    });

    // ranking academic
    Route::group([
        'prefix' => 'rankingacademic'
            ], function () {
        Route::get('/', [
            'uses' => 'Admin\RankingAcademicController@index',
            'as' => 'admin.rankingacademic.index'
        ]);
        Route::any('/edit/{id?}', [
            'uses' => 'Admin\RankingAcademicController@edit',
            'as' => 'admin.rankingacademic.edit'
        ]);
        Route::any('/delete/{id}', [
            'uses' => 'Admin\RankingAcademicController@delete',
            'as' => 'admin.rankingacademic.delete'
        ]);
    });

    // summary
    Route::group([
        'prefix' => 'summary'
            ], function () {
        Route::get('/{student_id}', [
            'uses' => 'Admin\SummaryController@index',
            'as' => 'admin.summary.index'
        ]);
        Route::any('/edit/{student_learning_id}/{id?}', [
            'uses' => 'Admin\SummaryController@edit',
            'as' => 'admin.summary.edit'
        ]);
        Route::any('/delete/{student_id}/{id}', [
            'uses' => 'Admin\SummaryController@delete',
            'as' => 'admin.summary.delete'
        ]);
    });

    Route::get('/', [
        'uses' => 'Admin\HomeController@index',
        'as' => 'admin.home.index'
    ]);
});
