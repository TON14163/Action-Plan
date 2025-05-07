<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
(!isset($_GET['sale_code'])) ? $sale_code = $_SESSION['em_id'] : $sale_code = $_GET['sale_code'] ;
?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานสรุปการปรับปรุงการประมานการขายตามช่วงเวลา</b>
</div>
<form action="<?php echo $url;?>" enctype="multipart/form-data" method="get">
    <p style="padding: 10px 20px;" class="font-custom-awl-14">
        <b>วันที่</b> <input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>">
        <b>ถึง</b> <input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>">
    </p>
    <div class="row font-custom-awl-14" style="padding: 0px 20px; font-weight: 600;">
        <div class="col-2">เขตการขาย</div>
        <div class="col-10">
            <span><input type="radio" name="sale_code" id="total"> <label for="total">Total</label></span>
            <div class="d-flex">
            <?php if($_SESSION['typelogin'] == 'Supervisor'){ $saleSet = ''; ?>
                    <?php
                    switch ($_SESSION["head_area"]) {
                        case 'SM1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_sm1 "; break;
                        case 'SS1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 "; break;
                        case 'SS2': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss2 "; break;
                        case 'SS3': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss3 "; break;
                        default:
                            $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 
                            UNION sale_code,sale_name FROM tb_team_ss2
                            UNION sale_code,sale_name FROM tb_team_ss3
                            UNION sale_code,sale_name FROM tb_team_sm1 ";
                        break;
                    }
                    $objQuery5 = mysqli_query($conn, $strSQL5);
                    while ($objResuut5 = mysqli_fetch_array($objQuery5)) {  
                        echo '<span><input type="radio" name="sale_code" id="sale_code'.htmlspecialchars($objResuut5["sale_code"]).'" value="1"> <label for="sale_code'.htmlspecialchars($objResuut5["sale_code"]).'">' . htmlspecialchars($objResuut5["sale_code"]) . ' - ' . htmlspecialchars($objResuut5["sale_name"]) . '</label></span>';
                    }
                    ?>
            <?php } else { $saleSet = $_SESSION['em_id']; ?> 
                <span><input type="radio" name="sale_code" id="sale_code" value="1" checked> <label for="sale_code"><?php echo $_SESSION['em_id'];?></label></span>
            <?php } ?>
            </div>
        </div>
    </div>
    <p style="margin-left: 18%;"><button class="btn-custom-awl" style="font-size: 14px;">Search</button> <font style="color: #ff8080; font-size: 12px;">*เลือกได้แค่ 1 ตัวเลือก</font></p>
</form>
<hr style="margin:20px 0px;">

<p class="font-custom-awl-14"><b>Total Hos</b></p>
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
            <tr style="background-color: #FFFFFF;">
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
            </tr>
            <tr style="background-color: #FFFFFF;">
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
                <td>num</td>
            </tr>
        </tbody>
    </table>
</div>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
