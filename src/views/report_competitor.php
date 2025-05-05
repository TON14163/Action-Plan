<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';
(!isset($_GET['sale_code'])) ? $sale_code = $_SESSION['em_id'] : $sale_code = $_GET['sale_code'] ;
?>

<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานคู่แข่ง</b>
</div>

<p style="padding: 10px 20px;" class="font-custom-awl-14">
<div style="display:flex; justify-content: space-between; margin-bottom: 15px;">
<div>
    <b>วันที่</b> <input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>">
    <b>ถึง</b> <input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>">
    </div>
        <div>
            <?php if($_SESSION['typelogin'] != 'Supervisor'){ ?>
                <a href="actionplan?dallyadd=1"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="งานที่ไม่ได้ plan ไว้"></a>
            <?php } ?>
        </div>
    </div>

    <label for="customer"><b>โรงพยาบาล</b></label>
    <?php if(isset($_GET["dallyadd"])){?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
    <input type="search" style="width: 310px;" class="form-search-custom-awl" list="customerSelect" id="hospital_name" name="hospital_name" autocomplete="off" placeholder="ระบุข้อมูล . . . " onkeyup="fetchData('customerSelect','<?php echo $cumapi;?>')" value="<?php  echo !empty($_GET['hospital_name']) ? htmlspecialchars($_GET['hospital_name']) : ''; ?>"  />
    <datalist id="customerSelect">
        <option value="">-- เลือกลูกค้า --</option>
    </datalist>

    <b>ประเภทสินค้า</b> <input type="text" class="form-search-custom-awl" name="product_rival" id="product_rival" value="">
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
    <br><br>
    <input type="checkbox" name="" id=""> <label for="">ผลการเปิดซอง</label>
</p>

<hr style="margin: 20px 0px;">

<div class="table-responsive font-custom-awl-14">
    <table class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th style="">วันที่</th>
                <th style="">โรงพยาบาล</th>
                <th style="">หน่วยงาน</th>
                <th style="">ประเภทสินค้า</th>
                <th style="">บริษัทคู่เเข่ง</th>
                <th style="">ยี่ห้อ</th>
                <th style="">รุ่น</th>
                <th style="">ประเทศ</th>
                <th style="">ราคา/หน่วย</th>
                <th style="">จำนวนซื้อ</th>
                <th style="">เงื่อนไขพิเศษ</th>
                <th style="">วันที่เปิดซอง</th>
                <th style="">เขตการขาย</th>
                <th style="">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $strSQL = "SELECT * FROM tb_storyrival WHERE 1 limit 30";
                $objQuery  = mysqli_query($conn,$strSQL);
                while($objResult = mysqli_fetch_array($objQuery)){
            ?>
            <tr style="background-color: #FFFFFF;">
                <td><?php echo  Datethai($objResult["create_date"]);?></td>
                <td><?php echo $objResult["customer_name"];?></td>
                <td><?php echo $objResult5["hospital_ward"];?></td>
                <td><?php echo $objResult["product_rival"];?><?php if($objResult["product_rival"]=='อื่นๆ'){ ?><br> <?php echo $objResult["product_des"]; } ?> </td>
                <td><?php echo $objResult["company_rival"];?></td>
                <td><?php echo $objResult["rival_brand"];?></td>
                <td><?php echo $objResult["rival_model"];?></td>
                <td><?php echo $objResult["rival_country"];?></td>
                <td align="right"><?php echo number_format($objResult["price_to_unit"],0)."";?></td>
                <td align="right"><?php echo number_format($objResult["unit"],0)."";?></td>
                <td><?php echo $objResult["waranty"];?></td>
                <td><?php echo $objResult["sale_area"];?></td>
                <td><?php if($objResult["date_open"]!='0000-00-00'){ echo Datethai($objResult["date_open"]); } ?></td>		
                <td width="30" align="center"><a href="edit_rival.php?id_story=<?php echo $objResult["id_story"];?>"><img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;"></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <p>พบทั้งหมด 1 รายการ : จำนวน 1 หน้า : 1</p>
</div>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>

<script src="<?php echo $_SESSION['thisDomain'];?>/assets/js/fetchData.js"></script> <!-- โรงพยาบาล -->