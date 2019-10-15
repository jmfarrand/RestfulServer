<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 14/05/2018
 * Time: 21:45
 */

// most of this code is adapted from this site:
//https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html
include 'database.php';//for connectiong with the database

class RestApi {
    //get the coinnetion from the database.php file.
    function getConnetion() {
        $conn = new Database();
        return $conn->getConenction();
    }

    public function getRequest() {
        //get the method
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        echo $method;
        switch ($method) {
            case 'get':
                //http get
                $input = $_GET["inputDisplayName"];
                if (!empty($input)) {
                    $DisplayName = $input;
                    self::getUser($DisplayName);
                } else {
                    echo "No user ID specified.";
                }
                break;
            case 'post':
                //http post
                self::createUser();
                break;
            case 'put':
                //http put
                break;
            case 'delete':
                //http delete
                break;
            default:
                //invalid method request
                header("HTTP/1.0 405 Method Not Allowed");
                break;
        }
    }

    function getUser($DisplayName) {
        $conn = $this->getConnetion();
        $query = "SELECT * FROM user_table WHERE DisplayName = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$DisplayName]);
        $response = array();
        $response['response'] = array();
        $num = $stmt->rowCount();
        if ($num > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $response_item = array(
                    "UserID" => $UserID,
                    "DisplayName" => $DisplayName,
                    "PasswordHash" => $PasswordHash
                );

                array_push($response['response'], $response_item);
            }
            // required headers
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            $output = json_encode($response);
            echo $output;
        } else {
            echo "no reuslts found";
        }
    }
    function getEvent($EventID) {
        $conn = $this->getConnetion();
        $query = "SELECT * FROM event_table WHERE EventID = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$EventID]);
        $response = array();
        $response['response'] = array();
        $num = $stmt->rowCount();
        if ($num > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $response_item = array(
                    "EventID" => $EventID,
                    "UserID" => $UserID,
                    "Title" => $Title,
                    "Description" => $Description,
                    "Location" => $Location,
                    "Start" => $Start,
                    "End" => $End
                );

                array_push($response['response'], $response_item);
            }
            // required headers
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            $output = json_encode($response);
            echo $output;
        } else {
            echo "no reuslts found";
        }
    }
    function createUser() {
        $conn = $this->getConnetion();
        //var_dump($_POST);
        $inputDisplayName = $_POST["inputDisplayName"];
        $inputPassword = $_POST["inputPassword"];
        $inputRePassword = $_POST["inputRePassword"];
        if ($this->confirmPasswords($inputPassword, $inputRePassword) == true) {
            $userID = mt_rand(100000, 999999);
            $passwordHash = password_hash($inputPassword, PASSWORD_DEFAULT);
            // add the user
            $query = "INSERT INTO user_table (`UserID`, `DisplayName`, `PasswordHash`) VALUES (:UserID, :DisplayName,:PasswordHash)";
            $stmt = $conn->prepare($query);
            // bind values
            $stmt->bindParam(":UserID", $userID);
            $stmt->bindParam(":DisplayName", $inputDisplayName);
            $stmt->bindParam(":PasswordHash", $passwordHash);
            $stmt->execute();
            echo "User has been successfully created";
        } else {
            // display message to let user know that the passwords are not the same
            echo "the passwords aren't the same";
        }
    }
    //the following function contains code adapted from here:
    //https://www.sitepoint.com/community/t/comparing-two-password-fields-for-insertion-into-database/1347
    function confirmPasswords($password, $confirmPassword) {
        $passwordOK = null;
        if ($password == $confirmPassword) {
            $passwordOK = true;
        } else {
            $passwordOK = false;
        }
        return $passwordOK;
    }


}