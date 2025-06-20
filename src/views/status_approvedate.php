<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
    $dayDF = date('Y-m-d');
    function DateThaiM($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}
?>

<center>
<h2><span class="style15">อนุมัติวันที่ต้องการสินค้า</span></h2>
</center>  
<form name="frmSearch" method="GET" action="<?php echo $url;?>">



<table border="1" width="100%">
<tr>
<td width="10%" align="center" bgcolor="#ebe4ed">วันที่</td>
<td width="18%" align="center" bgcolor="#ebe4ed">โรงพยาบาล</td> 
<td width="15%" align="center" bgcolor="#ebe4ed">หน่วยงาน</td>
<td width="20%" align="center" bgcolor="#ebe4ed">รายการ</td>
<td width="8%" align="center" bgcolor="#ebe4ed">จำนวน</td>
<td width="10%" align="center" bgcolor="#ebe4ed">มูลค่า</td>
<td width="6%" align="center" bgcolor="#ebe4ed">ประเภท</td>
<td width="10%" align="center" bgcolor="#ebe4ed">ผู้แนะนำ</td>
<td width="6%" align="center" bgcolor="#ebe4ed">วันที่ต้องการสินค้าเดิม</td>
<td width="6%" align="center" bgcolor="#ebe4ed">วันที่ต้องการสินค้าใหม่</td>
<td width="10%" align="center" bgcolor="#ebe4ed">วันที่จะได้รับ P/O</td>
<!--td width="10%" align="center" bgcolor="#ebe4ed">วันที่ส่งของ</td-->
<td width="5%" align="center" bgcolor="#ebe4ed">เขตการขาย</td>
<td width="4%" align="center" bgcolor="#ebe4ed">ดูรายละเอียด</td>



</tr>



<?php		  


$strSQL = "SELECT *  FROM tb_appdatesend where  status_doc='Request' ";
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);

?>

<?php
$i = 1;
while($objResult1 = mysqli_fetch_array($objQuery))
{

$strSQL1 = "SELECT *  FROM tb_register_data  where id_work  = '".$objResult1["id_work"]."'";
$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$objResult = mysqli_fetch_array($objQuery1);


?>
<tr>
	
	<td  class="style39"><?php echo DateThaiM($objResult["date_plan"]); ?></td>
<td  class="style39"><?php echo $objResult["hospital_name"];?></td>


<td  class="style39"><?php echo $objResult["hospital_ward"];?></td>
<td  class="style39"><?php  echo $objResult["summary_quote"]; ?>
	<?php  echo $objResult["summary_product1"]; ?>&nbsp;&nbsp; <?php  echo $objResult["remark_pro1"]; ?>
	</td>
	
	<td  class="style39">
		<?php if ($objResult["unit_product1"]!='0') { echo $objResult["unit_product1"]; }?>&nbsp;<?php echo $objResult["unit_name1"];?>
	</td>

<td  class="style39"><?php $sum_price_product=$objResult["sum_price_product"]; echo number_format( $sum_price_product,0).""; ?></td>

<td  class="style39"><?php 

$strSQLty = "SELECT type_code FROM tb_typecus WHERE id = '".$objResult["type_cus"]."' ";
$objQueryty = mysqli_query($conn,$strSQLty) or die(mysqli_error());
$objResultty = mysqli_fetch_array($objQueryty);
			
			
			echo $objResultty["type_code"]; ?></td>
<td  class="style39"><?php  echo $objResult["pre_name"]; ?></td>	
	
<td  class="style39"><?php echo DateThaiM($objResult1["date_sendold"]); ?></td>
<td  class="style39"><?php echo DateThaiM($objResult1["date_sendnew"]); ?></td>


	
<td  class="style39"><?php echo DateThaiM($objResult["month_po"]); ?></td>

<!--td class="style39" ><?php if($objResult["date_request"]!='0000-00-00'){ echo DateThaiM($objResult["date_request"]); } ?></td-->
<td width="15" class="style39"><?php echo $objResult["sale_area"]; ?></td>
<td width="30" align="center"><a href="approve_datedm.php?id_work=<?php echo $objResult["id_work"];?>&id=<?php echo $objResult1["id"];?>"><img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;"></a></td>
	
					</tr>

	<?php
	$i++;
	}
?>

</table>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
