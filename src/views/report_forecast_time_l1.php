<!-- 
report_start2
?start_date&end_date&sale_code&percent_id&percent
-->
<?php 
ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0); 
?>

<?php
$start_date = $_GET["start_date"];
$end_date = $_GET["end_date"];
$percent = isset($_GET["percent"]) ? $_GET["percent"] : '';
$percent_id = isset($_GET["percent_id"]) ? $_GET["percent_id"] : '';
$sale_code = isset($_GET["sale_code"]) ? $_GET["sale_code"] : '';

?>
<?php if ($sale_code != '') { ?> 
    <div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
        <b style="font-size: 20px;">เขตการขาย <?php echo $sale_code;?></b>
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

    $strSQL1 = "SELECT * FROM tb_register_data WHERE summary_order = '0' AND summary_product1 != '' ";
    if ($start_date != "") {
        $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
    }

    if ($end_date != "") {
        $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
    }

    if ($sale_code != "") {
        $strSQL1 .= ' AND sale_area IN ("' . $sale_code . '") ';
    }
    if ($percent_id != "") {
        $strSQL1 .= ' AND percent_id = "' . $percent_id . '"';
    }

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
                    $strSQL = "SELECT percent_name,percent_id  FROM tb_regist_realtime  WHERE id_work = '" . $objResult["id_work"] . "' AND summary_order = '0' AND summary_product1 != '' ";
                    if ($start_date != "") { $strSQL .= ' AND date_update  <= "' . $start_date . '"'; }
                    if ($sale_code != "") { $strSQL .= ' AND sale_area IN ("' . $sale_code . '")'; }
                    $strSQL .= 'ORDER BY id_run DESC';
                    $objQuery = mysqli_query($conn, $strSQL);
                    if (mysqli_num_rows($objQuery) > 0) {
                        $objResult1 = mysqli_fetch_array($objQuery);
                        switch ($objResult1["percent_id"]) {
                            case '1': ?> <td bgcolor="#00FF00"><?php echo $objResult1["percent_name"];?></td> <?php break;
                            case '2': ?> <td bgcolor="#CCFF99"><?php echo $objResult1["percent_name"];?></td> <?php break;
                            case '3': ?> <td bgcolor="#FFFF00"><?php echo $objResult1["percent_name"];?></td> <?php break;
                            case '4': ?> <td bgcolor="#FF6600"><?php echo $objResult1["percent_name"];?></td> <?php break;
                            case '5': ?> <td bgcolor="#FF0000"><?php echo $objResult1["percent_name"];?></td> <?php break;
                            default: ?> <td><?php echo $objResult1["percent_name"];?></td> <?php break;
                        }
                    } else {
                        ?><td></td><?php
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
<br>
<div style="border: 1px solid #6c757d; text-align: center;"> <?php echo 'ยอดรวมทั้งหมด ';?> <ins><?php echo number_format(array_sum($sumAll), 0) . "";?></ins> <?php echo 'บาท'; ?></div>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>