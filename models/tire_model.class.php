<?php

class TireModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblTires;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getTireModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblTires = $this->db->getTireTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one TireModel instance
    public static function getTireModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new TireModel();
        }
        return self::$_instance;
    }

    public function display_tire() {
        $sql = "SELECT * FROM " . $this->tblTires;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no tire was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned tires
        $tires = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $tire = new Tire(stripslashes($obj->maker), stripslashes($obj->name), stripslashes($obj->description), stripslashes($obj->price), stripslashes($obj->rating),stripslashes($obj->image));

            //set the id for the tire
            $tire->setId($obj->id);

            //add the tire into the array
            $tires[] = $tire;
        }
        return $tires;
    }

    //view_tire method retrieves the details of the tire specified by its id
    public function view_tire($id) {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblTires . " WHERE " . $this->tblTires . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a tire object
            $tire = new Tire(stripslashes($obj->maker), stripslashes($obj->name), stripslashes($obj->description), stripslashes($obj->price), stripslashes($obj->rating),stripslashes($obj->image));

            //set the id for the tire
            $tire->setId($obj->id);

            return $tire;
        }
        return false;
    }

    public function search_tire($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblTires;

        foreach ($terms as $term) {
            $sql .= " WHERE name LIKE '%" . $term . "%'";
        }

//        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no tire was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 tire found.
        //create an array to store all the returned tires
        $tires = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $tire = new Tire(stripslashes($obj->maker), stripslashes($obj->name), stripslashes($obj->description), stripslashes($obj->price), stripslashes($obj->rating),stripslashes($obj->image));

            //set the id for the tire
            $tire->setId($obj->id);

            //add the tire into the array
            $tires[] = $tire;
        }
        return $tires;
    }

    public function create_tire(){
        echo "confirm 2";
        //if the script did not receive post data, display an error message and then terminate the script immediately
        if (!filter_has_var(INPUT_POST, 'name') ||
            !filter_has_var(INPUT_POST, 'maker') ||
            !filter_has_var(INPUT_POST, 'price') ||
            !filter_has_var(INPUT_POST, 'description') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'rating')
        ) {
            return false;
        }

        //retrieve data for the new accessory; data are sanitized and escaped for security.
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $maker= filter_input(INPUT_POST, 'maker', FILTER_SANITIZE_STRING);
        $price =filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
        $rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_STRING);

        //query string
        $sql = "INSERT INTO " . $this->tblTires . " VALUES (NULL, '$name', '$maker','$price', '$description' , '$image', '$rating')";

        //execute the query
        $query =  $this->dbConnection->query($sql);

        //if no query, set error message
        if(!$query){
            $errmsg = $this->dbConnection->error;
            echo $errmsg;
        }


    }
}