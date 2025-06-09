<?php
@session_start();
if($_SESSION['em_id'] != ''){
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../controllers/MainControllersAll.php';

// รับพารามิเตอร์จาก DataTables
$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;
$start = isset($_POST['start']) ? intval($_POST['start']) : 0;
$length = isset($_POST['length']) ? intval($_POST['length']) : 10;
$searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';
$orderColumnIdx = isset($_POST['order'][0]['column']) ? intval($_POST['order'][0]['column']) : 0;
$orderDir = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'asc';
$cus_Keyword = isset($_POST['cus_keyword']) ? $_POST['cus_keyword'] : (isset($_GET['cus_keyword']) ? $_GET['cus_keyword'] : '');
$saleCode = isset($_POST['sale_code']) ? $_POST['sale_code'] : (isset($_GET['sale_code']) ? $_GET['sale_code'] : '');

// กำหนดคอลัมน์ที่สามารถเรียงลำดับได้
$columns = array('id_customer','customer_code','sale_code','hospital_buiding','hospital_class','hospital_ward','hospital_ward_present','hospital_contact1','hospital_contact2','hospital_contact3','hospital_contact4','hospital_contact5','hospital_contact6','hospital_contact7','hospital_contact8','hospital_contact9','hospital_contact10','hospital_mobile1','hospital_mobile2','hospital_mobile3','hospital_mobile4','hospital_mobile5','hospital_mobile6','hospital_mobile7','hospital_mobile8','hospital_mobile9','hospital_mobile10','fax','email_contact1','email_contact2','email_contact3','email_contact4','email_contact5','email_contact6','email_contact7','email_contact8','email_contact9','email_contact10','line_id','date_prom','description_contact','customer_name','customer_title','type_1','sale_see');
$orderColumn = $columns[$orderColumnIdx];

// คำสั่ง SQL พื้นฐาน
$sql = "SELECT id_customer,customer_code,sale_code,hospital_buiding,hospital_class,hospital_ward,hospital_ward_present,hospital_contact1,hospital_contact2,hospital_contact3,hospital_contact4,hospital_contact5,hospital_contact6,hospital_contact7,hospital_contact8,hospital_contact9,hospital_contact10,hospital_mobile1,hospital_mobile2,hospital_mobile3,hospital_mobile4,hospital_mobile5,hospital_mobile6,hospital_mobile7,hospital_mobile8,hospital_mobile9,hospital_mobile10,fax,email_contact1,email_contact2,email_contact3,email_contact4,email_contact5,email_contact6,email_contact7,email_contact8,email_contact9,email_contact10,line_id,date_prom,description_contact,customer_name,customer_title,type_1,sale_see FROM tb_customer_contact";
$countSql = "SELECT COUNT(id_customer) AS total FROM tb_customer_contact";

// เริ่มต้น WHERE ด้วยเงื่อนไขที่เป็นจริงเสมอ
$where = " WHERE 1=1"; // ใช้ 1=1 แทน 1 เพื่อความชัดเจน

// if (!empty($saleCode)) {
//     $where .= " AND sale_area = '".$saleCode."'";
// } else {
//     $where .= " AND head_area = 'SS3'";
//     $saleCode = 'SS3';
// }

if (!empty($cus_Keyword)) {
    $where .= " AND customer_name = '" . mysqli_real_escape_string($conn, $cus_Keyword) . "' ";
} else {
    $where .= " AND customer_name = 'N/A' ";
}

// เพิ่ม $where เข้ากับ $sql และ $countSql
$sql .= $where;
$countSql .= $where;
// นับจำนวนข้อมูลทั้งหมด (สำหรับ recordsFiltered)
$totalResult = mysqli_query($conn, $countSql);
$totalRow = mysqli_fetch_assoc($totalResult);
$recordsFiltered = $totalRow['total'];

// นับจำนวนข้อมูลทั้งหมดโดยไม่มีเงื่อนไข (สำหรับ recordsTotal)
$totalResultAll = mysqli_query($conn, "SELECT COUNT(id_customer) AS total FROM tb_customer_contact");
$totalRowAll = mysqli_fetch_assoc($totalResultAll);
$recordsTotal = $totalRowAll['total'];

// เพิ่มการเรียงลำดับ
$sql .= " ORDER BY id_customer DESC ";

// จำกัดจำนวนแถว (pagination)
$sql .= " LIMIT $start, $length";

// ดึงข้อมูล
$objQuery = mysqli_query($conn, $sql);
$item = array();
$row = 1;
while ($objResult = mysqli_fetch_array($objQuery)) {

    $item[] = array(
        'col0' => '
        <input type="hidden" name="item['.$row.']" id="item['.$row.']" value="'.$row.'" >
        <input type="checkbox" name="list_chk['.$row.']" id="list_chk['.$row.']" >
        <input type="hidden" name="id_customer['.$row.']" id="id_customer['.$row.']" value="'.$objResult['id_customer'].'" >
        <input type="hidden" name="customer" id="customer" value="'.$objResult['customer_name'].'" >
        <input type="hidden" name="hospital_buiding['.$row.']" id="hospital_buiding['.$row.']" value="'.$objResult['hospital_buiding'].'" >
        <input type="hidden" name="hospital_class['.$row.']" id="hospital_class['.$row.']" value="'.$objResult['hospital_class'].'" >
        <input type="hidden" name="hospital_ward['.$row.']" id="hospital_ward['.$row.']" value="'.$objResult['hospital_ward'].'" >
        <input type="hidden" name="type_1['.$row.']" id="type_1['.$row.']" value="'.$objResult['type_1'].'" >
        <input type="hidden" name="hospital_contact1['.$row.']" id="hospital_contact1['.$row.']" value="'.$objResult['hospital_contact1'].'" >
        ',
        'col1' => mysqli_real_escape_string($conn,$objResult['customer_name']),
        'col2' => mysqli_real_escape_string($conn,$objResult['hospital_buiding']),
        'col3' => mysqli_real_escape_string($conn,$objResult['hospital_class']),
        'col4' => mysqli_real_escape_string($conn,$objResult['hospital_ward']),
        'col5' => mysqli_real_escape_string($conn,$objResult['hospital_contact1']),
    );
    $row++;
}

// สร้าง JSON response
$response = array(
    "draw" => $draw,
    "recordsTotal" => $recordsTotal,
    "recordsFiltered" => $recordsFiltered,
    "data" => $item
);

// ตั้งค่า Header และส่ง JSON
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // ถ้าต้องการอนุญาต CORS
echo json_encode($response);

// ปิดการเชื่อมต่อ
mysqli_close($conn);
} else {
    print "<meta http-equiv=refresh content=1;URL='https://www.google.co.th/search?sca_esv=4ad496d1768baf99&sxsrf=AHTn8zpQPrNhKqCEpDxCUBsIcsB9LU5aiQ:1742783288650&q=%E0%B8%81%E0%B8%A3%E0%B8%87&udm=2&fbs=ABzOT_CvTum9bfMS_keiIOkwIHYPyLRk8LKB_RhroNc3NpN1yQTaG3g7af7Cm37b7h9B7YJ8N4Ny7BtT2f9IHmME4ftR32IDq0YA12-ZvbYhRvM6OH2xa_EuAmTTzpSY3H3gDXV65qQhn3tO4GwABxMWgM7XAXWRu1uVY34Uot_-7U-KhVEaN3l-TwtbbdS8wvMSbm2WVPa9lbZZjqYWekJahi5QT_9hKrvbuLGFAPrp6q0lkdGen3cGhPp2pH0bNlNbIJz7wohktr8ZEKHWOF32HNc0XBw8rD3t71p3HSpK396vhSNUw18&sa=X&ved=2ahUKEwiZu9zW1aGMAxUGRmwGHcblAtEQtKgLegQIGBAB&biw=1366&bih=617&dpr=1'>"; 
}
?>