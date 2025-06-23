<?php
error_reporting(0);
@session_start();

if ($_SESSION['em_id'] != '') {
    require_once __DIR__ . '/../../config/database.php';
    require_once __DIR__ . '/../controllers/MainControllersAll.php';

    // รับพารามิเตอร์จาก DataTables
    $draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;
    $start = isset($_POST['start']) ? intval($_POST['start']) : 0;
    $length = isset($_POST['length']) ? intval($_POST['length']) : 10;
    $cus_keyword = isset($_POST['cus_keyword']) ? trim($_POST['cus_keyword']) : '';

    // กำหนดคอลัมน์ที่สามารถเรียงลำดับได้
    $columns = array('id_hospital', 'customer_code', 'zip_code', 'title_name', 'customer_name', 'sale_area', 'address_name', 'province', 'customer_tel', 'fax', 'customer_credit');

    // คำสั่ง SQL พื้นฐาน
    $sql = "SELECT id_hospital, customer_code, zip_code, title_name, customer_name, sale_area, address_name, province, customer_tel, fax, customer_credit FROM tb_customer_hos ";
    $countSql = "SELECT COUNT(id_hospital) AS total FROM tb_customer_hos ";

    // เริ่มต้น WHERE ด้วยเงื่อนไขที่เป็นจริงเสมอ
    $where = " WHERE 1=1 ";

    if ($_SESSION['typelogin'] == 'Supervisor') {
    } else {
        $where .= " AND sale_area = '" . mysqli_real_escape_string($conn, $_SESSION['em_id']) . "' ";
    }
    
    // เพิ่มเงื่อนไขการค้นหา
    if (!empty($cus_keyword)) {
        $where .= " AND ( 
            customer_name = '" . mysqli_real_escape_string($conn, $cus_keyword) . "'
        )";
    }

    // เพิ่ม $where เข้ากับ $sql และ $countSql
    $sql .= $where;
    $countSql .= $where;

    // นับจำนวนข้อมูลทั้งหมด (สำหรับ recordsFiltered)
    $totalResult = mysqli_query($conn, $countSql);
    $totalRow = mysqli_fetch_assoc($totalResult);
    $recordsFiltered = $totalRow['total'];

    // นับจำนวนข้อมูลทั้งหมดโดยไม่มีเงื่อนไข (สำหรับ recordsTotal)
    $totalResultAll = mysqli_query($conn, "SELECT COUNT(id_hospital) AS total FROM tb_customer_hos");
    $totalRowAll = mysqli_fetch_assoc($totalResultAll);
    $recordsTotal = $totalRowAll['total'];

    // เพิ่มการเรียงลำดับ
    $sql .= " ORDER BY id_hospital DESC ";

    // จำกัดจำนวนแถว (pagination)
    $sql .= " LIMIT $start, $length";

    // ดึงข้อมูล
    $objQuery = mysqli_query($conn, $sql);
    $item = array();
    while ($objResult = mysqli_fetch_array($objQuery)) {
        $item[] = array(
            'id_hospital' => $objResult["id_hospital"],
            'customer_code' => $objResult["customer_code"],
            'title_name' => $objResult["title_name"],
            'customer_name' => $objResult["customer_name"],
            'sale_area' => $objResult["sale_area"],
            'address_name' => $objResult["address_name"],
            'province' => $objResult["province"],
            'customer_tel' => $objResult["customer_tel"],
            'customer_credit' => $objResult["customer_credit"],
            'edit' => '<img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;" data-bs-toggle="modal" data-bs-target="#editCustomer" 
                onclick="document.getElementById(\'title_name_edit\').value = \'' . htmlspecialchars(mysqli_real_escape_string($conn, $objResult["title_name"]), ENT_QUOTES) . '\';
                document.getElementById(\'customer_name_edit\').value = \'' . htmlspecialchars(mysqli_real_escape_string($conn, $objResult["customer_name"]), ENT_QUOTES) . '\';
                document.getElementById(\'fax_edit\').value = \'' . htmlspecialchars(mysqli_real_escape_string($conn, $objResult['fax']), ENT_QUOTES) . '\';
                document.getElementById(\'address_name_edit\').value = \'' . htmlspecialchars(mysqli_real_escape_string($conn, $objResult['address_name']), ENT_QUOTES) . '\';
                document.getElementById(\'sale_area_edit\').value = \'' . htmlspecialchars(mysqli_real_escape_string($conn, $objResult["sale_area"]), ENT_QUOTES) . '\';
                document.getElementById(\'province_edit\').value = \'' . htmlspecialchars(mysqli_real_escape_string($conn, $objResult["province"]), ENT_QUOTES) . '\';
                document.getElementById(\'zip_code_edit\').value = \'' . htmlspecialchars(mysqli_real_escape_string($conn, $objResult["zip_code"]), ENT_QUOTES) . '\';
                document.getElementById(\'customer_tel_edit\').value = \'' . htmlspecialchars(mysqli_real_escape_string($conn, $objResult["customer_tel"]), ENT_QUOTES) . '\';
                document.getElementById(\'customer_credit_edit\').value = \'' . htmlspecialchars(mysqli_real_escape_string($conn, $objResult["customer_credit"]), ENT_QUOTES) . '\';
                document.getElementById(\'id_edit\').value = ' . $objResult["id_hospital"] . ';
                ">'
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
} else {
    header("Location: https://www.google.co.th");
    exit;
}
?>