<?php
require_once('database.php');

function get_types() {
    global $db;
    $query = "SELECT * FROM types ORDER BY type_name ASC";
    return $db->query($query)->fetchAll();
}

function add_type($name) {
    global $db;
    $query = "INSERT INTO types (type_name) VALUES (:name)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':name', $name);
    $stmt->execute();
}

function delete_type($id) {
    global $db;
    $query = "DELETE FROM types WHERE type_id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}
?>