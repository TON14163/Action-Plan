<?php
ob_start();
error_reporting(0);
?>
            <center><h4>รายงานสรุปการประมาณการขายตามเปอร์เซ็นต์</h4></center>
            <form name="frmSearch" method="GET" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

                <?php
                $start_date = $_GET["start_date"];
                $end_date = $_GET["end_date"];
                $start_send = $_GET["start_send"];
                $end_send = $_GET["end_send"];
                $sale_code = $_GET["sale_code"];
                $percent_id = $_GET["percent_id"];
                $summary_order = $_GET["summary_order"];
                $start_order = $_GET["start_order"];
                $end_order = $_GET["end_order"];
                $start_nd = $_GET["start_nd"];
                $end_nd = $_GET["end_nd"];
                $date_sum = $_GET["date_sum"];
                $date_summ = $_GET["date_summ"];
                $summ = $_GET["summ"];
                ?>
            </form>

            <table class="table-thead-custom-awl table-bordered border-secondary" style="width: 100%; font-size:14px;" >
                <tr>
                    <td width="8%" align="center" bgcolor="#ebe4ed">วันที่ตั้งเรื่อง</td>
                    <td width="8%" align="center" bgcolor="#ebe4ed">วันที่จะได้รับ PO</td>
                    <td width="15%" align="center" bgcolor="#ebe4ed">โรงพยาบาล</td>
                    <td width="15%" align="center" bgcolor="#ebe4ed">หน่วยงาน</td>
                    <td width="24%" align="center" bgcolor="#ebe4ed">รายการ</td>
                    <td width="8%" align="center" bgcolor="#ebe4ed">จำนวน</td>
                    <td width="9%" align="center" bgcolor="#ebe4ed">มูลค่า</td>
                    <td width="5%" align="center" bgcolor="#ebe4ed">เปอร์เซ็น</td>
                    <td width="10%" align="center" bgcolor="#ebe4ed">วันที่คาดว่าจะส่งสินค้า</td>
                    <td width="10%" align="center" bgcolor="#ebe4ed">เขตการขาย</td>
                </tr>
                <?php
                if ($sale_code == 'SS1') {
                    $sddd = "   and sale_area !='S11'  and sale_area !='S12' and sale_area !='S13'  and sale_area !='S17'  and sale_area !='S23'  and sale_area !='S24'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1'";
                } else if ($sale_code == 'SS2') {
                    $sddd = " and sale_area !='S14'  and sale_area !='S15' and sale_area !='S16'  and sale_area !='S21'  and sale_area !='S22'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1'";
                } else if ($sale_code == 'SS3') {
                    $sddd = "  and sale_area !='S14'  and sale_area !='S15' and sale_area !='S16'  and sale_area !='S21'  and sale_area !='S22'  and sale_area !='S11'  and sale_area !='S12' and sale_area !='S13'  and sale_area !='S17'  and sale_area !='S23'  and sale_area !='S24'";
                } else if ($sale_code == 'All') {
                    $sddd = " and sale_area !='S31' and sale_area !='S32' and sale_area !='SM1' and sale_area !='MM1'";
                }

                $strSQL = "SELECT *  FROM tb_register_data where sum_price_product!='0' and summary_product1 !='' $sddd";
                if ($start_date != "") {
                    $strSQL .= ' AND date_plan  >= "' . $start_date . '"';
                }

                if ($end_date != "") {
                    $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
                }

                if ($start_send != "") {
                    $strSQL .= ' AND date_request  >= "' . $start_send . '"';
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

                if ($date_sum != '') {
                    $strSQL .= ' AND date_request  NOT LIKE "%' . $date_sum . '%"';
                }

                if ($date_summ != '') {
                    $strSQL .= ' AND date_request  NOT LIKE "%' . $date_summ . '%"';
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
                        <td><?php $date = explode('-', $objResult["date_plan"]);
                            $xdate = $date[2] . '-' . $date[1] . '-' . $date[0];
                            echo $xdate; ?>
                        </td>
                        <td><?php
                            $ydate = explode('-', $objResult["month_po"]);
                            $odate = $ydate[2] . '-' . $ydate[1] . '-' . $ydate[0];
                            echo $odate; ?>
                        </td>
                        <td><?php echo $objResult["hospital_name"];?></td>
                        <td><?php echo $objResult["hospital_ward"];?></td>
                        <td><?php echo $objResult["summary_product1"];?></td>
                        <td align="right"> 
                            <?php if ($objResult["unit_product1"] != '0') {
                                    echo $objResult["unit_product1"];
                                } ?>&nbsp;<?php echo $objResult["unit_name1"]; ?>
                        </td>
                        <td align="right"><?php $sum_price_product = $objResult["sum_price_product"]; echo number_format($sum_price_product, 0) . ""; ?></td>
                        <?php
                        if ($objResult["percent_id"] == '1') {
                        ?>
                            <td bgcolor="#00FF00"><?php echo $objResult["percent_name"]; ?></td>
                        <?php } else if ($objResult["percent_id"] == '2') { ?>
                            <td bgcolor="#CCFF99"><?php echo $objResult["percent_name"]; ?></td>
                        <?php } else if ($objResult["percent_id"] == '3') { ?>
                            <td bgcolor="#FFFF00"><?php echo $objResult["percent_name"]; ?></td>
                        <?php
                        } else if ($objResult["percent_id"] == '4') {
                        ?>
                            <td bgcolor="#FF6600"><?php echo $objResult["percent_name"]; ?></td>
                        <?php
                        } else if ($objResult["percent_id"] == '5') {
                        ?>
                            <td bgcolor="#FF0000"><?php echo $objResult["percent_name"]; ?></td>
                        <?php } else { ?>
                            <td><?php echo $objResult["percent_name"]; ?></td>
                        <?php } ?>
                        <td><?php
                            $date1 = explode('-', $objResult["date_request"]);
                            $ydate = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
                            echo $ydate; ?></td>
                        <td><?php echo $objResult["sale_area"]; ?></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </table>
            <?php
            $strSQL1 = "SELECT SUM(sum_price_product) AS sum_price_product1  FROM tb_register_data where  sum_price_product!='0' and summary_product1 !='' $sddd";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_plan  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_plan  <= "' . $end_date . '"';
            }

            if ($start_send != "") {
                $strSQL1 .= ' AND date_request  >= "' . $start_send . '"';
            }

            if ($end_send != "") {
                $strSQL1 .= ' AND date_request  <= "' . $end_send . '"';
            }

            if ($percent_id != "") {
                $strSQL1 .= ' AND percent_id = "' . $percent_id . '"';
            }

            if ($start_order != "") {
                $strSQL1 .= ' AND month_po  >= "' . $start_order . '"';
            }

            if ($end_order != "") {
                $strSQL1 .= ' AND month_po  <= "' . $end_order . '"';
            }

            if ($start_nd != "") {
                $strSQL1 .= ' AND date_request  >= "' . $start_nd . '"';
            }

            if ($end_nd != "") {
                $strSQL1 .= ' AND date_request  <= "' . $end_nd . '"';
            }

            if ($date_sum != '') {
                $strSQL1 .= ' AND date_request  NOT LIKE "%' . $date_sum . '%"';
            }

            if ($date_summ != '') {
                $strSQL1 .= ' AND date_request  NOT LIKE "%' . $date_summ . '%"';
            }

            if ($summary_order != '') {
                $strSQL1 .= ' AND summary_order = "' . $summary_order . '"';
            } else if ($summ != '') {
                $strSQL1 .= ' AND summary_order != "' . $summ . '"';
            } else if ($start_order != "" or $start_date != '' or $date_summ != '') {
            } else {
                $strSQL1 .= ' AND summary_order = "0"';
            }
            //echo $strSQL1;
            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);
            $objResult1 = mysqli_fetch_array($objQuery1);

            ?>
            <table>
                <tr>
                    <td align="center"><?php echo "ยอดรวมทั้งหมด"; ?>&nbsp;&nbsp;<?php echo number_format($objResult1["sum_price_product1"], 0) . "";; ?>&nbsp;&nbsp;<?php echo 'บาท'; ?></td>
                </tr>
            </table>

<?php
$content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
require_once __DIR__ . '/layouts/Main.php';
?>