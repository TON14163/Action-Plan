<?php 
// ดึงไปใช้ include 'set_area_select.php'; // แสดงในส่วนของ Select sale
// หลักการ
// พี่จอย (PM) มองเห็นทั้งหมด ยกเว้นเขตพี่หม่อม
// สิทธิ์ พี่โจ้ เปิ้ล กิ้ว , IT มองเห็นทั้งหมด
// สิทธิ์ Supervisor ที่ group ไม่ใช่ ALL มองเห็นแค่เขตตัวเองควบคุมอยู่
// สิทธิ์ user มองเห็นเฉพาะตัวเอง
if($_SESSION['typelogin'] == 'Supervisor' AND $_SESSION['group'] != 'ALL'){ $saleSet = $sale_code; ?>
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
                UNION SELECT sale_code,sale_name FROM tb_team_ss2
                UNION SELECT sale_code,sale_name FROM tb_team_ss3
                UNION SELECT sale_code,sale_name FROM tb_team_sm1 ";
            break;
        }
        $objQuery5 = mysqli_query($conn, $strSQL5);
        while ($objResuut5 = mysqli_fetch_array($objQuery5)) {  
            $selected = (!empty($_GET['sale_code']) && $_GET['sale_code'] == $objResuut5["sale_code"]) ? 'selected' : '';
            echo '<option value="' . htmlspecialchars($objResuut5["sale_code"]) . '" ' . $selected . '>' . htmlspecialchars($objResuut5["sale_code"]) . ' - ' . htmlspecialchars($objResuut5["sale_name"]) . '</option>';
        }
        ?>
    </select>
<?php } else if($_SESSION['typelogin'] == 'Supervisor' AND $_SESSION['group'] == 'ALL'){ $saleSet = $sale_code; ?>
    <select class="form-select-custom-awl" name="sale_code" id="sale_code">
        <option value="">Please Select</option>
        <?php
        switch ($_SESSION["ext"]) {
            case 'PM': 
                $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 
                UNION SELECT sale_code,sale_name FROM tb_team_ss2
                UNION SELECT sale_code,sale_name FROM tb_team_sm1 ORDER BY sale_code ASC";
            break;
            default:
                $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 
                UNION SELECT sale_code,sale_name FROM tb_team_ss2
                UNION SELECT sale_code,sale_name FROM tb_team_ss3
                UNION SELECT sale_code,sale_name FROM tb_team_sm1 ORDER BY sale_code ASC";
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