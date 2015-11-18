<?php

namespace App\edi;

class Transaction {

    public $beginTrans = "ST";
    public $endTrans = "SE";
    public $transactionId;
    public $controlNumber;

    public function __construct($transactionId,$controlNumber) {
        $this->transactionId=$transactionId;
        $this->controlNumber=$controlNumber;
    }
    
    function getTransactionId() {
        return $this->transactionId;
    }

    function getControlNumber() {
        return $this->controlNumber;
    }

    function setTransactionId($transactionId) {
        $this->transactionId = $transactionId;
    }

    function setControlNumber($controlNumber) {
        $this->controlNumber = $controlNumber;
    }

    /**
     * create transaction
     * @param 
     */
    public function createTransaction($listSegment = array()) {
        $transaction = $this->beginTrans . "*" . $this->getTransactionId() . "*" . $this->getControlNumber();
        for ($i = 0; $i < count($listSegment); $i++) {
            $transaction = $transaction . "<br>" . $listSegment[$i];
        }
        $transaction = $transaction . "<br> " . $this->endTrans."*".count($listSegment)."*".$this->controlNumber;
        return $transaction;
    }

}
