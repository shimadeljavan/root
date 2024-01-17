<?php

function get_vendor_by_id($vendor_id){
    global $mysqli;
    $query = "SELECT * FROM foodVendor order by vendorName";

    $statement = $mysqli->prepare($query);
    $statement -> execute();
    $vendors = $statement -> fetch();
    $statement -> close();
    return $vendors;
}

function get_vendor_by_name($vendor_id){
    if(!$vendor_id){
        return "All Vendors"; 
    }
 global $mysqli;
 $query = "SELECT * FROM foodVendor WHERE vendorID = ?";
 $statement = $mysqli->prepare($query);
 $statement -> bind_param('s', $vendor_id);
 $statement -> execute();
 $vendor = $statement -> fetch();
 $statement -> close();
 $vendor_name = $vendor['vendorName'];
 return $vendor_name;
}

function delete_vendor($vendor_id){
    global $mysqli;
    $query = "DELETE FROM foodVendor WHERE vendorID = ?";
    $statement = $mysqli->prepare($query);
    $statement -> bind_param('s', $vendor_id);
    $statement -> execute();
    $statement -> close();
}

function add_vendor($vendor_name){
    global $mysqli;
    $query = "INSERT INTO foodVendor (vendorName) VALUES (?)";
    $statement = $mysqli->prepare($query);
    $statement -> bind_param('s', $vendor_name);
    $statement -> execute();
    $statement -> close();
}
?>