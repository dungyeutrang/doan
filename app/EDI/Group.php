<?php

namespace App\edi;

class Group {

    public $groupId;
    public $controlNumber;
    public $senderCode;
    public $receiverCode;
    public $date;
    public $time;
    
    public function __construct($groupId,$controlNumber,$senderCode,$receiverCode,$date,$time) {
        $this->groupId=$groupId;
        $this->controlNumber=$controlNumber;
        $this->senderCode=$senderCode;
        $this->receiverCode=$receiverCode;
        $this->date=$date;
        $this->time=$time;
    }
    
    function getSenderCode() {
        return $this->senderCode;
    }

    function getReceiverCode() {
        return $this->receiverCode;
    }

    function setSenderCode($senderCode) {
        $this->senderCode = $senderCode;
    }

    function setReceiverCode($receiverCode) {
        $this->receiverCode = $receiverCode;
    }

        function getDate() {
        return $this->date;
    }

    function getTime() {
        return $this->time;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setTime($time) {
        $this->time = $time;
    }

    function getGroupId() {
        return $this->groupId;
    }

    function getControlNumber() {
        return $this->controlNumber;
    }

    function setGroupId($groupId) {
        $this->groupId = $groupId;
    }

    function setControlNumber($controlNumber) {
        $this->controlNumber = $controlNumber;
    }

    public function createGroup($listTransaction = array()) {
        $group = "GS*" . $this->getGroupId() . "*" . $this->senderCode . "*" . $this->receiverCode . "*"
                . $this->date . "*" . $this->time . "*" .
                $this->getControlNumber();

        for ($i = 0; $i < count($listTransaction); $i++) {
            $group = $group . "<br>" . $listTransaction[$i];
        }
        $group = $group . "<br> GT*" . count($listTransaction) . "*" . $this->controlNumber;
        return $group;
    }

}
