<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

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
        $sql = "SELECT * FROM " . $this->tblTires . " WHERE 0 ";

        foreach ($terms as $term) {
            $sql .= " OR name LIKE '%$term%' OR price LIKE '%$term%' OR description LIKE '%$term%' ";
        }


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

        try {
        //retrieve data for the new accessory; data are sanitized and escaped for security.
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $maker= filter_input(INPUT_POST, 'maker', FILTER_SANITIZE_STRING);
        $price =filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
        $rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_STRING);

            if($name == ""){
                throw new RequiredValue("Tire name is missing in the Add a Tire form.");
            }
            if($maker == ""){
                throw new RequiredValue("Tire maker is missing in the Add a Tire form.");
            }
            if($price == ""){
                throw new RequiredValue("Tire price is missing in the Add a Tire form.");
            }
            if($description == ""){
                throw new RequiredValue("Tire description is missing in the Add a Tire form.");
            }
            if($image == ""){
                throw new RequiredValue("Tire image URL is missing in the Add a Tire form.");

            }
            if($rating == ""){
                throw new RequiredValue("Tire rating is missing in the Add a Tire form.");

            }
            if(!is_numeric($price)){
                throw new Datatype(gettype($price), "number");

            }
            if(!is_numeric($rating)){
                throw new Datatype(gettype($rating), "number");
            }

        //query string
        $sql = "INSERT INTO " . $this->tblTires . " VALUES (NULL, '$name', '$maker','$price', '$description' , '$image', '$rating')";

        //execute the query
        $query =  $this->dbConnection->query($sql);

        //if no query, set error message
        if(!$query){
            $errmsg = $this->dbConnection->error;
            echo $errmsg;
            $view = new ErrorView();
            $view->display($errmsg);
        }

        }
        catch (Datatype $e){
            $message = $e->getMessage();
            $view = new ErrorView();
            $view->display($message);
            exit();
        }
        catch (RequiredValue $e){
            $message = $e->getMessage();
            $view = new ErrorView();
            $view->display($message);
            exit();

        }

        //generate a JSON object for the error response
        $response = array("message" => $message);
        echo json_encode($response);


    }
    public function delete_tire($id){
        $sql = "DELETE FROM " . $this->tblTires . " WHERE " . $this->tblTires . ".id='$id'";

        //execute the query and handle errors
        $query = $this->dbConnection->query($sql);


        if(!$query){
            $errmsg = $this->dbConnection->error;
            echo $errmsg;
            $view = new ErrorView();
            $view->display($errmsg);
        }
    }
}