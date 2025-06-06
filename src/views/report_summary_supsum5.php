<?php 
ob_start(); // เปิดใช้งานการเก็บข้อมูล 
error_reporting(0);
session_start();
?>
<h5>รายงานสรุปผลการขายตามช่วงเวลา (Sup)</h5>
<form name="frmSearch" action="<?php echo $url;?>" enctype="multipart/form-data" method="post">
<center>
เขตการขาย :&nbsp;&nbsp;&nbsp;
	
<?php if($_SESSION['em_id']=='SS2'){ ?>	
<select name="sale_code" id="sale_code" style="width:150px" class="styled-select yellow rounded" >
<option value="">**Please Select**</option>
<?php

$strSQL5 = "SELECT * FROM tb_supname where ckk_c ='1' ORDER BY sale_code ASC";

$objQuery5 = mysqli_query($conn,$strSQL5);
while($objResuut5 = mysqli_fetch_array($objQuery5)){
if($_POST["sale_code"] == $objResuut5["sale_code"])
{
$sel = "selected";
}
else
{
$sel = "";
}

	
?>
<option value="<?php echo $objResuut5["sale_code"];?>" <?php echo $sel;?>><?php echo $objResuut5["sale_code"];?> - <?php echo $objResuut5["sale_name"];?></option>
<?php
}
?>
</select>	

<?php }else{ ?> 
<select name="sale_code" id="sale_code" style="width:150px" class="styled-select yellow rounded" >
<option value="">**Please Select**</option>
<?php

$strSQL5 = "SELECT * FROM tb_supname ORDER BY sale_code ASC";

$objQuery5 = mysqli_query($conn,$strSQL5);
while($objResuut5 = mysqli_fetch_array($objQuery5)){
if($_POST["sale_code"] == $objResuut5["sale_code"])
{
$sel = "selected";
}
else
{
$sel = "";
}

	
?>
<option value="<?php echo $objResuut5["sale_code"];?>" <?php echo $sel;?>><?php echo $objResuut5["sale_code"];?> - <?php echo $objResuut5["sale_name"];?></option>
<?php
}
?>
</select>
<?php } ?>	

	
<input type="submit" value="Search"  >	

</p>


</center>






<?php	
	
$sale_code=$_POST["sale_code"];
if($sale_code!=''){	
	
	
if($_POST['sale_code']=='SS1'){

$ddd = " and sale_area !='S11'  and sale_area !='S12' and sale_area !='S13'  and sale_area !='S17'  and sale_area !='S23'  and sale_area !='S24'  and sale_area !='S31' and sale_area !='S32' and sale_area !='SM1' and sale_area !='MM1' ";
$target ="  and ckk_type='0' and  zone_code !='S11'  and zone_code !='S12' and zone_code !='S13'  and zone_code !='S17'  and zone_code !='S23'  and zone_code !='S24'";
$sumall = " and type_arae='1' and  sale_cose !='S11'  and sale_cose !='S12' and sale_cose !='S13'  and sale_cose !='S17'  and sale_cose !='S23'  and sale_cose !='S24'";



}else if($_POST['sale_code']=='SS2'){

$ddd = " and sale_area !='S14'  and sale_area !='S15' and sale_area !='S16'  and sale_area !='S21'  and sale_area !='S22'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1'  and sale_area !='S32'";
$target = " and ckk_type='0' and zone_code !='S14'  and zone_code !='S15' and zone_code !='S16'  and zone_code !='S21'  and zone_code !='S22'";
$sumall = " and type_arae='1' and  sale_cose !='S14'  and sale_cose !='S15' and sale_cose !='S16'  and sale_cose !='S21'  and sale_cose !='S22'";


}else if($_POST['sale_code']=='SS3'){

$ddd = " and sale_area !='S14'  and sale_area !='S15' and sale_area !='S16'  and sale_area !='S21'  and sale_area !='S22'  and sale_area !='S11'  and sale_area !='S12' and sale_area !='S13'  and sale_area !='S17'  and sale_area !='S23'  and sale_area !='S24' ";
$target = " and ckk_type !='0' and ckk_type !='1'  and ckk_type !='2' and ckk_type !='6'";
$sumall = " and type_arae='2' and sale_cose NOT LIKE '%SOL%'";



}else if($_POST['sale_code']=='All'){

$ddd = " and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1'  and sale_area !='S32'";
$target = " and ckk_type ='0' ";
$sumall = " and type_arae='1'";


}	
	
	
?>
	
	
	<br>
<?php	
//date 1	
	
if($_POST["start_date"]!=''){	
$start_date=$_POST["start_date"];
}else{
$start = date('Y-m');
$start_date = "$start-01";
}

	
if($_POST["end_date"]!=''){	
$end_date=$_POST["end_date"];
}else{
$end = date('Y-m');
$moo = date('m');
if($moo=='01' or $moo=='03' or $moo=='05' or $moo=='07' or $moo=='08' or $moo =='10' or $moo=='12'){
$dd ='31';
}else if($moo=='04' or $moo=='06' or $moo=='09' or $moo=='11'){
$dd ='30';	
}else{
$dd ='28';	
}
	
$end_date = "$end-$dd";
}	

	
//date 2
	
if($_POST["start_date1"]!=''){	
$start_date1=$_POST["start_date1"];
}else{
$start1 = date('Y-m', strtotime('-1 month'));
$start_date1 = "$start1-01";
}

	
if($_POST["end_date1"]!=''){	
$end_date1=$_POST["end_date1"];
}else{
$end1 = date('Y-m', strtotime('-1 month'));
$moo1 = date('m', strtotime('-1 month'));
if($moo1=='01' or $moo1=='03' or $moo1=='05' or $moo1=='07' or $moo1=='08' or $moo1 =='10' or $moo1=='12'){
$dd1 ='31';
}else if($moo1=='04' or $moo1=='06' or $moo1=='09' or $moo1=='11'){
$dd1 ='30';	
}else{
$dd1 ='28';	
}
	
$end_date1 = "$end1-$dd1";
}		
	
	
//date 3
	
if($_POST["start_date2"]!=''){	
$start_date2=$_POST["start_date2"];
}else{
$start2 = date('Y-m', strtotime('-2 month'));
$start_date2 = "$start2-01";
}
	
if($_POST["end_date2"]!=''){	
$end_date2=$_POST["end_date2"];
}else{
$end2 = date('Y-m', strtotime('-2 month'));
$moo2 = date('m', strtotime('-2 month'));
if($moo2=='01' or $moo2=='03' or $moo2=='05' or $moo2=='07' or $moo2=='08' or $moo2 =='10' or $moo2=='12'){
$dd2 ='31';
}else if($moo2=='04' or $moo2=='06' or $moo2=='09' or $moo2=='11'){
$dd2 ='30';	
}else{
$dd2 ='28';	
}
	
$end_date2 = "$end2-$dd2";
}	

//date 4
	
if($_POST["start_date3"]!=''){	
$start_date3=$_POST["start_date3"];
}else{
$start3 = date('Y-m', strtotime('-3 month'));
$start_date3 = "$start3-01";
}

	
if($_POST["end_date3"]!=''){	
$end_date3=$_POST["end_date3"];
}else{
$end3 = date('Y-m', strtotime('-3 month'));
$moo3 = date('m', strtotime('-3 month'));
if($moo3=='01' or $moo3=='03' or $moo3=='05' or $moo3=='07' or $moo3=='08' or $moo3=='10' or $moo3=='12'){
$dd3 ='31';
}else if($moo3=='04' or $moo3=='06' or $moo3=='09' or $moo3=='11'){
$dd3 ='30';	
}else{
$dd3 ='28';	
}
	
$end_date3 = "$end3-$dd3";
}	
	
	
//date 5
	
if($_POST["start_date4"]!=''){	
$start_date4=$_POST["start_date4"];
}else{
$start4 = date('Y-m', strtotime('-4 month'));
$start_date4 = "$start4-01";
}

	
if($_POST["end_date4"]!=''){	
$end_date4=$_POST["end_date4"];
}else{
$end4 = date('Y-m', strtotime('-4 month'));
$moo4 = date('m', strtotime('-4 month'));
if($moo4=='01' or $moo4=='03' or $moo4=='05' or $moo4=='07' or $moo4=='08' or $moo4=='10' or $moo4=='12'){
$dd4 ='31';
}else if($moo4=='04' or $moo4=='06' or $moo4=='09' or $moo4=='11'){
$dd4 ='30';	
}else{
$dd4 ='28';	
}
	
$end_date4 = "$end4-$dd4";
}			
		
//date 6
	
if($_POST["start_date5"]!=''){	
$start_date5=$_POST["start_date5"];
}else{
$start5 = date('Y-m', strtotime('-5 month'));
$start_date5 = "$start5-01";
}

	
if($_POST["end_date5"]!=''){	
$end_date5=$_POST["end_date5"];
}else{
$end5 = date('Y-m', strtotime('-5 month'));
$moo5 = date('m', strtotime('-5 month'));
if($moo5=='01' or $moo5=='03' or $moo5=='05' or $moo5=='07' or $moo5=='08' or $moo5 =='10' or $moo5=='12'){
$dd5 ='31';
}else if($moo5=='04' or $moo5=='06' or $moo5=='09' or $moo5=='11'){
$dd5 ='30';	
}else{
$dd5 ='28';	
}
	
$end_date5 = "$end5-$dd5";
}			
	
$date_sum = substr($start_date,0,7);	
$date_sum1 = substr($start_date1,0,7);	
$date_sum2 = substr($start_date2,0,7);	
$date_sum3 = substr($start_date3,0,7);	
$date_sum4 = substr($start_date4,0,7);	
$date_sum5 = substr($start_date5,0,7);	
	
	
?>
	
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <h2><span >รายงานเปรียบเทียบตามวันที่ตั้งเรื่อง</span></h2>	
<table border="1" width="100%">
<tr>
<td width="5%" align="center" bgcolor="#ebe4ed">วันที่ตั้งเรื่อง</td>
<!--td width="10%" align="center" bgcolor="#ebe4ed">วันที่ตั้งเรื่อง(สิ้นสุด)</td--> 
<td width="10%" align="center" bgcolor="#ebe4ed">รอส่งสินค้า</td>
<td width="10%" align="center" bgcolor="#ebe4ed">100 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">90-99 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">80-89 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">50-80 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">0-50 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">FC 80-100%</td>
<td width="10%" align="center" bgcolor="#ebe4ed">ยอดขายสมบูรณ์ (รวม Vat)</td>
</tr>
	
	
<?php

//ปัจจุบัน




	

	
$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1' and  date_request NOT LIKE '%$date_sum%' and summary_product1 !='' $ddd";

if($start_date !=""){ 
$strSQL7 .= ' AND date_plan  >= "'.$start_date.'"'; 
}

if($end_date !=""){
    $strSQL7 .= ' AND date_plan  <= "'.$end_date.'"'; 
}
$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult7= mysqli_fetch_array($objQuery7);
		
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_product1 !='' $ddd";

if($start_date !=""){ 
$strSQL .= ' AND date_plan  >= "'.$start_date.'"'; 
}

if($end_date !=""){
    $strSQL .= ' AND date_plan  <= "'.$end_date.'"'; 
}
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd";

if($start_date !=""){
    $strSQL1 .= ' AND date_plan  >= "'.$start_date.'"'; 
}

if($end_date !=""){
    $strSQL1 .= ' AND date_plan  <= "'.$end_date.'"'; 
}
$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd";

if($start_date !=""){
    $strSQL2 .= ' AND date_plan  >= "'.$start_date.'"'; 
}

if($end_date !=""){
    $strSQL2 .= ' AND date_plan  <= "'.$end_date.'"'; 
}
$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd";

if($start_date !=""){
    $strSQL3 .= ' AND date_plan  >= "'.$start_date.'"'; 
}

if($end_date !=""){
    $strSQL3 .= ' AND date_plan  <= "'.$end_date.'"'; 
}
$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd";

if($start_date !=""){
    $strSQL4 .= ' AND date_plan  >= "'.$start_date.'"'; 
}

if($end_date !=""){
    $strSQL4 .= ' AND date_plan  <= "'.$end_date.'"'; 
}
$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	


$strSQL6 = "SELECT SUM(sum_price_product) AS sum_price_product2 FROM tb_register_data where summary_order ='1' ";

if($start_date !=""){
    $strSQL6 .= ' AND date_request   >= "'.$start_date.'"'; 
}

if($end_date !=""){
    $strSQL6 .= ' AND date_request   <= "'.$end_date.'"'; 
}
			 
if($sale_code !=""){
    $strSQL6 .= ' AND sale_area = "'.$sale_code.'"'; 
}

$objQuery6 = mysqli_query($conn,$strSQL6) or die ("Error Query [".$strSQL6."]");
$Num_Rows6 = mysqli_num_rows($objQuery6);
$objResult6= mysqli_fetch_array($objQuery6);
	
	

	
?>	
	

<tr>
<td align="center"> 
	<?php $start_st = substr($start_date, 0, -3); echo Datethai($start_st); ?>
	<input type='hidden' name = "start_date"  id = "start_date" class="button4"  value="<?php echo $start_date; ?>"  /> </td>

<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date;?>&end_date=<?php echo $end_date;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_sum=<?php echo $date_sum;?>" target="_blank"><font color="black"><?php  echo number_format($objResult7['sum_price_product2'],0).""; ?></font></a>
	</td>		
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date;?>&end_date=<?php echo $end_date;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date;?>&end_date=<?php echo $end_date;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>		
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date;?>&end_date=<?php echo $end_date;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date;?>&end_date=<?php echo $end_date;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF3333">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date;?>&end_date=<?php echo $end_date;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult6['sum_price_product2'],0).""; ?></td>
</tr>

<?php

//ปัจจุบัน
	

	
$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and  date_request NOT LIKE '%$date_sum1%' and summary_product1 !='' $ddd";

if($start_date1 !=""){ 
$strSQL7 .= ' AND date_plan  >= "'.$start_date1.'"'; 
}

if($end_date1 !=""){
    $strSQL7 .= ' AND date_plan  <= "'.$end_date1.'"'; 
}
$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult7= mysqli_fetch_array($objQuery7);
		
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_product1 !='' $ddd";

if($start_date1 !=""){ 
$strSQL .= ' AND date_plan  >= "'.$start_date1.'"'; 
}

if($end_date1 !=""){
    $strSQL .= ' AND date_plan  <= "'.$end_date1.'"'; 
}
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd";

if($start_date1 !=""){
    $strSQL1 .= ' AND date_plan  >= "'.$start_date1.'"'; 
}

if($end_date1 !=""){
    $strSQL1 .= ' AND date_plan  <= "'.$end_date1.'"'; 
}
$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd";

if($start_date1 !=""){
    $strSQL2 .= ' AND date_plan  >= "'.$start_date1.'"'; 
}

if($end_date1 !=""){
    $strSQL2 .= ' AND date_plan  <= "'.$end_date1.'"'; 
}
$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd";

if($start_date1 !=""){
    $strSQL3 .= ' AND date_plan  >= "'.$start_date1.'"'; 
}

if($end_date1 !=""){
    $strSQL3 .= ' AND date_plan  <= "'.$end_date1.'"'; 
}
$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd";

if($start_date1 !=""){
    $strSQL4 .= ' AND date_plan  >= "'.$start_date1.'"'; 
}

if($end_date1 !=""){
    $strSQL4 .= ' AND date_plan  <= "'.$end_date1.'"'; 
}
$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	


$strSQL6 = "SELECT SUM(sum_price_product) AS sum_price_product2 FROM tb_register_data where summary_order ='1' ";

if($start_date1 !=""){
    $strSQL6 .= ' AND date_request   >= "'.$start_date1.'"'; 
}

if($end_date1 !=""){
    $strSQL6 .= ' AND date_request   <= "'.$end_date1.'"'; 
}
			 
if($sale_code !=""){
    $strSQL6 .= ' AND sale_area = "'.$sale_code.'"'; 
}

$objQuery6 = mysqli_query($conn,$strSQL6) or die ("Error Query [".$strSQL6."]");
$Num_Rows6 = mysqli_num_rows($objQuery6);
$objResult6= mysqli_fetch_array($objQuery6);
	
	
?>
	

<tr>
<td align="center"> 
	<?php $start_st1 = substr($start_date1, 0, -3); echo Datethai($start_st1); ?>
	<input type='hidden' name = "start_date1"  id = "start_date1" class="button4"  value="<?php echo $start_date1; ?>"  /> </td>

<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date1;?>&end_date=<?php echo $end_date1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_sum=<?php echo $date_sum1;?>" target="_blank"><font color="black"><?php  echo number_format($objResult7['sum_price_product2'],0).""; ?></font></a>
	</td>		
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date1;?>&end_date=<?php echo $end_date1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date1;?>&end_date=<?php echo $end_date1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>		
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date1;?>&end_date=<?php echo $end_date1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date1;?>&end_date=<?php echo $end_date1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF3333">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date1;?>&end_date=<?php echo $end_date1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult6['sum_price_product2'],0).""; ?></td>
</tr>
	
<?php

//ปัจจุบัน
	

	
$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and  date_request NOT LIKE '%$date_sum2%' and summary_product1 !='' $ddd";

if($start_date2 !=""){ 
$strSQL7 .= ' AND date_plan  >= "'.$start_date2.'"'; 
}

if($end_date2 !=""){
    $strSQL7 .= ' AND date_plan  <= "'.$end_date2.'"'; 
}
$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult7= mysqli_fetch_array($objQuery7);
		
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_product1 !='' $ddd";

if($start_date2 !=""){ 
$strSQL .= ' AND date_plan  >= "'.$start_date2.'"'; 
}

if($end_date2 !=""){
    $strSQL .= ' AND date_plan  <= "'.$end_date2.'"'; 
}
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd";

if($start_date2 !=""){
    $strSQL1 .= ' AND date_plan  >= "'.$start_date2.'"'; 
}

if($end_date2 !=""){
    $strSQL1 .= ' AND date_plan  <= "'.$end_date2.'"'; 
}
$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd";

if($start_date2 !=""){
    $strSQL2 .= ' AND date_plan  >= "'.$start_date2.'"'; 
}

if($end_date2 !=""){
    $strSQL2 .= ' AND date_plan  <= "'.$end_date2.'"'; 
}
$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd";

if($start_date2 !=""){
    $strSQL3 .= ' AND date_plan  >= "'.$start_date2.'"'; 
}

if($end_date2 !=""){
    $strSQL3 .= ' AND date_plan  <= "'.$end_date2.'"'; 
}
$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd";

if($start_date2 !=""){
    $strSQL4 .= ' AND date_plan  >= "'.$start_date2.'"'; 
}

if($end_date2 !=""){
    $strSQL4 .= ' AND date_plan  <= "'.$end_date2.'"'; 
}
$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	


$strSQL6 = "SELECT SUM(sum_price_product) AS sum_price_product2 FROM tb_register_data where summary_order ='1' ";

if($start_date2 !=""){
    $strSQL6 .= ' AND date_request   >= "'.$start_date2.'"'; 
}

if($end_date2 !=""){
    $strSQL6 .= ' AND date_request   <= "'.$end_date2.'"'; 
}
			 
if($sale_code !=""){
    $strSQL6 .= ' AND sale_area = "'.$sale_code.'"'; 
}

$objQuery6 = mysqli_query($conn,$strSQL6) or die ("Error Query [".$strSQL6."]");
$Num_Rows6 = mysqli_num_rows($objQuery6);
$objResult6= mysqli_fetch_array($objQuery6);
	
	
	
?>	
	

<tr>
<td align="center"> 
	<?php $start_st2 = substr($start_date2, 0, -3); echo Datethai($start_st2); ?>
	<input type='hidden' name = "start_date2"  id = "start_date2" class="button4"  value="<?php echo $start_date2; ?>"  /> </td>

<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date2;?>&end_date=<?php echo $end_date2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_sum=<?php echo $date_sum2;?>" target="_blank"><font color="black"><?php  echo number_format($objResult7['sum_price_product2'],0).""; ?></font></a>
	</td>		
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date2;?>&end_date=<?php echo $end_date2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date2;?>&end_date=<?php echo $end_date2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>		
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date2;?>&end_date=<?php echo $end_date2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date2;?>&end_date=<?php echo $end_date2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF3333">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date2;?>&end_date=<?php echo $end_date2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult6['sum_price_product2'],0).""; ?></td>
</tr>
<?php

//ปัจจุบัน
	

	
$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and  date_request NOT LIKE '%$date_sum3%' and summary_product1 !='' $ddd";

if($start_date3 !=""){ 
$strSQL7 .= ' AND date_plan  >= "'.$start_date3.'"'; 
}

if($end_date3 !=""){
    $strSQL7 .= ' AND date_plan  <= "'.$end_date3.'"'; 
}
$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult7= mysqli_fetch_array($objQuery7);
		
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_product1 !='' $ddd";

if($start_date3 !=""){ 
$strSQL .= ' AND date_plan  >= "'.$start_date3.'"'; 
}

if($end_date3 !=""){
    $strSQL .= ' AND date_plan  <= "'.$end_date3.'"'; 
}
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd";

if($start_date3 !=""){
    $strSQL1 .= ' AND date_plan  >= "'.$start_date3.'"'; 
}

if($end_date3 !=""){
    $strSQL1 .= ' AND date_plan  <= "'.$end_date3.'"'; 
}
$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd";

if($start_date3 !=""){
    $strSQL2 .= ' AND date_plan  >= "'.$start_date3.'"'; 
}

if($end_date3 !=""){
    $strSQL2 .= ' AND date_plan  <= "'.$end_date3.'"'; 
}
$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd";

if($start_date3 !=""){
    $strSQL3 .= ' AND date_plan  >= "'.$start_date3.'"'; 
}

if($end_date3 !=""){
    $strSQL3 .= ' AND date_plan  <= "'.$end_date3.'"'; 
}
$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd";

if($start_date3 !=""){
    $strSQL4 .= ' AND date_plan  >= "'.$start_date3.'"'; 
}

if($end_date3 !=""){
    $strSQL4 .= ' AND date_plan  <= "'.$end_date3.'"'; 
}
$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	


$strSQL6 = "SELECT SUM(sum_price_product) AS sum_price_product2 FROM tb_register_data where summary_order ='1' ";

if($start_date3 !=""){
    $strSQL6 .= ' AND date_request   >= "'.$start_date3.'"'; 
}

if($end_date3 !=""){
    $strSQL6 .= ' AND date_request   <= "'.$end_date3.'"'; 
}
			 
if($sale_code !=""){
    $strSQL6 .= ' AND sale_area = "'.$sale_code.'"'; 
}

$objQuery6 = mysqli_query($conn,$strSQL6) or die ("Error Query [".$strSQL6."]");
$Num_Rows6 = mysqli_num_rows($objQuery6);
$objResult6= mysqli_fetch_array($objQuery6);
	
	

	
?>	
	

<tr>
<td align="center"> 
	<?php $start_st3 = substr($start_date3, 0, -3); echo Datethai($start_st3); ?>
	<input type='hidden' name = "start_date3"  id = "start_date3" class="button4"  value="<?php echo $start_date3; ?>"  /> </td>

<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date3;?>&end_date=<?php echo $end_date3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_sum=<?php echo $date_sum3;?>" target="_blank"><font color="black"><?php  echo number_format($objResult7['sum_price_product2'],0).""; ?></font></a>
	</td>		
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date3;?>&end_date=<?php echo $end_date3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date3;?>&end_date=<?php echo $end_date3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>		
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date3;?>&end_date=<?php echo $end_date3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date3;?>&end_date=<?php echo $end_date3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF3333">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date3;?>&end_date=<?php echo $end_date3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult6['sum_price_product2'],0).""; ?></td>
</tr>
<?php

//ปัจจุบัน
	

	
$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and  date_request NOT LIKE '%$date_sum4%' and summary_product1 !='' $ddd";

if($start_date4 !=""){ 
$strSQL7 .= ' AND date_plan  >= "'.$start_date4.'"'; 
}

if($end_date4 !=""){
    $strSQL7 .= ' AND date_plan  <= "'.$end_date4.'"'; 
}
$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult7= mysqli_fetch_array($objQuery7);
		
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_product1 !='' $ddd";

if($start_date4 !=""){ 
$strSQL .= ' AND date_plan  >= "'.$start_date4.'"'; 
}

if($end_date4 !=""){
    $strSQL .= ' AND date_plan  <= "'.$end_date4.'"'; 
}
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd";

if($start_date4 !=""){
    $strSQL1 .= ' AND date_plan  >= "'.$start_date4.'"'; 
}

if($end_date4 !=""){
    $strSQL1 .= ' AND date_plan  <= "'.$end_date4.'"'; 
}
$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd";

if($start_date4 !=""){
    $strSQL2 .= ' AND date_plan  >= "'.$start_date4.'"'; 
}

if($end_date4 !=""){
    $strSQL2 .= ' AND date_plan  <= "'.$end_date4.'"'; 
}
$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd";

if($start_date4 !=""){
    $strSQL3 .= ' AND date_plan  >= "'.$start_date4.'"'; 
}

if($end_date4 !=""){
    $strSQL3 .= ' AND date_plan  <= "'.$end_date4.'"'; 
}
$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd";

if($start_date4 !=""){
    $strSQL4 .= ' AND date_plan  >= "'.$start_date4.'"'; 
}

if($end_date4 !=""){
    $strSQL4 .= ' AND date_plan  <= "'.$end_date4.'"'; 
}
$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	


$strSQL6 = "SELECT SUM(sum_price_product) AS sum_price_product2 FROM tb_register_data where summary_order ='1' ";

if($start_date4 !=""){
    $strSQL6 .= ' AND date_request   >= "'.$start_date4.'"'; 
}

if($end_date4 !=""){
    $strSQL6 .= ' AND date_request   <= "'.$end_date4.'"'; 
}
			 
if($sale_code !=""){
    $strSQL6 .= ' AND sale_area = "'.$sale_code.'"'; 
}

$objQuery6 = mysqli_query($conn,$strSQL6) or die ("Error Query [".$strSQL6."]");
$Num_Rows6 = mysqli_num_rows($objQuery6);
$objResult6= mysqli_fetch_array($objQuery6);
	
	

	
?>	
	

<tr>
<td align="center"> 
	<?php $start_st4 = substr($start_date4, 0, -3); echo Datethai($start_st4); ?>
	<input type='hidden' name = "start_date4"  id = "start_date4" class="button4"  value="<?php echo $start_date4; ?>"  /> </td>

<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date4;?>&end_date=<?php echo $end_date4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_sum=<?php echo $date_sum4;?>" target="_blank"><font color="black"><?php  echo number_format($objResult7['sum_price_product2'],0).""; ?></font></a>
	</td>		
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date4;?>&end_date=<?php echo $end_date4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date4;?>&end_date=<?php echo $end_date4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>		
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date4;?>&end_date=<?php echo $end_date4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date4;?>&end_date=<?php echo $end_date4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF3333">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date4;?>&end_date=<?php echo $end_date4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult6['sum_price_product2'],0).""; ?></td>
</tr>
<?php

//ปัจจุบัน
	

	
$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and  date_request NOT LIKE '%$date_sum5%' and summary_product1 !='' $ddd";

if($start_date5 !=""){ 
$strSQL7 .= ' AND date_plan  >= "'.$start_date5.'"'; 
}

if($end_date5 !=""){
    $strSQL7 .= ' AND date_plan  <= "'.$end_date5.'"'; 
}
$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult7= mysqli_fetch_array($objQuery7);
		
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_product1 !='' $ddd";

if($start_date5 !=""){ 
$strSQL .= ' AND date_plan  >= "'.$start_date5.'"'; 
}

if($end_date5 !=""){
    $strSQL .= ' AND date_plan  <= "'.$end_date5.'"'; 
}
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd";

if($start_date5 !=""){
    $strSQL1 .= ' AND date_plan  >= "'.$start_date5.'"'; 
}

if($end_date5 !=""){
    $strSQL1 .= ' AND date_plan  <= "'.$end_date5.'"'; 
}
$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd";

if($start_date5 !=""){
    $strSQL2 .= ' AND date_plan  >= "'.$start_date5.'"'; 
}

if($end_date5 !=""){
    $strSQL2 .= ' AND date_plan  <= "'.$end_date5.'"'; 
}
$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd";

if($start_date5 !=""){
    $strSQL3 .= ' AND date_plan  >= "'.$start_date5.'"'; 
}

if($end_date5 !=""){
    $strSQL3 .= ' AND date_plan  <= "'.$end_date5.'"'; 
}
$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd";

if($start_date5 !=""){
    $strSQL4 .= ' AND date_plan  >= "'.$start_date5.'"'; 
}

if($end_date5 !=""){
    $strSQL4 .= ' AND date_plan  <= "'.$end_date5.'"'; 
}
$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	


$strSQL6 = "SELECT SUM(sum_price_product) AS sum_price_product2 FROM tb_register_data where summary_order ='1' ";

if($start_date5 !=""){
    $strSQL6 .= ' AND date_request   >= "'.$start_date5.'"'; 
}

if($end_date5 !=""){
    $strSQL6 .= ' AND date_request   <= "'.$end_date5.'"'; 
}
			 
if($sale_code !=""){
    $strSQL6 .= ' AND sale_area = "'.$sale_code.'"'; 
}

$objQuery6 = mysqli_query($conn,$strSQL6) or die ("Error Query [".$strSQL6."]");
$Num_Rows6 = mysqli_num_rows($objQuery6);
$objResult6= mysqli_fetch_array($objQuery6);
	
	

	
?>	
	

<tr>
<td align="center"> 
	<?php $start_st5 = substr($start_date5, 0, -3); echo Datethai($start_st5); ?>
	<input type='hidden' name = "start_date5"  id = "start_date5" class="button4"  value="<?php echo $start_date5; ?>"  /> </td>

<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date5;?>&end_date=<?php echo $end_date5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_sum=<?php echo $date_sum5;?>" target="_blank"><font color="black"><?php  echo number_format($objResult7['sum_price_product2'],0).""; ?></font></a>
	</td>		
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_date=<?php echo $start_date5;?>&end_date=<?php echo $end_date5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date5;?>&end_date=<?php echo $end_date5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>		
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date5;?>&end_date=<?php echo $end_date5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date5;?>&end_date=<?php echo $end_date5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" bgcolor="#FF3333">
	<a href="report_startsup_contact1.php?start_date=<?php echo $start_date5;?>&end_date=<?php echo $end_date5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
	</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult6['sum_price_product2'],0).""; ?></td>
</tr>
	
	
</table>
	
<br>
	


<?php 



if($_POST["start_send"]!=''){	
$start_send=$_POST["start_send"];
}else{
$start_send = "2025-01-01";
}
	
if($_POST["start_send1"]!=''){	
$start_send1=$_POST["start_send1"];
}else{
$start_send1 = "2025-02-01";
}
	
if($_POST["start_send2"]!=''){	
$start_send2=$_POST["start_send2"];
}else{
$start_send2 = "2025-03-01";
}
	
if($_POST["start_send3"]!=''){	
$start_send3=$_POST["start_send3"];
}else{
$start_send3 = "2025-04-01";
}
	
if($_POST["start_send4"]!=''){	
$start_send4=$_POST["start_send4"];
}else{
$start_send4 = "2025-05-01";
}
	
if($_POST["start_send5"]!=''){	
$start_send5=$_POST["start_send5"];
}else{
$start_send5 = "2025-06-01";
}
	
if($_POST["start_send6"]!=''){	
$start_send6=$_POST["start_send6"];
}else{
$start_send6 = "2025-07-01";
}
	
if($_POST["start_send7"]!=''){	
$start_send7=$_POST["start_send7"];
}else{
$start_send7 = "2025-08-01";
}
	
if($_POST["start_send8"]!=''){	
$start_send8=$_POST["start_send8"];
}else{
$start_send8 = "2025-09-01";
}
	
if($_POST["start_send9"]!=''){	
$start_send9=$_POST["start_send9"];
}else{
$start_send9 = "2025-10-01";
}
	
if($_POST["start_send10"]!=''){	
$start_send10=$_POST["start_send10"];
}else{
$start_send10 = "2025-11-01";
}
	
if($_POST["start_send11"]!=''){	
$start_send11=$_POST["start_send11"];
}else{
$start_send11 = "2025-12-01";
}
	
if($_POST["end_send"]!=''){	
$end_send=$_POST["end_send"];
}else{
$end_send = "2025-01-31";
}	
	
if($_POST["end_send1"]!=''){	
$end_send1=$_POST["end_send1"];
}else{
$end_send1 = "2025-02-29";
}	

if($_POST["end_send2"]!=''){	
$end_send2=$_POST["end_send2"];
}else{
$end_send2 = "2025-03-31";
}	
	
if($_POST["end_send3"]!=''){	
$end_send3=$_POST["end_send3"];
}else{
$end_send3 = "2025-04-30";
}	
		
if($_POST["end_send4"]!=''){	
$end_send4=$_POST["end_send4"];
}else{
$end_send4 = "2025-05-31";
}	
		
if($_POST["end_send5"]!=''){	
$end_send5=$_POST["end_send5"];
}else{
$end_send5 = "2025-06-30";
}	
		
if($_POST["end_send6"]!=''){	
$end_send6=$_POST["end_send6"];
}else{
$end_send6 = "2025-07-31";
}	
		
if($_POST["end_send7"]!=''){	
$end_send7=$_POST["end_send7"];
}else{
$end_send7 = "2025-08-31";
}	
		
if($_POST["end_send8"]!=''){	
$end_send8=$_POST["end_send8"];
}else{
$end_send8 = "2025-09-30";
}	
		
if($_POST["end_send9"]!=''){	
$end_send9=$_POST["end_send9"];
}else{
$end_send9 = "2025-10-30";
}	
		
if($_POST["end_send10"]!=''){	
$end_send10=$_POST["end_send10"];
}else{
$end_send10 = "2025-11-30";
}	
		
if($_POST["end_send11"]!=''){	
$end_send11=$_POST["end_send11"];
}else{
$end_send11 = "2025-12-30";
}


$date_summ = substr($start_send,0,7);	
$date_summ1 = substr($start_send1,0,7);	
$date_summ2 = substr($start_send2,0,7);	
$date_summ3 = substr($start_send3,0,7);	
$date_summ4 = substr($start_send4,0,7);	
$date_summ5 = substr($start_send5,0,7);		
$date_summ6 = substr($start_send6,0,7);	
$date_summ7 = substr($start_send7,0,7);	
$date_summ8 = substr($start_send8,0,7);	
$date_summ9 = substr($start_send9,0,7);	
$date_summ10 = substr($start_send10,0,7);	
$date_summ11 = substr($start_send11,0,7);		

	
?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <h2><span >รายงานเปรียบเทียบตามวันที่ปิดการขาย (รับใบสั่งซื้อ)</span></h2>	
<table border="1" width="100%">
<tr>
<td width="5%" align="center" bgcolor="#ebe4ed">วันที่รับใบสั่งซื้อ</td>
<td width="10%" align="center" bgcolor="#ebe4ed">รอส่งสินค้า</td>
<td width="10%" align="center" bgcolor="#ebe4ed">100 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">90-99 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">80-89 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">50-80 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">0-50 %</td>

</tr>	

<?php


$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ%' and summary_order!='2'";

if($start_send !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send.'"'; 
}

if($end_send !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult7= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send.'"'; 
}

if($end_send !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send.'"'; 
}

if($end_send !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send.'"'; 
}

if($end_send !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send.'"'; 
}

if($end_send !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send.'"'; 
}

if($end_send !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		
?>	
	

<tr>
<td align="center">
	<?php $start_sendst = substr($start_send, 0, -3); echo Datethai($start_sendst); ?>
		<input type='hidden' name = "start_send"  id = "start_send" class="button4"  value="<?php echo $start_send; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send;?>&end_order=<?php echo $end_send;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ;?>"  target="_blank"><font color="black"><?php  echo number_format($objResult7['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send;?>&end_order=<?php echo $end_send;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send;?>&end_order=<?php echo $end_send;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send;?>&end_order=<?php echo $end_send;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send;?>&end_order=<?php echo $end_send;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send;?>&end_order=<?php echo $end_send;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>	
	
<?php



$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ1%' and summary_order!='2'";

if($start_send1 !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send1.'"'; 
}

if($end_send1 !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send1.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult71= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send1 !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send1.'"'; 
}

if($end_send1 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send1.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send1 !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send1.'"'; 
}

if($end_send1 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send1.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send1 !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send1.'"'; 
}

if($end_send1 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send1.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send1 !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send1.'"'; 
}

if($end_send1 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send1.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send1 !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send1.'"'; 
}

if($end_send1 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send1.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst1 = substr($start_send1, 0, -3); echo Datethai($start_sendst1); ?>
		<input type='hidden' name = "start_send1"  id = "start_send1" class="button4"  value="<?php echo $start_send1; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send1;?>&end_order=<?php echo $end_send1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ1;?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult71['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send1;?>&end_order=<?php echo $end_send1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send1;?>&end_order=<?php echo $end_send1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send1;?>&end_order=<?php echo $end_send1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send1;?>&end_order=<?php echo $end_send1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send1;?>&end_order=<?php echo $end_send1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>	

<?php



$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ2%' and summary_order!='2'";

if($start_send2 !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send2.'"'; 
}

if($end_send2 !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send2.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult72= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send2 !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send2.'"'; 
}

if($end_send2 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send2.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send2 !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send2.'"'; 
}

if($end_send2 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send2.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send2 !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send2.'"'; 
}

if($end_send2 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send2.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send2 !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send2.'"'; 
}

if($end_send2 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send2.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send2 !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send2.'"'; 
}

if($end_send2 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send2.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst2 = substr($start_send2, 0, -3); echo Datethai($start_sendst2); ?>
		<input type='hidden' name = "start_send2"  id = "start_send2" class="button4"  value="<?php echo $start_send2; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send2;?>&end_order=<?php echo $end_send2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ2;?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult72['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send2;?>&end_order=<?php echo $end_send2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send2;?>&end_order=<?php echo $end_send2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send2;?>&end_order=<?php echo $end_send2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send2;?>&end_order=<?php echo $end_send2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send2;?>&end_order=<?php echo $end_send2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>
<?php



$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ3%' and summary_order!='2'";

if($start_send3 !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send3.'"'; 
}

if($end_send3 !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send3.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult73= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send3 !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send3.'"'; 
}

if($end_send3 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send3.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send3 !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send3.'"'; 
}

if($end_send3 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send3.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send3 !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send3.'"'; 
}

if($end_send3 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send3.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send3 !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send3.'"'; 
}

if($end_send3 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send3.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send3 !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send3.'"'; 
}

if($end_send3 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send3.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst3 = substr($start_send3, 0, -3); echo Datethai($start_sendst3); ?>
		<input type='hidden' name = "start_send3"  id = "start_send3" class="button4"  value="<?php echo $start_send3; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send3;?>&end_order=<?php echo $end_send3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ3;?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult73['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send3;?>&end_order=<?php echo $end_send3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send3;?>&end_order=<?php echo $end_send3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send3;?>&end_order=<?php echo $end_send3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send3;?>&end_order=<?php echo $end_send3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send3;?>&end_order=<?php echo $end_send3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>	
<?php


$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ4%' and summary_order!='2'";

if($start_send4 !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send4.'"'; 
}

if($end_send4 !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send4.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult74= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send4 !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send4.'"'; 
}

if($end_send4 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send4.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send4 !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send4.'"'; 
}

if($end_send4 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send4.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send4 !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send4.'"'; 
}

if($end_send4 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send4.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send4 !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send4.'"'; 
}

if($end_send4 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send4.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send4 !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send4.'"'; 
}

if($end_send4 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send4.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

?>	
	

<tr>
<td align="center">
	<?php $start_sendst4 = substr($start_send4, 0, -3); echo Datethai($start_sendst4); ?>
		<input type='hidden' name = "start_send4"  id = "start_send4" class="button4"  value="<?php echo $start_send4; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send4;?>&end_order=<?php echo $end_send4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ4;?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult74['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send4;?>&end_order=<?php echo $end_send4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send4;?>&end_order=<?php echo $end_send4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send4;?>&end_order=<?php echo $end_send4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send4;?>&end_order=<?php echo $end_send4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send4;?>&end_order=<?php echo $end_send4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>

<?php



$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ5%' and summary_order!='2'";

if($start_send5 !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send5.'"'; 
}

if($end_send5 !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send5.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult75= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send5 !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send5.'"'; 
}

if($end_send5 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send5.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send5 !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send5.'"'; 
}

if($end_send5 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send5.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send5 !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send5.'"'; 
}

if($end_send5 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send5.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send5 !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send5.'"'; 
}

if($end_send5 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send5.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send5 !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send5.'"'; 
}

if($end_send5 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send5.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst5 = substr($start_send5, 0, -3); echo Datethai($start_sendst5); ?>
		<input type='hidden' name = "start_send5"  id = "start_send5" class="button4"  value="<?php echo $start_send5; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send5;?>&end_order=<?php echo $end_send5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ5;?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult75['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send5;?>&end_order=<?php echo $end_send5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send5;?>&end_order=<?php echo $end_send5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send5;?>&end_order=<?php echo $end_send5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send5;?>&end_order=<?php echo $end_send5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send5;?>&end_order=<?php echo $end_send5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>

<?php


$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ6%' and summary_order!='2'";

if($start_send6 !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send6.'"'; 
}

if($end_send6 !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send6.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult76= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send6 !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send6.'"'; 
}

if($end_send6 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send6.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send6 !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send6.'"'; 
}

if($end_send6 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send6.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send6 !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send6.'"'; 
}

if($end_send6 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send6.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send6 !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send6.'"'; 
}

if($end_send6 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send6.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send6 !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send6.'"'; 
}

if($end_send6 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send6.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst6 = substr($start_send6, 0, -3); echo Datethai($start_sendst6); ?>
		<input type='hidden' name = "start_send6"  id = "start_send6" class="button4"  value="<?php echo $start_send6; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send6;?>&end_order=<?php echo $end_send6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ6;?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult76['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send6;?>&end_order=<?php echo $end_send6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send6;?>&end_order=<?php echo $end_send6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send6;?>&end_order=<?php echo $end_send6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send6;?>&end_order=<?php echo $end_send6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send6;?>&end_order=<?php echo $end_send6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>
	
<?php


$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ7%' and summary_order!='2'";

if($start_send7 !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send7.'"'; 
}

if($end_send7 !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send7.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult77= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send7 !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send7.'"'; 
}

if($end_send7 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send7.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send7 !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send7.'"'; 
}

if($end_send7 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send7.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send7 !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send7.'"'; 
}

if($end_send7 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send7.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send7 !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send7.'"'; 
}

if($end_send7 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send7.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send7 !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send7.'"'; 
}

if($end_send7 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send7.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst7 = substr($start_send7, 0, -3); echo Datethai($start_sendst7); ?>
		<input type='hidden' name = "start_send7"  id = "start_send7" class="button4"  value="<?php echo $start_send7; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send7;?>&end_order=<?php echo $end_send7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ7;?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult77['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send7;?>&end_order=<?php echo $end_send7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send7;?>&end_order=<?php echo $end_send7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send7;?>&end_order=<?php echo $end_send7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send7;?>&end_order=<?php echo $end_send7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send7;?>&end_order=<?php echo $end_send7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>
	
<?php



$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ8%' and summary_order!='2'";

if($start_send8 !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send8.'"'; 
}

if($end_send8 !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send8.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult78= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send8 !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send8.'"'; 
}

if($end_send8 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send8.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send8 !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send8.'"'; 
}

if($end_send8 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send8.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send8 !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send8.'"'; 
}

if($end_send8 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send8.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send8 !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send8.'"'; 
}

if($end_send8 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send8.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send8 !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send8.'"'; 
}

if($end_send8 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send8.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst8 = substr($start_send8, 0, -3); echo Datethai($start_sendst8); ?>
		<input type='hidden' name = "start_send8"  id = "start_send8" class="button4"  value="<?php echo $start_send8; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send8;?>&end_order=<?php echo $end_send8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ8;?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult78['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send8;?>&end_order=<?php echo $end_send8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send8;?>&end_order=<?php echo $end_send8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send8;?>&end_order=<?php echo $end_send8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send8;?>&end_order=<?php echo $end_send8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send8;?>&end_order=<?php echo $end_send8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>	

<?php



$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ9%' and summary_order!='2'";

if($start_send9 !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send9.'"'; 
}

if($end_send9 !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send9.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult79= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send9 !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send9.'"'; 
}

if($end_send9 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send9.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send9 !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send9.'"'; 
}

if($end_send9 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send9.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send9 !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send9.'"'; 
}

if($end_send9 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send9.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send9 !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send9.'"'; 
}

if($end_send9 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send9.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send9 !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send9.'"'; 
}

if($end_send9 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send9.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst9 = substr($start_send9, 0, -3); echo Datethai($start_sendst9); ?>
		<input type='hidden' name = "start_send9"  id = "start_send9" class="button4"  value="<?php echo $start_send9; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send9;?>&end_order=<?php echo $end_send9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ9;?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult79['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send9;?>&end_order=<?php echo $end_send9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send9;?>&end_order=<?php echo $end_send9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send9;?>&end_order=<?php echo $end_send9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send9;?>&end_order=<?php echo $end_send9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send9;?>&end_order=<?php echo $end_send9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>	

<?php



$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ10%' and summary_order!='2'";

if($start_send10 !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send10.'"'; 
}

if($end_send10 !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send10.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult710= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send10 !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send10.'"'; 
}

if($end_send10 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send10.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send10 !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send10.'"'; 
}

if($end_send10 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send10.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send10 !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send10.'"'; 
}

if($end_send10 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send10.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send10 !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send10.'"'; 
}

if($end_send10 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send10.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send10 !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send10.'"'; 
}

if($end_send10 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send10.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst10 = substr($start_send10, 0, -3); echo Datethai($start_sendst10); ?>
		<input type='hidden' name = "start_send10"  id = "start_send10" class="button4"  value="<?php echo $start_send10; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send10;?>&end_order=<?php echo $end_send10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ10;?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult710['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send10;?>&end_order=<?php echo $end_send10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send10;?>&end_order=<?php echo $end_send10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send10;?>&end_order=<?php echo $end_send10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send10;?>&end_order=<?php echo $end_send10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send10;?>&end_order=<?php echo $end_send10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>	
	
<?php



$strSQL7 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and date_request NOT LIKE '%$date_summ11%' and summary_order!='2'";

if($start_send11 !=""){ 
$strSQL7 .= ' AND month_po  >= "'.$start_send11.'"'; 
}

if($end_send11 !=""){
$strSQL7 .= ' AND month_po  <= "'.$end_send11.'"'; 
}

$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
$objResult711= mysqli_fetch_array($objQuery7);
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send11 !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send11.'"'; 
}

if($end_send11 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send11.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send11 !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send11.'"'; 
}

if($end_send11 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send11.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send11 !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send11.'"'; 
}

if($end_send11 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send11.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send11 !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send11.'"'; 
}

if($end_send11 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send11.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send11 !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send11.'"'; 
}

if($end_send11 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send11.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst11 = substr($start_send11, 0, -3); echo Datethai($start_sendst11); ?>
		<input type='hidden' name = "start_send11"  id = "start_send11" class="button4"  value="<?php echo $start_send11; ?>"  /> </td>
	
<td align="center" bgcolor="#CC99FF">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send11;?>&end_order=<?php echo $end_send11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&date_summ=<?php echo $date_summ11;?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult711['sum_price_product2'],0).""; ?></font></a>	
</td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_order=<?php echo $start_send11;?>&end_order=<?php echo $end_send11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>	
</td>
<td align="center" bgcolor="#CCFF99">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send11;?>&end_order=<?php echo $end_send11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>	
	</td>	
<td align="center" bgcolor="#FFFF00">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send11;?>&end_order=<?php echo $end_send11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF6600">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send11;?>&end_order=<?php echo $end_send11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#FF0000">
	<a href="report_startsup_contact1.php?start_order=<?php echo $start_send11;?>&end_order=<?php echo $end_send11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>&summ=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>		
</td>

</tr>
	
<?php



$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where  percent_id = '1' and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send !=""){ 
$strSQL .= ' AND month_po  >= "'.$start_send.'"'; 
}

if($end_send11 !=""){
    $strSQL .= ' AND month_po  <= "'.$end_send11.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send !=""){
    $strSQL1 .= ' AND month_po  >= "'.$start_send.'"'; 
}

if($end_send11 !=""){
    $strSQL1 .= ' AND month_po  <= "'.$end_send11.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send !=""){
    $strSQL2 .= ' AND month_po  >= "'.$start_send.'"'; 
}

if($end_send11 !=""){
    $strSQL2 .= ' AND month_po  <= "'.$end_send11.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send !=""){
    $strSQL3 .= ' AND month_po  >= "'.$start_send.'"'; 
}

if($end_send11 !=""){
    $strSQL3 .= ' AND month_po  <= "'.$end_send11.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);

$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_product1 !='' $ddd and summary_order!='2'";

if($start_send !=""){
    $strSQL4 .= ' AND month_po  >= "'.$start_send.'"'; 
}

if($end_send11 !=""){
    $strSQL4 .= ' AND month_po  <= "'.$end_send11.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4= mysqli_fetch_array($objQuery4);
	

		

	
?>	
		
		
<tr>
<td align="center">ยอดรวม</td>
<td align="center" bgcolor="#CC99FF"><?php  echo number_format($objResult7['sum_price_product2']+$objResult71['sum_price_product2']+$objResult72['sum_price_product2']+$objResult73['sum_price_product2']+$objResult74['sum_price_product2']+$objResult75['sum_price_product2']+$objResult76['sum_price_product2']+$objResult77['sum_price_product2']+$objResult78['sum_price_product2']+$objResult79['sum_price_product2']+$objResult710['sum_price_product2']+$objResult711['sum_price_product2'],0).""; ?></td>
<td align="center" bgcolor="#00FF00"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></td>
<td align="center" bgcolor="#CCFF99"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></td>	
<td align="center" bgcolor="#FFFF00"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" bgcolor="#FF6600"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></td>
<td align="center" bgcolor="#FF0000"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></td>
</tr>		
	
</table>	
<br>	
	
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <h2><span >รายงานเปรียบเทียบตามวันที่ส่งสินค้า (Forcast) ปี 2568</span></h2>	
<table border="1" width="100%">
<tr>
<td width="10%" align="center" bgcolor="#ebe4ed">วันที่ส่งสินค้า</td>
<!--td width="10%" align="center" bgcolor="#ebe4ed">รอส่งสินค้า</td-->
<td width="10%" align="center" bgcolor="#ebe4ed">100 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">90-99 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">80-89 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">50-80 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">0-50 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">FC 90-100%</td>
<td width="10%" align="center" bgcolor="#ebe4ed">FC 80-100%</td>
<td width="10%" align="center" bgcolor="#ebe4ed">ยอดขายจริง</td>
<td width="10%" align="center" bgcolor="#ebe4ed">Target</td>
</tr>

	
<?php



$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send.'"'; 
}

if($end_send !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send.'"'; 
}

if($end_send !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send.'"'; 
}

if($end_send !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send.'"'; 
}

if($end_send !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send.'"'; 
}

if($end_send !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."' $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'  $sumall";
$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst = substr($start_send, 0, -3); echo Datethai($start_sendst); ?>
	<input type='hidden' name = "start_send"  id = "start_send" class="button4"  value="<?php echo $start_send; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send;?>&end_send=<?php echo $end_send;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send;?>&end_send=<?php echo $end_send;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send;?>&end_send=<?php echo $end_send;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send;?>&end_send=<?php echo $end_send;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send;?>&end_send=<?php echo $end_send;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
<?php



$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send1 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send1.'"'; 
}

if($end_send1 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send1.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send1 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send1.'"'; 
}

if($end_send1 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send1.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send1 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send1.'"'; 
}

if($end_send1 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send1.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send1 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send1.'"'; 
}

if($end_send1 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send1.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send1 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send1.'"'; 
}

if($end_send1 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send1.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send1, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."' $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'     $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst1 = substr($start_send1, 0, -3); echo Datethai($start_sendst1); ?>
	<input type='hidden' name = "start_send1"  id = "start_send1" class="button4"  value="<?php echo $start_send1; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send1;?>&end_send=<?php echo $end_send1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send1;?>&end_send=<?php echo $end_send1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send1;?>&end_send=<?php echo $end_send1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send1;?>&end_send=<?php echo $end_send1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send1;?>&end_send=<?php echo $end_send1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>

<?php



$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send2 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send2.'"'; 
}

if($end_send2 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send2.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send2 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send2.'"'; 
}

if($end_send2 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send2.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send2 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send2.'"'; 
}

if($end_send2 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send2.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send2 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send2.'"'; 
}

if($end_send2 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send2.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send2 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send2.'"'; 
}

if($end_send2 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send2.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send2, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'  $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst2 = substr($start_send2, 0, -3); echo Datethai($start_sendst2); ?>
	<input type='hidden' name = "start_send2"  id = "start_send2" class="button4"  value="<?php echo $start_send2; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send2;?>&end_send=<?php echo $end_send2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send2;?>&end_send=<?php echo $end_send2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send2;?>&end_send=<?php echo $end_send2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send2;?>&end_send=<?php echo $end_send2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send2;?>&end_send=<?php echo $end_send2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>

<?php



$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send3 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send3.'"'; 
}

if($end_send3 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send3.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send3 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send3.'"'; 
}

if($end_send3 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send3.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send3 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send3.'"'; 
}

if($end_send3 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send3.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send3 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send3.'"'; 
}

if($end_send3 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send3.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send3 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send3.'"'; 
}

if($end_send3 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send3.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send3, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'  $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst3 = substr($start_send3, 0, -3); echo Datethai($start_sendst3); ?>
	<input type='hidden' name = "start_send3"  id = "start_send3" class="button4"  value="<?php echo $start_send3; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send3;?>&end_send=<?php echo $end_send3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send3;?>&end_send=<?php echo $end_send3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send3;?>&end_send=<?php echo $end_send3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send3;?>&end_send=<?php echo $end_send3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send3;?>&end_send=<?php echo $end_send3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>

<?php



$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send4 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send4.'"'; 
}

if($end_send4 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send4.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send4 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send4.'"'; 
}

if($end_send4 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send4.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send4 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send4.'"'; 
}

if($end_send4 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send4.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send4 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send4.'"'; 
}

if($end_send4 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send4.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send4 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send4.'"'; 
}

if($end_send4 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send4.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send4, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'  $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst4 = substr($start_send4, 0, -3); echo Datethai($start_sendst4); ?>
	<input type='hidden' name = "start_send4"  id = "start_send4" class="button4"  value="<?php echo $start_send4; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send4;?>&end_send=<?php echo $end_send4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send4;?>&end_send=<?php echo $end_send4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send4;?>&end_send=<?php echo $end_send4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send4;?>&end_send=<?php echo $end_send4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send4;?>&end_send=<?php echo $end_send4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
<?php


$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send5 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send5.'"'; 
}

if($end_send5 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send5.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send5 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send5.'"'; 
}

if($end_send5 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send5.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send5 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send5.'"'; 
}

if($end_send5 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send5.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send5 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send5.'"'; 
}

if($end_send5 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send5.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send5 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send5.'"'; 
}

if($end_send5 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send5.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send5, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'  $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst5 = substr($start_send5, 0, -3); echo Datethai($start_sendst5); ?>
	<input type='hidden' name = "start_send5"  id = "start_send5" class="button4"  value="<?php echo $start_send5; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send5;?>&end_send=<?php echo $end_send5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send5;?>&end_send=<?php echo $end_send5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send5;?>&end_send=<?php echo $end_send5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send5;?>&end_send=<?php echo $end_send5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send5;?>&end_send=<?php echo $end_send5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
<?php



$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send6 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send6.'"'; 
}

if($end_send6 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send6.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send6 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send6.'"'; 
}

if($end_send6 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send6.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send6 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send6.'"'; 
}

if($end_send6 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send6.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send6 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send6.'"'; 
}

if($end_send6 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send6.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send6 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send6.'"'; 
}

if($end_send6 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send6.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send6, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'  $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst6 = substr($start_send6, 0, -3); echo Datethai($start_sendst6); ?>
	<input type='hidden' name = "start_send6"  id = "start_send6" class="button4"  value="<?php echo $start_send6; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send6;?>&end_send=<?php echo $end_send6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send6;?>&end_send=<?php echo $end_send6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send6;?>&end_send=<?php echo $end_send6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send6;?>&end_send=<?php echo $end_send6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send6;?>&end_send=<?php echo $end_send6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
<?php


$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send7 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send7.'"'; 
}

if($end_send7 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send7.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send7 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send7.'"'; 
}

if($end_send7 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send7.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send7 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send7.'"'; 
}

if($end_send7 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send7.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send7 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send7.'"'; 
}

if($end_send7 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send7.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send7 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send7.'"'; 
}

if($end_send7 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send7.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send7, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'  $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst7 = substr($start_send7, 0, -3); echo Datethai($start_sendst7); ?>
	<input type='hidden' name = "start_send7"  id = "start_send7" class="button4"  value="<?php echo $start_send7; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send7;?>&end_send=<?php echo $end_send7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send7;?>&end_send=<?php echo $end_send7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send7;?>&end_send=<?php echo $end_send7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send7;?>&end_send=<?php echo $end_send7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send7;?>&end_send=<?php echo $end_send7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
<?php



$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send8 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send8.'"'; 
}

if($end_send8 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send8.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send8 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send8.'"'; 
}

if($end_send8 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send8.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send8 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send8.'"'; 
}

if($end_send8 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send8.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send8 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send8.'"'; 
}

if($end_send8 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send8.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send8 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send8.'"'; 
}

if($end_send8 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send8.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send8, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'  $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		
	
	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst8 = substr($start_send8, 0, -3); echo Datethai($start_sendst8); ?>
	<input type='hidden' name = "start_send8"  id = "start_send8" class="button4"  value="<?php echo $start_send8; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send8;?>&end_send=<?php echo $end_send8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send8;?>&end_send=<?php echo $end_send8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send8;?>&end_send=<?php echo $end_send8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send8;?>&end_send=<?php echo $end_send8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send8;?>&end_send=<?php echo $end_send8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>

<?php


$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send9 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send9.'"'; 
}

if($end_send9 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send9.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send9 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send9.'"'; 
}

if($end_send9 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send9.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send9 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send9.'"'; 
}

if($end_send9 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send9.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send9 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send9.'"'; 
}

if($end_send9 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send9.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send9 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send9.'"'; 
}

if($end_send9 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send9.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send9, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'  $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst9 = substr($start_send9, 0, -3); echo Datethai($start_sendst9); ?>
	<input type='hidden' name = "start_send9"  id = "start_send9" class="button4"  value="<?php echo $start_send9; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send9;?>&end_send=<?php echo $end_send9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send9;?>&end_send=<?php echo $end_send9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send9;?>&end_send=<?php echo $end_send9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send9;?>&end_send=<?php echo $end_send9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send9;?>&end_send=<?php echo $end_send9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>

<?php


$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send10 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send10.'"'; 
}

if($end_send10 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send10.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send10 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send10.'"'; 
}

if($end_send10 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send10.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send10 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send10.'"'; 
}

if($end_send10 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send10.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send10 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send10.'"'; 
}

if($end_send10 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send10.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send10 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send10.'"'; 
}

if($end_send10 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send10.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send10, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'  $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		

	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst10 = substr($start_send10, 0, -3); echo Datethai($start_sendst10); ?>
	<input type='hidden' name = "start_send10"  id = "start_send10" class="button4"  value="<?php echo $start_send10; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send10;?>&end_send=<?php echo $end_send10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send10;?>&end_send=<?php echo $end_send10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send10;?>&end_send=<?php echo $end_send10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send10;?>&end_send=<?php echo $end_send10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send10;?>&end_send=<?php echo $end_send10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
<?php


$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send11 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send11.'"'; 
}

if($end_send11 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send11.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send11 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send11.'"'; 
}

if($end_send11 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send11.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send11 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send11.'"'; 
}

if($end_send11 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send11.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send11 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send11.'"'; 
}

if($end_send11 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send11.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send11 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send11.'"'; 
}

if($end_send11 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send11.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_send11, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
	
$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum = '".$start_st."'  $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_sendst11 = substr($start_send11, 0, -3); echo Datethai($start_sendst11); ?>
	<input type='hidden' name = "start_send11"  id = "start_send11" class="button4"  value="<?php echo $start_send11; ?>"  /> </td>

	
<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send11;?>&end_send=<?php echo $end_send11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send11;?>&end_send=<?php echo $end_send11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send11;?>&end_send=<?php echo $end_send11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send11;?>&end_send=<?php echo $end_send11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_send=<?php echo $start_send11;?>&end_send=<?php echo $end_send11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>

<?php
	

$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_send.'"'; 
}

if($end_send11 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_send11.'"'; 
}
			 
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_send.'"'; 
}

if($end_send11 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_send11.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_send.'"'; 
}

if($end_send11 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_send11.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_send.'"'; 
}

if($end_send11 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_send11.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_send !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_send.'"'; 
}

if($end_send11 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_send11.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st11 = substr($start_send, 0, -6);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no LIKE '%".$start_st11."%'  $target";

$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);

$strSQL5 = "SELECT SUM(sum_awl) As sum_awl,SUM(sum_nbm) As sum_nbm   FROM tb_sumall WHERE  month_sum LIKE '%".$start_st11."%'  $sumall";

$objQuery5 = mysqli_query($sol,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$sum_awl = $objResult5['sum_awl'];
$sum_nbm = $objResult5['sum_nbm'];
$sum_all = $sum_awl+$sum_nbm;
	
	
	
?>	
	

<tr>
<td align="center">ยอดรวม</td>
<td align="center" bgcolor="#00FF00"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></td>
<td align="center" bgcolor="#CCFF99"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></td>	
<td align="center" bgcolor="#FFFF00"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" bgcolor="#FF6600"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></td>
<td align="center" bgcolor="#FF3333"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($sum_all,0).""; ?></td>	
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>	
</tr>	

	
</table>	
<br>
<?php

	if($_POST["start_nd"]!=''){	
$start_nd=$_POST["start_nd"];
}else{
$start_nd = "2026-01-01";
}
	
if($_POST["start_nd1"]!=''){	
$start_nd1=$_POST["start_nd1"];
}else{
$start_nd1 = "2026-02-01";
}
	
if($_POST["start_nd2"]!=''){	
$start_nd2=$_POST["start_nd2"];
}else{
$start_nd2 = "2026-03-01";
}
	
if($_POST["start_nd3"]!=''){	
$start_nd3=$_POST["start_nd3"];
}else{
$start_nd3 = "2026-04-01";
}
	
if($_POST["start_nd4"]!=''){	
$start_nd4=$_POST["start_nd4"];
}else{
$start_nd4 = "2026-05-01";
}
	
if($_POST["start_nd5"]!=''){	
$start_nd5=$_POST["start_nd5"];
}else{
$start_nd5 = "2026-06-01";
}
	
if($_POST["start_nd6"]!=''){	
$start_nd6=$_POST["start_nd6"];
}else{
$start_nd6 = "2026-07-01";
}	

if($_POST["start_nd7"]!=''){	
$start_nd7=$_POST["start_nd7"];
}else{
$start_nd7 = "2026-08-01";
}	

if($_POST["start_nd8"]!=''){	
$start_nd8=$_POST["start_nd8"];
}else{
$start_nd8 = "2026-09-01";
}	

if($_POST["start_nd9"]!=''){	
$start_nd9=$_POST["start_nd9"];
}else{
$start_nd9 = "2026-10-01";
}	

if($_POST["start_nd10"]!=''){	
$start_nd10=$_POST["start_nd10"];
}else{
$start_nd10 = "2026-11-01";
}	

if($_POST["start_nd11"]!=''){	
$start_nd11=$_POST["start_nd11"];
}else{
$start_nd11 = "2026-12-01";
}		

	
if($_POST["end_nd"]!=''){	
$end_nd=$_POST["end_nd"];
}else{
$end_nd = "2026-01-31";
}	
	
if($_POST["end_nd1"]!=''){	
$end_nd1=$_POST["end_nd1"];
}else{
$end_nd1 = "2026-02-28";
}	

if($_POST["end_nd2"]!=''){	
$end_nd2=$_POST["end_nd2"];
}else{
$end_nd2 = "2026-03-31";
}	
	
if($_POST["end_nd3"]!=''){	
$end_nd3=$_POST["end_nd3"];
}else{
$end_nd3 = "2026-04-30";
}	
		
if($_POST["end_nd4"]!=''){	
$end_nd4=$_POST["end_nd4"];
}else{
$end_nd4 = "2026-05-31";
}	
		
if($_POST["end_nd5"]!=''){	
$end_nd5=$_POST["end_nd5"];
}else{
$end_nd5 = "2026-06-30";
}	
	
if($_POST["end_nd6"]!=''){	
$end_nd5=$_POST["end_nd6"];
}else{
$end_nd6 = "2026-07-31";
}	


if($_POST["end_nd7"]!=''){	
$end_nd7=$_POST["end_nd7"];
}else{
$end_nd7 = "2026-08-31";
}	

if($_POST["end_nd8"]!=''){	
$end_nd8=$_POST["end_nd8"];
}else{
$end_nd8 = "2026-09-30";
}	

if($_POST["end_nd9"]!=''){	
$end_nd9=$_POST["end_nd9"];
}else{
$end_nd9 = "2026-10-31";
}	

if($_POST["end_nd10"]!=''){	
$end_nd10=$_POST["end_nd10"];
}else{
$end_nd10 = "2026-11-30";
}	

if($_POST["end_nd11"]!=''){	
$end_nd11=$_POST["end_nd11"];
}else{
$end_nd11 = "2026-12-31";
}		


?>	

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <h2><span >รายงานเปรียบเทียบตามวันที่ส่งสินค้า (Forcast) ปี 2569</span></h2>	
<table border="1" width="100%">
<tr>
<td width="10%" align="center" bgcolor="#ebe4ed">วันที่ส่งสินค้า</td>
<!--td width="10%" align="center" bgcolor="#ebe4ed">รอส่งสินค้า</td-->
<td width="10%" align="center" bgcolor="#ebe4ed">100 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">90-99 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">80-89 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">50-80 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">0-50 %</td>
<td width="10%" align="center" bgcolor="#ebe4ed">FC 90-100%</td>
<td width="10%" align="center" bgcolor="#ebe4ed">FC 80-100%</td>
<td width="10%" align="center" bgcolor="#ebe4ed">Target</td>
</tr>


<?php

	
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd.'"'; 
}

if($end_nd !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd.'"'; 
}

if($end_nd !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd.'"'; 
}

if($end_nd !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd.'"'; 
}

if($end_nd !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd.'"'; 
}

if($end_nd !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_ndst = substr($start_nd, 0, -3); echo Datethai($start_ndst); ?>
	<input type='hidden' name = "start_nd"  id = "start_nd" class="button4"  value="<?php echo $start_nd; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd;?>&end_nd=<?php echo $end_nd;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd;?>&end_nd=<?php echo $end_nd;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd;?>&end_nd=<?php echo $end_nd;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd;?>&end_nd=<?php echo $end_nd;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd;?>&end_nd=<?php echo $end_nd;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>

	

<?php

	
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd1 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd1.'"'; 
}

if($end_nd1 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd1.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd1 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd1.'"'; 
}

if($end_nd1 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd1.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd1 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd1.'"'; 
}

if($end_nd1 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd1.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd1 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd1.'"'; 
}

if($end_nd1 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd1.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd1 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd1.'"'; 
}

if($end_nd1 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd1.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd1, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_ndst1 = substr($start_nd1, 0, -3); echo Datethai($start_ndst1); ?>
	<input type='hidden' name = "start_nd1"  id = "start_nd1" class="button4"  value="<?php echo $start_nd1; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd1;?>&end_nd=<?php echo $end_nd1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd1;?>&end_nd=<?php echo $end_nd1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd1;?>&end_nd=<?php echo $end_nd1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd1;?>&end_nd=<?php echo $end_nd1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd1;?>&end_nd=<?php echo $end_nd1;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	

<?php

	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd2 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd2.'"'; 
}

if($end_nd2 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd2.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd2 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd2.'"'; 
}

if($end_nd2 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd2.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd2 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd2.'"'; 
}

if($end_nd2 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd2.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd2 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd2.'"'; 
}

if($end_nd2 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd2.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd2 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd2.'"'; 
}

if($end_nd2 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd2.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd2, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		

?>	
	

<tr>
<td align="center">
	<?php $start_ndst2 = substr($start_nd2, 0, -3); echo Datethai($start_ndst2); ?>
	<input type='hidden' name = "start_nd2"  id = "start_nd2" class="button4"  value="<?php echo $start_nd2; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd2;?>&end_nd=<?php echo $end_nd2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd2;?>&end_nd=<?php echo $end_nd2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd2;?>&end_nd=<?php echo $end_nd2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd2;?>&end_nd=<?php echo $end_nd2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd2;?>&end_nd=<?php echo $end_nd2;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>


<?php
	
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd3 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd3.'"'; 
}

if($end_nd3 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd3.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd3 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd3.'"'; 
}

if($end_nd3 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd3.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd3 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd3.'"'; 
}

if($end_nd3 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd3.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd3 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd3.'"'; 
}

if($end_nd3 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd3.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd3 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd3.'"'; 
}

if($end_nd3 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd3.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd3, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_ndst3 = substr($start_nd3, 0, -3); echo Datethai($start_ndst3); ?>
	<input type='hidden' name = "start_nd3"  id = "start_nd3" class="button4"  value="<?php echo $start_nd3; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd3;?>&end_nd=<?php echo $end_nd3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd3;?>&end_nd=<?php echo $end_nd3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd3;?>&end_nd=<?php echo $end_nd3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd3;?>&end_nd=<?php echo $end_nd3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd3;?>&end_nd=<?php echo $end_nd3;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>


<?php
	
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd4 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd4.'"'; 
}

if($end_nd4 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd4.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd4 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd4.'"'; 
}

if($end_nd4 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd4.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd4 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd4.'"'; 
}

if($end_nd4 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd4.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd4 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd4.'"'; 
}

if($end_nd4 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd4.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd4 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd4.'"'; 
}

if($end_nd4 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd4.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd4, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_ndst4 = substr($start_nd4, 0, -3); echo Datethai($start_ndst4); ?>
	<input type='hidden' name = "start_nd4"  id = "start_nd4" class="button4"  value="<?php echo $start_nd4; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd4;?>&end_nd=<?php echo $end_nd4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd4;?>&end_nd=<?php echo $end_nd4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd4;?>&end_nd=<?php echo $end_nd4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd4;?>&end_nd=<?php echo $end_nd4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd4;?>&end_nd=<?php echo $end_nd4;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	

<?php

	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd5 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd5.'"'; 
}

if($end_nd5 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd5.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd5 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd5.'"'; 
}

if($end_nd5 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd5.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd5 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd5.'"'; 
}

if($end_nd5 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd5.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd5 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd5.'"'; 
}

if($end_nd5 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd5.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd5 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd5.'"'; 
}

if($end_nd5 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd5.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd5, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_ndst5 = substr($start_nd5, 0, -3); echo Datethai($start_ndst5); ?>
	<input type='hidden' name = "start_nd5"  id = "start_nd5" class="button4"  value="<?php echo $start_nd5; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd5;?>&end_nd=<?php echo $end_nd5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd5;?>&end_nd=<?php echo $end_nd5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd5;?>&end_nd=<?php echo $end_nd5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd5;?>&end_nd=<?php echo $end_nd5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd5;?>&end_nd=<?php echo $end_nd5;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
<?php
	
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd6 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd6.'"'; 
}

if($end_nd6 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd6.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd6 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd6.'"'; 
}

if($end_nd6 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd6.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd6 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd6.'"'; 
}

if($end_nd6 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd6.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd6 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd6.'"'; 
}

if($end_nd6 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd6.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd6 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd6.'"'; 
}

if($end_nd6 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd6.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd6, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_ndst6 = substr($start_nd6, 0, -3); echo Datethai($start_ndst6); ?>
	<input type='hidden' name = "start_nd6"  id = "start_nd6" class="button4"  value="<?php echo $start_nd6; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd6;?>&end_nd=<?php echo $end_nd6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd6;?>&end_nd=<?php echo $end_nd6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd6;?>&end_nd=<?php echo $end_nd6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd6;?>&end_nd=<?php echo $end_nd6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd6;?>&end_nd=<?php echo $end_nd6;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
<?php

	
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd7 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd7.'"'; 
}

if($end_nd7 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd7.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd7 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd7.'"'; 
}

if($end_nd7 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd7.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd7 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd7.'"'; 
}

if($end_nd7 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd7.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd7 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd7.'"'; 
}

if($end_nd7 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd7.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd7 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd7.'"'; 
}

if($end_nd7 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd7.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd7, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_ndst7 = substr($start_nd7, 0, -3); echo Datethai($start_ndst7); ?>
	<input type='hidden' name = "start_nd7"  id = "start_nd7" class="button4"  value="<?php echo $start_nd7; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd7;?>&end_nd=<?php echo $end_nd7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd7;?>&end_nd=<?php echo $end_nd7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd7;?>&end_nd=<?php echo $end_nd7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd7;?>&end_nd=<?php echo $end_nd7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd7;?>&end_nd=<?php echo $end_nd7;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
	
<?php
	
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd8 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd8.'"'; 
}

if($end_nd8 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd8.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd8 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd8.'"'; 
}

if($end_nd8 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd8.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd8 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd8.'"'; 
}

if($end_nd8 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd8.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd8 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd8.'"'; 
}

if($end_nd8 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd8.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd8 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd8.'"'; 
}

if($end_nd8 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd8.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd8, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_ndst8 = substr($start_nd8, 0, -3); echo Datethai($start_ndst8); ?>
	<input type='hidden' name = "start_nd8"  id = "start_nd8" class="button4"  value="<?php echo $start_nd8; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd8;?>&end_nd=<?php echo $end_nd8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd8;?>&end_nd=<?php echo $end_nd8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd8;?>&end_nd=<?php echo $end_nd8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd8;?>&end_nd=<?php echo $end_nd8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd8;?>&end_nd=<?php echo $end_nd8;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
<?php
	
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd9 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd9.'"'; 
}

if($end_nd9 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd9.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd9 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd9.'"'; 
}

if($end_nd9 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd9.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd9 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd9.'"'; 
}

if($end_nd9 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd9.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd9 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd9.'"'; 
}

if($end_nd9 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd9.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd9 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd9.'"'; 
}

if($end_nd9 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd9.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd9, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_ndst9 = substr($start_nd9, 0, -3); echo Datethai($start_ndst9); ?>
	<input type='hidden' name = "start_nd9"  id = "start_nd9" class="button4"  value="<?php echo $start_nd9; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd9;?>&end_nd=<?php echo $end_nd9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd9;?>&end_nd=<?php echo $end_nd9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd9;?>&end_nd=<?php echo $end_nd9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd9;?>&end_nd=<?php echo $end_nd9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd9;?>&end_nd=<?php echo $end_nd9;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
<?php
	
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd10 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd10.'"'; 
}

if($end_nd10 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd10.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd10 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd10.'"'; 
}

if($end_nd10 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd10.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd10 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd10.'"'; 
}

if($end_nd10 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd10.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd10 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd10.'"'; 
}

if($end_nd10 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd10.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd10 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd10.'"'; 
}

if($end_nd10 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd10.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd10, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_ndst10 = substr($start_nd10, 0, -3); echo Datethai($start_ndst10); ?>
	<input type='hidden' name = "start_nd10"  id = "start_nd10" class="button4"  value="<?php echo $start_nd10; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd10;?>&end_nd=<?php echo $end_nd10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd10;?>&end_nd=<?php echo $end_nd10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd10;?>&end_nd=<?php echo $end_nd10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd10;?>&end_nd=<?php echo $end_nd10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd10;?>&end_nd=<?php echo $end_nd10;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
	
<?php
	
	
$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd11 !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd11.'"'; 
}

if($end_nd11 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd11.'"'; 
}

$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd11 !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd11.'"'; 
}

if($end_nd11 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd11.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd11 !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd11.'"'; 
}

if($end_nd11 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd11.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd11 !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd11.'"'; 
}

if($end_nd11 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd11.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd11 !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd11.'"'; 
}

if($end_nd11 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd11.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd11, 0, -3);
	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE  month_no = '".$start_st."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
		
	
?>	
	

<tr>
<td align="center">
	<?php $start_ndst11 = substr($start_nd11, 0, -3); echo Datethai($start_ndst11); ?>
	<input type='hidden' name = "start_nd11"  id = "start_nd11" class="button4"  value="<?php echo $start_nd11; ?>"  /> </td>

<td align="center" bgcolor="#00FF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd11;?>&end_nd=<?php echo $end_nd11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "1";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></font></a>		
</td>
<td align="center" bgcolor="#CCFF99">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd11;?>&end_nd=<?php echo $end_nd11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "2";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></font></a>			
</td>	
<td align="center" bgcolor="#FFFF00">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd11;?>&end_nd=<?php echo $end_nd11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "3";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF6600">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd11;?>&end_nd=<?php echo $end_nd11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "4";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" bgcolor="#FF3333">
<a href="report_startsup_contact1.php?start_nd=<?php echo $start_nd11;?>&end_nd=<?php echo $end_nd11;?>&sale_code=<?php echo $sale_code;?>&percent_id=<?php echo "5";?>"  target="_blank"><font color="black"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></font></a>			
</td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>
</tr>
		
	
	
<?php


$strSQL = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '1'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd !=""){ 
$strSQL .= ' AND date_request  >= "'.$start_nd.'"'; 
}

if($end_nd11 !=""){
    $strSQL .= ' AND date_request  <= "'.$end_nd11.'"'; 
}
			 
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);
$objResult= mysqli_fetch_array($objQuery);
	


$strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '2'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd !=""){
    $strSQL1 .= ' AND date_request  >= "'.$start_nd.'"'; 
}

if($end_nd11 !=""){
    $strSQL1 .= ' AND date_request  <= "'.$end_nd11.'"'; 
}

$objQuery1 = mysqli_query($conn,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rows1 = mysqli_num_rows($objQuery1);
$objResult1= mysqli_fetch_array($objQuery1);


$strSQL2 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '3'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd !=""){
    $strSQL2 .= ' AND date_request  >= "'.$start_nd.'"'; 
}

if($end_nd11 !=""){
    $strSQL2 .= ' AND date_request  <= "'.$end_nd11.'"'; 
}

$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL2."]");
$Num_Rows2 = mysqli_num_rows($objQuery2);
$objResult2= mysqli_fetch_array($objQuery2);

	
$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '4'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd !=""){
    $strSQL3 .= ' AND date_request  >= "'.$start_nd.'"'; 
}

if($end_nd11 !=""){
    $strSQL3 .= ' AND date_request  <= "'.$end_nd11.'"'; 
}

$objQuery3 = mysqli_query($conn,$strSQL3) or die ("Error Query [".$strSQL3."]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3= mysqli_fetch_array($objQuery3);
	
	
$strSQL4 = "SELECT SUM(sum_price_product) AS sum_price_product2  FROM tb_register_data where percent_id = '5'  and summary_order='0' and summary_product1 !='' $ddd";

if($start_nd !=""){
    $strSQL4 .= ' AND date_request  >= "'.$start_nd.'"'; 
}

if($end_nd11 !=""){
    $strSQL4 .= ' AND date_request  <= "'.$end_nd11.'"'; 
}

$objQuery4 = mysqli_query($conn,$strSQL4) or die ("Error Query [".$strSQL4."]");
$Num_Rows4 = mysqli_num_rows($objQuery4);
$objResult4 = mysqli_fetch_array($objQuery4);	

$start_st = substr($start_nd, 0, -3);
$start_st5 = substr($start_nd5, 0, -3);

	
$strSQL8 = "SELECT  SUM(target) As target FROM tb_target WHERE month_no >= '".$start_st."' and  month_no <= '".$start_st5."'  $target";
$objQuery8 = mysqli_query($sol,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
?>	
<tr>
<td align="center">ยอดรวม</td>
<td align="center" bgcolor="#00FF00"><?php  echo number_format($objResult['sum_price_product2'],0).""; ?></td>
<td align="center" bgcolor="#CCFF99"><?php  echo number_format($objResult1['sum_price_product2'],0).""; ?></td>	
<td align="center" bgcolor="#FFFF00"><?php  echo number_format($objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" bgcolor="#FF6600"><?php  echo number_format($objResult3['sum_price_product2'],0).""; ?></td>
<td align="center" bgcolor="#FF3333"><?php  echo number_format($objResult4['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult['sum_price_product2']+$objResult1['sum_price_product2']+$objResult2['sum_price_product2'],0).""; ?></td>
<td align="center" ><?php  echo number_format($objResult8['target'],0).""; ?></td>	
</tr>
	
	
</table>	
<?php } ?>
</form>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>