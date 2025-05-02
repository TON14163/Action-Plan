<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';
(!isset($_GET['sale_code'])) ? $sale_code = $_SESSION['em_id'] : $sale_code = $_GET['sale_code'] ;

function percentItem($percent_id,$percent_name){
    if ($percent_id == '1'){
        $out = '<td bgcolor="#00FF00"><b>'.$percent_name.'</b></td>';
    } else if ($percent_id == '2'){
        $out = '<td bgcolor="#CCFF99"><b>'.$percent_name.'</b></td>';
    } else if ($percent_id == '3'){
        $out = '<td bgcolor="#FFFF00"><b>'.$percent_name.'</b></td>';
    } else if ($percent_id == '4'){
        $out = '<td bgcolor="#FF6600"><b>'.$percent_name.'</b></td>';
    } else if ($percent_id == '5'){
        $out = '<td bgcolor="#FF0000"><b>'.$percent_name.'</b></td>';
    } else {
        $out = '<td></td>';
    }
    return $out;
}


function PercentMain($percent_name){
    $strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product1,SUM(unit_product1) AS unit_product1 FROM tb_register_data WHERE summary_order = '0' AND summary_product1 != '' AND percent_name = '".$percent_name."' ";
    $objQuery1 = mysqli_query($GLOBALS['conn'],$strSQL1);
    $objResult1 = mysqli_fetch_array($objQuery1);

    $sum_price_product1=$objResult1['sum_price_product1'];
    $summary1 = (int)$sum_price_product1;
    $productAll = $objResult1['unit_product1'];
    return $summary1;
}
?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานสรุปเสนอราคา</b>
</div>

<section style="padding: 10px 20px;" class="font-custom-awl-14">
<p>
        <b>วันที่</b> <input type="date" name="" id="">
        <b>ถึง</b> <input type="date" name="" id="">
        <b>วันที่สั่งของ</b> <input type="date" name="" id="">
        <b>ถึง</b> <input type="date" name="" id="">
    </p>
    <p>
        <b>โรงพยาบาล</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
        <b>ประเภทสินค้า</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
        <b>สินค้า</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
    </p>
    <p>
        <b>เปอร์เซ็นต์</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
        <b>Sale</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
        <button class="btn-custom-awl">Search</button>
    </p>
</section>
<hr style="margin: 20px 0px;">

<div style="text-align: right; margin-bottom: 20px;"><a href="dallyreport_register"><img src="assets/images/icon_system/print.png" style="width: 30px; height: 30px;"></a></div>

<p>
    <strong class="font-custom-awl-14">
        <div style="text-align: center; background-color: #00FF00; border: 0.1px solid #000000; border-bottom: hidden;">100% = <?php echo number_format(PercentMain("100 %"),0)."";?> บาท</div>
        <div style="text-align: center; background-color: #CCFF99; border: 0.1px solid #000000; border-bottom: hidden;">90-99% = <?php echo number_format(PercentMain("90-99 %"),0)."";?> บาท</div>
        <div style="text-align: center; background-color: #FFFF00; border: 0.1px solid #000000; border-bottom: hidden;">80-89% = <?php echo number_format(PercentMain("80-89 %"),0)."";?> บาท</div>
        <div style="text-align: center; background-color: #FF6600; border: 0.1px solid #000000; border-bottom: hidden;">50-80% = <?php echo number_format(PercentMain("50-80 %"),0)."";?> บาท</div>
        <div style="text-align: center; background-color: #FF0000; border: 0.1px solid #000000; border-bottom: hidden;">0-50% = <?php echo number_format(PercentMain("0-50 %"),0)."";?> บาท</div>
        <?php $sumPercent = PercentMain("100 %") + PercentMain("90-99 %") + PercentMain("80-89 %") + PercentMain("50-80 %") + PercentMain("0-50 %"); ?>
        <div style="text-align: center; background-color: #FFFFFF; border: 0.1px solid #000000;">จำนวนสินค้าทั้งหมด 172 ชิ้น ยอดรวมทั้งหมด <?php echo number_format($sumPercent,0)."";?> บาท</div>
    </strong>
</p>

<div class="table-responsive font-custom-awl-14">
    <table class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th style="width: 9%;">วันที่</th>
                <th style="width: 10%;">โรงพยาบาล</th>
                <th style="width: 10%;">หน่วยงาน</th>
                <th style="width: 10%;">รายการ</th>
                <th style="width: 5%;">จำนวน</th>
                <th style="width: 7%;">มูลค่า</th>
                <th style="width: 7%;">ประเภท</th>
                <th style="width: 10%;">ผู้ติดต่อ</th>
                <th style="width: 6%;">เปอร์เซ็น</th>
                <th style="width: 9%;">วันที่ได้ P/O</th>
                <th style="width: 9%;">วันที่ส่งของ</th>
                <th style="width: 4%;">เขต</th>
                <th style="width: 4%;">Edit</th>
            </tr>
        </thead>
        <?php 
        $i = 1;
        $strSQL = "SELECT *  FROM tb_register_data where  summary_order='0' and   summary_product1 !='' ORDER BY id_work DESC  LIMIT 50";
        $objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
        $Num_Rows = mysqli_num_rows($objQuery);
        while($objResult = mysqli_fetch_array($objQuery)){ ?>
        <tr>
            <td><?php echo DateThai($objResult["date_plan"]);?></td>
            <td><?php echo $objResult["hospital_name"];?></td>
            <td><?php echo $objResult["hospital_ward"];?></td>
            <td><?php echo $objResult["summary_quote"]; ?><?php echo $objResult["summary_product1"]; ?>&nbsp;&nbsp; <?php echo $objResult["remark_pro1"]; ?></td>
            <td><?php if ($objResult["unit_product1"]!='0') { echo $objResult["unit_product1"]; }?>&nbsp;<?php echo $objResult["unit_name1"];?></td>
            <td><?php $sum_price_product=$objResult["sum_price_product"]; echo number_format( $sum_price_product,0).""; ?></td>
            <td>
                <?php 
                $strSQLty = "SELECT type_code FROM tb_typecus WHERE id = '".$objResult["type_cus"]."' ";
                $objQueryty = mysqli_query($conn,$strSQLty) or die(mysqli_error());
                $objResultty = mysqli_fetch_array($objQueryty);
                echo $objResultty["type_code"]; ?>
            </td>
            <td><?php  echo $objResult["pre_name"]; ?></td>
            <?php echo percentItem($objResult["percent_id"],$objResult["percent_name"]); ?>
            <td><?php echo $objResult["month_po"];?></td>
            <td><?php if($objResult["date_request"]!='0000-00-00'){ echo $objResult["date_request"]; } ?></td>
            <td width="15"><?php echo $objResult["sale_area"]; ?></td>
            <td width="30" align="center"><a href="quo_edit.php?id_work=<?php echo $objResult["id_work"];?>"><img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;"></a></td>
        </tr>
        <?php $i++; } ?>
    </table>
    <br>
    <p>พบทั้งหมด 1 รายการ : จำนวน 1 หน้า : 1</p>
</div>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>





