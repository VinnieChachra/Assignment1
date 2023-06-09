<?php
require_once 'database.php';

// Create a new database object
$database = new Database();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sanitize input values
  $name = $database->sanitize($_POST['name']);
  $email = $database->sanitize($_POST['email']);
  $address = $database->sanitize($_POST['address']);
  $size = $database->sanitize($_POST['pizza_size']);
  $toppings = $database->sanitize(implode(', ', $_POST['toppings']));
  $special_instructions = $database->sanitize($_POST['instructions']);

  // Create a new order
  $result = $database->create($name, $email, $address, $size, $toppings, $special_instructions);

  // Redirect to index.php
  header("Location: index.php");
  exit;
}

// Get the latest order from the database
$latestOrder = $database->getLatestOrder();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="description" content="Pizza Order Form">
  <meta robots="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pizza Order Form</title>
  <link rel="stylesheet" type="text/css" href="./CSS/style.css">
</head>

<body>
  <!-- Header -->
  <header>
    <h1>Pizza Palace</h1>
  </header>

  <main>
    <!-- Order Form -->
    <form action="index.php" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="address">Address:</label>
      <textarea id="address" name="address" required></textarea>

      <label for="pizza-size">Pizza Size:</label>
      <select id="pizza-size" name="pizza_size" required>
        <option value="small">Small</option>
        <option value="medium">Medium</option>
        <option value="large">Large</option>
      </select>

      <!-- Toppings -->
      <label>Toppings:</label>
      <div id="topping-section">
        <div class="topping-item">
          <input type="checkbox" id="pepperoni" name="toppings[]" value="pepperoni">
          <label for="pepperoni">Pepperoni</label>
        </div>
        <div class="topping-item">
          <input type="checkbox" id="mushrooms" name="toppings[]" value="mushrooms">
          <label for="mushrooms">Mushrooms</label>
        </div>
        <div class="topping-item">
          <input type="checkbox" id="onions" name="toppings[]" value="onions">
          <label for="onions">Onions</label>
        </div>
        <div class="topping-item">
          <input type="checkbox" id="none" name="toppings[]" value="none">
          <label for="none">None</label>
        </div>
      </div>

      <!-- Special Instructions -->
      <label for="instructions">Special Instructions:</label>
      <textarea id="instructions" name="instructions"></textarea>

      <!-- Submit button -->
      <input type="submit" value="Place Order">
    </form>

    <!-- Table to display the latest order -->
    <?php if ($latestOrder) : ?>
      <table>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Pizza Size</th>
          <th>Toppings</th>
          <th>Special Instructions</th>
        </tr>
        <tr>
          <td><?php echo $latestOrder['name']; ?></td>
          <td><?php echo $latestOrder['email']; ?></td>
          <td><?php echo $latestOrder['address']; ?></td>
          <td><?php echo $latestOrder['pizzasize']; ?></td>
          <td><?php echo $latestOrder['toppings']; ?></td>
          <td><?php echo $latestOrder['specialinstructions']; ?></td>
        </tr>
      </table>
    <?php endif; ?>
  </main>

  <footer>
    <p>&copy; 2023 Pizza Palace</p>
  </footer>
</body>

</html>
