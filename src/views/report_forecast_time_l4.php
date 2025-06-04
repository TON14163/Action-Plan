<!-- 
report_hossummonth.php
?start_date=2025-03-01&sale_code=S14
-->

<?php 
ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0); 
$start_date = substr($_GET["start_date"],0,7);
$date_plan = substr($start_date, 0, -3);
$percent = isset($_GET["percent"]) ? $_GET["percent"] : '';
$percent_id = isset($_GET["percent_id"]) ? $_GET["percent_id"] : '';
$sale_code = isset($_GET["sale_code"]) ? $_GET["sale_code"] : '';

if ($sale_code != '') { ?> 
    <div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
        <b style="font-size: 20px;">รายงานการเปิดออเดอร์ เขตการขาย <?php echo $sale_code;?></b>
    </div>
<?php } ?>
<div class="table-responsive font-custom-awl-14">
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
    $strSQL1 = "SELECT * FROM hos__so WHERE iv_date LIKE '%$start_date%' AND status_doc = 'Approve' ";
    if ($sale_code != "") {  $strSQL1 .= ' AND sale_code IN ("' . $sale_code . '") '; } 
    $objQuery1 = mysqli_query($sol, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
    $sumAll = array(); // ยอดขายรวมทั้งหมด
    // echo $strSQL1;
    while ($objResult = mysqli_fetch_array($objQuery1)) {  ?>
            <tr>
                <td><?php echo $objResult["ref_id"];?></td>
                <td>
                    <a href="https://sol.allwellcenter.com/register_salehos_edit.php?ref_id=<?php echo $objResult["ref_id"]; ?>">
                        <font color='black'><?php echo $objResult["iv_no"]; ?></font>
                    </a>
                </td>
                <td><?php echo $objResult["iv_date"];?></td>
                <td>
                    <?php
                    $strSQL2 = "SELECT sol_name FROM (hos__subso LEFT JOIN tb_product ON hos__subso.product_ID=tb_product.product_id) WHERE ref_idd = '" . $objResult["ref_id"] . "' ";
                    $objQuery2 = mysqli_query($sol, $strSQL2) or die("Error Query [" . $strSQL2 . "]");
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
                    echo number_format($objResult1["count"], 0); ?> <?php echo $objResult1["unit_name"];?><br>
                    <?php } ?>
                </td>
                <td>
                    <?php
                        $strSQL3 = "SELECT SUM(amount) AS amount FROM hos__subso  WHERE ref_idd = '" . $objResult["ref_id"] . "' ";
                        $objQuery3 = mysqli_query($sol, $strSQL3) or die("Error Query [" . $strSQL3 . "]");
                        $objResult3 = mysqli_fetch_array($objQuery3);
                        // echo $strSQL3;
                        echo number_format($objResult3["amount"], 0);
                        $sumAll[] = $objResult3["amount"];
                    ?>
                </td>
                <td><?php echo $objResult["bill_name"]; ?></td>
                <td><?php echo $objResult["sale_code"]; ?> <?php echo '-'; ?> <?php echo $objResult["sale"]; ?></td>

                <?php if ($objResult["status_doc"] == 'Rejected') {	?>
                    <td bgcolor="#FF3030" width="10%"><?php echo $objResult["status_doc"]; ?></td>
                <?php } else if ($objResult["status_doc"] == 'Approve') { ?>
                    <td bgcolor="#00FF00"><?php echo $objResult["status_doc"]; ?></td>
                <?php } else { ?>
                    <td><?php echo $objResult["status_doc"]; ?></td>
                <?php } ?>

            </tr>
    <?php
    }
    ?>
</table>
</div>
<br>
<div style="border: 1px solid #6c757d; text-align: center;"> <?php echo 'ยอดขายรวมทั้งหมด ';?> <ins><?php echo number_format(array_sum($sumAll), 0) . "";?></ins> <?php echo 'บาท'; ?></div>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>