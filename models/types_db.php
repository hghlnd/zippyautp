<?php
function get_all_types() {
    global $db;
    $query = 'SELECT * FROM types ORDER BY type';
    return $db->query($query)->fetchAll();
}

function add_type($type) {
    global $db;
    $stmt = $db->prepare("INSERT INTO types (type) VALUES (:type)");
    $stmt->bindValue(':type', $type);
    $stmt->execute();
}

function delete_type($type_id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM types WHERE typeID = :id");
    $stmt->bindValue(':id', $type_id, PDO::PARAM_INT);
    $stmt->execute();
}
