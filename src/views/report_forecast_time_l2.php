<!-- 
report_start3
?start_date&end_date&sale_code&percent_id&s_ckk
-->
<?php 
ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0); 
$start_date = $_GET["start_date"];
$end_date = $_GET["end_date"];
$sale_code = $_GET["sale_code"];
$date_plan = substr($start_date, 0, -3);
$sale_code = isset($_GET["sale_code"]) ? $_GET["sale_code"] : '';
$s_ckk = isset($_GET["s_ckk"]) ? $_GET["s_ckk"] : '';
$ad_ckk = isset($_GET["ad_ckk"]) ? $_GET["ad_ckk"] : '';
$percent_id = isset($_GET["percent_id"]) ? $_GET["percent_id"] : '';
?>
<style>
    td{ font-size: 14px; }
</style>
<section>
<?php if ($sale_code != '') { ?> 
    <div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
        <b style="font-size: 20px;">รายงานสรุปการปรับปรุงประมาณการขายตามช่วงเวลา เขตการขาย <?php echo $sale_code;?></b>
    </div>
<?php } ?>
<div class="table-responsive font-custom-awl-14">
<table class="table-thead-custom-awl table-bordered border-secondary w-100 ">
    <thead>
        <tr>
            <th>วันที่ตั้งเรื่อง</th>
            <th>วันที่จะได้รับ PO</th>
            <th>โรงพยาบาล</th>
            <th>หน่วยงาน</th>
            <th>รายการ</th>
            <th>จำนวน</th>
            <th>มูลค่า</th>
            <th>เปอร์เซ็น</th>
            <th>วันที่คาดว่าจะส่งสินค้า</th>
            <th>เขตการขาย</th>
        </tr>
    </thead>
    <?php

    $strSQL1 = "SELECT * FROM tb_register_data WHERE summary_order = '1' AND summary_product1 != '' ";
    if ($start_date != "" ) { $strSQL1 .= ' AND date_order  >= "' . $start_date . '"'; }
    if ($end_date != "" ) { $strSQL1 .= ' AND date_order  <= "' . $end_date . '"'; }
    if ($sale_code != "" ) { $strSQL1 .= ' AND sale_area IN ("' . $sale_code . '") '; }
    if ($percent_id != "" ) { $strSQL1 .= ' AND percent_id = "' . $percent_id . '"'; }
    if($s_ckk == 'yes'){ $strSQL1 .= ' AND date_plan LIKE "%'.$date_plan.'%"'; } else if ($s_ckk == 'no'){ $strSQL1 .= ' AND date_plan NOT LIKE "%'.$date_plan.'%"'; }
    $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
    $sumAll = array();
    while ($objResult = mysqli_fetch_array($objQuery1)) {  ?>
            <tr>
                <td>
                    <?php
                        $date = explode('-', $objResult["date_plan"]);
                        $xdate = $date[2] . '-' . $date[1] . '-' . $date[0];
                        echo $xdate; 
                    ?>
                </td>
                <td>
                    <?php
                        $ydate = explode('-', $objResult["month_po"]);
                        $odate = $ydate[2] . '-' . $ydate[1] . '-' . $ydate[0];
                        echo $odate; 
                    ?>
                </td>
                <td><?php echo $objResult["hospital_name"]; ?></td>
                <td><?php echo $objResult["hospital_ward"]; ?></td>
                <td style="text-align: left;"><?php echo $objResult["summary_product1"]; ?></td>
                <td>
                    <?php if ($objResult["unit_product1"] != '0') { echo $objResult["unit_product1"]; } ?>
                    &nbsp;<?php echo $objResult["unit_name1"]; ?>
                </td>
                <td>
                    <?php
                        $sum_price_product = $objResult["sum_price_product"];
                        echo number_format($sum_price_product, 0) . ""; 
                        $sumAll[] = $sum_price_product;
                    ?>
                </td>
                
                <!--  -->
                <?php
                        switch ($objResult["percent_id"]) {
                            case '1': ?> <td bgcolor="#00FF00"><?php echo $objResult["percent_name"];?></td> <?php break;
                            case '2': ?> <td bgcolor="#CCFF99"><?php echo $objResult["percent_name"];?></td> <?php break;
                            case '3': ?> <td bgcolor="#FFFF00"><?php echo $objResult["percent_name"];?></td> <?php break;
                            case '4': ?> <td bgcolor="#FF6600"><?php echo $objResult["percent_name"];?></td> <?php break;
                            case '5': ?> <td bgcolor="#FF0000"><?php echo $objResult["percent_name"];?></td> <?php break;
                            default: ?> <td><?php echo $objResult["percent_name"];?></td> <?php break;
                        }
                ?>
                <!--  -->
                
                <td>
                    <?php
                        $date1 = explode('-', $objResult["date_request"]);
                        $ydate = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
                        echo $ydate; 
                    ?>
                </td>
                <td><?php echo $objResult["sale_area"]; ?></td>
            </tr>
    <?php
    }
    ?>
</table>
</div>
<div style="border: 1px solid #6c757d; border-top: hidden; text-align: center; background-color: #e0e0e0;"> <?php echo 'ยอดรวมทั้งหมด ';?> <ins><?php echo number_format(array_sum($sumAll), 0) . "";?></ins> <?php echo 'บาท'; ?></div>
</section>

<section class="my-5">
    <?php if ($sale_code != '') { ?> 
        <div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
            <b style="font-size: 20px;">รายงานการเปิดออเดอร์ เขตการขาย <?php echo $sale_code;?></b>
        </div>
    <?php } ?>

    <table class="table-thead-custom-awl table-bordered border-secondary w-100 ">
    <thead>
        <tr>
            <th>เลขที่อ้างอิง</th>
            <th>เลขที่เอกสาร</th>
            <th>วันที่ออกเอกสาร</th>
            <th>รายการสินค้า</th>
            <th>จำนวน</th>
            <th>ยอดขายรวม</th>
            <th>ชื่อผู้ออกบิล</th>
            <th>เขตการขาย</th>
            <th>สถานะ</th>
        </tr>
    </thead>
    <?php

        $strSQL = "SELECT * FROM hos__so WHERE status_doc = 'Approve' AND plan_ckk = '1' ";
        if($start_date != "" ) { $strSQL .= ' AND iv_date >= "' . $start_date . '"'; }
        if($end_date != "" ) { $strSQL .= ' AND iv_date <= "' . $end_date . '"'; }
        if($sale_code != "" ) { $strSQL .= ' AND sale_code IN ("' . $sale_code . '") '; }

        $objQuery = mysqli_query($sol, $strSQL) or die("Error Query [" . $strSQL . "]");
        $Num_Rows = mysqli_num_rows($objQuery);
        $strSQL .= " ORDER BY iv_date ASC";
        $objQuery  = mysqli_query($sol, $strSQL); 
        $i = 1;
        $sumAll1 = array();
        while ($objResult = mysqli_fetch_array($objQuery)) { ?>

            <tr>
                <td><?php echo $objResult["ref_id"];?></td>
                <td><?php echo $objResult["iv_no"];?></td>
                <td><?php echo $objResult["iv_date"];?></td>
                <td style="text-align: left;"><?php
                    $strSQL2 = "SELECT sol_name FROM (hos__subso LEFT JOIN tb_product ON hos__subso.product_ID=tb_product.product_id) WHERE ref_idd = '" . $objResult["ref_id"] . "' ";
                    $objQuery2 = mysqli_query($sol, $strSQL2) or die("Error Query [" . $strSQL2 . "]");
                    $Num_Rows2 = mysqli_num_rows($objQuery2);
                    while ($objResult2 = mysqli_fetch_array($objQuery2)) { ?>
                        <?php echo $objResult2["sol_name"];	?><br>
                    <?php } ?>
                </td>
                <td>
                    <?php
                    $strSQL1 = "SELECT count,unit_name FROM (hos__subso LEFT JOIN tb_product ON hos__subso.product_ID=tb_product.product_id) WHERE ref_idd = '" . $objResult["ref_id"] . "' ";
                    $objQuery1 = mysqli_query($sol, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
                    $Num_Rows1 = mysqli_num_rows($objQuery1);
                    while ($objResult1 = mysqli_fetch_array($objQuery1)) {
                    echo number_format($objResult1["count"], 0); ?> <?php echo $objResult1["unit_name"]; ?><br><?php } ?>
                </td>
                <td>
                    <?php
                    $strSQL3 = "SELECT SUM(amount) AS amount FROM hos__subso  WHERE ref_idd = '" . $objResult["ref_id"] . "' ";
                    $objQuery3 = mysqli_query($sol, $strSQL3) or die("Error Query [" . $strSQL3 . "]");
                    $objResult3 = mysqli_fetch_array($objQuery3);
                    echo number_format($objResult3["amount"], 0);?>
                </td>
                <td><?php echo $objResult["bill_name"];?></td>
                <td><?php echo $objResult["sale_code"];?><?php echo '-'; ?><?php echo $objResult["sale"]; ?></td>
                <?php if ($objResult["status_doc"] == 'Rejected') {	?>
                    <td bgcolor="#FF3030" width="10%"><?php echo $objResult["status_doc"]; ?></td>
                <?php } else if ($objResult["status_doc"] == 'Approve') { ?>
                    <td bgcolor="#00FF00"><?php echo $objResult["status_doc"]; ?></td>
                <?php } else { ?>
                    <td><?php echo $objResult["status_doc"]; ?></td>
                <?php } ?>
            </tr>
        <?php $i++; $sumAll1[] = $objResult3["amount"]; } ?>
    </table>
    <div style="border: 1px solid #6c757d; border-top: hidden; text-align: center; background-color: #e0e0e0;">ยอดขายรวม <ins><?php echo number_format(array_sum($sumAll1), 0);?></ins> บาท</div>
</section>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>