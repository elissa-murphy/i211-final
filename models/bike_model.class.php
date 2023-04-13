<?php

class BikeModel {
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblBikes;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getBikeModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblBikes = $this->db->getBikeTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one BikeModel instance
    public static function getBikeModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new BikeModel();
        }
        return self::$_instance;
    }

    public function display_bike() {
        $sql = "SELECT * FROM " . $this->tblBikes;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no bike was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned bikes
        $bikes = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $bike = new Bike(stripslashes($obj->maker), stripslashes($obj->name), stripslashes($obj->description), stripslashes($obj->price), stripslashes($obj->image));

            //set the id for the bike
            $bike->setId($obj->id);

            //add the bike into the array
            $bikes[] = $bike;
        }
        return $bikes;
    }

    //view_bike method retrieves the details of the bike specified by its id
    public function view_bike($id) {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblBikes . " WHERE " . $this->tblBikes . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a bike object
            $bike = new Bike(stripslashes($obj->maker), stripslashes($obj->name), stripslashes($obj->description), stripslashes($obj->price), stripslashes($obj->image));

            //set the id for the bike
            $bike->setId($obj->id);

            return $bike;
        }
        return false;
    }

    public function search_bike($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblBikes;

        foreach ($terms as $term) {
            $sql .= " WHERE name LIKE '%" . $term . "%' OR maker LIKE '%" . $term . "%' OR price LIKE '%" . $term . "%' OR description LIKE '%" . $term . "%'";
        }

//        OR WHERE description LIKE '%" . $term . "%' OR WHERE price LIKE '%" . $term . "%' OR WHERE maker LIKE '%" . $term . "%'

//        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no bike was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 bike found.
        //create an array to store all the returned bikes
        $bikes = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $bike = new Bike(stripslashes($obj->maker), stripslashes($obj->name), stripslashes($obj->description), stripslashes($obj->price), stripslashes($obj->image));

            //set the id for the bike
            $bike->setId($obj->id);

            //add the bike into the array
            $bikes[] = $bike;
        }
        return $bikes;
    }

    public function create_bike(){
//        echo "confirm 2";
        //if the script did not receive post data, display an error message and then terminate the script immediately
        if (!filter_has_var(INPUT_POST, 'name') ||
            !filter_has_var(INPUT_POST, 'maker') ||
            !filter_has_var(INPUT_POST, 'price') ||
            !filter_has_var(INPUT_POST, 'description') ||
            !filter_has_var(INPUT_POST, 'image')
        ) {
            return false;
        }

        //retrieve data for the new accessory; data are sanitized and escaped for security.
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $maker= filter_input(INPUT_POST, 'maker', FILTER_SANITIZE_STRING);
        $price =filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);

        //query string
        $sql = "INSERT INTO " . $this->tblBikes . " VALUES (NULL, '$name', '$maker','$price', '$description' , '$image')";

        //execute the query
        $query =  $this->dbConnection->query($sql);

        //if no query, set error message
        if(!$query){
            $errmsg = $this->dbConnection->error;
            echo $errmsg;
        }


    }

}