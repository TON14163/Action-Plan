<?php
ob_start();
error_reporting(0);
?>

<style>
    th {
        text-align: center;
        vertical-align: middle;
        background-color: #ededed;
    }

    td {
        text-align: center;
        vertical-align: middle;
    }

    a {
        text-decoration: none;
    }

    td:nth-child(8) {
        background-color: #FF3333;
    }

    td:nth-child(7) {
        background-color: #FF6600;
    }

    td:nth-child(6) {
        background-color: #FFFF00;
    }

    td:nth-child(5) {
        background-color: #CCFF99;
    }

    td:nth-child(4) {
        background-color: #00FF00;
    }
</style>

<center>
    <h2><span>รายงานสรุปการปรับปรุงประมาณการขายตามช่วงเวลา</span></h2>
</center>
<form name="frmSearch" method="POST" action="<?php echo $url; ?>">
    <center>
        <label for="start_date">ระยะเวลา :</label>
        <input name="start_date" type="date" id="start_date" value="<?php echo isset($_POST["start_date"]) ? $_POST["start_date"] : ''; ?>" required>
        <label for="end_date">ถึง :</label>
        <input name="end_date" type="date" id="end_date" value="<?php echo isset($_POST["end_date"]) ? $_POST["end_date"] : ''; ?>" required>
        <br>
        เขตการขาย :
        <?php if ($_SESSION['em_id'] == 'SS1') { ?>
            <?php if ($_POST["sall"] == '1') { ?>
                <input name="sall" type="checkbox" id="sall" checked='checked' value="1"> Total
            <?php } else { ?>
                <input name="sall" type="checkbox" id="sall" value="1"> Total
            <?php } ?>

            <?php if ($_POST["s14"] == '1') { ?>
                <input name="s14" type="checkbox" id="s14" checked='checked' value="1"> S14
            <?php } else { ?>
                <input name="s14" type="checkbox" id="s14" value="1"> S14
            <?php } ?>

            <?php if ($_POST["s15"] == '1') { ?>
                <input name="s15" type="checkbox" id="s15" checked='checked' value="1"> S15
            <?php } else { ?>
                <input name="s15" type="checkbox" id="s15" value="1"> S15
            <?php } ?>

            <?php if ($_POST["s16"] == '1') { ?>
                <input name="s16" type="checkbox" id="s16" checked='checked' value="1"> S16
            <?php } else { ?>
                <input name="s16" type="checkbox" id="s16" value="1"> S16
            <?php } ?>

            <?php if ($_POST["s21"] == '1') { ?>
                <input name="s21" type="checkbox" id="s21" checked='checked' value="1"> S21
            <?php } else { ?>
                <input name="s21" type="checkbox" id="s21" value="1"> S21
            <?php } ?>

            <?php if ($_POST["s22"] == '1') { ?>
                <input name="s22" type="checkbox" id="s22" checked='checked' value="1"> S22
            <?php } else { ?>
                <input name="s22" type="checkbox" id="s22" value="1"> S22
            <?php } ?>


            <?php // }else if($_SESSION['em_id']=='SS2' || $_SESSION['em_id'] == 'VMD' || $_SESSION['em_id'] == 'MD1' || $_SESSION['em_id'] == 'IT2' || $_SESSION['em_id'] == 'PRM'){ 
            ?>
        <?php  } else if ($_SESSION['em_id'] == 'SS2') { ?>

            <?php if ($_POST["sasll"] == '1') { ?>
                <input name="sasll" type="checkbox" id="sall" checked='checked' value="1"> Total Hos
            <?php } else { ?>
                <input name="sasll" type="checkbox" id="sall" value="1"> Total Hos
            <?php } ?>

            <?php if ($_POST["sall"] == '1') { ?>
                <input name="sall" type="checkbox" id="sall" checked='checked' value="1"> Total
            <?php } else { ?>
                <input name="sall" type="checkbox" id="sall" value="1"> Total
            <?php } ?>

            <?php if ($_POST["s11"] == '1') { ?>
                <input name="s11" type="checkbox" id="s11" checked='checked' value="1"> S11
            <?php } else { ?>
                <input name="s11" type="checkbox" id="s11" value="1"> S11
            <?php } ?>

            <?php if ($_POST["s12"] == '1') { ?>
                <input name="s12" type="checkbox" id="s12" checked='checked' value="1"> S12
            <?php } else { ?>
                <input name="s12" type="checkbox" id="s12" value="1"> S12
            <?php } ?>

            <?php if ($_POST["s13"] == '1') { ?>
                <input name="s13" type="checkbox" id="s13" checked='checked' value="1"> S13
            <?php } else { ?>
                <input name="s13" type="checkbox" id="s13" value="1"> S13
            <?php } ?>


            <?php if ($_POST["s17"] == '1') { ?>
                <input name="s17" type="checkbox" id="s17" checked='checked' value="1"> S17
            <?php } else { ?>
                <input name="s17" type="checkbox" id="s17" value="1"> S17
            <?php } ?>

            <?php if ($_POST["s24"] == '1') { ?>
                <input name="s24" type="checkbox" id="s24" checked='checked' value="1"> S24
            <?php } else { ?>
                <input name="s24" type="checkbox" id="s24" value="1"> S24
            <?php } ?>



        <?php } else if ($_SESSION['em_id'] == 'SS3') { ?>

            <?php if ($_POST["sall"] == '1') { ?>
                <input name="sall" type="checkbox" id="sall" checked='checked' value="1"> Total
            <?php } else { ?>
                <input name="sall" type="checkbox" id="sall" value="1"> Total
            <?php } ?>

            <?php if ($_POST["s31"] == '1') { ?>
                <input name="s31" type="checkbox" id="s31" checked='checked' value="1"> S31
            <?php } else { ?>
                <input name="s31" type="checkbox" id="s31" value="1"> S31
            <?php  } ?>

            <?php if ($_POST["s32"] == '1') { ?>
                <input name="s32" type="checkbox" id="s32" checked='checked' value="1"> S32
            <?php } else { ?>
                <input name="s32" type="checkbox" id="s32" value="1"> S32
            <?php  } ?>

            <?php if ($_POST["mm1"] == '1') { ?>
                <input name="mm1" type="checkbox" id="mm1" checked='checked' value="1"> MM1
            <?php } else { ?>
                <input name="mm1" type="checkbox" id="mm1" value="1"> MM1
            <?php  } ?>

        <?php } else { ?>

            <?php if ($_POST["sall"] == '1') { ?>
                <input name="sall" type="checkbox" id="sall" checked='checked' value="1"> Total
            <?php } else { ?>
                <input name="sall" type="checkbox" id="sall" value="1"> Total
            <?php } ?>

            <?php if ($_POST["s11"] == '1') { ?>
                <input name="s11" type="checkbox" id="s11" checked='checked' value="1"> S11
            <?php } else { ?>
                <input name="s11" type="checkbox" id="s11" value="1"> S11
            <?php } ?>

            <?php if ($_POST["s12"] == '1') { ?>
                <input name="s12" type="checkbox" id="s12" checked='checked' value="1"> S12
            <?php } else { ?>
                <input name="s12" type="checkbox" id="s12" value="1"> S12
            <?php } ?>

            <?php if ($_POST["s13"] == '1') { ?>
                <input name="s13" type="checkbox" id="s13" checked='checked' value="1"> S13
            <?php } else { ?>
                <input name="s13" type="checkbox" id="s13" value="1"> S13
            <?php } ?>

            <?php if ($_POST["s14"] == '1') { ?>
                <input name="s14" type="checkbox" id="s14" checked='checked' value="1"> S14
            <?php } else { ?>
                <input name="s14" type="checkbox" id="s14" value="1"> S14
            <?php } ?>

            <?php if ($_POST["s15"] == '1') { ?>
                <input name="s15" type="checkbox" id="s15" checked='checked' value="1"> S15
            <?php } else { ?>
                <input name="s15" type="checkbox" id="s15" value="1"> S15
            <?php } ?>

            <?php if ($_POST["s16"] == '1') { ?>
                <input name="s16" type="checkbox" id="s16" checked='checked' value="1"> S16
            <?php } else { ?>
                <input name="s16" type="checkbox" id="s16" value="1"> S16
            <?php } ?>

            <?php if ($_POST["s17"] == '1') { ?>
                <input name="s17" type="checkbox" id="s17" checked='checked' value="1"> S17
            <?php } else { ?>
                <input name="s17" type="checkbox" id="s17" value="1"> S17
            <?php } ?>

            <?php if ($_POST["s21"] == '1') { ?>
                <input name="s21" type="checkbox" id="s21" checked='checked' value="1"> S21
            <?php } else { ?>
                <input name="s21" type="checkbox" id="s21" value="1"> S21
            <?php } ?>

            <?php if ($_POST["s22"] == '1') { ?>
                <input name="s22" type="checkbox" id="s22" checked='checked' value="1"> S22
            <?php } else { ?>
                <input name="s22" type="checkbox" id="s22" value="1"> S22
            <?php } ?>

            <?php if ($_POST["s24"] == '1') { ?>
                <input name="s24" type="checkbox" id="s24" checked='checked' value="1"> S24
            <?php } else { ?>
                <input name="s24" type="checkbox" id="s24" value="1"> S24
            <?php } ?>

            <?php if ($_POST["s31"] == '1') { ?>
                <input name="s31" type="checkbox" id="s31" checked='checked' value="1"> S31
            <?php } else { ?>
                <input name="s31" type="checkbox" id="s31" value="1"> S31
            <?php } ?>

            <?php if ($_POST["s32"] == '1') { ?>
                <input name="s32" type="checkbox" id="s32" checked='checked' value="1"> S32
            <?php } else { ?>
                <input name="s32" type="checkbox" id="s32" value="1"> S32
            <?php } ?>

            <?php if ($_POST["mm1"] == '1') { ?>
                <input name="mm1" type="checkbox" id="mm1" checked='checked' value="1"> MM1
            <?php } else { ?>
                <input name="mm1" type="checkbox" id="mm1" value="1"> MM1
            <?php } ?>

        <?php } ?>

        <br>
        <input type="submit" value="Search" class="button button4">
    </center>

    <?php

    $start_date = isset($_POST["start_date"]) ? $_POST["start_date"] : '';
    $end_date = isset($_POST["end_date"]) ? $_POST["end_date"] : '';
    $date_plan = $start_date ? substr($start_date, 0, -3) : '';

    $sall = $_POST["sall"];
    $sasll = $_POST["sasll"];
    $s11 = $_POST["s11"];
    $s12 = $_POST["s12"];
    $s13 = $_POST["s13"];
    $s14 = $_POST["s14"];
    $s15 = $_POST["s15"];
    $s16 = $_POST["s16"];
    $s17 = $_POST["s17"];
    $s21 = $_POST["s21"];
    $s22 = $_POST["s22"];
    $s24 = $_POST["s24"];
    $s31 = $_POST["s31"];
    $s32 = $_POST["s32"];
    $mm1 = $_POST["mm1"];

    if ($_SESSION['em_id'] == 'SS1') {
        $sddd = "   and sale_area !='S11'  and sale_area !='S12' and sale_area !='S13'  and sale_area !='S17'  and sale_area !='S23'  and sale_area !='S24'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1'";
        $sfff = "   and sale_code !='S11'  and sale_code !='S12' and sale_code !='S13'  and sale_code !='S17'  and sale_code !='S23'  and sale_code !='S24'  and sale_code !='S31' and sale_code !='SM1' and sale_code !='MM1' and sale_code NOT LIKE '%EN%' and sale_code !='MM2' and sale_code !='S32'";
        echo '1';
    } else if ($_SESSION['em_id'] == 'SS2') {
        $sddd = "  and sale_area !='S14'  and sale_area !='S15' and sale_area !='S16'  and sale_area !='S21'  and sale_area !='S22'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1'";
        $sfff = "  and sale_code !='S14'  and sale_code !='S15' and sale_code !='S16'  and sale_code !='S21'  and sale_code !='S22'  and sale_code !='S31' and sale_code !='SM1' and sale_code !='MM1' and sale_code !='MM2' and sale_code !='S32' and sale_code NOT LIKE '%EN%'";
        echo '2';
    } else if ($_SESSION['em_id'] == 'SS3') {
        $sddd = "  and sale_area ='S31'";
        $sfff = "  and sale_code ='S31'";

        echo '3';
    } else if($_SESSION['em_id']=='SS2' || $_SESSION['em_id'] == 'VMD' || $_SESSION['em_id'] == 'MD1' || $_SESSION['em_id'] == 'IT2' || $_SESSION['em_id'] == 'PRM'){

    } else {
        $sddd = "";
        $sfff = " and sale_code NOT LIKE '%EN%' and sale_code !='S31' and sale_code !='SM1' and sale_code !='MM1' and sale_code !='MM2' and sale_code !='S32'";
    }

    ?>

    <?php if ($sasll != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>Total HOS</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !=''  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32'  ";

                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }



                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !=''  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !=''  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !=''  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	



                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !=''  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);


                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }


            //ยอดขาย	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);



            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>

                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a></td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a></td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a></td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            //$strSQL15 = "SELECT SUM(amount) AS amount  FROM tb__buypro where type_arae = '1'  and sale_code NOT LIKE '%EN%' and sale_code !='S31' and sale_code !='SM1' and sale_code !='MM1' and sale_code !='MM2' and sale_code !='S32'";
            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !=''  and sale_code NOT LIKE '%EN%' and sale_code !='S31' and sale_code !='SM1' and sale_code !='MM1' and sale_code !='MM2' and sale_code !='S32'";

            if ($start_date != "") {
                //$strSQL15 .= ' AND doc_date  >= "'.$start_date.'"'; 
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                // $strSQL15 .= ' AND doc_date  <= "'.$end_date.'"'; 
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }
            //echo $strSQL15;	
            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);


            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1'  and sale_code NOT LIKE '%EN%' and sale_code !='S31' and sale_code !='SM1' and sale_code !='MM1' and sale_code !='MM2' and sale_code !='S32'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);


            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area !='S31' and sale_area !='SM1' and sale_area !='MM1' and sale_area !='S32' ";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);

            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>
                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00"><a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a></td>


                <td align="center" bgcolor="#CCFF99"><a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a></td>

                <td align="center" bgcolor="#FFFF00"><a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a></td>

                <td align="center" bgcolor="#FF6600"><a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a></td>

                <td align="center" bgcolor="#FF3333"><a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&percent_id=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a></td>

            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sasll=<?php echo '1'; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00"><?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?>
                </td>

            </tr>
        </table>
        <br><br>


    <?php } ?>



    <?php if ($sall != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>Total</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' $sddd";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' $sddd ";

                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }



                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' $sddd";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' $sddd";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' $sddd";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' $sddd";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' $sddd";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' $sddd";

                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	



                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' $sddd";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' $sddd";

                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);


                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }


            //ยอดขาย	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);



            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>

                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a></td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a></td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a></td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            //$strSQL15 = "SELECT SUM(amount) AS amount  FROM tb__buypro where type_arae = '1' $sfff";
            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' $sfff";

            if ($start_date != "") {
                //$strSQL15 .= ' AND doc_date  >= "'.$start_date.'"'; 
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                // $strSQL15 .= ' AND doc_date  <= "'.$end_date.'"'; 
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }
            //echo $strSQL15;	
            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);


            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' $sfff";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);


            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' $sddd";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);

            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>
                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00"><a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a></td>


                <td align="center" bgcolor="#CCFF99"><a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a></td>

                <td align="center" bgcolor="#FFFF00"><a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a></td>

                <td align="center" bgcolor="#FF6600"><a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a></td>

                <td align="center" bgcolor="#FF3333"><a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a></td>

            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00"><?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?>
                </td>

            </tr>
        </table>
        <br><br>


    <?php } ?>




    <?php if ($s11 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S11</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S11' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S11'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S11'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S11'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S11'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S11"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S11'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S11'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S11'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S11"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S11"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S11"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S11"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S11"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S11"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S11"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S11"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>


    <?php } ?>




    <?php if ($s12 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S12</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S12' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S12'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S12'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S12'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S12'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S12"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S12'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S12'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S12'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S12"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S12"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S12"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S12"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S12"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S12"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S12"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S12"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>


    <?php } ?>

    <?php if ($s13 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S13</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S13' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S13'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S13'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S13'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($Num_Rows11 > 1) {
                    $objResult11 = mysqli_fetch_array($objQuery11);
                }

                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S13'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S13"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S13'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S13'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S13'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S13"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S13"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S13"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S13"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S13"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S13"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S13"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S13"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>




    <?php } ?>

    <?php if ($s14 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S14</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S14' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S14'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S14'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S14'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	



                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S14'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S14"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S14'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S14'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S14'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S14"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S14"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S14"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S14"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S14"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S14"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S14"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S14"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>



    <?php } ?>


    <?php if ($s15 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S15</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S15' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S15'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S15'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S15'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	



                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S15'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S15"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S15'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S15'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S15'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S15"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S15"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S15"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S15"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S15"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S15"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S15"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S15"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>




    <?php } ?>

    <?php if ($s16 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S16</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S16' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S16'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S16'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S16'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S16'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S16"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S16'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S16'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S16'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S16"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S16"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S16"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S16"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S16"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S16"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S16"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S16"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>




    <?php } ?>

    <?php if ($s17 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S17</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S17' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S17'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S17'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S17'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S17'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S17"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S17'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S17'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S17'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S17"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S17"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S17"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S17"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S17"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S17"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S17"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S17"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>



    <?php } ?>


    <?php if ($s21 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S21</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S21' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S21'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S21'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S21'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	



                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S21'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S21"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S21'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S21'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S21'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S21"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S21"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S21"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S21"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S21"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S21"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S21"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S21"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>



    <?php } ?>

    <?php if ($s22 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S22</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S22' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S22'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S22'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S22'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S22'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S22"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S22'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S22'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S22'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S22"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S22"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S22"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S22"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S22"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S22"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S22"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S22"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>



    <?php } ?>

    <?php if ($s24 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S24</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S24' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S24'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S24'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S24'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S24'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S24"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S24'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S24'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S24'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S24"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S24"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S24"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S24"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S24"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S24"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S24"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S24"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>



    <?php } ?>





    <?php if ($s31 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S31</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S31' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S31'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S31'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S31'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S31'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S31"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S31'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S31'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S31'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S31"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S31"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S31"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S31"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S31"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S31"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S31"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S31"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>



    <?php } ?>


    <?php if ($s32 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>S32</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S32' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S32'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S32'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S32'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='S32'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "S32"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='S32'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='S32'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='S32'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "S32"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "S32"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "S32"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "S32"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "S32"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "S32"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "S32"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "S32"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
        <br><br>



    <?php } ?>



    <?php if ($mm1 != '' and $start_date != '' and $end_date != '') { ?>
        <h5><span>MM1</span></h5>
        <table class="table table-bordered mt-3">
            <tr>
                <th width="10%" align="center" style="background-color:#ededed;">สีเดิม/สีปัจจุบัน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายใหม่ของเดือน</th>
                <th width="10%" align="center" style="background-color:#ededed;">ยอดขายจากประมาณการ</th>
                <th width="10%" align="center" style="background-color:#ededed;">100 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">90-99 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">80-89 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">50-80 %</th>
                <th width="10%" align="center" style="background-color:#ededed;">0-50 %</th>

            </tr>

            <?php

            //100%	

            $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='1' and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL1 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL1 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
            $Num_Rows1 = mysqli_num_rows($objQuery1);

            $sum = 0;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $i = 0;
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            while ($objResult1 = mysqli_fetch_array($objQuery1)) {

                $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult1["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='MM1' ";
                if ($start_date != "") {
                    $strSQL .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL .= 'order by id_run DESC';

                $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
                $Num_Rows = mysqli_num_rows($objQuery);
                $objResult = mysqli_fetch_array($objQuery);


                if ($objResult["percent_id"] == '1') {
                    $sum = $objResult1["sum_price_product"] + $sum;
                    $sum++;
                    $i++;
                }

                if ($objResult["percent_id"] == '2') {
                    $sum1 = $objResult1["sum_price_product"] + $sum1;
                    $sum1++;
                    $i1++;
                }

                if ($objResult["percent_id"] == '3') {
                    $sum2 = $objResult1["sum_price_product"] + $sum2;
                    $sum2++;
                    $i2++;
                }

                if ($objResult["percent_id"] == '4') {
                    $sum3 = $objResult1["sum_price_product"] + $sum3;
                    $sum3++;
                    $i3++;
                }

                if ($objResult["percent_id"] == '5') {
                    $sum4 = $objResult1["sum_price_product"] + $sum4;
                    $sum4++;
                    $i4++;
                }
            }

            ?>

            <?php

            //99%	

            $strSQL01 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='2' and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL01 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL01 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery01 = mysqli_query($conn, $strSQL01) or die("Error Query [" . $strSQL01 . "]");
            $Num_Rows01 = mysqli_num_rows($objQuery01);

            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $i5 = 0;
            $i6 = 0;
            $i7 = 0;
            $i8 = 0;
            $i9 = 0;
            while ($objResult01 = mysqli_fetch_array($objQuery01)) {

                $strSQL0 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult01["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='MM1'";

                if ($start_date != "") {
                    $strSQL0 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL0 .= 'order by id_run DESC';

                $objQuery0 = mysqli_query($conn, $strSQL0) or die("Error Query [" . $strSQL0 . "]");
                $Num_Rows0 = mysqli_num_rows($objQuery0);
                $objResult0 = mysqli_fetch_array($objQuery0);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult0["percent_id"] == '1') {
                    $sum5 = $objResult01["sum_price_product"] + $sum5;
                    $sum5++;
                    $i5++;
                }

                if ($objResult0["percent_id"] == '2') {
                    $sum6 = $objResult01["sum_price_product"] + $sum6;
                    $sum6++;
                    $i6++;
                }

                if ($objResult0["percent_id"] == '3') {
                    $sum7 = $objResult01["sum_price_product"] + $sum7;
                    $sum7++;
                    $i7++;
                }

                if ($objResult0["percent_id"] == '4') {
                    $sum8 = $objResult01["sum_price_product"] + $sum8;
                    $sum8++;
                    $i8++;
                }

                if ($objResult0["percent_id"] == '5') {
                    $sum9 = $objResult01["sum_price_product"] + $sum9;
                    $sum9++;
                    $i9++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL02 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='3' and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL02 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL02 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery02 = mysqli_query($conn, $strSQL02) or die("Error Query [" . $strSQL02 . "]");
            $Num_Rows02 = mysqli_num_rows($objQuery02);

            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $i10 = 0;
            $i11 = 0;
            $i12 = 0;
            $i13 = 0;
            $i14 = 0;
            while ($objResult02 = mysqli_fetch_array($objQuery02)) {

                $strSQL10 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult02["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='MM1'";

                if ($start_date != "") {
                    $strSQL10 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL10 .= 'order by id_run DESC';

                $objQuery10 = mysqli_query($conn, $strSQL10) or die("Error Query [" . $strSQL10 . "]");
                $Num_Rows10 = mysqli_num_rows($objQuery10);
                $objResult10 = mysqli_fetch_array($objQuery10);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult10["percent_id"] == '1') {
                    $sum10 = $objResult02["sum_price_product"] + $sum10;
                    $sum10++;
                    $i10++;
                }

                if ($objResult10["percent_id"] == '2') {
                    $sum11 = $objResult02["sum_price_product"] + $sum11;
                    $sum11++;
                    $i11++;
                }

                if ($objResult10["percent_id"] == '3') {
                    $sum12 = $objResult02["sum_price_product"] + $sum12;
                    $sum12++;
                    $i12++;
                }

                if ($objResult10["percent_id"] == '4') {
                    $sum13 = $objResult02["sum_price_product"] + $sum13;
                    $sum13++;
                    $i13++;
                }

                if ($objResult10["percent_id"] == '5') {
                    $sum14 = $objResult02["sum_price_product"] + $sum14;
                    $sum14++;
                    $i14++;
                }
            }
            ?>
            <?php

            //99%	

            $strSQL03 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='4' and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL03 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL03 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery03 = mysqli_query($conn, $strSQL03) or die("Error Query [" . $strSQL03 . "]");
            $Num_Rows03 = mysqli_num_rows($objQuery03);

            $sum15 = 0;
            $sum16 = 0;
            $sum17 = 0;
            $sum18 = 0;
            $sum19 = 0;
            $i15 = 0;
            $i16 = 0;
            $i17 = 0;
            $i18 = 0;
            $i19 = 0;
            while ($objResult03 = mysqli_fetch_array($objQuery03)) {

                $strSQL11 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult03["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='MM1'";
                if ($start_date != "") {
                    $strSQL11 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL11 .= 'order by id_run DESC';

                $objQuery11 = mysqli_query($conn, $strSQL11) or die("Error Query [" . $strSQL11 . "]");
                $Num_Rows11 = mysqli_num_rows($objQuery11);
                $objResult11 = mysqli_fetch_array($objQuery11);
                //$objResult = mysqli_fetch_array($objQuery);	


                if ($objResult11["percent_id"] == '1') {
                    $sum15 = $objResult03["sum_price_product"] + $sum15;
                    $sum15++;
                    $i15++;
                }

                if ($objResult11["percent_id"] == '2') {
                    $sum16 = $objResult03["sum_price_product"] + $sum16;
                    $sum16++;
                    $i16++;
                }

                if ($objResult11["percent_id"] == '3') {
                    $sum17 = $objResult03["sum_price_product"] + $sum17;
                    $sum17++;
                    $i17++;
                }

                if ($objResult11["percent_id"] == '4') {
                    $sum18 = $objResult03["sum_price_product"] + $sum18;
                    $sum18++;
                    $i18++;
                }

                if ($objResult11["percent_id"] == '5') {
                    $sum19 = $objResult03["sum_price_product"] + $sum19;
                    $sum19++;
                    $i19++;
                }
            }
            ?>

            <?php

            //99%	

            $strSQL04 = "SELECT id_work,sum_price_product FROM tb_register_data where summary_order='0' and summary_product1!='' and percent_id='5' and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL04 .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL04 .= ' AND date_update  <= "' . $end_date . '"';
            }

            $objQuery04 = mysqli_query($conn, $strSQL04) or die("Error Query [" . $strSQL04 . "]");
            $Num_Rows04 = mysqli_num_rows($objQuery04);

            $sum20 = 0;
            $sum21 = 0;
            $sum22 = 0;
            $sum23 = 0;
            $sum24 = 0;
            $i20 = 0;
            $i21 = 0;
            $i22 = 0;
            $i23 = 0;
            $i24 = 0;
            while ($objResult04 = mysqli_fetch_array($objQuery04)) {

                $strSQL12 = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  where id_work ='" . $objResult04["id_work"] . "' and sum_price_product!='0' and summary_product1 !='' and sale_area ='MM1'";
                if ($start_date != "") {
                    $strSQL12 .= ' AND date_update  <= "' . $start_date . '"';
                }

                $strSQL12 .= 'order by id_run DESC';

                $objQuery12 = mysqli_query($conn, $strSQL12) or die("Error Query [" . $strSQL12 . "]");
                $Num_Rows12 = mysqli_num_rows($objQuery12);
                $objResult12 = mysqli_fetch_array($objQuery12);
                //$objResult = mysqli_fetch_array($objQuery);	

                if ($objResult12["percent_id"] == '1') {
                    $sum20 = $objResult04["sum_price_product"] + $sum20;
                    $sum20++;
                    $i20++;
                }

                if ($objResult12["percent_id"] == '2') {
                    $sum21 = $objResult04["sum_price_product"] + $sum21;
                    $sum21++;
                    $i21++;
                }

                if ($objResult12["percent_id"] == '3') {
                    $sum22 = $objResult04["sum_price_product"] + $sum22;
                    $sum22++;
                    $i22++;
                }

                if ($objResult12["percent_id"] == '4') {
                    $sum23 = $objResult04["sum_price_product"] + $sum23;
                    $sum23++;
                    $i23++;
                }

                if ($objResult12["percent_id"] == '5') {
                    $sum24 = $objResult04["sum_price_product"] + $sum24;
                    $sum24++;
                    $i24++;
                }
            }



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult0 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult11 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult12 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult13 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan NOT LIKE '%$date_plan%'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult14 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and date_plan  LIKE '%$date_plan%'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult5 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and date_plan  LIKE '%$date_plan%'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult6 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and date_plan  LIKE '%$date_plan%'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult7 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and date_plan  LIKE '%$date_plan%'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult8 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='1' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and date_plan  LIKE '%$date_plan%'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_order  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_order  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult9 = mysqli_fetch_array($objQuery);


            ?>
            <tr>
                <td align="center">100 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult5["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "1"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum - $i, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum5 - $i5, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum10 - $i10, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum15 - $i15, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum20 - $i20, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">90-99 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult6["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "2"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult11["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum1 - $i1, 0) . ""; ?></font>
                    </a>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum6 - $i6, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum11 - $i11, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum16 - $i16, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "2"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum21 - $i21, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>



            <tr>
                <td align="center">80-89 %</td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult7["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "3"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult12["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum2 - $i2, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum7 - $i7, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum12 - $i12, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum17 - $i17, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "3"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum22 - $i22, 0) . ""; ?></font>
                    </a>

                </td>

            </tr>



            <tr>
                <td align="center">50-80 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult8["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "4"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult13["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum3 - $i3, 0) . ""; ?></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum8 - $i8, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum13 - $i13, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum18 - $i18, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "4"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum23 - $i23, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>


            <tr>
                <td align="center">0-50 %</td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "yes"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult9["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "5"; ?>&s_ckk=<?php echo "no"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a>
                </td>


                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "1"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum4 - $i4, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "2"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum9 - $i9, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "3"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum14 - $i14, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "4"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum19 - $i19, 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l1?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&sale_code=<?php echo "MM1"; ?>&percent_id=<?php echo "5"; ?>&percent=<?php echo "5"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($sum24 - $i24, 0) . ""; ?></font>
                    </a>
                </td>

            </tr>

            <?php

            $strSQL15 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and sale_code ='MM1'";

            if ($start_date != "") {
                $strSQL15 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL15 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery15 = mysqli_query($sol, $strSQL15) or die("Error Query [" . $strSQL15 . "]");
            $Num_Rows15 = mysqli_num_rows($objQuery15);
            $objResult15 = mysqli_fetch_array($objQuery15);

            $strSQL16 = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) where status_doc='Approve' and iv_no !='' and plan_ckk ='1' and sale_code ='MM1'";

            if ($start_date != "") {
                $strSQL16 .= ' AND iv_date  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL16 .= ' AND iv_date  <= "' . $end_date . '"';
            }

            $objQuery16 = mysqli_query($sol, $strSQL16) or die("Error Query [" . $strSQL16 . "]");
            $Num_Rows16 = mysqli_num_rows($objQuery16);
            $objResult16 = mysqli_fetch_array($objQuery16);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1' and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2' and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult1 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3' and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult2 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4' and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }
            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult3 = mysqli_fetch_array($objQuery);



            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5' and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_update  >= "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_update  <= "' . $end_date . '"';
            }

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $start_date . '"';
            }


            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult4 = mysqli_fetch_array($objQuery);




            //สร้างใหม่	
            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='1'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult50 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='2'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult51 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='3'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult52 = mysqli_fetch_array($objQuery);

            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='4'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult53 = mysqli_fetch_array($objQuery);


            $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data  where summary_order ='0' and sum_price_product!='0' and summary_product1 !='' and percent_id='5'  and sale_area ='MM1'";

            if ($start_date != "") {
                $strSQL .= ' AND date_plan  > "' . $start_date . '"';
            }

            if ($end_date != "") {
                $strSQL .= ' AND date_plan  <= "' . $end_date . '"';
            }

            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);
            $objResult54 = mysqli_fetch_array($objQuery);
            ?>

            <tr>
                <td align="center">ประมาณการขายใหม่</td>

                <td align="center"></td>
                <td align="center"></td>

                <td align="center" bgcolor="#00FF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "1"; ?>&sale_code=<?php echo "MM1"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult50["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#CCFF99">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "2"; ?>&sale_code=<?php echo "MM1"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult51["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FFFF00">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "3"; ?>&sale_code=<?php echo "MM1"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult52["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF6600">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "4"; ?>&sale_code=<?php echo "MM1"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult53["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>

                <td align="center" bgcolor="#FF3333">
                    <a href="report_forecast_time_l3?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&percent_id=<?php echo "5"; ?>&sale_code=<?php echo "MM1"; ?>" target="_blank">
                        <font color="black"><b><?php echo number_format($objResult54["sum_price_product"], 0) . ""; ?></b></font>
                    </a>
                </td>
            </tr>


            <tr>
                <td align="center">ยอดขายจริง <a href="report_forecast_time_l4?start_date=<?php echo $start_date; ?>&sale_code=<?php echo "MM1"; ?>" target="_blank"><b>
                            <font color="purple" class="style16"><?php echo number_format($objResult15["amount"], 0) . ""; ?></font>
                        </b></a></td>

                <td align="center">
                    <a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo "MM1"; ?>" target="_blank">
                        <font color="green"><?php echo number_format($objResult5["sum_price_product"] + $objResult6["sum_price_product"] + $objResult7["sum_price_product"] + $objResult8["sum_price_product"] + $objResult9["sum_price_product"], 0) . ""; ?></font>
                        <font color="black">+<?php echo number_format($objResult16["amount"], 0) . ""; ?></font>
                    </a>
                </td>
                <td align="center"><a href="report_forecast_time_l2?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo "MM1"; ?>" target="_blank">
                        <font color="black"><?php echo number_format($objResult0["sum_price_product"] + $objResult11["sum_price_product"] + $objResult12["sum_price_product"] + $objResult13["sum_price_product"] + $objResult14["sum_price_product"], 0) . ""; ?></font>
                    </a></td>

                <td align="center" bgcolor="#00FF00">
                    <?php echo number_format($objResult["sum_price_product"] + $objResult50["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#CCFF99">
                    <?php echo number_format($objResult1["sum_price_product"] + $objResult51["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FFFF00">
                    <?php echo number_format($objResult2["sum_price_product"] + $objResult52["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF6600">
                    <?php echo number_format($objResult3["sum_price_product"] + $objResult53["sum_price_product"], 0) . ""; ?></td>

                <td align="center" bgcolor="#FF3333">
                    <?php echo number_format($objResult4["sum_price_product"] + $objResult54["sum_price_product"], 0) . ""; ?></td>
            </tr>
        </table>
    <?php } ?>
</form>


<?php
$content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main
require_once __DIR__ . '/layouts/Main.php';
?>