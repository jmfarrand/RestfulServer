<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 14/05/2018
 * Time: 22:50
 */

class User {
    private $UserID;
    private $DisplayName;
    private $PasswordHash;
    private $PasswordSalt;

    public function getUserID() {
        return $this->UserID;
    }

    public function setUserID($UserID) {
        $this->UserID = $UserID;
    }
    public function getDisplayName() {
        return $this->DisplayName;
    }

    public function setDisplayName($DisplayName) {
        $this->DisplayName = $DisplayName;
    }
    public function getPasswordHash() {
        return $this->PasswordHash;
    }

    public function setPasswordHash($PasswordHash) {
        $this->PasswordHash = $PasswordHash;
    }
    public function getPasswordSalt() {
        return $this->PasswordSalt;
    }

    public function setPasswordSalt($PasswordSalt) {
        $this->PasswordSalt = $PasswordSalt;
    }
}