<?php
require_once '../models/database.php';
require_once '../models/vehicles_db.php';
require_once '../models/makes_db.php';
require_once '../models/types_db.php';
require_once '../models/classes_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    delete_vehicle((int)$_POST['delete_id']);
    header("Location: index.php");
    exit;
}

$vehicles = get_filtered_vehicles('price', null, null, null);
?>
<!DOCTYPE html>
<html>
<head><title>Admin - Zippy</title></head>
<body>
  <h1>Admin - Zippy Used Autos</h1>
  <p>
    <a href="makes.php">Manage Makes</a> |
    <a href="types.php">Manage Types</a> |
    <a href="classes.php">Manage Classes</a> |
    <a href="vehicles.php">Add Vehicle</a>
  </p>
  <table>
    <tr><th>Year</th><th>Make</th><th>Model</th><th>Type</th><th>Class</th><th>Price</th><th>Action</th></tr>
    <?php foreach ($vehicles as $v): ?>
    <tr>
      <td><?= $v['year'] ?></td>
      <td><?= $v['make'] ?></td>
      <td><?= $v['model'] ?></td>
      <td><?= $v['type'] ?></td>
      <td><?= $v['class'] ?></td>
      <td>$<?= number_format($v['price'], 2) ?></td>
      <td>
        <form method="post">
          <input type="hidden" name="delete_id" value="<?= $v['vehicleID'] ?>">
          <button type="submit">Delete</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
