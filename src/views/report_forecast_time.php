<?php
ob_start();
(!isset($_GET['sale_code'])) ? $sale_code = $_SESSION['em_id'] : $sale_code = $_GET['sale_code'];
require_once __DIR__ . '/../controllers/report_forecast_time_controllers.php';
$show = new ReportForecastTime();
?>
<style>
    a{
        text-decoration: none;
        color: #202020;
    }
    td:nth-child(4) { background-color: #00FF00; }
    td:nth-child(5) { background-color: #CCFF99; }
    td:nth-child(6) { background-color: #FFFF00; }
    td:nth-child(7) { background-color: #FF6600; }
    td:nth-child(8) { background-color: #FF3333; }
</style>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานสรุปการปรับปรุงการประมานการขายตามช่วงเวลา</b>
</div>
<form action="<?php echo htmlspecialchars($url);?>" enctype="multipart/form-data" method="get"> 
    <div class="font-custom-awl-14">
        &nbsp;&nbsp;<b>วันที่</b> <input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>" required>
        <b>ถึง</b> <input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>" required>
    </div>
    <div class="row font-custom-awl-14" style="font-weight: 600;">
        <div class="col-2"><span>เขตการขาย</span></div>
        <div class="col-10">
            <?php if ($_SESSION['typelogin'] == 'Supervisor') { $saleSet = ''; ?>
                <span><input type="radio" name="sale_code" id="total" value="Total" <?php echo (($sale_code == 'Total') ? 'checked' : '');?>> <label for="total">Total</label></span>
                <div class="d-flex flex-wrap">
                    <?php
                    $allSale = array();
                    switch ($_SESSION["head_area"]) {
                        case 'SM1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_sm1 "; break;
                        case 'SS1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 "; break;
                        case 'SS2': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss2 "; break;
                        case 'SS3': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss3 "; break;
                        default:
                            $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 
                                        UNION SELECT sale_code,sale_name FROM tb_team_ss2
                                        UNION SELECT sale_code,sale_name FROM tb_team_ss3
                                        UNION SELECT sale_code,sale_name FROM tb_team_sm1 ";
                            break;
                    }
                    $objQuery5 = mysqli_query($conn, $strSQL5);
                    while ($objResuut5 = mysqli_fetch_array($objQuery5)) {
                        $allSale[] = htmlspecialchars($objResuut5["sale_code"]);
                        $sale_code_value = htmlspecialchars($objResuut5["sale_code"]);
                        $sale_name_value = htmlspecialchars($objResuut5["sale_name"]);
                        echo '<span><input type="radio" name="sale_code" id="sale_code' . $sale_code_value . '" value="' . $sale_code_value . '" ' . (($sale_code_value == $sale_code) ? 'checked' : '') . '> <label for="sale_code' . $sale_code_value . '"> ' . $sale_code_value . ' - '.$sale_name_value.'</label></span>';
                    }
                    ?>
                </div>
            <?php } else { $saleSet = $_SESSION['em_id']; ?>
                <input type="radio" name="sale_code" id="sale_code" value="<?php echo htmlspecialchars($_SESSION['em_id']); ?>" checked> <label for="sale_code"><?php echo htmlspecialchars($_SESSION['em_id']); ?></label>
            <?php } ?>
        </div>
    </div>
    <p style="margin-left: 18%;"><button class="btn-custom-awl" style="font-size: 14px;">Search</button> <font style="color: #ff8080; font-size: 12px;">*เลือกได้แค่ 1 ตัวเลือก</font></p>
</form>
<?php if (!empty($_GET['date_start']) && !empty($_GET['date_end'])) {?>
<hr style="margin:20px 0px;">
<p class="font-custom-awl-14"><b><?php echo ($sale_code == 'Total') ? 'Total' : htmlspecialchars($sale_code);?></b></p>
<?php 
    if ($sale_code == 'Total') { 
        $sale_code = $allSale; // ใช้ array ของทุกเขต
    }
?>
<div class="table-responsive font-custom-awl-14">
    <table class="table-thead-custom-awl table-bordered border-secondary w-100 ">
        <thead>
            <tr>
                <th style="width:10%">เปอร์เซ็นต์</th>
                <th style="width:10%">ยอดขายใหม่ของเดือน</th>
                <th style="width:10%">ยอดขายจากประมาณการ</th>
                <th style="width:10%">100%</th>
                <th style="width:10%">90-99%</th>
                <th style="width:10%">80-89 %</th>
                <th style="width:10%">50-80%</th>
                <th style="width:10%">0-50%</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a id="row1_0 " class="colall" target="_blank">100 %</a></td>
                <td><a id="row1_1 " class="colall" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "1";?>&s_ckk=<?php echo "yes"; ?>" target="_blank"><?php echo number_format($show->Col2NewMonth('1',$_GET['date_start'],$_GET['date_end'],$sale_code,'1'),0)."";?></a></td>
                <td><a id="row1_2 " class="colall" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "1";?>&s_ckk=<?php echo "no"; ?>" target="_blank"><?php echo number_format($show->Col3Estimates(1,$_GET['date_start'],$_GET['date_end'],$sale_code,1),0)."";?></a></td>
                <td><a id="row1_3 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "1";?>&percent=<?php echo "1";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,1,1),0)."";?></a></td>
                <td><a id="row1_4 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "2";?>&percent=<?php echo "1";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,2,1),0)."";?></a></td>
                <td><a id="row1_5 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "3";?>&percent=<?php echo "1";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,3,1),0)."";?></a></td>
                <td><a id="row1_6 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "4";?>&percent=<?php echo "1";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,4,1),0)."";?></a></td>
                <td><a id="row1_7 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "5";?>&percent=<?php echo "1";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,5,1),0)."";?></a></td>
            </tr>
            <tr>
                <td><a id="row2_0 " class="colall" target="_blank">90-99 %</a></td>
                <td><a id="row2_1 " class="colall" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "2";?>&s_ckk=<?php echo "yes"; ?>" target="_blank"><?php echo number_format($show->Col2NewMonth('1',$_GET['date_start'],$_GET['date_end'],$sale_code,'2'),0)."";?></a></td>
                <td><a id="row2_2 " class="colall" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "2";?>&s_ckk=<?php echo "no"; ?>" target="_blank"><?php echo number_format($show->Col3Estimates(1,$_GET['date_start'],$_GET['date_end'],$sale_code,2),0)."";?></a></td>
                <td><a id="row2_3 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "1";?>&percent=<?php echo "2";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,1,2),0)."";?></a></td>
                <td><a id="row2_4 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "2";?>&percent=<?php echo "2";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,2,2),0)."";?></a></td>
                <td><a id="row2_5 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "3";?>&percent=<?php echo "2";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,3,2),0)."";?></a></td>
                <td><a id="row2_6 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "4";?>&percent=<?php echo "2";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,4,2),0)."";?></a></td>
                <td><a id="row2_7 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "5";?>&percent=<?php echo "2";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,5,2),0)."";?></a></td>
            </tr>
            <tr>
                <td><a id="row3_0 " class="colall" target="_blank">80-89 %</a></td>
                <td><a id="row3_1 " class="colall" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "3";?>&s_ckk=<?php echo "yes"; ?>" target="_blank"><?php echo number_format($show->Col2NewMonth('1',$_GET['date_start'],$_GET['date_end'],$sale_code,'3'),0)."";?></a></td>
                <td><a id="row3_2 " class="colall" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "3";?>&s_ckk=<?php echo "no"; ?>" target="_blank"><?php echo number_format($show->Col3Estimates(1,$_GET['date_start'],$_GET['date_end'],$sale_code,3),0)."";?></a></td>
                <td><a id="row3_3 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "1";?>&percent=<?php echo "3";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,1,3),0)."";?></a></td>
                <td><a id="row3_4 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "2";?>&percent=<?php echo "3";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,2,3),0)."";?></a></td>
                <td><a id="row3_5 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "3";?>&percent=<?php echo "3";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,3,3),0)."";?></a></td>
                <td><a id="row3_6 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "4";?>&percent=<?php echo "3";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,4,3),0)."";?></a></td>
                <td><a id="row3_7 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "5";?>&percent=<?php echo "3";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,5,3),0)."";?></a></td>
            </tr>
            <tr>
                <td><a id="row4_0 " class="colall" target="_blank">50-80 %</a></td>
                <td><a id="row4_1 " class="colall" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "4";?>&s_ckk=<?php echo "yes"; ?>" target="_blank"><?php echo number_format($show->Col2NewMonth('1',$_GET['date_start'],$_GET['date_end'],$sale_code,'4'),0)."";?></a></td>
                <td><a id="row4_2 " class="colall" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "4";?>&s_ckk=<?php echo "no"; ?>" target="_blank"><?php echo number_format($show->Col3Estimates(1,$_GET['date_start'],$_GET['date_end'],$sale_code,4),0)."";?></a></td>
                <td><a id="row4_3 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "1";?>&percent=<?php echo "4";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,1,4),0)."";?></a></td>
                <td><a id="row4_4 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "2";?>&percent=<?php echo "4";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,2,4),0)."";?></a></td>
                <td><a id="row4_5 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "3";?>&percent=<?php echo "4";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,3,4),0)."";?></a></td>
                <td><a id="row4_6 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "4";?>&percent=<?php echo "4";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,4,4),0)."";?></a></td>
                <td><a id="row4_7 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "5";?>&percent=<?php echo "4";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,5,4),0)."";?></a></td>
            </tr>
            <tr>
                <td><a id="row5_0 " class="colall" target="_blank">0-50 %</a></td>
                <td><a id="row5_1 " class="colall" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "5";?>&s_ckk=<?php echo "yes"; ?>" target="_blank"><?php echo number_format($show->Col2NewMonth(1,$_GET['date_start'],$_GET['date_end'],$sale_code,5),0)."";?></a></td>
                <td><a id="row5_2 " class="colall" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "5";?>&s_ckk=<?php echo "no"; ?>" target="_blank"><?php echo number_format($show->Col3Estimates(1,$_GET['date_start'],$_GET['date_end'],$sale_code,5),0)."";?></a></td>
                <td><a id="row5_3 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "1";?>&percent=<?php echo "5";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,1,5),0)."";?></a></td>
                <td><a id="row5_4 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "2";?>&percent=<?php echo "5";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,2,5),0)."";?></a></td>
                <td><a id="row5_5 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "3";?>&percent=<?php echo "5";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,3,5),0)."";?></a></td>
                <td><a id="row5_6 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "4";?>&percent=<?php echo "5";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,4,5),0)."";?></a></td>
                <td><a id="row5_7 " class="colall" href="report_forecast_time_l1?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "5";?>&percent=<?php echo "5";?>" target="_blank"><?php echo number_format($show->Col45678($_GET['date_start'],$_GET['date_end'],$sale_code,5,5),0)."";?></a></td>
            </tr>
            <tr>
                <td><a id="row6_0 " class="colall" target="_blank">ประมาณการขายใหม่</a></td>
                <td><a id="row6_1 " class="colall" target="_blank"></a></td>
                <td><a id="row6_2 " class="colall" target="_blank"></a></td>
                <td><a id="row6_3 " class="colall" href="report_forecast_time_l3?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "1";?>" target="_blank"><?php echo number_format($show->NewSalesEstimates(0,$_GET['date_start'],$_GET['date_end'],$sale_code,1),0)."";?></a></td>
                <td><a id="row6_4 " class="colall" href="report_forecast_time_l3?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "2";?>" target="_blank"><?php echo number_format($show->NewSalesEstimates(0,$_GET['date_start'],$_GET['date_end'],$sale_code,2),0)."";?></a></td>
                <td><a id="row6_5 " class="colall" href="report_forecast_time_l3?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "3";?>" target="_blank"><?php echo number_format($show->NewSalesEstimates(0,$_GET['date_start'],$_GET['date_end'],$sale_code,3),0)."";?></a></td>
                <td><a id="row6_6 " class="colall" href="report_forecast_time_l3?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "4";?>" target="_blank"><?php echo number_format($show->NewSalesEstimates(0,$_GET['date_start'],$_GET['date_end'],$sale_code,4),0)."";?></a></td>
                <td><a id="row6_7 " class="colall" href="report_forecast_time_l3?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>&percent_id=<?php echo "5";?>" target="_blank"><?php echo number_format($show->NewSalesEstimates(0,$_GET['date_start'],$_GET['date_end'],$sale_code,5),0)."";?></a></td>
            </tr>
            <tr>
                <td>
                    ยอดขายจริง 
                    <ins style="color:#8000ff ;">
                        <a href="report_forecast_time_l4?start_date=<?php echo $_GET['date_start'];?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>" id="row7_0 " class="colall" target="_blank">
                            <?php echo number_format($show->Col2NewMonth_r7_c1($_GET['date_start'],$_GET['date_end'],$sale_code), 0)."";?>
                        </a>
                    </ins>
                </td>
                <td id="row7_1 " class="colall"><?php $row7_1Col2 = [$show->Col2NewMonth('1',$_GET['date_start'],$_GET['date_end'],$sale_code,'1'),$show->Col2NewMonth('1',$_GET['date_start'],$_GET['date_end'],$sale_code,'2'),$show->Col2NewMonth('1',$_GET['date_start'],$_GET['date_end'],$sale_code,'3'),$show->Col2NewMonth('1',$_GET['date_start'],$_GET['date_end'],$sale_code,'4'),$show->Col2NewMonth('1',$_GET['date_start'],$_GET['date_end'],$sale_code,'5')];?><a id="row7_1" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&s_ckk=<?php echo "yes"; ?>&ad_ckk=<?php echo "1"; ?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>" target="_blank"><font style="color:#00c600;"><?php echo number_format($show->sumArray($row7_1Col2), 0)."";?></font> + <?php echo number_format($show->Col2NewMonth07($_GET['date_start'],$_GET['date_end'],$sale_code), 0)."";?></a></td>
                <td>
                <a id="row7_2 " class="colall" href="report_forecast_time_l2?start_date=<?php echo $_GET['date_start'];?>&end_date=<?php echo $_GET['date_end'];?>&s_ckk=<?php echo "no"; ?>&sale_code=<?php echo is_array($sale_code) ? implode(',', $sale_code) : $sale_code;?>" target="_blank">
                <?php
                    $estimates = [$show->Col3Estimates('1', $_GET['date_start'], $_GET['date_end'], $sale_code, '1'),$show->Col3Estimates('1', $_GET['date_start'], $_GET['date_end'], $sale_code, '2'),$show->Col3Estimates('1', $_GET['date_start'], $_GET['date_end'], $sale_code, '3'),$show->Col3Estimates('1', $_GET['date_start'], $_GET['date_end'], $sale_code, '4'),$show->Col3Estimates('1', $_GET['date_start'], $_GET['date_end'], $sale_code, '5')];
                    echo number_format($show->sumArray($estimates), 0)."";
                ?>
                </a>
                </td>
                <td><a id="row7_3" class="colall" target="_blank"><?php echo number_format(($show->Actualsales(0,$_GET['date_start'],$_GET['date_end'],'date_update',$sale_code,1))+($show->Actualsales(0,$_GET['date_start'],$_GET['date_end'],'date_plan',$sale_code,1)),0)."";?></a></td>
                <td><a id="row7_4" class="colall" target="_blank"><?php echo number_format(($show->Actualsales(0,$_GET['date_start'],$_GET['date_end'],'date_update',$sale_code,2))+($show->Actualsales(0,$_GET['date_start'],$_GET['date_end'],'date_plan',$sale_code,2)),0)."";?></a></td>
                <td><a id="row7_5" class="colall" target="_blank"><?php echo number_format(($show->Actualsales(0,$_GET['date_start'],$_GET['date_end'],'date_update',$sale_code,3))+($show->Actualsales(0,$_GET['date_start'],$_GET['date_end'],'date_plan',$sale_code,3)),0)."";?></a></td>
                <td><a id="row7_6" class="colall" target="_blank"><?php echo number_format(($show->Actualsales(0,$_GET['date_start'],$_GET['date_end'],'date_update',$sale_code,4))+($show->Actualsales(0,$_GET['date_start'],$_GET['date_end'],'date_plan',$sale_code,4)),0)."";?></a></td>
                <td><a id="row7_7" class="colall" target="_blank"><?php echo number_format(($show->Actualsales(0,$_GET['date_start'],$_GET['date_end'],'date_update',$sale_code,5))+($show->Actualsales(0,$_GET['date_start'],$_GET['date_end'],'date_plan',$sale_code,5)),0)."";?></a></td>
            </tr>
        </tbody>
    </table>
</div>

<?php 
}
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>