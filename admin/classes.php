<?php
require_once '../models/database.php';
require_once '../models/classes_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_class']) && !empty(trim($_POST['class']))) {
        add_class(trim($_POST['class']));
    } elseif (isset($_POST['delete_id'])) {
        delete_class((int)$_POST['delete_id']);
    }
    header("Location: classes.php");
    exit;
}
$classes = get_all_classes();
?>
<!DOCTYPE html>
<html>
<head><title>Manage Classes</title></head>
<body>
  <h1>Manage Classes</h1>
  <form method="post">
    <input type="text" name="class" placeholder="New Class">
    <button type="submit" name="add_class">Add</button>
  </form>
  <table>
    <tr><th>Class</th><th>Action</th></tr>
    <?php foreach ($classes as $class): ?>
    <tr>
      <td><?= $class['class'] ?></td>
      <td>
        <form method="post">
          <input type="hidden" name="delete_id" value="<?= $class['classID'] ?>">
          <button type="submit">Delete</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  <p><a href="index.php">Back</a></p>
</body>
</html>
