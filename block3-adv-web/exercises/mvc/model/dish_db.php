
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function get_dishs_by_vendor($vendor_id){
    global $mysqli;
    if($vendor_id){
        $query = "SELECT foodVendor.foodVendorID, foodVendor.vendorName, dishes.dishID, dishes.dishName, dishes.price
        FROM foodVendor
        JOIN dishes ON foodVendor.dishID = dishes.dishID
        ORDER BY foodVendor.vendorName";
    }else{
        $query = "SELECT foodVendor.foodVendorID, foodVendor.vendorName, dishes.dishID, dishes.dishName, dishes.price
          FROM foodVendor
          JOIN dishes ON foodVendor.dishID = dishes.dishID
          ORDER BY dishes.dishName";
    }

    $statement = $mysqli->prepare($query);
    $statement -> bind_param('s', $vendor_id);
    $statement -> execute();
  
    $dishes = $statement -> fetch();
    $statement -> close();

    return $dishes;

}


function delete_dish($dish_id){
    global $mysqli;
    $query = "DELETE FROM dishes WHERE dishID = ?";

    $statement = $mysqli->prepare($query);
    $statement -> bind_param('s', $dish_id);
    $statement -> execute();
    $statement -> close();
}

function add_dish($vendor_id, $dish_name, $price){
    global $mysqli;
    $query = "INSERT INTO dishes (dishName, price) VALUES (?, ?)";

    $statement = $mysqli->prepare($query);
    $statement -> bind_param('ss', $dish_name, $price);
    $statement -> execute();
    $statement -> close(); 
}
?>