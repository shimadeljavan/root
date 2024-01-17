<?php
    require_once('model/vendor-db.php');
    require_once('model/dish_db.php');
    require_once('model/database.php');

    $dish_id = filter_input(INPUT_POST, 'dish_id', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $vendor_name = filter_input(INPUT_POST, 'vendor_name');

    $vendor_id = filter_input(INPUT_POST, 'vendor_id', FILTER_VALIDATE_INT);
    if(!$vendor_id){
        $vendor_id = filter_input(INPUT_GET, 'vendor_id', FILTER_VALIDATE_INT);
    }

    $action = filter_input(INPUT_POST, 'action');
    if(!$action){
        $action = filter_input(INPUT_GET, 'action');
        if(!$action){
            $action = 'show_dishes';
        }
    }

    switch($action){
        case 'list_dishes':
        include('view/dish_list.php');
        break;
        case 'add_dish':
        add_dish($dish_id, $price, $vendor_id);
        header("Location: .?action=list_dishes");
        break;

        case 'add_dish':
            if ($dish_id && $price) {

                add_dish($dish_id, $price , $vendor_id);
                header("Location: .?action=list_dishes");
                
            }else {
                $error = "All fields are required";
                include('view/error.php');
                exit();
            }
            break;

        case 'delete_dish':
            if ($vendor_id) {
                try {
                    delete_vendor($vendor_id);
                } catch (Exception $e) {
                    $error = "Could not delete vendor if dishes exist";
                    include('view/error.php');
                    exit();
                }
                header("Location: .?action=list_vendors");
            }
            break;

            case "delete_dish":
                if ($dish_id) {
                    delete_dish($dish_id);
                    header("Location: .?action=list_dishes");
                }else {
                    $error = "All fields are required";
                    include('view/error.php');
                    exit();
                }
                break;
           
        default:
        $vendor_name = get_vendor_by_id($vendor_id);
        $dishes = get_dishs_by_vendor($dish_id);
        include('view/dish_list.php');

    }



?>