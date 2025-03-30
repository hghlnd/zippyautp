<?php
function get_all_classes() {
    global $db;
    $query = 'SELECT * FROM classes ORDER BY class';
    return $db->query($query)->fetchAll();
}

function add_class($class) {
    global $db;
    $stmt = $db->prepare("INSERT INTO classes (class) VALUES (:class)");
    $stmt->bindValue(':class', $class);
    $stmt->execute();
}

function delete_class($class_id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM classes WHERE classID = :id");
    $stmt->bindValue(':id', $class_id, PDO::PARAM_INT);
    $stmt->execute();
}
