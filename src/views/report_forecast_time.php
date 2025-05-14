<?php
ob_start();
(!isset($_GET['sale_code'])) ? $sale_code = $_SESSION['em_id'] : $sale_code = $_GET['sale_code'];
require_once __DIR__ . '/../controllers/report_forecast_time_controllers.php';
$show = new ReportForecastTime();

?>
<style>
    a { text-decoration: none; color: #202020; }
    td:nth-child(4) { background-color: #00FF00; }
    td:nth-child(5) { background-color: #CCFF99; }
    td:nth-child(6) { background-color: #FFFF00; }
    td:nth-child(7) { background-color: #FF6600; }
    td:nth-child(8) { background-color: #FF3333; }
</style>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานสรุปการปรับปรุงการประมานการขายตามช่วงเวลา</b>
</div>
<form action="<?php echo htmlspecialchars($url); ?>" enctype="multipart/form-data" method="get">
    <p style="padding: 10px 20px;" class="font-custom-awl-14">
        <b>วันที่</b> <input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>" required>
        <b>ถึง</b> <input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>" required>
    </p>
    <div class="row font-custom-awl-14" style="padding: 0px 20px; font-weight: 600;">
        <div class="col-2">เขตการขาย</div>
        <div class="col-10">
            <?php if ($_SESSION['typelogin'] == 'Supervisor') { $saleSet = ''; ?>
                <span><input type="radio" name="sale_code" id="total" value="Total" <?php echo (($sale_code == 'Total') ? 'checked' : '');?>> <label for="total">Total</label></span>
                <div class="d-flex">
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
                        echo '<span><input type="radio" name="sale_code" id="sale_code' . $sale_code_value . '" value="' . $sale_code_value . '" ' . (($sale_code_value == $sale_code) ? 'checked' : '') . '> <label for="sale_code' . $sale_code_value . '">' . $sale_code_value . ' - ' . $sale_name_value . '</label></span>';
                    }
                    ?>
                </div>
                <?php if($sale_code == 'Total'){ 
                    $sale_code = implode('","', $allSale);
                ?>
                <?php } ?>
            <?php } else { $saleSet = $_SESSION['em_id']; ?>
                <input type="radio" name="sale_code" id="sale_code" value="<?php echo htmlspecialchars($_SESSION['em_id']); ?>" checked> <label for="sale_code"><?php echo htmlspecialchars($_SESSION['em_id']); ?></label>
            <?php } ?>
        </div>
    </div>
    <p style="margin-left: 18%;"><button class="btn-custom-awl" style="font-size: 14px;">Search</button> <font style="color: #ff8080; font-size: 12px;">*เลือกได้แค่ 1 ตัวเลือก</font></p>
</form>
<?php
$data = [];
if (!empty($_GET['date_start']) && !empty($_GET['date_end']) && $sale_code != '') {
    $data = $show->getTableData($_GET['date_start'], $_GET['date_end'], $sale_code);
}
?>
<hr style="margin:20px 0px;">

<p class="font-custom-awl-14"><b><?php echo (strlen(htmlspecialchars($sale_code)) > 6) ? 'Total' : htmlspecialchars($sale_code);?></b></p>
<div class="table-responsive font-custom-awl-14">
    <table class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th style="width:10%">เปอร์เซ็นต์</th>
                <th style="width:10%">ยอดขายใหม่ของเดือน</th>
                <th style="width:10%">ยอดขายจากประมาณการ</th>
                <th style="width:10%">100%</th>
                <th style="width:10%">90-99%</th>
                <th style="width:10%">80-89%</th>
                <th style="width:10%">50-80%</th>
                <th style="width:10%">0-50%</th>
            </tr>
        </thead>
        <?php if (!empty($_GET['date_start']) && $sale_code != '') { ?>
        <tbody>
            <?php
            $percent_labels = [
                1 => '100%',
                2 => '90-99%',
                3 => '80-89%',
                4 => '50-80%',
                5 => '0-50%'
            ];
            // สร้างข้อมูลเริ่มต้นสำหรับทุก percent_id
            $default_row = [
                'new_month' => 0,
                'estimates' => 0,
                'col45678' => array_fill(1, 5, 0),
                'percent_id' => 0
            ];
            // เติมข้อมูลที่ขาดหายไป
            $rows = [];
            for ($percent_id = 1; $percent_id <= 5; $percent_id++) {
                $rows[$percent_id] = isset($data['rows'][$percent_id]) ? $data['rows'][$percent_id] : $default_row;
                $rows[$percent_id]['percent_id'] = $percent_id;
            }
            // วนลูปแสดงข้อมูล
            foreach ($rows as $percent_id => $row) {
                ?>
                <tr>
                    <td><a id="row<?php echo $percent_id; ?>_0" class="colall" target="_blank"><?php echo $percent_labels[$percent_id]; ?></a></td>
                    <td><a id="row<?php echo $percent_id; ?>_1" class="colall" href="report_forecast_time_l2?start_date=<?php echo htmlspecialchars($_GET['date_start']); ?>&end_date=<?php echo htmlspecialchars($_GET['date_end']); ?>&sale_code=<?php echo htmlspecialchars($sale_code); ?>&percent_id=<?php echo $percent_id; ?>&s_ckk=yes" target="_blank"><?php echo number_format($row['new_month'], 0); ?></a></td>
                    <td><a id="row<?php echo $percent_id; ?>_2" class="colall" href="report_forecast_time_l2?start_date=<?php echo htmlspecialchars($_GET['date_start']); ?>&end_date=<?php echo htmlspecialchars($_GET['date_end']); ?>&sale_code=<?php echo htmlspecialchars($sale_code); ?>&percent_id=<?php echo $percent_id; ?>&s_ckk=no" target="_blank"><?php echo number_format($row['estimates'], 0); ?></a></td>
                    <?php for ($percent = 1; $percent <= 5; $percent++) { ?>
                        <td><a id="row<?php echo $percent_id; ?>_<?php echo $percent + 2; ?>" class="colall" href="report_forecast_time_l1?start_date=<?php echo htmlspecialchars($_GET['date_start']); ?>&end_date=<?php echo htmlspecialchars($_GET['date_end']); ?>&sale_code=<?php echo htmlspecialchars($sale_code); ?>&percent_id=<?php echo $percent; ?>&percent=<?php echo $percent_id; ?>" target="_blank"><?php echo number_format($row['col45678'][$percent], 0); ?></a></td>
                    <?php } ?>
                </tr>
            <?php } ?>
            <!-- แถวประมาณการขายใหม่ -->
            <tr>
                <td><a id="row6_0" class="colall" target="_blank">ประมาณการขายใหม่</a></td>
                <td><a id="row6_1" class="colall" target="_blank"></a></td>
                <td><a id="row6_2" class="colall" target="_blank"></a></td>
                <?php for ($percent_id = 1; $percent_id <= 5; $percent_id++) { ?>
                    <td><a id="row6_<?php echo $percent_id + 2; ?>" class="colall" href="report_forecast_time_l3?start_date=<?php echo htmlspecialchars($_GET['date_start']); ?>&end_date=<?php echo htmlspecialchars($_GET['date_end']); ?>&sale_code=<?php echo htmlspecialchars($sale_code); ?>&percent_id=<?php echo $percent_id; ?>" target="_blank"><?php echo number_format($data['rows'][$percent_id]['new_month'] ?? 0, 0); ?></a></td>
                <?php } ?>
            </tr>
            <!-- แถวยอดขายจริง -->
            <tr>
                <td>
                    ยอดขายจริง 
                    <ins style="color:#8000ff;">
                        <a href="report_forecast_time_l4?start_date=<?php echo htmlspecialchars($_GET['date_start']); ?>&sale_code=<?php echo htmlspecialchars($sale_code); ?>" id="row7_0" class="colall" target="_blank">
                            <?php echo number_format($data['real_sales'] ?? 0, 0); ?>
                        </a>
                    </ins>
                </td>
                <td>
                    <a id="row7_1" class="colall" href="report_forecast_time_l2?start_date=<?php echo htmlspecialchars($_GET['date_start']); ?>&end_date=<?php echo htmlspecialchars($_GET['date_end']); ?>&s_ckk=yes&ad_ckk=1&sale_code=<?php echo htmlspecialchars($sale_code); ?>" target="_blank">
                        <font style="color:#00c600;"><?php echo number_format($data['new_month_sum'] ?? 0, 0); ?></font> + <?php echo number_format($data['new_month_07'] ?? 0, 0); ?>
                    </a>
                </td>
                <td>
                    <a id="row7_2" class="colall" href="report_forecast_time_l2?start_date=<?php echo htmlspecialchars($_GET['date_start']); ?>&end_date=<?php echo htmlspecialchars($_GET['date_end']); ?>&s_ckk=no&sale_code=<?php echo htmlspecialchars($sale_code); ?>" target="_blank">
                        <?php echo number_format($data['estimates_sum'] ?? 0, 0); ?>
                    </a>
                </td>
                <?php for ($percent_id = 1; $percent_id <= 5; $percent_id++) { ?>
                    <td>
                        <a id="row7_<?php echo $percent_id + 2; ?>" class="colall" target="_blank">
                            <?php echo number_format(($data['rows'][$percent_id]['new_month'] ?? 0) * 2, 0); ?>
                        </a>
                    </td>
                <?php } ?>
            </tr>
        </tbody>
        <?php } ?>
    </table>
</div>


<?php
$content = ob_get_clean();
require_once __DIR__ . '/layouts/Main.php';
?>