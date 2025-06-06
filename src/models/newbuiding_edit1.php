<? include "test.php"; ?>
<?php include "error_page.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<style type="text/css">
<!--
.style8 {color: #6633FF; font-weight: bold; }
.style9 {
	color: #FF0000;
	font-weight: bold;
	font-size: 24px;
}
-->
</style>
</head>
<body>

    <center>
 <?php
include "dbconnect.php";
  //print_r($_POST);
	//exit();
	date_default_timezone_set("Asia/Bangkok");
 $customer_code = $_POST['customer_code'];
 $detail_ckk =$_POST["ckk"];
 $id = $_POST["id"];
 $id_work = $_POST["id_work"];
 $project_name =$_POST["project_name"];
 $layers_no =$_POST["layers_no"];
 $start_date =$_POST["start_date"];
 $end_date =$_POST["end_date"];
 $agency =$_POST["agency"];
 $sum_price =str_replace(',','',$_POST["sum_price"]);
 $approve_name1 =$_POST["approve_name1"];
 $approve_tel1 =$_POST["approve_tel1"];
 $approve_email1 =$_POST["approve_email1"];
  $approve_name2 =$_POST["approve_name2"];
 $approve_tel2 =$_POST["approve_tel2"];
 $approve_email2 =$_POST["approve_email2"];
 $approve_name3 =$_POST["approve_name3"];
 $approve_tel3 =$_POST["approve_tel3"];
 $approve_email3 =$_POST["approve_email3"];
 $status_newbui =$_POST["status_newbui"]; 
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
$date_save = date('Y-m-d'); 
$uername = "$_SESSION[name_show]";
 $descript =$_POST["descript"];



$strSQL =  "Update  tb_newbuiding set  project_name='".$project_name."',layers_no='".$layers_no."',start_date='".$start_date."',end_date='".$end_date."',agency='".$agency."',sum_price='".$sum_price."',approve_name1='".$approve_name1."',approve_tel1='".$approve_tel1."',approve_email1='".$approve_email1."',approve_name2='".$approve_name2."',approve_tel2='".$approve_tel2."',approve_email2='".$approve_email2."',approve_name3='".$approve_name3."',approve_tel3='".$approve_tel3."',approve_email3='".$approve_email3."',product_present1='".$product_present1."',unit1='".$unit1."',price1='".$price1."',date_delivery1='".$date_delivery1."',rival1='".$rival1."',product_present2='".$product_present2."',unit2='".$unit2."',price2='".$price2."',date_delivery2='".$date_delivery2."',rival2='".$rival2."',product_present3='".$product_present3."',unit3='".$unit3."',price3='".$price3."',date_delivery3='".$date_delivery3."',rival3='".$rival3."' where id='".$id."'";


$objQuery = mysqli_query($conn,$strSQL) or die(mysqli_error());
		
if($_SESSION["typelogin"]=='Supervisor'){

$strSQL1 =  "Update  tb_newbuiding set  status_newbui='".$status_newbui."' where id='".$id."'";
$objQuery1 = mysqli_query($conn,$strSQL1) or die(mysqli_error());	
	
}
		
		

if($descript!=''){

$strSQL =  "Update  tb_register_data set id_newbui='".$id."',remark_newbui='".$descript."'  where id_work='".$id_work."'";
$objQuery = mysqli_query($conn,$strSQL) or die(mysqli_error());

$strSQL2 =  "insert into tb_des_newbui (ref_newbui,refid_work,date_save,description,add_by,add_date) 
values('".$id."','".$id_work."','".$date_save."','".$descript."','".$uername."','".$add_date."')";
$objQuery2 = mysqli_query($conn,$strSQL2) or die(mysqli_error());	
	
$strSQL1 =  "Update  tb_newbuiding set  date_update='".$add_date."',status_newbui='3' where id='".$id."'";
$objQuery1 = mysqli_query($conn,$strSQL1) or die(mysqli_error());	
	
}	
	
if($objQuery)
	{
if($id_work!=''){
	//บันทึกเรียบร้อย
echo "<script language=\"JavaScript\">";
echo "alert('บันทึกข้อมูลของท่านเรียบร้อยแล้ว');window.location='customer_salesave.php?customer_code=$customer_code&id_work=$id_work';";
echo "</script>";
}else{
echo "<script language=\"JavaScript\">";
echo "alert('บันทึกข้อมูลของท่านเรียบร้อยแล้ว');window.location='newbuiding_edit.php?customer_code=$customer_code&id=$id';";
echo "</script>";	
	
}
}

else
	{
	print "<img src='images/false.png' /><span class='style9'> บันทึกข้อมูลไม่ได้ </span><br />";
	}
	
	mysql_close();



?>


    </div>
	
</body>
</html>