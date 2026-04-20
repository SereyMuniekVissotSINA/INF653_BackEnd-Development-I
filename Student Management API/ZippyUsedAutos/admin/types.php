<?php
require_once('../model/database.php');
require_once('../model/types_db.php');

// Handle add action
if ($_POST['action'] ?? '' == 'add') {
    if (!empty($_POST['type_name'])) {
        add_type($_POST['type_name']);
        header('Location: types.php');
        exit;
    }
}

// Handle delete action
if ($_POST['action'] ?? '' == 'delete') {
    delete_type($_POST['id']);
    header('Location: types.php');
    exit;
}

// Check if adding a new type
$show_form = isset($_GET['action']) && $_GET['action'] == 'add';

$types = get_types();
include('view/header.php');

if ($show_form) {
    include('view/add_type.php');
} else {
    include('view/types_list.php');
}

include('view/footer.php');
?>
