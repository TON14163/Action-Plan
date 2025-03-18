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
$dateStart = isset($_POST['date_start']) ? $_POST['date_start'] : (isset($_GET['date_start']) ? $_GET['date_start'] : '');
$dateEnd = isset($_POST['date_end']) ? $_POST['date_end'] : (isset($_GET['date_end']) ? $_GET['date_end'] : '');
$saleCode = isset($_POST['sale_code']) ? $_POST['sale_code'] : (isset($_GET['sale_code']) ? $_GET['sale_code'] : '');

// กำหนดคอลัมน์ที่สามารถเรียงลำดับได้
$columns = array('id', 'date_salemk' ,'customer_name','description','img_1','img_2','img_3','img_4','img_5','add_by','sale_code','type_save','ckk_open');
$orderColumn = $columns[$orderColumnIdx];

// คำสั่ง SQL พื้นฐาน
$sql = "SELECT id, date_salemk ,customer_name ,description ,img_1 ,img_2 ,img_3 ,img_4 ,img_5 ,add_by ,sale_code ,type_save ,ckk_open FROM tb_register_salemk";
$countSql = "SELECT COUNT(id) AS total FROM tb_register_salemk";

// เริ่มต้น WHERE ด้วยเงื่อนไขที่เป็นจริงเสมอ
$where = " WHERE 1=1";

if (!empty($saleCode)) {
    $where .= " AND sale_code = '" . mysqli_real_escape_string($conn, $saleCode) . "' ";
} 
if (!empty($dateStart)) {
    $where .= " AND date_salemk BETWEEN '" . mysqli_real_escape_string($conn, $dateStart) . "' AND '" . mysqli_real_escape_string($conn, $dateEnd) . "' ";
}

// เพิ่ม $where เข้ากับ $sql และ $countSql
$sql .= $where;
$countSql .= $where;

// นับจำนวนข้อมูลทั้งหมด (สำหรับ recordsFiltered)
$totalResult = mysqli_query($conn, $countSql);
$totalRow = mysqli_fetch_assoc($totalResult);
$recordsFiltered = $totalRow['total'];

// นับจำนวนข้อมูลทั้งหมดโดยไม่มีเงื่อนไข (สำหรับ recordsTotal)
$totalResultAll = mysqli_query($conn, "SELECT COUNT(id) AS total FROM tb_register_salemk");
$totalRowAll = mysqli_fetch_assoc($totalResultAll);
$recordsTotal = $totalRowAll['total'];

// เพิ่มการเรียงลำดับ
$sql .= " ORDER BY date_salemk DESC ";

// จำกัดจำนวนแถว (pagination)
$sql .= " LIMIT $start, $length";

// ดึงข้อมูล
$objQuery = mysqli_query($conn, $sql);
$item = array();
while ($objResult = mysqli_fetch_array($objQuery)) {
    $imgFull1 = ($objResult["img_1"] != '') ? '<a href="assets/images/img_upload/'.$objResult["img_1"].'" target="_blank"><span class="badge text-bg-light">ดูรายละเอียด</span></a>' : '';
    $imgFull2 = ($objResult["img_2"] != '') ? '<br><a href="assets/images/img_upload/'.$objResult["img_2"].'" target="_blank"><span class="badge text-bg-light">ดูรายละเอียด</span></a>' : '';
    $imgFull3 = ($objResult["img_3"] != '') ? '<br><a href="assets/images/img_upload/'.$objResult["img_3"].'" target="_blank"><span class="badge text-bg-light">ดูรายละเอียด</span></a>' : '';
    $imgFull4 = ($objResult["img_4"] != '') ? '<br><a href="assets/images/img_upload/'.$objResult["img_4"].'" target="_blank"><span class="badge text-bg-light">ดูรายละเอียด</span></a>' : '';
    $imgFull5 = ($objResult["img_5"] != '') ? '<br><a href="assets/images/img_upload/'.$objResult["img_5"].'" target="_blank"><span class="badge text-bg-light">ดูรายละเอียด</span></a>' : '';
    $imgFull = $imgFull1 . $imgFull2 . $imgFull3 . $imgFull4 . $imgFull5;

    $create_action = ($objResult["ckk_open"] == '0') ? '<a href="list_receive_the_matter?id=' . $objResult["id"] . '"><img src="assets/images/icon_system/doc01.png" style="width: 20px; height: 20px;"></a>' : 'สร้าง Action Plan แล้ว';

    $item[] = array(
        'date_salemk' => DateThai($objResult["date_salemk"]),
        'customer_name' => $objResult["customer_name"],
        'description' => $objResult["description"],
        'imgFull' => $imgFull,
        'add_by' => $objResult["add_by"],
        'code' => $objResult["sale_code"],
        'type_save' => $objResult["type_save"],
        'ckk_open' => $objResult["ckk_open"],
        'create_action' => $create_action,
        'edit' => '<a href="list_receive_the_matter?id=' . $objResult["id"] . '"><img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;"></a>'
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
header("Access-Control-Allow-Origin: *");
echo json_encode($response);

// ปิดการเชื่อมต่อ
mysqli_close($conn);
?>