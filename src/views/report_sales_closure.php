<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานปรับปรุงการขาย และ รายงานขายสมบูรณ์</b>
</div>

<section style="padding: 10px 20px;" class="font-custom-awl-14">

    <div style="display:flex; justify-content: space-between; margin-bottom: 10px;">
        <div>
            <b>วันที่</b> <input type="date" name="" id="">
            <b>ถึง</b> <input type="date" name="" id="">
            <b>โรงพยาบาล</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ค้นหา รพ . . . ">
            <b>Sale</b> 
                <?php if($_SESSION['typelogin'] == 'Supervisor'){ $saleSet = ''; ?>
                    <select class="form-select-custom-awl" name="sale_code" id="sale_code">
                        <option value="">Please Select</option>
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
                            $selected = (!empty($_GET['sale_code']) && $_GET['sale_code'] == $objResuut5["sale_code"]) ? 'selected' : '';
                            echo '<option value="' . htmlspecialchars($objResuut5["sale_code"]) . '" ' . $selected . '>' . htmlspecialchars($objResuut5["sale_code"]) . ' - ' . htmlspecialchars($objResuut5["sale_name"]) . '</option>';
                        }
                        ?>
                    </select>
                <?php } else { $saleSet = $_SESSION['em_id']; ?> 
                    <input type="text" style="text-align: center;" name="sale_code" id="sale_code" value="<?php echo $_SESSION['em_id'];?>" readonly> 
                <?php } ?>
            <button class="btn-custom-awl">Search</button>
        </div>
        <div>
            <a href="#"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;"></a>
        </div>
    </div>
    <p style="display: flex; align-items: center;">
        <input type="checkbox" name="ddddd" id="ddddd"> &nbsp; <label for="ddddd">Project A+,A</label>
    </p>
</section>

<hr style="margin: 20px 0px;">

<div style="text-align: right; margin-bottom: 20px;">
    <a href="#"><img src="assets/images/icon_system/print.png" style="width: 30px; height: 30px;"></a>
</div>

<div style="text-align: center; background-color: #00FF00; border: 0.5px solid #202020; border-bottom: hidden;">ยอดรวมทั้งหมด  210,355,203.40  บาท</div>
<div class="table-responsive font-custom-awl-14">
    <table class="table-thead-custom-awl">
        <thead>
            <tr>
                <th style="width: 5%;">วันที่</th>
                <th style="width: 5%;">โรงพยาบาล</th>
                <th style="width: 5%;">หน่วยงาน</th>
                <th style="width: 5%;">รายการ</th>
                <th style="width: 5%;">มูลค่า</th>
                <th style="width: 5%;">เปอร์เซ็น</th>
                <th style="width: 5%;">เขต</th>
                <th style="width: 5%;">ซื้อ/ไม่ซื้อ</th>
                <th style="width: 10%;">เหตุผล</th>
                <th style="width: 5%;">วันที่ออกบิล</th>
                <th style="width: 5%;">เพิ่มเติม</th>
            </tr>
        </thead>
        <tbody>
            <tr style="background-color: #FFFFFF;">
                <td>วันที่</td>
                <td>โรงพยาบาล</td>
                <td>หน่วยงาน</td>
                <td>รายการ</td>
                <td>มูลค่า</td>
                <td>เปอร์เซ็น</td>
                <td>เขต</td>
                <td>ซื้อ/ไม่ซื้อ</td>
                <td>เหตุผล</td>
                <td>วันที่ออกบิล</td>
                <td>เพิ่มเติม</td>
            </tr>
        </tbody>
    </table>
    <br>
    <p>พบทั้งหมด 1 รายการ : จำนวน 1 หน้า : 1</p>
</div>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>





