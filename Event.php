<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 15/05/2018
 * Time: 21:27
 */

class Event {
    private $EventID;
    private $UserID;
    private $title;
    private $description;
    private $location;
    private $start;
    private $end;

    public function getEventID() {
        return $this->EventID;
    }

    public function setEventID($EventID) {
        $this->EventID = $EventID;
    }
    public function getUserID() {
        return $this->UserID;
    }

    public function setUserID($UserID) {
        $this->UserID = $UserID;
    }
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }
    public function getStart() {
        return $this->start;
    }

    public function setStart($start) {
        $this->start = $start;
    }
    public function getEnd() {
        return $this->end;
    }

    public function setEnd($end) {
        $this->end = $end;
    }
}