
	
<?php 
$emid = $_SESSION['em_id'];

if($emid=='SS1'){
$sddd = " and sale_code !='S11'  and sale_code !='S12' and sale_code !='S13'  and sale_code !='S17'  and sale_code !='S23'  and sale_code !='S24'  and sale_code !='S31' and sale_code !='SM1' and sale_code !='MM1' and sale_code !='MM2' and sale_code !='S32'  and sale_code NOT LIKE '%EN%' and sale_code NOT LIKE '%SOL%'  and sale_code NOT LIKE '%H%' and sale_code NOT LIKE '%I%'  and sale_code NOT LIKE '%M%' and sale_code !=''";
	
}else if($emid=='SS2'){
$sddd = " and sale_code !='S14'  and sale_code !='S15' and sale_code !='S16'  and sale_code !='S21'  and sale_code !='S22' and sale_code !='S31' and sale_code !='SM1' and sale_code !='MM1'  and sale_code !='MM2' and sale_code !='S32' and sale_code NOT LIKE '%EN%' and sale_code NOT LIKE '%SOL%'  and sale_code NOT LIKE '%H%' and sale_code NOT LIKE '%I%' and sale_code NOT LIKE '%M%' and sale_code !=''";	
	
}else if($emid=='SS3'){
$sddd = " and sale_code !='S11'  and sale_code !='S12' and sale_code !='S13'  and sale_code !='S17'  and sale_code !='S23'  and sale_code !='S24' and sale_code !='S14'  and sale_code !='S15' and sale_code !='S16'  and sale_code !='S21' and sale_code !='S22' and sale_code NOT LIKE '%EN%' and sale_code !=''";	
	
}else if($emid=='SUP_MK'){
$sddd = "and sale_code LIKE '%SOL9%'";	
}else if($emid=='SM1'){
$sddd = "and sale_code LIKE '%SOL%' and sale_code NOT LIKE '%SOL9%'";	
}else if($emid=='SUP_EN'){
$sddd = "and sale_code LIKE '%EN%'";	
}else{
$sddd = "";			
}	


if($_SESSION['name_show']=='รุจิรา'){ 
$code	="and type_doc ='8'";
$emm = "MK";	
$division = 'MK';	
}else if($_SESSION['name_show']=='ทิพย์ภาพัน'){ 	
$code	="and type_doc ='8'";
$emm = "PM";	
$division = 'MK';	
}else if($_SESSION['name_show']=='ลักษณาวรรณ'){ 
$code	="and type_doc ='6'";
$emm = "SS3";	
$division = 'SA';	
}else if($_SESSION['name_show']=='มาลินี'){ 
$code	="and type_doc ='6' and sale_code NOT LIKE '%SOL%'";	
$emm = "SS3";
$division = 'SA';		
}else if($_SESSION['name_show']=='นรินทิพย์'){ 
$code	="and type_doc ='5' and sale_code !='S14' and sale_code !='S15' and sale_code !='S16' and sale_code !='S21' and sale_code !='S22'";	
$emm = "SS2";	
$division = 'SA';		
}else if($_SESSION['name_show']=='พรรณิภา'){ 
$code	="and type_doc ='5' and sale_code !='S11' and sale_code !='S12' and sale_code !='S13' and sale_code !='S17' and sale_code !='S24'";	
$emm = "SS1";	
$division = 'SA';		
}

//$code	="and type_doc !='1' and type_doc !='4' and type_doc !='5' and type_doc !='6' and type_doc !='7'";	

?>	
	
<div class="w3-row" style="display: flex; gap: 10px;">	
<?php	
//ใบสั่งขาย	
$strSQL = "SELECT ref_id  FROM hos__so  where status_doc ='Request' and send_sup ='1' and send_cm ='0' and ic_ckk='0' $sddd";
$objQuery = mysqli_query($sol,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rowsf = mysqli_num_rows($objQuery);

$strSQL = "SELECT ref_id  FROM hos__so  where status_doc ='Request' and send_sup ='1' and send_cm ='0' and ic_ckk='0' and que_ckk='1' $sddd";
$objQuery = mysqli_query($sol,$strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rowsfd = mysqli_num_rows($objQuery);	

//ใบยืม	
$strSQL1 = "SELECT *  FROM hos__br  where  status_doc ='Request' and send_sup ='1' $sddd";
$objQuery1 = mysqli_query($sol,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rowsf1 = mysqli_num_rows($objQuery1);
	
$strSQL1 = "SELECT *  FROM hos__br  where  status_doc ='Request' and send_sup ='1'  and que_ckk='1' $sddd";
$objQuery1 = mysqli_query($sol,$strSQL1) or die ("Error Query [".$strSQL1."]");
$Num_Rowsf1d = mysqli_num_rows($objQuery1);

	
//ลดหนี้	
$strSQLfc = "SELECT *  FROM tb_credit_note  where status_doc = 'Request' and send_sup = '1' and send_dm = '0' $sddd";
$objQueryfc = mysqli_query($sol,$strSQLfc) or die ("Error Query [".$strSQLfc."]");
$Num_Rowsfc = mysqli_num_rows($objQueryfc);

//smp	
$strSQLsm = "SELECT *  FROM hos__smp  where send_dm = '0' and send_stock = '0' and  send_admin = '0' and send_sup = '1' and status_sup = 'Request' $sddd";
$objQuerysm = mysqli_query($sol,$strSQLsm) or die ("Error Query [".$strSQLsm."]");
$Num_Rowssm = mysqli_num_rows($objQuerysm);
	
//jong	
$strSQLjn = "SELECT *  FROM hos__jongproduct  where send_sup = '1' and status_doc = 'Request' $sddd";
$objQueryjn = mysqli_query($sol,$strSQLjn) or die ("Error Query [".$strSQLjn."]");
$Num_Rowsjn = mysqli_num_rows($objQueryjn);
	
//change	
$strSQLch = "SELECT *  FROM hos__change  where status_doc ='Request' and send_sup ='1' and  adm_ckk='0' $sddd";
$objQuerych = mysqli_query($sol,$strSQLch) or die ("Error Query [".$strSQLch."]");
$Num_Rowsch = mysqli_num_rows($objQuerych);
	
//รายการรับเรื่อง	
$strSQLeng = "SELECT *  FROM tb_register_story  where summary_sale = '0'  $sddd";
$objQueryeng = mysqli_query($sol,$strSQLeng) or die ("Error Query [".$strSQLeng."]");
$Num_Rowseng = mysqli_num_rows($objQueryeng);	
	
//รายการ PO	
$strSQLengp = "SELECT *  FROM hos__po  where  send_sale = '1' and open_so = '0' $sddd";
$objQueryengp = mysqli_query($sol,$strSQLengp) or die ("Error Query [".$strSQLengp."]");
$Num_Rowsengp = mysqli_num_rows($objQueryengp);	
	
//แบบสอบถามสินค้าสาธิต	
$strSQLdm = "SELECT *  FROM hos__br  where research_demo ='1' and status_doc ='Approve' $sddd";
$objQuerydm = mysqli_query($sol,$strSQLdm) or die ("Error Query [".$strSQLdm."]");
$Num_Rowsdm = mysqli_num_rows($objQuerydm);

//ใบยืมฝากขาย	
$strSQLcos = "SELECT *  FROM hos__consig  where send_sup = '1' and send_cm='0' and status_doc = 'Request' $sddd";
$objQuerycos = mysqli_query($sol,$strSQLcos) or die ("Error Query [".$strSQLcos."]");
$Num_Rowscos = mysqli_num_rows($objQuerycos);

$strSQLcos1 = "SELECT *  FROM hos__consig  where send_sup = '1' and send_cm='0' and status_doc = 'Request' and que_ckk ='1' $sddd";
$objQuerycos1 = mysqli_query($sol,$strSQLcos1) or die ("Error Query [".$strSQLcos1."]");
$Num_Rowscos1 = mysqli_num_rows($objQuerycos1);
	
//แบบสอบถามหลังการขาย	
$strSQLrs = "SELECT *  FROM hos__so  where status_doc ='Approve' and close_reseach ='0' and reseach_kk='1' and status_doc = 'Approve' and iv_date !='0000-00-00' and sale_code!='S31' and sale_code!='S32' and sale_code!='MM1' and sale_code!='SM1' AND DATEDIFF(CURDATE(), iv_date) >= 60 $sddd";
$objQueryrs = mysqli_query($sol,$strSQLrs) or die ("Error Query [".$strSQLrs."]");
$Num_Rowsrs = mysqli_num_rows($objQueryrs);
	
//ใบสั่งเช่า
$strSQLren = "SELECT *  FROM hos__rental where status_doc ='Request' and send_sup ='1' $sddd";
$objQueryren = mysqli_query($sol,$strSQLren) or die ("Error Query [".$strSQLren."]");
$Num_Rowsren = mysqli_num_rows($objQueryren);

	
if($_SESSION['name_show']=='รุจิรา'){	
	
//	ใบสั่งขาย/ใบยืม
$strSQL7 = "SELECT *  FROM so__main  where approve_complete ='Request' and employee_name LIKE '%SOL9%' and employee_name !='SOL99'";
$objQuery7 = mysqli_query($sol,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);	
	
}else if($_SESSION['name_show']=='ลักษณาวรรณ'){	
	
$strSQL7 = "SELECT *  FROM so__main  where approve_complete ='Request' and cancel_ckk='0'";
$objQuery7 = mysqli_query($sol,$strSQL7) or die ("Error Query [".$strSQL7."]");
$Num_Rows7 = mysqli_num_rows($objQuery7);
	
$strSQL17 = "SELECT *  FROM qou__main  where send_sup='1' and status_doc ='Request'";
$objQuery17 = mysqli_query($sol,$strSQL17) or die ("Error Query [".$strSQL17."]");
$Num_Rows17 = mysqli_num_rows($objQuery17);
	
}
	
if($_SESSION['name_show']=='รุจิรา'){	
	

	
	
//สินค้ายอดนิยมออนไลน์คงเหลือต่ำกว่ากำหนด	
$strSQL = "SELECT access_code, sol_name, unit_name,product_ID,ecom_count FROM tb_product WHERE popular_2 = '1' AND close_pro = '0' AND close_out = '0' and ecom_ckk='1'";
$strSQL .= " ORDER BY number ASC";
$objQuery = mysqli_query($new, $strSQL) or die("Error Query [" . $strSQL . "]");
$Num_Rows = mysqli_num_rows($objQuery);

$j = 0; // ปรับตัวแปร $j ให้อยู่ภายนอกลูป
while ($objResult = mysqli_fetch_array($objQuery)) {
    $strSQL37 = "SELECT SUM(count_send) AS count_send, SUM(count_receive) AS count_receive FROM st__sbmain WHERE product_id = '" . $objResult["product_ID"] . "'";
    $objQuery37 = mysqli_query($new, $strSQL37);
    $objResult37 = mysqli_fetch_array($objQuery37);

    $count_send7 = $objResult37["count_send"];
    $count_receive7 = $objResult37["count_receive"];
    // คงเหลือ
    $count_pro7 = $count_receive7 - $count_send7;

    if ($count_pro7 < $objResult["ecom_count"]) {
        $j++; // เพิ่มค่าของ $j
    }
}
	

//สินค้ายอดนิยมออนไลน์พร้อมขาย
$strSQL = "SELECT access_code, sol_name, unit_name, product_ID FROM tb_product WHERE popular_2 = '1' AND close_pro = '0'  and close_out='1' and  close_in='1' and ecom_ckk='1'";
$strSQL .= " ORDER BY number ASC";
$objQuery = mysqli_query($new, $strSQL) or die("Error Query [" . $strSQL . "]");
$Num_Rows = mysqli_num_rows($objQuery);

$p = 0; 
while ($objResult = mysqli_fetch_array($objQuery)) {
  $p++;
    }
	
}	
	
if(($Num_Rowsf+$Num_Rowsf1+$Num_Rowsfc+$Num_Rowssm+$Num_Rowsjn+$Num_Rowsch+$Num_Rowssp1+$Num_Rowseng+$Num_Rowsengp+$Num_Rowsdm+$Num_Rowscos+$Num_Rowsrs+$p+$j+$Num_Rows7+$Num_Rows17) > 0){
	
?>	
<div class="w3-third" style="flex: 1; background-color: #f0f0f0;">	
<div class="w3-container"><font color ='blue'><b> ERP SALE</b></font></div>	
	
<?php if($Num_Rowsf > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_approvesup.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบสั่งขาย</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsf; ?> รายการ <?php if($Num_Rowsfd > 0 ){ ?> <font color='red'> ด่วน <?php echo $Num_Rowsfd; ?> </font>  <?php }?></b></span>
    </a>
</div></p>
<?php } ?>	
	
<?php if($Num_Rowsf1 > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_approvebrsup.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบยืม</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsf1; ?> รายการ <?php if($Num_Rowsf1d > 0 ){ ?> <font color='red'> ด่วน <?php echo $Num_Rowsf1d; ?> </font>  <?php }?></b></span>
    </a>
</div></p>
<?php } ?>	


<?php if($Num_Rows7 > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_approve_sol.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบสั่งขาย/ใบยืม</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rows7; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	

<?php if($Num_Rows17 > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_appqou.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบเสนอราคา</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rows17; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	


<?php if($Num_Rowscos > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_approvebrsc.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบยืมฝากขาย</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowscos; ?> รายการ <?php if($Num_Rowscos1 > 0 ){ ?> <font color='red'> ด่วน <?php echo $Num_Rowscos1; ?> </font>  <?php }?></b></span>
    </a>
</div></p>
<?php } ?>	


<?php if($Num_Rowsfc > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_credit_approve.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบลดหนี้</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsfc; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>			

<?php if($Num_Rowssm > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_sample_approve.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบเบิก (SMP)</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowssm; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>			

<?php if($Num_Rowsjn > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_supjongapp.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบจอง</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsjn; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	

<?php if($Num_Rowsch > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_supchangeapp.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบแลกเปลี่ยน</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsch; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	

<?php if($Num_Rowsren > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_apprental.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบสั่งเช่า</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsren; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	


<?php if($Num_Rowseng > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_storykangsup.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>รายการรับเรื่องรอดำเนินการ</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowseng; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	

<?php if($Num_Rowsengp > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_po_sup.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>เอกสาร PO รอเปิดใบสั่งขาย</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsengp; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	

<?php if($Num_Rowsrs > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_supresearch.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>แบบสอบถามหลังการขาย 60 วัน</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsrs; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	



<?php if($_SESSION['name_show']=='รุจิรา'){ ?>
<?php if($j > 0){	?>	
<div class="w3-container"><a href="https://sol.allwellcenter.com/status_almostpro.php"  target="_blank" class="w3-button w3-grey" style="width: 100%; display: flex; justify-content: space-between; align-items: center; 
              padding: 10px 20px; box-sizing: border-box;">
	<span style="flex-grow: 1; text-align: left;"><b>สินค้ายอดนิยมออนไลน์เหลือต่ำกว่าเกณฑ์</b></span>
     <span style="text-align: right;"><b><?php echo $j;?>  รายการ</b></span>
	</a></div></p>
<?php } ?>		   
<?php if($p > 0){ ?>	
<div class="w3-container"><a href="https://sol.allwellcenter.com/status_almostpro.php"  target="_blank" class="w3-button w3-grey" style="width: 100%; display: flex; justify-content: space-between; align-items: center; 
              padding: 10px 20px; box-sizing: border-box;">
	<span style="flex-grow: 1; text-align: left;"><b>สินค้ายอดนิยมออนไลน์มีสินค้าเข้าพร้อมขาย</b></span>
     <span style="text-align: right;"><b><?php echo $p;?>  รายการ</b></span>
	</a></div></p>	
<?php 
} 
 }
?>	

</div>	
<?php } ?>
	
	
<?php	
//ใบขอซื้อภายใน	
$pr_main = "SELECT * FROM tb__pr WHERE ( pr_status = 1 OR  pr_status = 30 ) and pr_department = '".$emid."' ";
$qpr_main = mysqli_query($pr_wr,$pr_main);
$Num_pr2 = mysqli_num_rows($qpr_main);
	
$pr_main = "SELECT * FROM tb__pr WHERE ( pr_status = 1 OR  pr_status = 30 ) and pr_department = '".$emid."' and pr_need= 1";
$qpr_main = mysqli_query($pr_wr,$pr_main);
$Num_pr2_ = mysqli_num_rows($qpr_main);
	
	
//ใบเบิกสำนักงาน
$pr_main = "SELECT * FROM tb__wr WHERE wr_status = 2 and  user_type = '".$emm."'";
$qpr_main = mysqli_query($pr_wr,$pr_main);
$Num_wr2 = mysqli_num_rows($qpr_main);
	
$pr_main = "SELECT * FROM tb__wr WHERE wr_status = 2 and user_type = '".$emm."' and wr_need=1";
$qpr_main = mysqli_query($pr_wr,$pr_main);
$Num_wr2_ = mysqli_num_rows($qpr_main);
	
//ใบเบิกค่าใช้จาย	
$pr_main = "SELECT * FROM tb__re WHERE ( status_re = 2 OR status_re = 30 ) and user_type = '".$emm."' ";
$qpr_main = mysqli_query($pr_wr,$pr_main);
$Num_pr1 = mysqli_num_rows($qpr_main);
	
//ใบสำรองจ่าย RA	
$pr_main = "SELECT * FROM tb__ra WHERE ( status_re = 2 OR status_re = 30 ) and user_type = '".$emm."'";
$qpr_main = mysqli_query($pr_wr,$pr_main);
$Num_pr3 = mysqli_num_rows($qpr_main);
	
//ใบขอซื้อภายนอก	
$pr_main = "SELECT *  FROM po__main  where  send_sup = '1' and sup_name ='' and status_doc ='Request' $sddd";
$qpr_main = mysqli_query($inter,$pr_main);
$Num_pr9 = mysqli_num_rows($qpr_main);	

	


if(($Num_pr2+$Num_pr2_+$Num_wr2+$Num_wr2_+$Num_pr1+$Num_pr3+$Num_pr9) > 0){
	
?>	
<div class="w3-third" style="flex: 1; background-color: #f0f0f0;">	
<div class="w3-container"><font color ='blue'><b>ใบขอซื้อ & ใบเบิกค่าใช้จ่าย</b></font></div>	
<?php if($Num_pr2 > 0){ ?>	
<div class="w3-container">
    <a href="https://pr-wr.allwellcenter.com/pr_doc_status_sup" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบขอซื้อภายใน</b></span>
        <span style="text-align: right;"><b><?php echo $Num_pr2; ?> รายการ <?php if($Num_pr2_ > 0 ){ ?> <font color='red'> ด่วน <?php echo $Num_pr2_; ?> </font>  <?php }?></b></span>
    </a>
</div></p>
<?php } ?>	
	
	
<?php if($Num_wr2 > 0){ ?>	
<div class="w3-container">
    <a href="https://pr-wr.allwellcenter.com/wr_status_sup" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบเบิกอุปกรณสำนักงาน</b></span>
        <span style="text-align: right;"><b><?php echo $Num_wr2; ?> รายการ <?php if($Num_wr2_ > 0 ){ ?> <font color='red'> ด่วน <?php echo $Num_wr2_; ?> </font>  <?php }?></b></span>
    </a>
</div></p>
<?php } ?>		
	
	
<?php if($Num_pr1 > 0){ ?>	
<div class="w3-container">
    <a href="https://pr-wr.allwellcenter.com/doc_expenditure_status_sup" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบเบิกค่าใช้จ่าย</b></span>
        <span style="text-align: right;"><b><?php echo $Num_pr1; ?> รายการ</b></span>
    </a>
</div></p>
<?php } ?>		
	
<?php if($Num_pr3 > 0){ ?>	
<div class="w3-container">
    <a href="https://pr-wr.allwellcenter.com/doc_ra_status_sup" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบสำรองจ่าย</b></span>
        <span style="text-align: right;"><b><?php echo $Num_pr3; ?> รายการ</b></span>
    </a>
</div></p>
<?php } ?>		
	
<?php if($Num_pr9 > 0){ ?>	
<div class="w3-container">
    <a href="https://inter.allwellcenter.com/status_supapprove.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบขอซื้อ (INTER)</b></span>
        <span style="text-align: right;"><b><?php echo $Num_pr9; ?> รายการ</b></span>
    </a>
</div></p>
<?php } ?>		
	
	
</div>	
<?php } ?>
		
	

<?php	
//ใบเสนอราคา
$strSQLqu = "SELECT id FROM quotation_handler WHERE (status_all = 1 or status_all = 3 or status_all = 4 or status_all = 5) $sddd";
$objQueryqu = mysqli_query($quo,$strSQLqu) or die ("Error Query [".$strSQLqu."]");
$Num_Rowsqu = mysqli_num_rows($objQueryqu);
	
$strSQLqu1 = "SELECT id FROM quotation_handler WHERE (status_all = 6 or status_all = 8 or status_all = 9) $sddd";
$objQueryqu1 = mysqli_query($quo,$strSQLqu1) or die ("Error Query [".$strSQLqu1."]");
$Num_Rowsqu1 = mysqli_num_rows($objQueryqu1);
	
if(($Num_Rowsqu1+$Num_Rowsqu) > 0){
	
?>	
<div class="w3-third" style="flex: 1; background-color: #f0f0f0;">	
<div class="w3-container"><font color ='blue'><b>ใบเสนอราคา</b></font></div>	
<?php if($Num_Rowsqu > 0){ ?>	
<div class="w3-container">
    <a href="https://quotation.allwellcenter.com/report_split_status_sup" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบเสนอราคาอนุมัติจัดทำ</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsqu; ?> รายการ</b></span>
    </a>
</div></p>
<?php } ?>	
	
<?php if($Num_Rowsqu1 > 0){ ?>	
<div class="w3-container">
    <a href="https://quotation.allwellcenter.com/report_split_status_sup_v3" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>ใบเสนอราคาอนุมัติจัดส่งลูกค้า</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsqu1 ?> รายการ</b></span>
    </a>
</div></p>
<?php } ?>	
		
	
	
</div>	
<?php } ?>
		

</div><br>	
<div class="w3-row" style="display: flex; gap: 10px;">
	

<?php 

//คุณทำดี
$strSQLem = "SELECT *  FROM good_result where  rc_id='".$_SESSION['em_code']."' AND read_ckk ='0'";
$objQueryem = mysqli_query($user,$strSQLem) or die ("Error Query [".$strSQLem."]");
$Num_Rowsem = mysqli_num_rows($objQueryem);
	
//ใบแจ้งสินค้าไม่สมบูรณ์
$strSQLnc = "SELECT *  FROM no__complete  where  status_doc ='' and send_doc ='1' and send_sup ='0' $code";
$objQuerync = mysqli_query($sol,$strSQLnc) or die ("Error Query [".$strSQLnc."]");
$Num_Rowsnc = mysqli_num_rows($objQuerync);
	
//อนุมัติสินค้าไม่สมบูรณ์
$strSQLnc1 = "SELECT *  FROM no__complete  where  status_doc ='Request'  and send_sup ='1' $code";
$objQuerync1 = mysqli_query($sol,$strSQLnc1) or die ("Error Query [".$strSQLnc1."]");
$Num_Rowsnc1 = mysqli_num_rows($objQuerync1);
	
	
//ใบ Car
$strSQLca = "select * from car WHERE (division='$division' OR car_to_all1 LIKE '%$division%' ) AND  (status='F0' or status='H1' or status='F2')   ";
$objQueryca = mysqli_query($car,$strSQLca) or die ("Error Query [".$strSQLca."]");
$Num_Rowsca = mysqli_num_rows($objQueryca);
	
//ใบ Par
$strSQLpa = "select * from par WHERE (status='F0' or status='H1' or status='F2') AND division='$division'  ";
$objQuerypa = mysqli_query($car,$strSQLpa) or die ("Error Query [".$strSQLpa."]");
$Num_Rowspa = mysqli_num_rows($objQuerypa);
	
//ISO
$strSQLiso = "select * from dar WHERE status='0' AND division='$division' ";
$objQueryiso = mysqli_query($iso,$strSQLiso) or die ("Error Query [".$strSQLiso."]");
$Num_Rowsiso = mysqli_num_rows($objQueryiso);
	
//ายการรับเรื่องและส่งต่อข้อมูล
$strSQLrf = "SELECT *  FROM tb_register_salemk where ckk_open='0' $sddd";
$objQueryrf = mysqli_query($conn,$strSQLrf) or die ("Error Query [".$strSQLrf."]");
$Num_Rowsrf = mysqli_num_rows($objQueryrf);
	
	
	
if(($Num_Rowsem+$Num_Rowsnc+$Num_Rowsca+$Num_Rowspa+$Num_Rowsiso+$Num_Rowsnc1+$Num_Rowsrf) > 0){	?>	

<div class="w3-third" style="flex: 1;  background-color: #f0f0f0;">
<div class="w3-container"><font color ='blue'><b>อื่นๆ</b></font></div>

	
<?php if($Num_Rowsnc > 0){	?>	
<div class="w3-container"><a href="https://allwellcenter.com/no_complete/status_editor_en.php"  target="_blank" class="w3-button w3-grey" style="width: 100%; display: flex; justify-content: space-between; align-items: center; 
              padding: 10px 20px; box-sizing: border-box;">
	<span style="flex-grow: 1; text-align: left;"><b>ใบแจ้งสินค้าไม่สมบูรณ์</b></span>
     <span><b><?php echo $Num_Rowsnc;?>  รายการ</b></span>
	</a></div></p>

<?php } ?>	
	
	
<?php if($Num_Rowsnc1 > 0){	?>	
<div class="w3-container"><a href="https://allwellcenter.com/no_complete/status_approve.php"  target="_blank" class="w3-button w3-grey" style="width: 100%; display: flex; justify-content: space-between; align-items: center; 
              padding: 10px 20px; box-sizing: border-box;">
	<span style="flex-grow: 1; text-align: left;"><b>อนุมัติใบแจ้งสินค้าไม่สมบูรณ์</b></span>
     <span><b><?php echo $Num_Rowsnc1; ?>  รายการ</b></span>
	</a></div></p>

<?php } ?>	
	
	
<?php if($Num_Rowssa > 0){	?>	
<div class="w3-container"><a href="https://allwellcenter.com/good_receive.php"  target="_blank" class="w3-button w3-grey" style="width: 100%; display: flex; justify-content: space-between; align-items: center; 
              padding: 10px 20px; box-sizing: border-box;">
	<span style="flex-grow: 1; text-align: left;"><b>การ์ดคุณทำดีที่ยังไม่ได้อ่าน</b></span>
     <span><b><?php echo $Num_Rowsem;?>  รายการ</b></span>
	</a></div></p>

<?php } ?>	
	
<?php if($Num_Rowsca > 0){	?>	
<div class="w3-container"><a href="https://allwellcenter.com/car/acarlist.php"  target="_blank" class="w3-button w3-grey" style="width: 100%; display: flex; justify-content: space-between; align-items: center; 
              padding: 10px 20px; box-sizing: border-box;">
	<span style="flex-grow: 1; text-align: left;"><b>ใบขอให้แก้ไขรออนุมัติ</b></span>
     <span><b><?php echo $Num_Rowsca;?>  รายการ</b></span>
	</a></div></p>

<?php } ?>	

<?php if($Num_Rowspa > 0){	?>	
<div class="w3-container"><a href="https://allwellcenter.com/car/aparlist.php"  target="_blank" class="w3-button w3-grey" style="width: 100%; display: flex; justify-content: space-between; align-items: center; 
              padding: 10px 20px; box-sizing: border-box;">
	<span style="flex-grow: 1; text-align: left;"><b>ใบขอให้พัฒนารออนุมัติ</b></span>
     <span><b><?php echo $Num_Rowspa;?>  รายการ</b></span>
	</a></div></p>

<?php } ?>	


<?php if($Num_Rowsiso > 0){	?>	
<div class="w3-container"><a href="https://allwellcenter.com/iso/ap.php"  target="_blank" class="w3-button w3-grey" style="width: 100%; display: flex; justify-content: space-between; align-items: center; 
              padding: 10px 20px; box-sizing: border-box;">
	<span style="flex-grow: 1; text-align: left;"><b>เอกสาร ISO รออนุมัติ</b></span>
     <span><b><?php echo $Num_Rowsiso;?>  รายการ</b></span>
	</a></div></p>

<?php } ?>	


<?php if($Num_Rowsrf > 0){	?>	
<div class="w3-container"><a href="https://sale.allwellcenter.com/status_supmk.php"  target="_blank" class="w3-button w3-grey" style="width: 100%; display: flex; justify-content: space-between; align-items: center; 
              padding: 10px 20px; box-sizing: border-box;">
	<span style="flex-grow: 1; text-align: left;"><b>รายการรับเรื่องและส่งต่อข้อมูล</b></span>
     <span><b><?php echo $Num_Rowsrf;?>  รายการ</b></span>
	</a></div></p>

<?php } ?>	




	
</div>
<?php } ?>	
	


</div>	
