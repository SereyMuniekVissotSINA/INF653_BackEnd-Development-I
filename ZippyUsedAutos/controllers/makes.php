<?php 
    require_once('../model/makes_db.php');

    if ($_POST['action'] ?? '' == 'add') add_make($_POST['name']);
    if ($_POST['action'] ?? '' == 'delete') delete_make($_POST['id']);

    $makes = get_makes();
    include('../view/makes_list.php')
?>