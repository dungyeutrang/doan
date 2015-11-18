<?php

namespace App\edi;

class InterChange {

    public $authorizeInformation;
    public $securityInfo;
    public $interchangeIdQualifier;
    public $interchangeSenderId;
    public $interchangeReceiverId;
    public $repetionSeparator;
    public $senderId;
    public $recieverId;
    public $date;
    public $time;
    public $controlNumber;

    function getAuthorizeInformation() {
        return $this->authorizeInformation;
    }

    function getSecurityInfo() {
        return $this->securityInfo;
    }

    function getInterchangeIdQualifier() {
        return $this->interchangeIdQualifier;
    }

    function getInterchangeSenderId() {
        return $this->interchangeSenderId;
    }

    function getInterchangeReceiverId() {
        return $this->interchangeReceiverId;
    }

    function getRepetionSeparator() {
        return $this->repetionSeparator;
    }

    function getSenderId() {
        return $this->senderId;
    }

    function getRecieverId() {
        return $this->recieverId;
    }

    function getDate() {
        return $this->date;
    }

    function getTime() {
        return $this->time;
    }

    function getControlNumber() {
        return $this->controlNumber;
    }

    function setAuthorizeInformation($authorizeInformation) {
        $this->authorizeInformation = $authorizeInformation;
    }

    function setSecurityInfo($securityInfo) {
        $this->securityInfo = $securityInfo;
    }

    function setInterchangeIdQualifier($interchangeIdQualifier) {
        $this->interchangeIdQualifier = $interchangeIdQualifier;
    }

    function setInterchangeSenderId($interchangeSenderId) {
        $this->interchangeSenderId = $interchangeSenderId;
    }

    function setInterchangeReceiverId($interchangeReceiverId) {
        $this->interchangeReceiverId = $interchangeReceiverId;
    }

    function setRepetionSeparator($repetionSeparator) {
        $this->repetionSeparator = $repetionSeparator;
    }

    function setSenderId($senderId) {
        $this->senderId = $senderId;
    }

    function setRecieverId($recieverId) {
        $this->recieverId = $recieverId;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setTime($time) {
        $this->time = $time;
    }

    function setControlNumber($controlNumber) {
        $this->controlNumber = $controlNumber;
    }

    public function createInterChange($listGroup = array()) {
        $isa = "ISA*" . $this->authorizeInformation . "*" . $this->securityInfo . "*" . $this->getInterchangeIdQualifier()
                . "*" . $this->getInterchangeSenderId() . "*" . $this->getInterchangeIdQualifier() . "*" . $this->getInterchangeReceiverId()
                . "*" . $this->date . "*" . $this->time
                . "*" . $this->repetionSeparator . "*" . $this->controlNumber;

        for ($i = 0; $i < count($listGroup); $i++) {
            $isa = $isa . "<br>" . $listGroup[$i];
        }
        $isa = $isa . "<br> IEA*" . count($listGroup) . "*" . $this->controlNumber;
        return $isa;
    }

}
