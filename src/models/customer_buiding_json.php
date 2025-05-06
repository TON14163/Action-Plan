<?php
error_reporting(0);
@session_start();
if($_SESSION['em_id'] != ''){
    require_once __DIR__ . '/../../config/database.php';
    require_once __DIR__ . '/../controllers/MainControllersAll.php';
    
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: *"); // ถ้าต้องการอนุญาต CORS
    $cuss = "SELECT distinct hospital_buiding FROM tb_customer_contact WHERE hospital_buiding != '' ORDER BY hospital_buiding ASC ";
    $qcus = mysqli_query($conn, $cuss);
    $customers = mysqli_fetch_all($qcus, MYSQLI_ASSOC);
    echo json_encode($customers);
    // ปิดการเชื่อมต่อ
    mysqli_close($conn);
} else {
    print "<meta http-equiv=refresh content=0;URL='https://www.google.co.th/search?sca_esv=4ad496d1768baf99&sxsrf=AHTn8zpQPrNhKqCEpDxCUBsIcsB9LU5aiQ:1742783288650&q=%E0%B8%81%E0%B8%A3%E0%B8%87&udm=2&fbs=ABzOT_CvTum9bfMS_keiIOkwIHYPyLRk8LKB_RhroNc3NpN1yQTaG3g7af7Cm37b7h9B7YJ8N4Ny7BtT2f9IHmME4ftR32IDq0YA12-ZvbYhRvM6OH2xa_EuAmTTzpSY3H3gDXV65qQhn3tO4GwABxMWgM7XAXWRu1uVY34Uot_-7U-KhVEaN3l-TwtbbdS8wvMSbm2WVPa9lbZZjqYWekJahi5QT_9hKrvbuLGFAPrp6q0lkdGen3cGhPp2pH0bNlNbIJz7wohktr8ZEKHWOF32HNc0XBw8rD3t71p3HSpK396vhSNUw18&sa=X&ved=2ahUKEwiZu9zW1aGMAxUGRmwGHcblAtEQtKgLegQIGBAB&biw=1366&bih=617&dpr=1'>"; 
}
?>