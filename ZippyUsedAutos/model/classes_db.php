<?php
require_once('database.php');

function get_classes() {
    global $db;
    $query = "SELECT * FROM classes ORDER BY class_name ASC";
    return $db->query($query)->fetchAll();
}

function add_class($name) {
    global $db;
    $query = "INSERT INTO classes (class_name) VALUES (:name)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':name', $name);
    $stmt->execute();
}

function delete_class($id) {
    global $db;
    $query = "DELETE FROM classes WHERE class_id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}
?>