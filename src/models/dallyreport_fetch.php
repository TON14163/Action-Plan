<?php
// รับค่าจาก DataTables
$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];
$search = $_POST['search']['value'];

// คำสั่ง SQL พื้นฐาน
$sql = "SELECT id, em_id, user_id, pass, name FROM tb_user";
$countSql = "SELECT COUNT(id) AS total FROM tb_user";

// การค้นหา (ถ้ามีการกรอกในช่องค้นหา)
$where = "";
if (!empty($search)) {
    $where = " WHERE em_id LIKE :search OR user_id LIKE :search OR pass LIKE :search OR name LIKE :search";
    $sql .= $where;
    $countSql .= $where;
}

// นับจำนวนข้อมูลทั้งหมด (สำหรับ pagination)
$stmt = $pdo->prepare($countSql);
if (!empty($search)) {
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
}
$stmt->execute();
$totalRecords = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// เพิ่มการเรียงลำดับ (ordering)
$orderColumnIndex = $_POST['order'][0]['column'];
$orderDirection = $_POST['order'][0]['dir'];
$columns = ['id', 'em_id', 'user_id', 'pass', 'name'];
$orderColumn = $columns[$orderColumnIndex];
$sql .= " ORDER BY $orderColumn $orderDirection";

// จำกัดจำนวนแถว (pagination)
$sql .= " LIMIT :start, :length";

// เตรียมคำสั่ง SQL และดึงข้อมูล
$stmt = $pdo->prepare($sql);
if (!empty($search)) {
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
}
$stmt->bindValue(':start', (int)$start, PDO::PARAM_INT);
$stmt->bindValue(':length', (int)$length, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// สร้าง JSON response
$response = [
    "draw" => intval($draw),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords, // ถ้ามีการกรองเพิ่มเติม สามารถคำนวณใหม่ได้
    "data" => $data
];

header('Content-Type: application/json');
echo json_encode($response);
?>