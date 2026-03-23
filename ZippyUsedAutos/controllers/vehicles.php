<?php
    require_once("../model/vehicles_db.php");
    require_once("../model/makes_db.php");
    require_once("../model/types_db.php");
    require_once("../model/classes_db.php");

    $sort = isset($_GET["sort"]) ? $_GET["sort"] : 'price';
    $make_id = isset($_GET['make_id']) ? $_GET['make_id'] : null;
    $type_id = isset($_GET['type_id']) ? $_GET['type_id'] : null;
    $class_id = isset($_GET['class_id']) ? $_GET['class_id'] : null;

    $vehicles = get_filtered_vehicles($make_id, $type_id, $class_id, $sort);

    $makes = get_makes();
    $type = get_types();
    $classes = get_classes();

    include('../view/header.php');
    include('../view/filter_form.php');
    include('../view/vehicle_list.php');
    include('../view/footer.php');

?>