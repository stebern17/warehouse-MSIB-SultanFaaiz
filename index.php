<?php
require_once 'classes/Warehouse.php';

$warehouse = new Warehouse();
$warehouses = $warehouse->readAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Warehouse Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Warehouse Management System</h2>
    
    <!-- Add Warehouse Form -->
    <div class="card mb-4">
      <div class="card-header">Add New Warehouse</div>
      <div class="card-body">
        <form method="post" action="add_warehouse.php">
          <input type="text" class="form-control mb-3" name="name" placeholder="Warehouse Name" required>
          <input type="text" class="form-control mb-3" name="location" placeholder="Location" required>
          <input type="number" class="form-control mb-3" name="capacity" placeholder="Capacity" required>
          <input type="time" class="form-control mb-3" name="opening_hour" required>
          <input type="time" class="form-control mb-3" name="closing_hour" required>
          <button type="submit" class="btn btn-primary">Add Warehouse</button>
        </form>
      </div>
    </div>

    <!-- Warehouse List Table -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Location</th>
          <th>Capacity</th>
          <th>Status</th>
          <th>Opening Hour</th>
          <th>Closing Hour</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $warehouses->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['location'] ?></td>
            <td><?= $row['capacity'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['opening_hour'] ?></td>
            <td><?= $row['closing_hour'] ?></td>
            <td>
              <a href="edit_warehouse.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="delete_warehouse.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
