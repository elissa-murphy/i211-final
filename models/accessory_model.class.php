<?php

/*
 * Author: Elissa Murphy & Jacob Catalan
 * Date: April 28, 2023
 * File: I211 Final: MVC Project
 * Description: The Bike Shop Application is a one-stop-shop for bikes and bike supplies.
 *              The purpose of the application is to create one online destination for all information biking needs.
 *
 */

class AccessoryModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblAccessories;

    //constructor
    private function __construct()
    {
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

    //One AccessoryModel instance
    public static function getAccessoryModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new AccessoryModel();
        }
        return self::$_instance;
    }


    //display list of accessories, retrieve info from database
    public function display_accessory()
    {
        $sql = "SELECT * FROM " . $this->tblAccessories;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no accessory was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result, create array
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
    public function view_accessory($id)
    {
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

    //search accessory table
    public function search_accessory($terms)
    {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblAccessories . " WHERE 0 ";

        foreach ($terms as $term) {
            $sql .= " OR name LIKE '%$term%' OR price LIKE '%$term%' OR description LIKE '%$term%' ";
        }


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

    //add accessory to database
    public function create_accessory()
    {

        //exceptions handled with try, throw, catch
        try {
            //retrieve data for the new accessory; data are sanitized and escaped for security.
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $maker = filter_input(INPUT_POST, 'maker', FILTER_SANITIZE_STRING);
            $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);

            //if field empty, throw exception
            if ($name == "") {
                throw new RequiredValue("Accessory name is missing in the Add a Accessory form.");
            }
            if ($maker == "") {
                throw new RequiredValue("Accessory maker is missing in Add a Accessory form.");
            }
            if ($price == "") {
                throw new RequiredValue("Accessory price is missing in the Add a Accessory form.");
            }
            if ($description == "") {
                throw new RequiredValue("Accessory description is missing in the Add a Accessory form.");
            }
            if ($image == "") {
                throw new RequiredValue("Accessory image URL is missing in the Add a Accessory form.");
            }

            //if datatype incorrect, throw exception
            if (!is_numeric($price)) {
                throw new Datatype(gettype($price), "number");
            }


            //query string
            $sql = "INSERT INTO " . $this->tblAccessories . " VALUES (NULL, '$name', '$maker','$price', '$description' , '$image')";

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
        } catch (Datatype $e) {
            $message = $e->getMessage();
            exit();
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


    //delete function - delete accessory from database
    public function delete_accessory($id)
    {
        $sql = "DELETE FROM " . $this->tblAccessories . " WHERE " . $this->tblAccessories . ".id='$id'";

        //execute the query and handle errors
        $query = $this->dbConnection->query($sql);

        if (!$query) {
            $errmsg = $this->dbConnection->error;
            echo $errmsg;
            $view = new ErrorView();
            $view->display($errmsg);
        }
    }
}