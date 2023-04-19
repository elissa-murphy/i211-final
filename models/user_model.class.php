<?php

class UserModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUsers;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getUserModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUsers = $this->db->getUserTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one UserModel instance
    public static function getUserModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    public function display_user() {
        $sql = "SELECT * FROM " . $this->tblUsers;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no user was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned users
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
}