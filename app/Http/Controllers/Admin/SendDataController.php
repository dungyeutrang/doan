<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\edi\Element;
use App\EDI\DataSegment;
use App\edi\Transaction;
use App\edi\Group;
use App\edi\InterChange;
use App\Models\StudentLearning;
use Carbon\Carbon;
use App\Models\Priod;
use App\Models\Score;
use App\Models\ScoreType;
use App\Models\Summary;

class SendDataController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $priodId = 3;
        $studentLearnings = StudentLearning::getStudentLearningByPriod($priodId);

//        $listSegment140 = array();
//        $listSegment150 = array();
        foreach ($studentLearnings as $studentLearning) {

            $isa = new InterChange ();
            $isa->setAuthorizeInformation("00");
            $isa->setSecurityInfo("00");
            $isa->setInterchangeIdQualifier("01");
            $isa->setInterchangeSenderId(uniqid());
            $isa->setInterchangeReceiverId(uniqid());
            $isa->setDate(Carbon::now()->toDateString());
            $isa->setTime(Carbon::now()->toTimeString());
            $isa->setRepetionSeparator("U");
            $isa->setControlNumber(uniqid());
            $listSegment = array();
            $group = new Group("ED", uniqid(), uniqid(), uniqid(), Carbon::now()->toDateString(), Carbon::now()->toTimeString());
            $listGroup = array();
            $transaction = new Transaction("130", uniqid());
            $listTransaction = array();

            $dataSegment = new DataSegment();
            $dataSegment->segmentId = "STU";
            $elementId = new Element("name", $studentLearning->student->id);
            $elementName = new Element("name", $studentLearning->student->name);
            $elementBirthDay = new Element('birth_day', $studentLearning->student->birth_day);
            $elementAddress = new Element('address', $studentLearning->student->address);
            $elementNativePlace = new Element('native_place', $studentLearning->student->native_place);
            $elementGender = new Element('gender', $studentLearning->student->gender);
            $elementEthnic = new Element('ethnic', $studentLearning->student->ethnic);
            $elementReligion = new Element('religion', $studentLearning->student->religion);
            $elementDateIn = new Element('date_in', $studentLearning->student->date_in);
            $elementDateOut = new Element('date_out', $studentLearning->student->date_out);
            $elementNameFather = new Element('name_father', $studentLearning->student->name_father);
            $elementJobFather = new Element('job_father', $studentLearning->student->job_father);
            $elementNameMother = new Element('name_mother', $studentLearning->student->name_mother);
            $elementJobMother = new Element('job_mother', $studentLearning->student->job_mother);
            // add to segment
            $dataSegment->addElement("m", $elementId);
            $dataSegment->addElement("m", $elementName);
            $dataSegment->addElement("m", $elementBirthDay);
            $dataSegment->addElement("m", $elementAddress);
            $dataSegment->addElement("m", $elementNativePlace);
            $dataSegment->addElement("m", $elementGender);
            $dataSegment->addElement("m", $elementEthnic);
            $dataSegment->addElement("m", $elementReligion);
            $dataSegment->addElement("m", $elementDateIn);
            $dataSegment->addElement("m", $elementDateOut);
            $dataSegment->addElement("m", $elementNameFather);
            $dataSegment->addElement("m", $elementJobFather);
            $dataSegment->addElement("m", $elementNameMother);
            $dataSegment->addElement("m", $elementJobMother);
            array_push($listSegment, $dataSegment->segment);
            // priod
            $dataSegment->segment = "PRI";
            $epriId = new Element('id', $priodId);
            $priod = Priod::all()->find(intval($priodId));
            $epriDateBegin = new Element('date_begin', $priod->date_begin);
            $epriDateEnd = new Element('date_end', $priod->date_end);
            $dataSegment->addElement("m", $epriId);
            $dataSegment->addElement("m", $epriDateBegin);
            $dataSegment->addElement("m", $epriDateEnd);

            $scores = Score::getTeacherByStudentAndPriod($studentLearning->student->id, $priodId);
            foreach ($scores as $score) {
                $dataSegment->segment = "TEA\INFO";
                $eteacherId = new Element('id', $score->teacher->id);
                $eteacherName = new Element('name', $score->teacher->name);
                $eteacherIdentityNumber = new Element('identity_number', $score->teacher->identity_number);
                $eteacherBirthday = new Element('birth_day', $score->teacher->birth_day);
                $eteacherAddress = new Element('address', $score->teacher->address);
                $eteacherGender = new Element('gender', $score->teacher->gender);
                $eteacherNativePlace = new Element('native_place', $score->teacher->native_place);
                $eteacherExperience = new Element('experience', $score->teacher->experience);
                $eteacherDateIn = new Element('date_in', $score->teacher->date_in);
                $eteacherDateOut = new Element('date_out', $score->teacher->date_out);
                $eteacherFavorite = new Element('favorite', $score->teacher->favorite);
                //add student
                $dataSegment->addElement("m", $eteacherId);
                $dataSegment->addElement("m", $eteacherName);
                $dataSegment->addElement("m", $eteacherIdentityNumber);
                $dataSegment->addElement("m", $eteacherBirthday);
                $dataSegment->addElement("m", $eteacherAddress);
                $dataSegment->addElement("m", $eteacherGender);
                $dataSegment->addElement("m", $eteacherNativePlace);
                $dataSegment->addElement("m", $eteacherExperience);
                $dataSegment->addElement("m", $eteacherDateIn);
                $dataSegment->addElement("m", $eteacherDateOut);
                $dataSegment->addElement("m", $eteacherFavorite);
                array_push($listSegment, $dataSegment->segment);
            }

            $teacher = StudentLearning::getTeacherOfStudent($studentLearning->student->id, $priodId);
            $dataSegment->segment = "TEA\INFO";
            $eteacherId = new Element('id', $teacher->classModel->teacher->id);
            $eteacherName = new Element('name', $teacher->classModel->teacher->name);
            $eteacherIdentityNumber = new Element('identity_number', $teacher->classModel->teacher->identity_number);
            $eteacherBirthday = new Element('birth_day', $teacher->classModel->teacher->birth_day);
            $eteacherAddress = new Element('address', $teacher->classModel->teacher->address);
            $eteacherGender = new Element('gender', $score->teacher->gender);
            $eteacherNativePlace = new Element('native_place', $teacher->classModel->teacher->native_place);
            $eteacherExperience = new Element('experience', $teacher->classModel->teacher->experience);
            $eteacherDateIn = new Element('date_in', $teacher->classModel->teacher->date_in);
            $eteacherDateOut = new Element('date_out', $teacher->classModel->teacher->date_out);
            $eteacherFavorite = new Element('favorite', $teacher->classModel->teacher->favorite);
            //add student
            $dataSegment->addElement("m", $eteacherId);
            $dataSegment->addElement("m", $eteacherName);
            $dataSegment->addElement("m", $eteacherIdentityNumber);
            $dataSegment->addElement("m", $eteacherBirthday);
            $dataSegment->addElement("m", $eteacherAddress);
            $dataSegment->addElement("m", $eteacherGender);
            $dataSegment->addElement("m", $eteacherNativePlace);
            $dataSegment->addElement("m", $eteacherExperience);
            $dataSegment->addElement("m", $eteacherDateIn);
            $dataSegment->addElement("m", $eteacherDateOut);
            $dataSegment->addElement("m", $eteacherFavorite);
            array_push($listSegment, $dataSegment->segment);

            $scoreTypes = ScoreType::all();
            foreach ($scoreTypes as $scoreType) {
                $dataSegment->segment = "SCT\SCT";
                $element = new Element("name", $scoreType->name);
                $dataSegment->addElement("m", $element);
                array_push($listSegment, $dataSegment->segment);
            }

            $score = Score::all()
                    ->where('student_id', $studentLearning->student->id)
                    ->where('priod_id', $priodId)
                    ->all();
            foreach ($score as $sc) {
                $dataSegment->segment = "SC\SC";
                $elementSubject = new Element("m", $sc->subject->name);
                $elementScore = new Element("m", $sc->score);
                $elementScoreType = new Element("m", $sc->score_type_id);
                $elementTeacher = new Element("m", $sc->teacher_id);
                $dataSegment->addElement("m", $elementSubject);
                $dataSegment->addElement("m", $elementScore);
                $dataSegment->addElement("m", $elementScoreType);
                $dataSegment->addElement("m", $elementTeacher);
                array_push($listSegment, $dataSegment->segment);
            }

            $summaries = Summary::getAllSumaryByStudentIdAndPriod($studentLearning->student->id, $priodId);
            foreach($summaries as $summary) {                
            $dataSegment->segment = "SM";
             $elementTeacherManager = new Element("teacher_manager",$summary->studentLearning->classModel->teacher->id);
             $elementConduct = new Element('conduct',$summary->conduct->name);
             $elementRankingAcademic = new Element('rankingAcademic',$summary->rankingAcademic->name);
             $elementScoreAverage = new Element('score average',$summary->score_average);
             $elementComment = new Element('comment',$summary->comment);
             $dataSegment->addElement("m",$elementTeacherManager);
             $dataSegment->addElement("m",$elementConduct);
             $dataSegment->addElement("m",$elementRankingAcademic);
             $dataSegment->addElement("m",$elementScoreAverage);
             $dataSegment->addElement("m",$elementComment);
              array_push($listSegment, $dataSegment->segment);
            }
            array_push($listTransaction, $transaction->createTransaction($listSegment));
            array_push($listGroup, $group->createGroup($listTransaction));
            $result = $isa->createInterChange($listGroup);
            echo $result;
            die();
        }
    }

}
