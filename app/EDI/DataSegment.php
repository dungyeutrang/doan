<?php

namespace App\EDI;

class DataSegment {

    public $terminator = "*";
    public $segmentId;
    public $segment = "";

    public function getSegmentId() {
        return $this->segmentId;
    }

    public function setSegmentId($segmentId) {
        $this->segmentId = $segmentId;
    }

    /**
     * add element
     * @param type $option
     * @param type $element
     */
    public function addElement($option, $element = null) {
        if ($this->segment == "") {
            $this->segment = $this->segment . $this->getSegmentId();
        }
        if ($option == "M") {
            $this->segment = $this->segment . $this->terminator. $element->getValue();
        } else {
            if ($element != null) {
                $this->segment = $this->segment . $this->terminator . $element->getValue();
            } else {
                $this->segment = $this->segment . $this->terminator;
            }
        }
    }

}
