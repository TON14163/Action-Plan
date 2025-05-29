<?php
// error_reporting(0);
$sqlhos = "SELECT * FROM tb_customer_hos ORDER BY customer_code DESC";
$qsqlhos = mysqli_query($conn,$sqlhos);
$viewsqlhos = mysqli_fetch_array($qsqlhos);
$customer_code = $viewsqlhos['customer_code']+1;
$title_name = $_POST['title_name'];
$customer_name = $_POST['customer_name'];
$customer_tel = $_POST['customer_tel'];
$fax = $_POST['fax'];
$address_name = $_POST['address_name'];
$province = $_POST['province'];
$zip_code = $_POST['zip_code'];
$customer_credit = $_POST['customer_credit'];
$sale_area = $_POST['sale_area'];

$sqlhosIn = "INSERT INTO tb_customer_hos (customer_code,sale_area,title_name,customer_name,address_name,province,zip_code,customer_tel,fax,customer_credit)
VALUES(
'".$customer_code."',
'".$sale_area."',
'".$title_name."',
'".$customer_name."',
'".$address_name."',
'".$province."',
'".$zip_code."',
'".$customer_tel."',
'".$fax."',
'".$customer_credit."'
)
";
$qsqlhosIn = mysqli_query($conn,$sqlhosIn);
// echo $sqlhosIn;
// exit;

$text = 'กำลังดำเนินการกรุณารอสักครู่...';
require_once __DIR__ . '/../views/Loading_page.php';
echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."user-customer&noti=1>"; 
mysqli_close($conn);
exit;
?>