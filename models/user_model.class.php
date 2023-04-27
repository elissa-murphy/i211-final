<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class UserModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUsers;

    //constructor
    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUsers = $this->db->getUserTable();

        //Escapes special characters in a string for use in an SQL statement
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //one UserModel instance
    public static function getUserModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    //display list of users, retrieve info from database
    public function display_user()
    {
        $sql = "SELECT * FROM " . $this->tblUsers;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false
        if (!$query)
            return false;

        //if the query succeeded, but no user found
        if ($query->num_rows == 0)
            return 0;

        //handle the result, create an array
        $users = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $user = new User(stripslashes($obj->firstName), stripslashes($obj->lastName), stripslashes($obj->email));

            //set the id for the user
            $user->setId($obj->id);

            //add the user into the array
            $users[] = $user;
        }
        return $users;
    }

    //add user to database
    public function create_user()
    {

        //exceptions handled with try, throw, catch
        try {
            //retrieve data for the new accessory; data are sanitized and escaped for security.
            $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
            $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

            //if field empty, throw exception
            if ($firstName == "") {
                throw new RequiredValue("First name is missing in community sign up form.");
            }
            if ($lastName == "") {
                throw new RequiredValue("Last name is missing in community sign up form.");
            }
            if ($email == "") {
                throw new RequiredValue("Email is missing in community sign up form.");
            }

            //query string
            $sql = "INSERT INTO " . $this->tblUsers . " VALUES (NULL, '$firstName', '$lastName','$email')";

            //execute the query
            $query = $this->dbConnection->query($sql);

            //if no query, set error message
            if (!$query) {
                $errmsg = $this->dbConnection->error;
                echo $errmsg;
                $view = new ErrorView();
                $view->display($errmsg);
            }

            // catch exceptions & display error message
        } catch (RequiredValue $e) {
            $message = $e->getMessage();
            $view = new ErrorView();
            $view->display($message);
            exit();

        }

        //generate a JSON object for the error response
        $response = array("message" => $message);
        echo json_encode($response);
    }
}