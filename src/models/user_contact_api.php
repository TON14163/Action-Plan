<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../controllers/MainControllersAll.php';

// รับพารามิเตอร์จาก DataTables
$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;
$start = isset($_POST['start']) ? intval($_POST['start']) : 0;
$length = isset($_POST['length']) ? intval($_POST['length']) : 10;
$searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';
$orderColumnIdx = isset($_POST['order'][0]['column']) ? intval($_POST['order'][0]['column']) : 0;
$orderDir = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'asc';
$datePlan = isset($_POST['date_plan']) ? $_POST['date_plan'] : (isset($_GET['date_plan']) ? $_GET['date_plan'] : '');
$saleCode = isset($_POST['sale_code']) ? $_POST['sale_code'] : (isset($_GET['sale_code']) ? $_GET['sale_code'] : '');

// กำหนดคอลัมน์ที่สามารถเรียงลำดับได้
$columns = array('id_work', 'date_plan' ,'hospital_name','hospital_buiding','hospital_class','hospital_ward','hospital_contact');
$orderColumn = $columns[$orderColumnIdx];

// คำสั่ง SQL พื้นฐาน
$sql = "SELECT id_work, date_plan ,hospital_name ,hospital_buiding ,hospital_class ,hospital_ward ,hospital_contact ,daily FROM tb_register_data";
$countSql = "SELECT COUNT(id_work) AS total FROM tb_register_data";

// เริ่มต้น WHERE ด้วยเงื่อนไขที่เป็นจริงเสมอ
$where = " WHERE 1=1"; // ใช้ 1=1 แทน 1 เพื่อความชัดเจน

if (!empty($saleCode)) {
    $where .= " AND sale_area = '".$saleCode."'";
} else {
    $where .= " AND head_area = 'SS3'";
    $saleCode = 'SS3';
}
if (!empty($datePlan)) {
    $where .= " AND date_plan = '" . mysqli_real_escape_string($conn, $datePlan) . "'";
}

// เพิ่ม $where เข้ากับ $sql และ $countSql
$sql .= $where;
$countSql .= $where;
// นับจำนวนข้อมูลทั้งหมด (สำหรับ recordsFiltered)
$totalResult = mysqli_query($conn, $countSql);
$totalRow = mysqli_fetch_assoc($totalResult);
$recordsFiltered = $totalRow['total'];

// นับจำนวนข้อมูลทั้งหมดโดยไม่มีเงื่อนไข (สำหรับ recordsTotal)
$totalResultAll = mysqli_query($conn, "SELECT COUNT(id_work) AS total FROM tb_register_data");
$totalRowAll = mysqli_fetch_assoc($totalResultAll);
$recordsTotal = $totalRowAll['total'];

// เพิ่มการเรียงลำดับ
$sql .= " ORDER BY date_plan DESC ";

// จำกัดจำนวนแถว (pagination)
$sql .= " LIMIT $start, $length";

// ดึงข้อมูล
$objQuery = mysqli_query($conn, $sql);
$item = array();
while ($objResult = mysqli_fetch_array($objQuery)) {
    $item[] = array(
        'date_plan' => DateThai($objResult["date_plan"]),
        'hospital_name' => $objResult["hospital_name"],
        'hospital_buiding' => $objResult["hospital_buiding"],
        'hospital_class' => $objResult["hospital_class"],
        'hospital_ward' => $objResult["hospital_ward"],
        'hospital_contact' => $objResult["hospital_contact"],
        'sales_area' => $saleCode,
        'daily' => $objResult["daily"], // ส่ง daily แยก
        'edit' => '<a href="daily_report_edit?id_work=' . $objResult["id_work"] . '"><img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;"></a>'
    );
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
?>