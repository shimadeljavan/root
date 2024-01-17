<?php

class ModelFoodVendorConnectionObject {
    public function __construct(public $host, public $username, public $password, public $database) {
    }
}
class foodVendorModel {
    private $ModelFoodVendorConnectionObject;

    public function __construct($ModelFoodVendorConnectionObject) {
        $this->ModelFoodVendorConnectionObject = $ModelFoodVendorConnectionObject;
    }

    private function connect() {
        try {
            $mysqli = new mysqli(
                $this->ModelFoodVendorConnectionObject->host,
                $this->ModelFoodVendorConnectionObject->username,
                $this->ModelFoodVendorConnectionObject->password,
                $this->ModelFoodVendorConnectionObject->database
            );

            if ($mysqli->connect_error) {
                throw new Exception('Could not connect to the database: ' . $mysqli->connect_error);
            }

            return $mysqli;
        } catch (Exception $e) {
            error_log('Exception caught in connect method: ' . $e->getMessage());
            return false;
        }
    }
    
    // public function getAllFoodVendors() {
    //     $mysqli = $this->connect();
        
    //     if ($mysqli) {
    //         $result = $mysqli->query("SELECT * FROM foodVendor");
    
    //         if (!$result) {
    //             error_log("Error executing query: " . $mysqli->error);
    //             return false;
    //         }
    
    //         $results = $result->fetch_all(MYSQLI_ASSOC);
    //         $mysqli->close();
    //     } else {
    //         return false;
    //     }
    
    //     return $results ?? false; 
    // }


   

        public function getAllFoodVendors() {
            $mysqli = $this->connect();
        
            if (!$mysqli) {
                return false; // Return false if the connection fails
            }
        
            $result = $mysqli->query("SELECT fv.foodVendorID, fv.vendorName, s.supplierName, i.ingredientName, i.type as ingredientType, i.price as ingredientPrice, d.dishName, d.price as dishPrice
                                      FROM foodVendor fv
                                      JOIN sppliers s ON fv.supplierID = s.supplierID
                                      JOIN ingredients i ON fv.ingredientID = i.ingredientID
                                      JOIN dishes d ON fv.dishID = d.dishID");
        
            if (!$result) {
                error_log("Error executing query: " . $mysqli->error);
                $mysqli->close();
                return false; // Return false if the query execution fails
            }
        
            $results = $result->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
        
            return $results ?? false; // Return the results or false if there are no results
        }
        


    public function selectDish() {
        $mysqli = $this->connect();
        $dishes = [];
    
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM dishes");
    
            if (!$result) {
                error_log("Error executing query: " . $mysqli->error);
                return false;
            }
    
            while ($row = $result->fetch_assoc()) {
                $dishes[] = $row;
            }
    
            $mysqli->close();
        } else {
            return false;
        }
    
        return $dishes;
    }
    
    


    public function selectSuppliers() {
        $mysqli = $this->connect();

        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM sppliers");

            if (!$result) {
                error_log('Error in selectSuppliers method: ' . $mysqli->error);
                return false;
            }

            $results = $result->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }

    public function selectIngredients() {
        $mysqli = $this->connect();

        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM ingredients");

            if (!$result) {
                error_log('Error in selectIngredients method: ' . $mysqli->error);
                return false;
            }

            $results = $result->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }
    

    public function addFoodVendor($vendorName, $dishID, $supplierID, $ingredientID) {
        $mysqli = $this->connect();
        if ($mysqli) {
            $mysqli->query("INSERT INTO foodVendor (vendorName, dishID, supplierID, ingredientID) VALUES ('$vendorName', '$dishID', '$supplierID', '$ingredientID')");
            mysqli_close($mysqli);
            return true;
        } else {
            return false;
        }
    }

    public function deleteFoodVendor($foodVendorID) {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("DELETE FROM foodVendor WHERE foodVendorID = $foodVendorID");
        
            if (!$result) {
                error_log("Error deleting food vendor: " . $mysqli->error);
                return false;
            }
            $mysqli->close();
            return true;
        }else {
            return false;
        }
    }
}



?>