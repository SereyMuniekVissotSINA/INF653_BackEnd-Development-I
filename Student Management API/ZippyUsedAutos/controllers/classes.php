<?php 
    require_once('../model/classes_db.php');

    if ($_POST['action'] ?? '' == 'add') add_class($_POST['name']);
    if ($_POST['action'] ?? '' == 'delete') delete_class($_POST['id']);

    $classes = get_classes();
    include('../view/classes_list.php');
?>