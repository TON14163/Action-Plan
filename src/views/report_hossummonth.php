<?php
ob_start();
error_reporting(0);
function DateThaiM($strDate)
{
    $strYear = date("y", strtotime($strDate)) + 43;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}
$_month_name = array(
    "01" => "มกราคม",
    "02" => "กุมภาพันธ์",
    "03" => "มีนาคม",
    "04" => "เมษายน",
    "05" => "พฤษภาคม",
    "06" => "มิถุนายน",
    "07" => "กรกฎาคม",
    "08" => "สิงหาคม",
    "09" => "กันยายน",
    "10" => "ตุลาคม",
    "11" => "พฤศจิกายน",
    "12" => "ธันวาคม"
);

$start_date = substr($_GET["start_date"], 0, 7);
$mm = substr($_GET["start_date"], 5, 2);
$yy = substr($_GET["start_date"], 0, 4);
$thai = $_month_name[$mm];
$year = $yy + 543;
//$start_date = "$yy-$mm";
$sale_code = $_GET["sale_code"];

if ($_GET["sale_code"] == '') {
    $dd = "and sale_code NOT LIKE '%EN%' and sale_code NOT LIKE '%MM%' and sale_code !='S31' and sale_code !='S32' and sale_code !='SM1'and sale_code !=''";
} else {
    $dd = '';
}

$type_sale = $_SESSION['type_sale'];
?>

<form name="frmSearch" method="GET" action="<?php echo $url; ?>">

    <center>
        <h2>รายงานการเปิดออเดอร์ <?php if ($_GET["sale_code"] != '') { ?> เขตการขาย <?php echo $_GET["sale_code"];
                                                                                } ?>
            <h2>เดือน <?php echo  $thai; ?> <?php echo $year; ?>
    </center>
    <br>
</form>
<div class="w3-container">
    <table class="table-thead-custom-awl table-bordered border-secondary" style="width: 100%; font-size:14px;">
        <thead class="w3-gray">
            <td width="8%">เลขที่อ้างอิง</td>
            <td width="8%">เลขที่เอกสาร</td>
            <td width="8%">วันที่ออกเอกสาร</td>
            <td width="12%">รายการสินค้า</td>
            <td width="8%">จำนวน</td>
            <td width="8%">ยอดขายรวม</td>
            <td width="12%">ชื่อผู้ออกบิล</td>
            <td width="8%">เขตการขาย</td>
            <td width="5%">สถานะ</td>
        </thead>
        <?php
        $strSQL = "SELECT *  FROM  hos__so  where  iv_date LIKE '%$start_date%' and status_doc = 'Approve' $dd";
        if ($sale_code != "") {
            $strSQL .= ' AND sale_code  = "' . $sale_code . '"';
        }
        //$strSQL .= ' AND iv_date  >= "2023-07-17"'; 
        //$strSQL .= ' AND iv_date  <= "2023-07-24"'; 
        // echo $strSQL;		

        $objQuery = mysqli_query($sol, $strSQL) or die("Error Query [" . $strSQL . "]");
        $Num_Rows = mysqli_num_rows($objQuery);
        $strSQL .= " order  by iv_date ASC";
        $objQuery  = mysqli_query($sol, $strSQL);
        ?>
        <?php
        $i = 1;
        while ($objResult = mysqli_fetch_array($objQuery)) {
        ?>
            <tr>
                <td><?php echo $objResult["ref_id"]; ?></td>
                <td>
                    <a href="https://sol.allwellcenter.com/register_salehos_edit.php?ref_id=<?php echo $objResult["ref_id"]; ?>">
                        <font color='black'><?php echo $objResult["iv_no"]; ?></font>
                    </a>
                </td>
                <td><?php echo DateThaiM($objResult["iv_date"]); ?></td>

                <td>
                    <div align="left">
                        <?php
                        $strSQL2 = "SELECT sol_name FROM (hos__subso LEFT JOIN tb_product ON hos__subso.product_ID=tb_product.product_id) WHERE ref_idd = '" . $objResult["ref_id"] . "' ";
                        $objQuery2 = mysqli_query($sol, $strSQL2) or die("Error Query [" . $strSQL2 . "]");
                        $Num_Rows2 = mysqli_num_rows($objQuery2);
                        while ($objResult2 = mysqli_fetch_array($objQuery2)) { ?>
                            <?php echo $objResult2["sol_name"];    ?><br>
                        <?php } ?>
                    </div>
                </td>

                <td>
                    <div align="right">
                        <?php
                        $strSQL1 = "SELECT count,unit_name FROM (hos__subso LEFT JOIN tb_product ON hos__subso.product_ID=tb_product.product_id) WHERE ref_idd = '" . $objResult["ref_id"] . "' ";
                        $objQuery1 = mysqli_query($sol, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
                        $Num_Rows1 = mysqli_num_rows($objQuery1);
                        while ($objResult1 = mysqli_fetch_array($objQuery1)) {
                            echo number_format($objResult1["count"], 0); ?> <?php echo $objResult1["unit_name"]; ?><br><?php } ?>
                    </div>
                </td>
                <td>
                    <div align="right">
                        <?php
                        $strSQL3 = "SELECT SUM(amount) AS amount FROM hos__subso  WHERE ref_idd = '" . $objResult["ref_id"] . "' ";
                        $objQuery3 = mysqli_query($sol, $strSQL3) or die("Error Query [" . $strSQL3 . "]");
                        $objResult3 = mysqli_fetch_array($objQuery3);
                        echo number_format($objResult3["amount"], 0);    ?>
                    </div>
                </td>

                <td>
                    <div align="left"><?php echo $objResult["bill_name"]; ?></div>
                </td>
                <td>
                    <div align="center"><?php echo $objResult["sale_code"]; ?> <?php echo '-'; ?> <?php echo $objResult["sale"]; ?></div>
                </td>

                <?php if ($objResult["status_doc"] == 'Rejected') {    ?>
                    <td bgcolor="#FF3030" width="10%"><?php echo $objResult["status_doc"]; ?></td>
                <?php } else if ($objResult["status_doc"] == 'Approve') { ?>
                    <td bgcolor="#00FF00"><?php echo $objResult["status_doc"]; ?></td>
                <?php } else { ?>
                    <td><?php echo $objResult["status_doc"]; ?></td>
                <?php } ?>

            </tr>
        <?php $i++;
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>ยอดรวม</td>
            <td>
                <div align="right">
                    <?php
                    $strSQL4 = "SELECT SUM(amount) AS amount FROM (hos__so LEFT JOIN hos__subso ON hos__subso.ref_idd=hos__so.ref_id)  WHERE  iv_date LIKE '%$start_date%' and status_doc = 'Approve' $dd";

                    if ($sale_code != "") {
                        $strSQL4 .= ' AND sale_code  = "' . $sale_code . '"';
                    }

                    $objQuery4 = mysqli_query($sol, $strSQL4) or die("Error Query [" . $strSQL4 . "]");
                    $objResult4 = mysqli_fetch_array($objQuery4);
                    echo number_format($objResult4["amount"], 0);    ?>
                </div>
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <br>
    </form>

    <?php
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
    ?>