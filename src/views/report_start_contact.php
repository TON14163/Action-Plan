<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
?>

<center>
    <h2>รายงานสรุปการประมาณการขายตามเปอร์เซ็นต์</h2>
</center>
<form name="frmSearch" method="GET" action="<?php echo $url; ?>">

    <?php
    $start_date = $_GET["start_date"];
    $end_date = $_GET["end_date"];
    $start_send = $_GET["start_send"];
    $end_send = $_GET["end_send"];
    $sale_code = $_GET["sale_code"];
    $percent_id = $_GET["percent_id"];
    $start_nd = $_GET["start_nd"];
    $end_nd = $_GET["end_nd"];
    $summary_order = $_GET["summary_order"];
    $start_order = $_GET["start_order"];
    $end_order = $_GET["end_order"];
    $date_sum = $_GET["date_sum"];
    $date_summ = $_GET["date_summ"];
    $summ = $_GET["summ"];
    ?>
</form>
<table class="table-thead-custom-awl table-bordered border-secondary" style="width: 100%; font-size:14px;">
    <tr>
        <td width="8%" align="center" bgcolor="#ebe4ed">วันที่ตั้งเรื่อง</td>
        <td width="8%" align="center" bgcolor="#ebe4ed">วันที่จะได้รับ PO</td>
        <td width="15%" align="center" bgcolor="#ebe4ed">โรงพยาบาล</td>
        <td width="15%" align="center" bgcolor="#ebe4ed">หน่วยงาน</td>
        <td width="30%" align="center" bgcolor="#ebe4ed">รายการ</td>
        <td width="8%" align="center" bgcolor="#ebe4ed">จำนวน</td>
        <td width="10%" align="center" bgcolor="#ebe4ed">มูลค่า</td>
        <td width="5%" align="center" bgcolor="#ebe4ed">เปอร์เซ็น</td>
        <td width="8%" align="center" bgcolor="#ebe4ed">วันที่คาดว่าจะส่งสินค้า</td>
        <td width="5%" align="center" bgcolor="#ebe4ed">เขตการขาย</td>
    </tr>
    <?php
    $strSQL = "SELECT *  FROM tb_register_data where sum_price_product!='0' and summary_product1 !=''";
    if ($start_date != "") {
        $strSQL .= ' AND date_plan  >= "' . $start_date . '"';
    }

    if ($end_date != "") {
        $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
    }

    if ($start_send != "") {
        $strSQL .= ' AND date_request  >= "' . $start_send . '"';
    }

    if ($date_sum != '') {
        $strSQL .= ' AND date_request  NOT LIKE "%' . $date_sum . '%"';
    }

    if ($date_summ != '') {
        $strSQL .= ' AND date_request  NOT LIKE "%' . $date_summ . '%"';
    }

    if ($end_send != "") {
        $strSQL .= ' AND date_request  <= "' . $end_send . '"';
    }

    if ($start_nd != "") {
        $strSQL .= ' AND date_request  >= "' . $start_nd . '"';
    }

    if ($end_nd != "") {
        $strSQL .= ' AND date_request  <= "' . $end_nd . '"';
    }

    if ($sale_code != "") {
        $strSQL .= ' AND sale_area = "' . $sale_code . '"';
    }
    if ($percent_id != "") {
        $strSQL .= ' AND percent_id = "' . $percent_id . '"';
    }

    if ($start_order != "") {
        $strSQL .= ' AND month_po  >= "' . $start_order . '"';
    }

    if ($end_order != "") {
        $strSQL .= ' AND month_po  <= "' . $end_order . '"';
    }

    if ($summary_order != '') {
        $strSQL .= ' AND summary_order = "' . $summary_order . '"';
    } else if ($summ != '') {
        $strSQL .= ' AND summary_order != "' . $summ . '"';
    } else if ($start_order != "" or $start_date != '' or $date_summ != '') {
    } else {
        $strSQL .= ' AND summary_order = "0"';
    }

    $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
    $Num_Rows = mysqli_num_rows($objQuery);




    $strSQL .= " order  by date_plan  ASC ";
    $objQuery  = mysqli_query($conn, $strSQL);

    $i = 1;
    while ($objResult = mysqli_fetch_array($objQuery)) {
    ?>

        <tr>



            <td class="style39"><?php
                                $date = explode('-', $objResult["date_plan"]);
                                $xdate = $date[2] . '-' . $date[1] . '-' . $date[0];
                                echo $xdate; ?></td>
            <td class="style39"><?php
                                $ydate = explode('-', $objResult["month_po"]);
                                $odate = $ydate[2] . '-' . $ydate[1] . '-' . $ydate[0];
                                echo $odate; ?></td>
            <td class="style39"><?php echo $objResult["hospital_name"]; ?></td>


            <td class="style39"><?php echo $objResult["hospital_ward"]; ?></td>
            <td class="style39"><?php echo $objResult["summary_product1"]; ?>
            </td>

            <td class="style39" align="right"> <?php if ($objResult["unit_product1"] != '0') {
                                                    echo $objResult["unit_product1"];
                                                } ?>&nbsp;<?php echo $objResult["unit_name1"]; ?>
            </td>

            <td class="style39" align="right"><?php $sum_price_product = $objResult["sum_price_product"];
                                                echo number_format($sum_price_product, 0) . ""; ?></td>
            <?php

            if ($objResult["percent_id"] == '1') {
            ?>
                <td class="style39" bgcolor="#00FF00"><?php echo $objResult["percent_name"]; ?></td>
            <?php } else if ($objResult["percent_id"] == '2') { ?>
                <td class="style39" bgcolor="#CCFF99"><?php echo $objResult["percent_name"]; ?></td>
            <?php } else if ($objResult["percent_id"] == '3') { ?>
                <td class="style39" bgcolor="#FFFF00"><?php echo $objResult["percent_name"]; ?></td>
            <?php
            } else if ($objResult["percent_id"] == '4') {
            ?>
                <td class="style39" bgcolor="#FF6600"><?php echo $objResult["percent_name"]; ?></td>
            <?php
            } else if ($objResult["percent_id"] == '5') {
            ?>
                <td class="style39" bgcolor="#FF0000"><?php echo $objResult["percent_name"]; ?></td>
            <?php } else { ?>
                <td class="style39"><?php echo $objResult["percent_name"]; ?></td>
            <?php } ?>
            <td class="style39"><?php
                                $date1 = explode('-', $objResult["date_request"]);
                                $ydate = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
                                echo $ydate; ?></td>
            <td class="style39"><?php echo $objResult["sale_area"]; ?></td>


        </tr>

    <?php
        $i++;
    }
    ?>

</table>
<?php

$strSQL3 = "SELECT SUM(sum_price_product) AS sum_price_product3  FROM tb_register_data where sum_price_product!='0' and summary_product1 !=''";

if ($start_date != "") {
    $strSQL3 .= ' AND date_plan  >= "' . $start_date . '"';
}

if ($end_date != "") {
    $strSQL3 .= ' AND date_plan  <= "' . $end_date . '"';
}

if ($start_send != "") {
    $strSQL3 .= ' AND date_request  >= "' . $start_send . '"';
}


if ($date_sum != '') {
    $strSQL3 .= ' AND date_request  NOT LIKE "%' . $date_sum . '%"';
}


if ($end_send != "") {
    $strSQL3 .= ' AND date_request  <= "' . $end_send . '"';
}

if ($sale_code != "") {
    $strSQL3 .= ' AND sale_area = "' . $sale_code . '"';
}
if ($start_nd != "") {
    $strSQL3 .= ' AND date_request  >= "' . $start_nd . '"';
}

if ($end_nd != "") {
    $strSQL3 .= ' AND date_request  <= "' . $end_nd . '"';
}

if ($percent_id != "") {
    $strSQL3 .= ' AND percent_id = "' . $percent_id . '"';
}

if ($start_order != "") {
    $strSQL3 .= ' AND month_po   >= "' . $start_order . '"';
}

if ($end_order != "") {
    $strSQL3 .= ' AND month_po   <= "' . $end_order . '"';
}

if ($date_summ != '') {
    $strSQL3 .= ' AND date_request  NOT LIKE "%' . $date_summ . '%"';
}

if ($summary_order != '') {
    $strSQL3 .= ' AND summary_order = "' . $summary_order . '"';
} else if ($summ != '') {
    $strSQL3 .= ' AND summary_order != "' . $summ . '"';
} else if ($start_order != "" or $start_date != '' or $date_summ != '') {
} else {
    $strSQL3 .= ' AND summary_order = "0"';
}

$objQuery3 = mysqli_query($conn, $strSQL3) or die("Error Query [" . $strSQL3 . "]");
$Num_Rows3 = mysqli_num_rows($objQuery3);
$objResult3 = mysqli_fetch_array($objQuery3);

?>


<table>

    <tr>
        <td class="style40" align="center"><?php echo 'ยอดรวมทั้งหมด'; ?>&nbsp;&nbsp;<?php echo number_format($objResult3['sum_price_product3'], 0) . ""; ?>&nbsp;&nbsp;<?php echo 'บาท'; ?></td>

    </tr>
</table>

<?php
$content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
require_once __DIR__ . '/layouts/Main.php';
?>