<?php
include 'header.php';

// Retrieve the data from the database or any other data source
// Assuming you have stored the data in variables

// Example data
$name = "John Doe";
$email = "johndoe@example.com";
$phone = "1234567890";
$pizzaSize = "Medium";
$toppings = ["Pepperoni", "Mushrooms"];
$instructions = "No onions, please";

?>

<h2>Order Details</h2>

<table>
  <tr>
    <th>Name:</th>
    <td><?php echo $name; ?></td>
  </tr>
  <tr>
    <th>Email:</th>
    <td><?php echo $email; ?></td>
  </tr>
  <tr>
    <th>Phone:</th>
    <td><?php echo $phone; ?></td>
  </tr>
  <tr>
    <th>Pizza Size:</th>
    <td><?php echo $pizzaSize; ?></td>
  </tr>
  <tr>
    <th>Toppings:</th>
    <td><?php echo implode(", ", $toppings); ?></td>
  </tr>
  <tr>
    <th>Special Instructions:</th>
    <td><?php echo $instructions; ?></td>
  </tr>
  <tr>
    <th>Payment Method:</th>
    <td><?php echo $paymentMethod; ?></td>
  </tr>
</table>

<?php
include 'footer.php';
?>
