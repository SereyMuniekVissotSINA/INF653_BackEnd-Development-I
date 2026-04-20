<?php
require_once('../model/vehicles_db.php');
require_once('../model/makes_db.php');
require_once('../model/types_db.php');
require_once('../model/classes_db.php');

// Get statistics
$total_vehicles = count(get_filtered_vehicles(null, null, null, 'price'));
$total_makes = count(get_makes());
$total_types = count(get_types());
$total_classes = count(get_classes());

include('view/header.php');
include('view/dashboard.php');
include('view/footer.php');
?>
