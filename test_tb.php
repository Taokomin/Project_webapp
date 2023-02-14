<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php
include('condb.php');
$query = "SELECT * FROM tb_customer ORDER BY customer_number asc" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col-md-6'>";
echo '<h4 align="center"> TABLE CUSTOMER </h4>';
echo "<table border='1' align='center' class='table table-hover'>";
echo "
  <tr align='center' bgcolor='#CCCCCC'>
    <td>ลำดับ</td>
    <td>รหัส</td>
    <td>คำนำหน้าชื่อ</td>
    <td>ชื่อ</td>
    <td>นามสกุล</td>
    <td>เบอร์โทร</td>
    <td>อีเมล์</td>
  </tr>";
foreach ($result as $value) {
  echo "<tr>";
  echo "<td>" . $value["customer_number"] .  "</td> ";
  echo "<td>" . $value["customer_id"] .  "</td> ";
  echo "<td class='danger'>" . $value["ref_nameprefix_number"] .  "</td> ";
  echo "<td>" . $value["customer_fname"] .  "</td> ";
  echo "<td>" . $value["customer_lname"] .  "</td> ";
  echo "<td>" . $value["customer_phone"] .  "</td> ";
  echo "<td>" . $value["customer_email"] .  "</td> ";
  echo "</tr>";
}
echo "</table>";
echo '<hr>';
echo '</div>';

$query2 = "SELECT * FROM tb_nameprefix ORDER BY prefix_number asc" or die("Error:" . mysqli_error());
$result2 = mysqli_query($con, $query2);

echo "<div class='col-md-3'>";
echo '<h4 align="center"> TABLE POSITION </h4>';
echo "<table border='1' align='center' class='table table-hover'>";
echo "
      <tr align='center' bgcolor='#CCCCCC'>
        <td>ลำดับ</td>
        <td>รหัส</td>
        <td>ชื่อ</td>
      </tr>";
foreach ($result2 as $values) {
  echo "<tr>";
  echo "<td>" . $values["prefix_number"] .  "</td> ";
  echo "<td>" . $values["prefix_id"] . "</td> ";
  echo "<td>" . $values["prefix_name"] . "</td> ";
  echo "</tr>";
}
echo "</table>";

echo '<hr>';
echo '</div>';
echo '</div>';


$query3 = "
SELECT c.*,n.prefix_name
FROM tb_customer as c 
INNER JOIN  tb_nameprefix as n ON c.ref_nameprefix_number = n.prefix_number
ORDER BY n.prefix_number asc"
  or die("Error:" . mysqli_error());
$result3 = mysqli_query($con, $query3);

echo "<div class='row'>";
echo "<div class='col-md-6'>";
echo '<h4 align="center"> JOIN TABLE </h4>';
echo "<table border='1' align='center' class='table table-hover'>";
echo "
  <tr align='center' bgcolor='#CCCCCC'>
    <td>ลำดับ</td>
    <td>รหัส</td>
    <td>คำนำหน้าชื่อ</td>
    <td>ชื่อ</td>
    <td>นามสกุล</td>
    <td>เบอร์โทร</td>
    <td>อีเมล์</td>
  </tr>";
foreach ($result3 as $row) {
  echo "<tr>";
  echo "<td>" . $row["customer_number"] .  "</td> ";
  echo "<td>" . $row["customer_id"] .  "</td> ";
  echo "<td class='danger'>" . $row["prefix_name"] .  "</td> ";
  echo "<td>" . $row["customer_fname"] .  "</td> ";
  echo "<td>" . $row["customer_lname"] .  "</td> ";
  echo "<td>" . $row["customer_phone"] .  "</td> ";
  echo "<td>" . $row["customer_email"] .  "</td> ";
  echo "</tr>";
}
echo "</table>";
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
?>
<?php
mysqli_close($con);
?>