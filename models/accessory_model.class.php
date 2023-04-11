<?php

class AccessoryModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblAccessories;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getAccessoryModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblAccessories = $this->db->getAccessoriesTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one AccessoryModel instance
    public static function getAccessoryModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new AccessoryModel();
        }
        return self::$_instance;
    }

    public function display_accessory() {
        $sql = "SELECT * FROM " . $this->tblAccessories;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no accessory was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned accessories
        $accessories = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $accessory = new Accessory(stripslashes($obj->maker), stripslashes($obj->name), stripslashes($obj->description), stripslashes($obj->price), stripslashes($obj->image));

            //set the id for the accessory
            $accessory->setId($obj->id);

            //add the accessory into the array
            $accessories[] = $accessory;
        }
        return $accessories;
    }

    //accessory method retrieves the details of the accessory specified by its id
    public function view_accessory($id) {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblAccessories . " WHERE " . $this->tblAccessories . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create an accessory object
            $accessory = new Accessory(stripslashes($obj->maker), stripslashes($obj->name), stripslashes($obj->description), stripslashes($obj->price), stripslashes($obj->image));

            //set the id for the accessory
            $accessory->setId($obj->id);

            return $accessory;
        }
        return false;
    }

    public function search_accessory($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblAccessories;

        foreach ($terms as $term) {
            $sql .= " WHERE name LIKE '%" . $term . "%'";
        }

//        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no accessory was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 accessory found.
        //create an array to store all the returned accessories
        $accessories = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $accessory = new Accessory(stripslashes($obj->maker), stripslashes($obj->name), stripslashes($obj->description), stripslashes($obj->price), stripslashes($obj->image));

            //set the id for the accessory
            $accessory->setId($obj->id);

            //add the accessory into the array
            $accessories[] = $accessory;
        }
        return $accessories;
    }

    public function create_accessory(){
        //if the script did not receive post data, display an error message and then terminate the script immediately
        if (!filter_has_var(INPUT_POST, 'name') ||
            !filter_has_var(INPUT_POST, 'maker') ||
            !filter_has_var(INPUT_POST, 'price') ||
            !filter_has_var(INPUT_POST, 'description') ||
            !filter_has_var(INPUT_POST, 'image')
        ) {
            return false;
        }

        //retrieve data for the new guest; data are sanitized and escaped for security.
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $maker= filter_input(INPUT_POST, 'maker', FILTER_SANITIZE_STRING);
        $price =filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);

        //query string
        $sql = "INSERT INTO " . $this->db->getAccessoriesTable() . " VALUES (NULL, '$price', '$description','$name', '$maker' , '$image')";

        //execute the query
        $query =  $this->dbConnection->query($sql);

        //if no query, set error message
        if(!$query){
            $errmsg = $this->dbConnection->error;
//            header("Location: index.php?action=error&message=$errmsg");
        }


    }

}