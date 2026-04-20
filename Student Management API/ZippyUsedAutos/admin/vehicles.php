<?php 
    require_once('../model/vehicles_db.php');
    require_once('../model/makes_db.php');
    require_once('../model/types_db.php');
    require_once('../model/classes_db.php');

    // Handle add vehicle action
    if ($_POST['action'] ?? '' == 'add'){
        add_vehicle(
            $_POST['year'],
            $_POST['model'],
            $_POST['price'],
            $_POST['make_id'],
            $_POST['type_id'],
            $_POST['class_id']
        );
        header('Location: vehicles.php');
        exit;
    }

    // Handle delete action
    if ($_POST['action'] ?? '' == 'delete'){
        delete_vehicle($_POST['vehicle_id']);
        header('Location: vehicles.php');
        exit;
    }

    // Check if adding a new vehicle
    $show_form = isset($_GET['action']) && $_GET['action'] == 'add';

    $vehicles = get_all_vehicles_asc();
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();

    include('view/header.php');
    
    if ($show_form) {
        include('view/add_vehicle.php');
    } else {
        include('view/vehicles_list.php');
    }
    
    include('view/footer.php');
?>