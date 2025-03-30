
<?php
require_once '../models/database.php';
require_once '../models/makes_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_make']) && !empty(trim($_POST['make']))) {
        add_make(trim($_POST['make']));
    } elseif (isset($_POST['delete_id'])) {
        delete_make((int)$_POST['delete_id']);
    }
    header("Location: makes.php");
    exit;
}
$makes = get_all_makes();
?>
<!DOCTYPE html>
<html>
<head><title>Manage Makes</title></head>
<body>
  <h1>Manage Makes</h1>
  <form method="post">
    <input type="text" name="make" placeholder="New Make">
    <button type="submit" name="add_make">Add</button>
  </form>
  <table>
    <tr><th>Make</th><th>Action</th></tr>
    <?php foreach ($makes as $make): ?>
    <tr>
      <td><?= $make['make'] ?></td>
      <td>
        <form method="post">
          <input type="hidden" name="delete_id" value="<?= $make['makeID'] ?>">
          <button type="submit">Delete</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  <p><a href="index.php">Back</a></p>
</body>
</html>
