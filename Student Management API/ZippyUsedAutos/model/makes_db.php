<?php
require_once('database.php');

function get_makes() {
    global $db;
    $query = "SELECT * FROM makes ORDER BY make_name ASC";
    return $db->query($query)->fetchAll();
}

function add_make($name) {
    global $db;
    $query = "INSERT INTO makes (make_name) VALUES (:name)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':name', $name);
    $stmt->execute();
}

function delete_make($id) {
    global $db;
    $query = "DELETE FROM makes WHERE make_id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}
?>