<?php
// Connect to database (replace "host", "username", "password", and "database" with appropriate values)
$mysqli = new mysqli("host", "username", "webdata");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Define variables
$equipment_id = $_POST["equipment_id"]; // ID of equipment to withdraw/return
$quantity = $_POST["quantity"]; // Quantity to withdraw/return
$action = $_POST["action"]; // "withdraw" or "return"

// Get current quantity of equipment from database
$sql = "SELECT quantity FROM equipment WHERE id = $equipment_id";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$current_quantity = $row["quantity"];

// Determine new quantity based on action (withdraw or return)
if ($action == "withdraw") {
    $new_quantity = $current_quantity - $quantity;
} else {
    $new_quantity = $current_quantity + $quantity;
}

// Update quantity in database
$sql = "UPDATE equipment SET quantity = $new_quantity WHERE id = $equipment_id";
if ($mysqli->query($sql) === TRUE) {
    echo "Quantity updated successfully.";
} else {
    echo "Error updating quantity: " . $mysqli->error;
}

// Close database connection
$mysqli->close();
?>
