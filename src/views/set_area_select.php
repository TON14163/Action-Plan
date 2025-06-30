<?php 
// ดึงไปใช้ include 'set_area_select.php'; // แสดงในส่วนของ Select sale
// หลักการ
// พี่จอย (PM) มองเห็นทั้งหมด ยกเว้นเขตพี่หม่อม
// สิทธิ์ พี่โจ้ เปิ้ล กิ้ว , IT มองเห็นทั้งหมด
// สิทธิ์ Supervisor ที่ group ไม่ใช่ ALL มองเห็นแค่เขตตัวเองควบคุมอยู่
// สิทธิ์ user มองเห็นเฉพาะตัวเอง
    $sale_code = '';
    if (isset($_GET['sale_code'])) {
        $sale_code = $_GET['sale_code'];
    } else if (isset($_POST['sale_code'])) {
        $sale_code = $_POST['sale_code'];
    } else if (isset($_SESSION['em_id'])) { 
        $sale_code = $_SESSION['em_id'];  
    }
?>
    <?php if($_SESSION['typelogin'] == 'Supervisor' || $_SESSION["typelogin"] == 'Marketing' ){ ?> <b>Sale</b> <?php } ?>
    <select class="form-select-custom-awl" name="sale_code" id="sale_code" <?php if($_SESSION['typelogin'] != 'Supervisor' && $_SESSION["typelogin"] != 'Marketing'){ ?> style="display: none;" <?php } ?>>
        <option value="">Please Select</option>
        <?php  
                $selectedFullSup = array();
                $strSQL5 = "SELECT n_id,m_id FROM user_permissions WHERE n_id = '".$_SESSION['id']."' ORDER BY sort_user ASC ";
                $objQuery5 = mysqli_query($conn, $strSQL5);
                while ($objResuut5 = mysqli_fetch_array($objQuery5)) {  
                    $strSQL5_1 = "SELECT em_id,name FROM tb_user WHERE id = '".$objResuut5['m_id']."' ";
                    $objQuery5_1 = mysqli_query($conn, $strSQL5_1);
                    $objResuut5_1 = mysqli_fetch_array($objQuery5_1);
                    if($objResuut5_1['name'] != ''){
                        $selectedFullSup[] = $objResuut5_1["em_id"];
                    }
                    $selected = ($objResuut5_1['em_id'] == $sale_code) ? 'selected' : '';
                    echo '<option value="' . htmlspecialchars($objResuut5_1["em_id"]) . '" ' . $selected . '>' . 
                        htmlspecialchars($objResuut5_1["em_id"]) . ' - ' . htmlspecialchars($objResuut5_1["name"]) . 
                        '</option>';
                }
                $selectedFullSup_string = "IN ('".implode("','",$selectedFullSup)."')";
        ?>
    </select>
