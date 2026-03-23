<?php
require_once('../model/database.php');
require_once('../model/makes_db.php');

// Handle add action
if ($_POST['action'] ?? '' == 'add') {
    if (!empty($_POST['make_name'])) {
        add_make($_POST['make_name']);
        header('Location: makes.php');
        exit;
    }
}

// Handle delete action
if ($_POST['action'] ?? '' == 'delete') {
    delete_make($_POST['id']);
    header('Location: makes.php');
    exit;
}

// Check if adding a new make
$show_form = isset($_GET['action']) && $_GET['action'] == 'add';

$makes = get_makes();
include('view/header.php');

if ($show_form) {
    include('view/add_make.php');
} else {
    include('view/makes_list.php');
}

include('view/footer.php');
?>
