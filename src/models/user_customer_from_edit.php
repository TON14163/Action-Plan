<?php 
$id_edit = $_POST['id_edit'];
// $cus_free0 = $_POST['cus_free0'];
$title_name_edit = $_POST['title_name_edit'];
$customer_name_edit = $_POST['customer_name_edit'];
$customer_tel_edit = $_POST['customer_tel_edit'];
$fax_edit = $_POST['fax_edit'];
$address_name_edit = $_POST['address_name_edit'];
$province_edit = $_POST['province_edit'];
$zip_code_edit = $_POST['zip_code_edit'];
$customer_credit_edit = $_POST['customer_credit_edit'];
$sale_area_edit = $_POST['sale_area_edit'];

$sqlhosUp = "UPDATE tb_customer_hos SET sale_area = '".$sale_area_edit."',title_name = '".$title_name_edit."',customer_name = '".$customer_name_edit."',address_name = '".$address_name_edit."',province = '".$province_edit."',zip_code = '".$zip_code_edit."',customer_tel = '".$customer_tel_edit."',fax = '".$fax_edit."',customer_credit = '".$customer_credit_edit."' WHERE id_hospital = '".$id_edit."' ";
// echo $sqlhosUp;

$qsqlhosUp = mysqli_query($conn,$sqlhosUp);
$text = 'กำลังดำเนินการกรุณารอสักครู่...';
require_once __DIR__ . '/../views/Loading_page.php';
echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."user-customer&noti=2>"; 
mysqli_close($conn);
exit;
?>