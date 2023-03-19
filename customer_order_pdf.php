<?php
require_once __DIR__ . '/vendor/autoload.php';
include('condb_pdf.php');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$customer_order_number = $_GET['customer_order_number'];
$sql = "
  SELECT co.*, u.unit_name, c.customer_fname
  FROM tb_customer_order AS co
  INNER JOIN tb_unit AS u ON co.ref_unit_number = u.unit_number
  INNER JOIN tb_customer AS c ON co.ref_customer_number = c.customer_number
  WHERE customer_order_number = $customer_order_number
  ORDER BY u.unit_number, c.customer_number ASC;
  ";
$result = mysqli_query($conn, $sql);
$content = "";
if (isset($_GET['customer_order_number'])) {
  $customer_order_number = $_GET['customer_order_number'];
  if (mysqli_num_rows($result) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      $tablebody .= '<tr style="border:1px solid #000;">
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $i . '</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['customer_order_id'] . '</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['customer_order_day'] . '</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['customer_order_detail'] . '</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['customer_order_quantity'] . '</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['unit_name'] . '</td>
    <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['customer_fname'] . '</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['ref_employee_number'] . '</td>
      </tr>';
      $i++;
    }
  }
}
mysqli_close($conn);


$mpdf = new \Mpdf\Mpdf();


$tableh = '

<style>
  body{
    font-family: "Garuda"; 
  }
</style>
<h2 style="text-align:center">ใบสั่งซื้อสินค้า</h2>
                <table>
                    <tr class="">
                        <th>หมายเลขใบสั่งซื้อ</th>
                        <td>xxxxxxxxx</td>
                    </tr>
                    <tr class="">
                        <th>บริษัท คิว.ดี.อี. พรีซิชั่น พาร์ท จำกัด (Q.D.E Precision Part Co.ltd.)</th>
                        <td>xxxxxxxx</td>
                    </tr>
                    <tr class="metadata-date">
                        <th>วันที่</th>
                        <td>xx-xx-xxxx</td>
                    </tr>
                    <tr class="metadata-delivery-date">
                        <th>วันที่จัดส่งที่คาดไว้</th>
                        <td>xx-xx-xxxx</td>
                    </tr>
                    <tr class="metadata-supplier-orderid">
                        <th>ผู้จัดจำหน่ายหมายเลขคำสั่งซื้อ</th>
                        <td>xxxxxxxx</td>
                    </tr>
                </table>
              </div>
              <div id="address">
                  หมู่ 13 ตำบลคลองสอง<br>
                  อำเภอคลองหลวง <br>
                  จังหวัดปทุมธานี 12120<br>
              </div>
<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
    <tr style="border:1px solid #000;padding:4px;">
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ลำดับ</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">รหัส</td>
        <td  width="15%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp; วั่นที่สั่ง </td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">สินค้าที่สั่งทำ </td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">จำนวน</td>
		<td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="20%">หน่วยนับ</td>
		<td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">ลูกค้า</td>
		<td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="20%">พนักงาน</td>
    </tr>

</thead>
  <tbody>';

$tableend = "</tbody>
</table>";
$tablebody2 .= '<tr style="border:0px solid #000;">

<td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="20%"><h2 style="text-align:center"> รายการการเบิกวัสดุอุปกรณ์ </h2></td>

      </tr>';

$tableh2 = '
<br>
<table id="bg-table2" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
    <tr style="border:0px solid #000;padding:4px;">
        <td  style="border-right:0px solid #000;padding:4px;"   width="10%" align="right">ลงชื่อ.....................................</td>
    </tr>
    <tr style="border:0px solid #000;padding:4px;">
    <td  style="border-right:0px solid #000;padding:4px;"  width="10%" align="right">(....................................)</td>
    </tr>
</thead>
  <tbody>';

$tableend2 = "</tbody>
</table>";


$mpdf->WriteHTML($tableh);
$mpdf->WriteHTML($tablebody);
// $mpdf->WriteHTML($tablebody2);
$mpdf->WriteHTML($tableend);


$mpdf->WriteHTML($tableh2);
// $mpdf->WriteHTML($tablebody2);
$mpdf->WriteHTML($tableend2);
$mpdf->Output();

//https://monkeywebstudio.com/%E0%B8%AA%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%87%E0%B9%84%E0%B8%9F%E0%B8%A5%E0%B9%8C-pdf-%E0%B8%94%E0%B9%89%E0%B8%A7%E0%B8%A2-mpdf/
