<!-- 
report_start2
?start_date&end_date&sale_code&percent_id&percent
-->
<?php 
ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0); 
?>
<form name="frmSearch" method="GET" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
<center>
<h5>รายงานสรุปการปรับปรุงประมาณการขายตามช่วงเวลา</h5>

<?php
$start_date=$_GET["start_date"];	
$end_date=$_GET["end_date"];	
$percent_id = $_GET["percent_id"];
$percent = $_GET["percent"];
$sale_code = $_GET["sale_code"];
$sasll = $_GET["sasll"];	

if($sale_code!=''){	

}else if($sasll=='1'){	
$sddd = "and sale_area !='S31' and sale_area !='S32' and sale_area !='SM1' and sale_area !='MM1'";	

}else{
if($_SESSION['em_id']=='SS1'){
$sddd = "   and sale_area !='S11'  and sale_area !='S12' and sale_area !='S13'  and sale_area !='S17'  and sale_area !='S23'  and sale_area !='S24'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1'";	

}else if($_SESSION['em_id']=='SS2'){
$sddd = "  and sale_area !='S14'  and sale_area !='S15' and sale_area !='S16'  and sale_area !='S21'  and sale_area !='S22'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1'";	

}else if($_SESSION['em_id']=='SS3'){
$sddd = "  and sale_area ='S31'";
$sfff = "  and sale_code ='S31'"; 
}else{
$sddd = "";		

}
}		

?>
<?php if($sale_code!=''){ ?> <h5>เขตการขาย <?php echo $sale_code; ?></h5>  <?php } ?>
</center>  
</form>


<table class="table-thead-custom-awl table-bordered border-secondary w-100 ">
<tr>
<td bgcolor="#ebe4ed">วันที่ตั้งเรื่อง</td>
<td bgcolor="#ebe4ed">วันที่จะได้รับ PO</td>
<td bgcolor="#ebe4ed">โรงพยาบาล</td> 
<td bgcolor="#ebe4ed">หน่วยงาน</td>
<td bgcolor="#ebe4ed">รายการ</td>
<td bgcolor="#ebe4ed">จำนวน</td>
<td bgcolor="#ebe4ed">มูลค่า</td>
<td bgcolor="#ebe4ed">เปอร์เซ็น</td>
<td bgcolor="#ebe4ed">วันที่คาดว่าจะส่งสินค้า</td>
<td bgcolor="#ebe4ed">เขตการขาย</td>



</tr>
<?php		  

$strSQL1 = "SELECT * FROM tb_register_data where summary_order='0' and summary_product1!='' $sddd";
if($start_date !=""){
$strSQL1 .= ' AND date_update  >= "'.$start_date.'"'; 
}

if($end_date !=""){
$strSQL1 .= ' AND date_update  <= "'.$end_date.'"'; 
}

if($sale_code !=""){
$strSQL1 .= ' AND sale_area = "'.$sale_code.'"'; 
}
if($percent_id !=""){
$strSQL1 .= ' AND percent_id = "'.$percent_id.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);

$i = 0;
$sum = 0;
while($objResult = mysqli_fetch_array($objQuery1))
{

$strSQL = "SELECT percent_name,percent_id  FROM tb_regist_realtime  where id_work ='".$objResult["id_work"]."' and summary_order='0' and summary_product1!=''";

if($start_date !=""){
$strSQL .= ' AND date_update  <= "'.$start_date.'"'; 
}

if($sale_code !=""){
$strSQL .= ' AND sale_area = "'.$sale_code.'"'; 
}
$strSQL .= 'order by id_run DESC'; 	

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult1 = mysqli_fetch_array($objQuery);	



if($objResult1["percent_id"]==$percent){	

$sum +=$objResult["sum_price_product"];	
?>

<tr>

<!--td><?php echo $objResult["id_work"]; ?></td-->

<td  class="style39"  ><?php
$date = explode('-' , $objResult["date_plan"] );
$xdate = $date[2].'-'.$date[1].'-'.$date[0];
echo $xdate;?></td>
<td  class="style39"  ><?php
$ydate = explode('-' , $objResult["month_po"] );
$odate = $ydate[2].'-'.$ydate[1].'-'.$ydate[0];
echo $odate;?></td>	
<td   class="style39" ><?php echo $objResult["hospital_name"];?></td>


<td  class="style39" ><?php echo $objResult["hospital_ward"];?></td>
<td  class="style39" ><?php  echo $objResult["summary_product1"]; ?>
</td>

<td  class="style39" align="right" > <?php if ($objResult["unit_product1"]!='0'){ echo $objResult["unit_product1"]; } ?>&nbsp;<?php echo $objResult["unit_name1"];?>
</td>	

<td  class="style39"  align="right"  ><?php
$sum_price_product=$objResult["sum_price_product"]; echo number_format( $sum_price_product,0).""; ?></td>
<?php

if ($objResult1["percent_id"]=='1'){
?>
<td   class="style39" bgcolor="#00FF00"><?php echo $objResult1["percent_name"]; ?></td>
<?php }else if ($objResult1["percent_id"]=='2'){ ?>
<td   class="style39" bgcolor="#CCFF99"><?php echo $objResult1["percent_name"]; ?></td>
<?php }else if ($objResult1["percent_id"]=='3'){ ?>
<td   class="style39" bgcolor="#FFFF00"><?php echo $objResult1["percent_name"]; ?></td>
<?php
}else if ($objResult1["percent_id"]=='4'){
?>
<td   class="style39" bgcolor="#FF6600"><?php echo $objResult1["percent_name"]; ?></td>
<?php
}else if ($objResult1["percent_id"]=='5'){
?>
<td   class="style39" bgcolor="#FF0000"><?php echo $objResult1["percent_name"]; ?></td>
<?php }else{ ?>
<td   class="style39"><?php echo $objResult1["percent_name"]; ?></td>
<?php } ?>	
<td  class="style39" ><?php
$date1 = explode('-' , $objResult["date_request"] );
$ydate = $date1[2].'-'.$date1[1].'-'.$date1[0];
echo $ydate;?></td>
<td  class="style39" ><?php echo $objResult["sale_area"]; ?></td>


</tr>

<?php
$sum++;
$i++;
}

}
?>

</table>

<table>

<tr>
<td class="style40" align="center"><?php echo 'ยอดรวมทั้งหมด'; ?>&nbsp;&nbsp;<?php echo number_format($sum-$i,0)."";; ?>&nbsp;&nbsp;<?php echo 'บาท'; ?></td>

</tr>
</table>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>