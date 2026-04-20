<?php
require_once('../model/database.php');
require_once('../model/classes_db.php');

// Handle add action
if ($_POST['action'] ?? '' == 'add') {
    if (!empty($_POST['class_name'])) {
        add_class($_POST['class_name']);
        header('Location: classes.php');
        exit;
    }
}

// Handle delete action
if ($_POST['action'] ?? '' == 'delete') {
    delete_class($_POST['id']);
    header('Location: classes.php');
    exit;
}

// Check if adding a new class
$show_form = isset($_GET['action']) && $_GET['action'] == 'add';

$classes = get_classes();
include('view/header.php');

if ($show_form) {
    include('view/add_class.php');
} else {
    include('view/classes_list.php');
}

include('view/footer.php');
?>
