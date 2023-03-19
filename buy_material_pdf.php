<?php
require_once __DIR__ . '/vendor/autoload.php';
include('condb_pdf.php');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$buy_material_number = $_GET['buy_material_number'];

$sql = "SELECT bm.*, eq.equipment_name, u.unit_name, et.equipment_type_name, p.partners_fname 
        FROM tb_buy_material as bm
        INNER JOIN tb_equipment as eq ON bm.ref_equipment_number = eq.equipment_number
        INNER JOIN tb_unit as u ON bm.ref_unit_number = u.unit_number
        INNER JOIN tb_equipment_type as et ON bm.ref_equipment_type = et.equipment_type_number
        INNER JOIN tb_partners as p ON bm.ref_partners_number = p.partners_number
        WHERE buy_material_number = $buy_material_number
        ORDER BY eq.equipment_number, u.unit_number, et.equipment_type_number, p.partners_number asc";

$result = mysqli_query($conn, $sql);
$content = "";
if (isset($_GET['buy_material_number'])) {
  $ref_equipment_id = $_GET['ref_equipment_id'];
if (mysqli_num_rows($result) > 0) {
  $i = 1;
  while($row = mysqli_fetch_assoc($result)) {
    $tablebody .= '<tr style="border:1px solid #000;">
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $i . '</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['buy_material_id'] . '</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['buy_material_day'] . '</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['buy_material_detail'] . '</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['equipment_name'] . '</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['buy_material_quantity'] . '</td>
    <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['unit_name'] . '</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >' . $row['partners_fname'] . '</td>
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
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">รหัสสั่งซื้อวัสดุและอุปกรณ์</td>
        <td  width="15%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp; วันที่สั่งซื้อ</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">รายละเอียดการสั่งซื้อวัสดุและอุปกรณ์</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">วัสดุและอุปกรณ์</td>
		<td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="20%">จำนวน</td>
		<td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">หน่วยนับ</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="20%">คู่ค้า</td>
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
