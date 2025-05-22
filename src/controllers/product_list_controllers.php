<?php
require_once __DIR__ . '/../../config/database.php'; // ข้อมูลของ  DB Connection

$q = $_GET['q'] ?? ''; // เนื้อหาที่ต้องการค้นหา
$rowNum = $_GET['rowNum'] ?? ''; // ลำดับของบรรทัดนั้น
$fieldName = $_GET['fieldName'] ?? ''; // product_outlist1 ชื่อของ input ที่ต้องการให้เก็บ ผลลัพธ์ = product_ID
$txtHint = $_GET['txtHint'] ?? ''; // txtHint ส่วนที่แสดง ผลลัพธ์ = list รายการที่มีทั้งหมด
$product_twolist = $_GET['product_twolist'] ?? ''; // product_twolist ชื่อของ input ที่ส่งค่ามา   ผลลัพธ์ = เอาไปแสดงชื่อที่ผู้ใช้งานเลือก

// ป้องกัน SQL Injection ด้วย prepared statement
$sql = "SELECT product_ID, product_name 
        FROM tb_product 
        WHERE (product_ID LIKE ? OR product_name LIKE ?) 
        LIMIT 25";

$stmt = mysqli_prepare($conn, $sql);
$searchTerm = "%{$q}%";
mysqli_stmt_bind_param($stmt, "ss", $q, $searchTerm);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result) {
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="solnamehover py-1" onclick="
        document.getElementById(\''.$fieldName.'\').value = \'' . htmlspecialchars($row['product_ID'], ENT_QUOTES, 'UTF-8') . '\'
        document.getElementById(\''.$product_twolist.'\').value = \'' . htmlspecialchars($row['product_name'], ENT_QUOTES, 'UTF-8') . '\'
        document.getElementById(\''.$txtHint.'\').style.display = \'none\';
        ">' . htmlspecialchars($row['product_name'], ENT_QUOTES, 'UTF-8') . '</div>';
    }
  } else {
    echo "No results found";
}
} else {
echo "Error: " . mysqli_error($conn) . "";
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>