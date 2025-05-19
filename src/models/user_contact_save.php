<?php
@session_start();
error_reporting(0);
if($_POST['save'] == '1'){
    $save = $_POST['save'];
    $customer_name = $_POST['customer_name'];
    $hospital_buiding = $_POST['hospital_buiding'];
    $hospital_class = $_POST['hospital_class'];
    $hospital_ward = $_POST['hospital_ward'];
    $hospital_ward_present = $_POST['hospital_ward_present'];
    $hospital_contact1 = $_POST['hospital_contact1'];
    $hospital_mobile1 = $_POST['hospital_mobile1'];
    $email_contact1 = $_POST['email_contact1'];
    $hospital_contact2 = $_POST['hospital_contact2'];
    $hospital_mobile2 = $_POST['hospital_mobile2'];
    $email_contact2 = $_POST['email_contact2'];
    $hospital_contact3 = $_POST['hospital_contact3'];
    $hospital_mobile3 = $_POST['hospital_mobile3'];
    $email_contact3 = $_POST['email_contact3'];
    $hospital_contact4 = $_POST['hospital_contact4'];
    $hospital_mobile4 = $_POST['hospital_mobile4'];
    $email_contact4 = $_POST['email_contact4'];
    $hospital_contact5 = $_POST['hospital_contact5'];
    $hospital_mobile5 = $_POST['hospital_mobile5'];
    $email_contact5 = $_POST['email_contact5'];
    $hospital_contact6 = $_POST['hospital_contact6'];
    $hospital_mobile6 = $_POST['hospital_mobile6'];
    $email_contact6 = $_POST['email_contact6'];
    $hospital_contact7 = $_POST['hospital_contact7'];
    $hospital_mobile7 = $_POST['hospital_mobile7'];
    $email_contact7 = $_POST['email_contact7'];
    $hospital_contact8 = $_POST['hospital_contact8'];
    $hospital_mobile8 = $_POST['hospital_mobile8'];
    $email_contact8 = $_POST['email_contact8'];
    $hospital_contact9 = $_POST['hospital_contact9'];
    $hospital_mobile9 = $_POST['hospital_mobile9'];
    $email_contact9 = $_POST['email_contact9'];
    $hospital_contact10 = $_POST['hospital_contact10'];
    $hospital_mobile10 = $_POST['hospital_mobile10'];
    $email_contact10 = $_POST['email_contact10'];
    $sale_code = $_SESSION['em_id'];

    if($customer_name != '' ){
        require_once __DIR__ . '/../../config/database.php';
        $sql = "INSERT INTO tb_customer_contact (customer_name,hospital_buiding,hospital_class,hospital_ward,hospital_ward_present,sale_code,hospital_contact1,hospital_mobile1,email_contact1,hospital_contact2,hospital_mobile2,email_contact2,hospital_contact3,hospital_mobile3,email_contact3,hospital_contact4,hospital_mobile4,email_contact4,hospital_contact5,hospital_mobile5,email_contact5,hospital_contact6,hospital_mobile6,email_contact6,hospital_contact7,hospital_mobile7,email_contact7,hospital_contact8,hospital_mobile8,email_contact8,hospital_contact9,hospital_mobile9,email_contact9,hospital_contact10,hospital_mobile10,email_contact10)
        VALUES ('$customer_name','$hospital_buiding','$hospital_class','$hospital_ward','$hospital_ward_present','$sale_code','$hospital_contact1','$hospital_mobile1','$email_contact1','$hospital_contact2','$hospital_mobile2','$email_contact2','$hospital_contact3','$hospital_mobile3','$email_contact3','$hospital_contact4','$hospital_mobile4','$email_contact4','$hospital_contact5','$hospital_mobile5','$email_contact5','$hospital_contact6','$hospital_mobile6','$email_contact6','$hospital_contact7','$hospital_mobile7','$email_contact7','$hospital_contact8','$hospital_mobile8','$email_contact8','$hospital_contact9','$hospital_mobile9','$email_contact9','$hospital_contact10','$hospital_mobile10','$email_contact10')";
        $qsql = mysqli_query($conn,$sql);

            $text = 'กำลังดำเนินการกรุณารอสักครู่...';
    } else {
        $text = 'ไม่พบข้อมูลกรุณาดำเนินการใหม่อีกครั้ง';
    }

    require_once __DIR__ . '/../views/Loading_page.php';
    require_once __DIR__ . '/../models/daily_report_delete.php';
    echo "<meta http-equiv=refresh content=3;URL=".$_SESSION['thisDomain']."user-contact>"; 
    mysqli_close($conn);
    exit;

}
?>