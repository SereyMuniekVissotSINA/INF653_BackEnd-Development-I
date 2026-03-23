<?php
require_once('database.php');

function get_filtered_vehicles($make_id, $type_id, $class_id, $sort) {
    global $db;

    $query = "SELECT * FROM vehicles WHERE 1=1";

    if ($make_id) {
        $query .= " AND make_id = :make_id";
    }
    if ($type_id) {
        $query .= " AND type_id = :type_id";
    }
    if ($class_id) {
        $query .= " AND class_id = :class_id";
    }

    if ($sort == 'year') {
        $query .= " ORDER BY year DESC";
    } else {
        $query .= " ORDER BY price DESC";
    }

    $statement = $db->prepare($query);

    if ($make_id) {
        $statement->bindValue(':make_id', $make_id);
    }
    if ($type_id) {
        $statement->bindValue(':type_id', $type_id);
    }
    if ($class_id) {
        $statement->bindValue(':class_id', $class_id);
    }

    $statement->execute();
    return $statement->fetchAll();
}

function get_all_vehicles_asc() {
    global $db;
    $query = "SELECT * FROM vehicles ORDER BY vehicle_id ASC";
    return $db->query($query)->fetchAll();
}

function add_vehicle($year, $model, $price, $make_id, $type_id, $class_id) {
    global $db;

    $query = "INSERT INTO vehicles
              (year, model, price, make_id, type_id, class_id)
              VALUES (:year, :model, :price, :make_id, :type_id, :class_id)";

    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);

    $statement->execute();
}

function delete_vehicle($id) {
    global $db;

    $query = "DELETE FROM vehicles WHERE vehicle_id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
}
?>