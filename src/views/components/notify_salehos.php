
	
<?php 
$emid = $_SESSION['em_id'];


?>	
	
<div class="w3-row" style="display: flex; gap: 10px;">	
<?php	
	
//รายการรับเรื่อง	
$strSQLeng = "SELECT *  FROM tb_register_story  where summary_sale = '0' and sale_code ='".$emid."'";
$objQueryeng = mysqli_query($sol,$strSQLeng) or die ("Error Query [".$strSQLeng."]");
$Num_Rowseng = mysqli_num_rows($objQueryeng);	
	
//รายการ PO	
$strSQLengp = "SELECT *  FROM hos__po  where  send_sale = '1' and open_so = '0'  and sale_code ='".$emid."'";
$objQueryengp = mysqli_query($sol,$strSQLengp) or die ("Error Query [".$strSQLengp."]");
$Num_Rowsengp = mysqli_num_rows($objQueryengp);	
	
//แบบสอบถามสินค้าสาธิต	
$strSQLdm = "SELECT *  FROM hos__br  where research_demo ='1' and status_doc ='Approve'  and sale_code ='".$emid."'";
$objQuerydm = mysqli_query($sol,$strSQLdm) or die ("Error Query [".$strSQLdm."]");
$Num_Rowsdm = mysqli_num_rows($objQuerydm);

//แบบสอบถามหลังการขาย	
$strSQLrs = "SELECT *  FROM hos__so  where status_doc ='Approve' and close_reseach ='0' and reseach_kk='1' and status_doc = 'Approve' and iv_date !='0000-00-00' and sale_code!='S31' and sale_code!='S32' and sale_code!='MM1' and sale_code!='SM1' AND DATEDIFF(CURDATE(), iv_date) >= 60  and sale_code ='".$emid."'";
$objQueryrs = mysqli_query($sol,$strSQLrs) or die ("Error Query [".$strSQLrs."]");
$Num_Rowsrs = mysqli_num_rows($objQueryrs);
	

	
if(($Num_Rowseng+$Num_Rowsengp+$Num_Rowsdm+$Num_Rowsrs) > 0){
	
?>	
<div class="w3-third" style="flex: 1; background-color: #f0f0f0;">	
<div class="w3-container"><font color ='blue'><b> ERP SALE</b></font></div>	
	



<?php if($Num_Rowseng > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_storykangsale.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>รายการรับเรื่องรอดำเนินการ</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowseng; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	

<?php if($Num_Rowsengp > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_po_sale.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>เอกสาร PO รอเปิดใบสั่งขาย</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsengp; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	

<?php if($Num_Rowsdm > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_saledemo.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>แบบสอบถามสินค้าสาธิต</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsdm; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	

<?php if($Num_Rowsrs > 0){ ?>	
<div class="w3-container">
    <a href="https://sol.allwellcenter.com/status_saleresearch.php" target="_blank" class="w3-button w3-grey" 
       style="width: 100%; display: flex; justify-content: space-between; ">
        <span style="flex-grow: 1; text-align: left;"><b>แบบสอบถามหลังการขาย 60 วัน</b></span>
        <span style="text-align: right;"><b><?php echo $Num_Rowsrs; ?> รายการ </b></span>
    </a>
</div></p>
<?php } ?>	




</div>	
<?php } ?>
	

	

<?php 

//คุณทำดี
$strSQLem = "SELECT *  FROM good_result where  rc_id='".$_SESSION['em_id']."' AND read_ckk ='0'";
$objQueryem = mysqli_query($user,$strSQLem) or die ("Error Query [".$strSQLem."]");
$Num_Rowsem = mysqli_num_rows($objQueryem);
	
//ใบแจ้งสินค้าไม่สมบูรณ์
$strSQLnc = "SELECT *  FROM no__complete  where  status_doc ='' and send_doc ='1' and send_sup ='0' and type_doc='5' and sale_code ='".$emid."'";
$objQuerync = mysqli_query($sol,$strSQLnc) or die ("Error Query [".$strSQLnc."]");
$Num_Rowsnc = mysqli_num_rows($objQuerync);
	
$strSQLrf = "SELECT *  FROM tb_register_salemk where ckk_open='0'  and sale_code ='".$emid."'";
$objQueryrf = mysqli_query($conn,$strSQLrf) or die ("Error Query [".$strSQLrf."]");
$Num_Rowsrf = mysqli_num_rows($objQueryrf);	

//ายการรับเรื่องและส่งต่อข้อมูล
$strSQLrf = "SELECT *  FROM tb_register_salemk where ckk_open='0' $sddd";
$objQueryrf = mysqli_query($conn,$strSQLrf) or die ("Error Query [".$strSQLrf."]");
$Num_Rowsrf = mysqli_num_rows($objQueryrf);
	
if(($Num_Rowsem+$Num_Rowsnc) > 0){	?>	

<div class="w3-third" style="flex: 1;  background-color: #f0f0f0;">
<div class="w3-container"><font color ='blue'><b>อื่นๆ</b></font></div>

	
<?php if($Num_Rowsnc > 0){	?>	
<div class="w3-container"><a href="https://allwellcenter.com/no_complete/status_editor_en.php"  target="_blank" class="w3-button w3-grey" style="width: 100%; display: flex; justify-content: space-between; align-items: center; 
              padding: 10px 20px; box-sizing: border-box;">
	<span style="flex-grow: 1; text-align: left;"><b>ใบแจ้งสินค้าไม่สมบูรณ์</b></span>
     <span><b><?php echo $Num_Rowsnc;?>  รายการ</b></span>
	</a></div></p>

<?php } ?>	
	
	
	
<?php if($Num_Rowssa > 0){	?>	
<div class="w3-container"><a href="https://allwellcenter.com/good_receive.php"  target="_blank" class="w3-button w3-grey" style="width: 100%; display: flex; justify-content: space-between; align-items: center; 
              padding: 10px 20px; box-sizing: border-box;">
	<span style="flex-grow: 1; text-align: left;"><b>การ์ดคุณทำดีที่ยังไม่ได้อ่าน</b></span>
     <span><b><?php echo $Num_Rowsem;?>  รายการ</b></span>
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
