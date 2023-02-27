<?php
include('condb.php');

$stmt = $conn->prepare("INSERT INTO user (ID, Username, Password, Firstname, Lastname, Userlevel)VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param($ID, $Username, $Password, $Firstname, $Lastname, $Userlevel);

$Username = $_POST['Username'];
$Password = md5($_POST['Password']);
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$Userlevel = $_POST['Userlevel'];

$stmt->execute();

$stmt->close();
$conn->close();
?>