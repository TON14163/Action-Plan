<?php
@session_start();
// error_reporting(0);
$customer_code = $_POST['customer_code'];
$customer_name = $_POST['customer_name'];
$sale_area = $_POST['sale_area'];
$detail_ckk = $_POST["ckk"];
$id_work = $_POST["id_work"];
$project_name = $_POST["project_name"];
$layers_no = $_POST["layers_no"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$agency = $_POST["agency"];
$sum_price = str_replace(',','',$_POST["sum_price"]);
$approve_name1 = $_POST["approve_name1"];
$approve_tel1 = $_POST["approve_tel1"];
$approve_email1 =$_POST["approve_email1"];
$approve_name2 =$_POST["approve_name2"];
$approve_tel2 =$_POST["approve_tel2"];
$approve_email2 =$_POST["approve_email2"];
$approve_name3 =$_POST["approve_name3"];
$approve_tel3 =$_POST["approve_tel3"];
$approve_email3 =$_POST["approve_email3"];

$product_present1 =$_POST["product_present1"];
$unit1 =$_POST["unit1"];
$price1 =str_replace(',','',$_POST["price1"]);
$date_delivery1 =$_POST["date_delivery1"];
$rival1 =$_POST["rival1"];

$product_present2 =$_POST["product_present2"];
$unit2 =$_POST["unit2"];
$price2 =str_replace(',','',$_POST["price2"]);
$date_delivery2 =$_POST["date_delivery2"];
$rival2 =$_POST["rival2"];

$product_present3 =$_POST["product_present3"];
$unit3 =$_POST["unit3"];
$price3 =str_replace(',','',$_POST["price3"]);
$date_delivery3 =$_POST["date_delivery3"];
$rival3 =$_POST["rival3"];
$add_date = date('Y-m-d H:i:s');

$descript =$_POST["descript"];
$customer_tel = $_POST["customer_tel"];
$fax = $_POST["fax"];
$address_name = $_POST["address_name"];
$province_name = $_POST["province_name"];
$zip_code = $_POST["zip_code"];
$customer_credit = $_POST["customer_credit"];		


if($_SESSION['em_code'] == '49020'){
    $strSQL21 =  "UPDATE tb_customer_hos SET customer_tel = '".$customer_tel."',fax = '".$fax."',address_name = '".$address_name."',province = '".$province_name."',zip_code = '".$zip_code."',customer_credit ='".$customer_credit."' WHERE customer_code='".$customer_code."' ";
    $objQuery21 = mysqli_query($conn,$strSQL21) or die(mysqli_error());	
    // echo $strSQL21.'<hr>';
}

// echo $detail_ckk.'<hr>';
if($detail_ckk == '1'){
    $strSQL1 =  "Update  tb_customer_hos set  detail_ckk ='".$detail_ckk."' where customer_code = '".$customer_code."'";
    $objQuery1 = mysqli_query($conn,$strSQL1) or die(mysqli_error());	
    $strSQL =  "INSERT INTO   tb_newbuiding (customer_id,sale_area,project_name,layers_no,start_date,end_date,agency,sum_price,approve_name1,approve_tel1,approve_email1,approve_name2,approve_tel2,approve_tel3,approve_email2,approve_name3,date_delivery1,approve_email3,product_present1,unit1,price1,rival1,product_present2,unit2,price2,date_delivery2,rival2,product_present3,unit3,price3,date_delivery3,rival3,customer_name,status_newbui,date_update) VALUES ('".$customer_code."','".$sale_area."','".$project_name."','".$layers_no."','".$start_date."','".$end_date."','".$agency."','".$sum_price."','".$approve_name1."','".$approve_tel1."','".$approve_email1."','".$approve_name2."','".$approve_tel2."','".$approve_tel3."','".$approve_email2."','".$approve_name3."','".$date_delivery1."','".$approve_email3."','".$product_present1."','".$unit1."','".$price1."','".$rival1."','".$product_present2."','".$unit2."','".$price2."','".$date_delivery2."','".$rival2."','".$product_present3."','".$unit3."','".$price3."','".$date_delivery3."','".$rival3."','".$customer_name."','1','".$add_date."') ";
    $objQuery = mysqli_query($conn,$strSQL) or die(mysqli_error());

    $sql1 = "select id from tb_newbuiding order by id desc limit 1";
    $query1 = mysqli_query($conn,$sql1);
    $fetch1 = mysqli_fetch_array($query1,MYSQLI_ASSOC);	

    $strSQL2 =  "Update tb_register_data set  remark_newbui ='".$descript."',id_newbui='".$fetch1["id"]."' where id_work ='".$id_work."'";
    $objQuery2 = mysqli_query($conn,$strSQL2) or die(mysqli_error());	

    // echo $strSQL.'<hr>';
    // echo $strSQL1.'<hr>';
    // echo $strSQL2.'<hr>';

}

$text = 'กำลังดำเนินการกรุณารอสักครู่...';
require_once __DIR__ . '/../views/Loading_page.php';
echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."customer_salesave?id_work=".$id_work.">"; 
mysqli_close($conn);
exit; 
?>