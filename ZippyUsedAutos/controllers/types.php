<?php 
    require_once('../model/types_db.php');

    if ($_POST['action'] ?? '' == 'add') add_type($_POST['name']);
    if ($_POST['action'] ?? '' == 'delete') delete_type($_POST['id']);
    
    $types = get_types();
    include('../view/types_list.php');
?>