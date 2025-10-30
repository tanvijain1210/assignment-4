<?php include('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Business Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Business Management Dashboard</h1>

  <!-- Payment Management -->
  <section class="module">
    <h2>Payment Management</h2>
    <form method="POST" action="">
      <input type="text" name="customer_name" placeholder="Customer/Supplier Name" required>
      <input type="number" name="amount" placeholder="Amount" required>
      <select name="type">
        <option value="received">Payment Received</option>
        <option value="paid">Payment Made</option>
      </select>
      <button type="submit" name="save_payment">Save Payment</button>
    </form>
  </section>

  <!-- Attendance -->
  <section class="module">
    <h2>Attendance Tracker</h2>
    <form method="POST" action="">
      <input type="text" name="worker_name" placeholder="Driver/Labour Name" required>
      <input type="date" name="date" required>
      <select name="status">
        <option value="present">Present</option>
        <option value="absent">Absent</option>
      </select>
      <button type="submit" name="save_attendance">Save Attendance</button>
    </form>
  </section>

  <!-- Inventory -->
  <section class="module">
    <h2>Inventory Management</h2>
    <form method="POST" action="">
      <input type="text" name="item_name" placeholder="Item Name" required>
      <input type="number" name="quantity" placeholder="Quantity" required>
      <button type="submit" name="save_inventory">Save Inventory</button>
    </form>
  </section>

  <?php
  // Handle Payments
  if (isset($_POST['save_payment'])) {
    $name = $_POST['customer_name'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];
    $sql = "INSERT INTO payments (name, amount, type) VALUES ('$name', '$amount', '$type')";
    if ($conn->query($sql)) echo "<p>✅ Payment record saved successfully!</p>";
  }

  // Handle Attendance
  if (isset($_POST['save_attendance'])) {
    $name = $_POST['worker_name'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $sql = "INSERT INTO attendance (name, date, status) VALUES ('$name', '$date', '$status')";
    if ($conn->query($sql)) echo "<p>✅ Attendance saved successfully!</p>";
  }

  // Handle Inventory
  if (isset($_POST['save_inventory'])) {
    $item = $_POST['item_name'];
    $qty = $_POST['quantity'];
    $sql = "INSERT INTO inventory (item_name, quantity) VALUES ('$item', '$qty')";
    if ($conn->query($sql)) echo "<p>✅ Inventory updated!</p>";
  }
  ?>
</body>
</html>
