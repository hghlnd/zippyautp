
<?php
function get_filtered_vehicles($sort, $make_id, $type_id, $class_id) {
    global $db;
    $query = "SELECT V.*, M.make, T.type, C.class
              FROM vehicles V
              JOIN makes M ON V.makeID = M.makeID
              JOIN types T ON V.typeID = T.typeID
              JOIN classes C ON V.classID = C.classID";
    $conditions = [];
    if ($make_id) $conditions[] = "V.makeID = :make_id";
    if ($type_id) $conditions[] = "V.typeID = :type_id";
    if ($class_id) $conditions[] = "V.classID = :class_id";
    if ($conditions) $query .= " WHERE " . implode(" AND ", $conditions);
    $query .= ($sort === 'year') ? " ORDER BY V.year DESC" : " ORDER BY V.price DESC";

    $stmt = $db->prepare($query);
    if ($make_id) $stmt->bindValue(':make_id', $make_id, PDO::PARAM_INT);
    if ($type_id) $stmt->bindValue(':type_id', $type_id, PDO::PARAM_INT);
    if ($class_id) $stmt->bindValue(':class_id', $class_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

function add_vehicle($year, $model, $price, $make_id, $type_id, $class_id) {
    global $db;
    $stmt = $db->prepare("INSERT INTO vehicles (year, model, price, makeID, typeID, classID)
                          VALUES (:year, :model, :price, :make_id, :type_id, :class_id)");
    $stmt->execute([
        ':year' => $year,
        ':model' => $model,
        ':price' => $price,
        ':make_id' => $make_id,
        ':type_id' => $type_id,
        ':class_id' => $class_id
    ]);
}

function delete_vehicle($vehicle_id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM vehicles WHERE vehicleID = :id");
    $stmt->bindValue(':id', $vehicle_id, PDO::PARAM_INT);
    $stmt->execute();
}
