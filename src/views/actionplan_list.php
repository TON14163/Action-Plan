<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล 
error_reporting(0);
$in_save = $_POST['in_save'];
$type_sale = "$_SESSION[type_sale]";
// echo $type_sale;
if($in_save != 'save'){
    $date_keyword = $_POST['date_keyword'];
    $item = $_POST['item'];
    $list_chk = $_POST['list_chk'];
    $id_customer = $_POST['id_customer'];
    $customer = $_POST['customer'];
    $hospital_buiding = $_POST['hospital_buiding'];
    $hospital_class = $_POST['hospital_class'];
    $hospital_ward = $_POST['hospital_ward'];
    $hospital_contact1 = $_POST['hospital_contact1'];
    $type_1 = $_POST['type_1'];
    $id_ref = $_POST['id_ref'];

    if(is_array($list_chk) != '1'){
        $text = '<font style="color:#FF8080;"> ⚠️ ไม่พบรายการที่ท่านเลือก ❌ 🙅‍♂️🙅 ❗❗</font>';
        require_once __DIR__ . '/../views/Loading_page.php';
        echo "<meta http-equiv=refresh content=3;URL=".$_SESSION['thisDomain']."actionplan>"; 
        mysqli_close($conn);
        exit;
    }
    if($customer == ''){
        $text = '<font style="color:#FF8080;"> ⚠️ ไม่พบข้อมูลชื่อลูกค้า ❌ 🙅‍♂️🙅 ❗❗</font>';
        require_once __DIR__ . '/../views/Loading_page.php';
        echo "<meta http-equiv=refresh content=3;URL=".$_SESSION['thisDomain']."actionplan>"; 
        mysqli_close($conn);
        exit;
    }
?>
<form action="<?php echo $url;?>" method="post">
<?php if(isset($_GET["id"])){?><input type='hidden' id="id_ref" name="id_ref" value="<?php echo $id_ref; ?>"><?php } ?>
<div class="table-responsive mt-3 px-2" id="feature1">
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100" >
        <thead>
            <tr>
            <?php if(isset($_POST["dallyadd"])){ ?>
                <th style="width: 10%;"><font id="feature2">วันที่</font></th>
                <th style="width: 20%;">โรงพยาบาล</th>
                <th style="width: 35%;"><font style="color:#8080c0;">ตึก</font> <font style="color:#8080ff;">ชั้น</font> <font style="color:#0080c0;">ward</font></th>
                <th style="width: 35%;"><font id="feature3">แผนงาน</font></th>
            <?php } else { ?>
                <th style="width: 10%;"><font id="feature2">วันที่</font></th>
                <th style="width: 15%;">โรงพยาบาล</th>
                <th style="width: 23%;"><font style="color:#8080c0;">ตึก</font> <font style="color:#8080ff;">ชั้น</font> <font style="color:#0080c0;">ward</font></th>
                <th style="width: 35%;"><font id="feature3">แผนงาน</font></th>
                <?php if($_SESSION['typelogin'] == 'Supervisor'){ ?>
                <th style="width: 5%;">Sup</th>
                <th style="width: 12%;">ผู้รับผิดชอบ</th>
            <?php } } ?>
                
            </tr>
        </thead>
        <?php
            if (isset($item) && is_array($item)) {
                foreach ($item as $key => $value) {
                    $itemNew = isset($item[$key]) ? $item[$key] : '';
                    $list_chkNew = isset($list_chk[$key]) ? $list_chk[$key] : '';
                    $id_customerNew = isset($id_customer[$key]) ? $id_customer[$key] : '';
                    $hospital_buidingNew = isset($hospital_buiding[$key]) ? $hospital_buiding[$key] : '';
                    $hospital_classNew = isset($hospital_class[$key]) ? $hospital_class[$key] : '';
                    $hospital_wardNew = isset($hospital_ward[$key]) ? $hospital_ward[$key] : '';
                    $hospital_contact1New = isset($hospital_contact1[$key]) ? $hospital_contact1[$key] : '';
                    $type_1New = isset($type_1[$key]) ? $type_1[$key] : '';
                    

                    // ตรวจสอบว่า $list_chkNew มีค่าหรือไม่ และไม่ใช่ Undefined
                    if ($list_chkNew === 'on') {
                    ?>
                    <tbody>
                        <tr>
                            <td class="py-2 align-middle">
                                &nbsp;&nbsp;<input class="" type="date" name="in_date[<?php echo htmlspecialchars($itemNew);?>]" id="in_date[<?php echo htmlspecialchars($itemNew);?>]" value="<?php echo $date_keyword;?>" required>
                                <input type="hidden" id="id_customer[<?php echo htmlspecialchars($itemNew);?>]" name="id_customer[<?php echo htmlspecialchars($itemNew);?>]" value="<?php echo $id_customerNew;?>">
                                <input type="hidden" id="hospital_class[<?php echo htmlspecialchars($itemNew);?>]" name="hospital_class[<?php echo htmlspecialchars($itemNew);?>]" value="<?php echo $hospital_classNew;?>">
                                <input type="hidden" id="hospital_contact1[<?php echo htmlspecialchars($itemNew);?>]" name="hospital_contact1[<?php echo htmlspecialchars($itemNew);?>]" value="<?php echo $hospital_contact1New;?>">
                            </td>
                            <td class="p-2 align-middle"><textarea style="width: 100%; border: 0 none; padding:4px;" id="customer[<?php echo htmlspecialchars($itemNew);?>]" name="customer[<?php echo htmlspecialchars($itemNew);?>]" rows="4"><?php echo htmlspecialchars($customer);?></textarea></td>
                            <td class="p-2 align-middle">
                                <input class="w-100 my-1" style="border: 1px solid #8080c0;" type="text" id="hospital_buiding[<?php echo htmlspecialchars($itemNew);?>]" name="hospital_buiding[<?php echo htmlspecialchars($itemNew);?>]" value="<?php echo htmlspecialchars($hospital_buidingNew);?>">
                                <input class="w-100 my-1" style="border: 1px solid #8080ff;" type="text" id="hospital_class[<?php echo htmlspecialchars($itemNew);?>]" name="hospital_class[<?php echo htmlspecialchars($itemNew);?>]" value="<?php echo htmlspecialchars($hospital_classNew);?>">
                                <input class="w-100 my-1" style="border: 1px solid #0080c0;" type="text" id="hospital_ward[<?php echo htmlspecialchars($itemNew);?>]" name="hospital_ward[<?php echo htmlspecialchars($itemNew);?>]" value="<?php echo htmlspecialchars($hospital_wardNew);?>">
                                <!-- <textarea style="width: 100%; border: 0 none; padding:4px;" id="hospital_class[<?php echo htmlspecialchars($itemNew);?>]" name="hospital_class[<?php echo htmlspecialchars($itemNew);?>]" rows="2"><?php echo htmlspecialchars($hospital_classNew);?></textarea> -->
                                <!-- <textarea style="width: 100%; border: 0 none; padding:4px;" id="hospital_ward[<?php echo htmlspecialchars($itemNew);?>]" name="hospital_ward[<?php echo htmlspecialchars($itemNew);?>]" rows="2"><?php echo htmlspecialchars($hospital_wardNew);?></textarea> -->
                            </td>
                            <td class="p-2 align-middle"><textarea style="width: 100%; border: 0 none; padding:4px;" id="plan_work[<?php echo htmlspecialchars($itemNew);?>]" name="plan_work[<?php echo htmlspecialchars($itemNew);?>]" rows="4"><?php echo htmlspecialchars($hospital_contact1New);?> / <?php echo htmlspecialchars($type_1New);?></textarea></td>
                            <?php if(isset($_POST["dallyadd"])){ ?>
                                <input type="hidden" id="dallyadd" name="dallyadd" value="1">
                            <?php } else {
                                if($_SESSION['typelogin'] == 'Supervisor'){ 
                                ?>
                                <td><input type="checkbox" id="daily[<?php echo htmlspecialchars($itemNew);?>]" name="daily[<?php echo htmlspecialchars($itemNew);?>]" value="4"></td>
                                <td style="text-align: center; padding-left: 10px;">
                                    <select class="form-select-custom-awl" name="sale_code[<?php echo htmlspecialchars($itemNew);?>]" id="sale_code[<?php echo htmlspecialchars($itemNew);?>]" required>
                                        <option value="">Please Select</option>
                                        <?php
                                        $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 
                                        UNION SELECT sale_code,sale_name FROM tb_team_ss2
                                        UNION SELECT sale_code,sale_name FROM tb_team_ss3
                                        ";
                                        $objQuery5 = mysqli_query($conn, $strSQL5);
                                        while ($objResuut5 = mysqli_fetch_array($objQuery5)) {  
                                            $selected = (!empty($_GET['sale_code']) && $_GET['sale_code'] == $objResuut5["sale_code"]) ? 'selected' : '';
                                            echo '<option value="' . htmlspecialchars($objResuut5["sale_code"]) . '" ' . $selected . '>' . htmlspecialchars($objResuut5["sale_code"]) . ' - ' . htmlspecialchars($objResuut5["sale_name"]) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            <?php } } ?>
                        </tr>
                    </tbody>
                    <?php }
                }
            }
        ?>

    </table>
</div>

<br>

<center>
<button class="badge rounded-pill" style="background-color: #19D700; color:#FFFFFF; padding-left: 15px; padding-right: 15px; margin-right: 10px; border:0 none;" id="feature4">
    <img src="assets/images/icon_system/icon-park--save-one.png" style="width:15px; height:15px; color:#FFFFFF;" > &nbsp; บันทึก
</button>
</center>
<input type="hidden" id="in_save" name="in_save" value="save">
</form>
<?php

    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';

}
    if($in_save == 'save'){
        // echo 'save'.'<hr>';
        $in_dateSave = $_POST['in_date'];
        $id_customerSave = $_POST['id_customer'];
        $objectiveSave = $_POST['objective'];
        $plan_workSave = $_POST['plan_work'];
        $dailySave = $_POST['daily'];
        $sale_codeSave = $_POST['sale_code'];

        $id_refSave = $_POST['id_ref'];
        $dallyaddSave = $_POST['dallyadd'];

        $hospital_classSave = $_POST['hospital_class'];
        $hospital_buidingSave = $_POST['hospital_buiding'];
        $hospital_wardSave = $_POST['hospital_ward'];
        $hospital_contact1Save = $_POST['hospital_contact1'];

        foreach ($id_customerSave as $key => $value) {
            $in_dateSaveNew = isset($in_dateSave[$key]) ? $in_dateSave[$key] : '';
            $id_customerSaveNew = isset($id_customerSave[$key]) ? $id_customerSave[$key] : '';
            $plan_workSaveNew = isset($plan_workSave[$key]) ? $plan_workSave[$key] : '';

            if(isset($dallyaddSave)){
                $dailySaveNew = '1';
            } else {
                if($_SESSION['typelogin'] == 'Supervisor'){ 
                    $dailySaveNew = isset($dailySave[$key]) ? $dailySave[$key] : '2';
                } else {
                    $dailySaveNew = '0';
                }
            }

            if($_SESSION['typelogin'] == 'Supervisor'){ 
                $sale_codeSaveNew = isset($sale_codeSave[$key]) ? $sale_codeSave[$key] : '';
            } else {
                $sale_codeSaveNew = $_SESSION['em_id'];
            }
    


            $hospital_classSaveNew = isset($hospital_classSave[$key]) ? $hospital_classSave[$key] : '';
            $hospital_buidingSaveNew = isset($hospital_buidingSave[$key]) ? $hospital_buidingSave[$key] : '';
            $hospital_wardSaveNew = isset($hospital_wardSave[$key]) ? $hospital_wardSave[$key] : '';
            $hospital_contact1SaveNew = isset($hospital_contact1Save[$key]) ? $hospital_contact1Save[$key] : '';
            $add_date = date('Y-m-d H:i:s');

            // echo '<hr>';

            $areaMain = "SELECT sale_code,sale_name FROM tb_team_ss1 
            UNION SELECT sale_code,sale_name FROM tb_team_ss2
            UNION SELECT sale_code,sale_name FROM tb_team_ss3
            ";
            $areaQuery = mysqli_query($conn, $areaMain);
            while ($areaView = mysqli_fetch_array($areaQuery)) {  
                if($areaView['sale_code'] == $sale_codeSaveNew){
                    $uername = $areaView['sale_name'];
                }
            }

            $strSQL = "SELECT * FROM tb_customer_contact WHERE id_customer = '".$id_customerSaveNew."' "; // หาค่าตาม id_customer
            $objQuery = mysqli_query($conn,$strSQL);
            $objResult = mysqli_fetch_array($objQuery);

            if ( $objResult['$type_1'] == "" ){ $ckk_acc ='0'; } else { $ckk_acc ='1'; }

            if($sale_codeSaveNew=='S11' or $sale_codeSaveNew=='S12' or $sale_codeSaveNew=='S13' or $sale_codeSaveNew=='S17' or $sale_codeSaveNew=='S24' or $sale_codeSaveNew=='SS2'){  
                $head_team='SS2';	
            } else if($sale_codeSaveNew=='S14' or $sale_codeSaveNew=='S15' or $sale_codeSaveNew=='S16' or $sale_codeSaveNew=='S21' or $sale_codeSaveNew=='S22' or $sale_codeSaveNew=='S51' or $sale_codeSaveNew=='SS1'){
                $head_team='SS1';		
            } else if($sale_codeSaveNew=='S31' or $sale_codeSaveNew=='S32' or $sale_codeSaveNew=='MM1' or $sale_codeSaveNew=='SM1' or $sale_codeSaveNew=='SS3'){
                $head_team='SS3';		
            } else {
                $head_team='SM1';	
            }

            $strSQL1 = "INSERT INTO tb_register_data (date_plan,hospital_name,hospital_buiding,hospital_class,hospital_ward,hospital_contact,add_date,plan_work,sale_area,sale_name,daily,hospital_ward_search,hospital_contact1,hospital_contact2,hospital_contact3,hospital_contact4,hospital_mobile1,hospital_mobile2,hospital_mobile3,hospital_mobile4,hospital_mobile5,email_contact1,email_contact2,email_contact3,email_contact4,email_contact5,id_customer,ckk_acc,hospital_contact5,hospital_contact6,hospital_contact7,hospital_contact8,hospital_contact9,hospital_mobile6,hospital_mobile7,hospital_mobile8,hospital_mobile9,hospital_mobile10,email_contact6,email_contact7,email_contact8,email_contact9,email_contact10,id_ref,head_area) 
            values(
            '".$in_dateSaveNew."',
            '".$objResult['customer_name']."',
            '".$hospital_buidingSaveNew."',
            '".$hospital_classSaveNew."',
            '".$hospital_wardSaveNew."',
            '".$hospital_contact1SaveNew."',
            '".$add_date."',
            '".$plan_workSaveNew."',
            '".$sale_codeSaveNew."',
            '".$uername."',
            '".$dailySaveNew."',
            '".$objResult['hospital_ward_present']."',
            '".$objResult['hospital_contact2']."',
            '".$objResult['hospital_contact3']."',
            '".$objResult['hospital_contact4']."',
            '".$objResult['hospital_contact5']."',
            '".$objResult['hospital_mobile1']."',
            '".$objResult['hospital_mobile2']."',
            '".$objResult['hospital_mobile3']."',
            '".$objResult['hospital_mobile4']."',
            '".$objResult['hospital_mobile5']."',
            '".$objResult['email_contact1']."',
            '".$objResult['email_contact2']."',
            '".$objResult['email_contact3']."',
            '".$objResult['email_contact4']."',
            '".$objResult['email_contact5']."',
            '".$id_customerSaveNew."',
            '".$ckk_acc."',
            '".$objResult['hospital_contact5']."',
            '".$objResult['hospital_contact6']."',
            '".$objResult['hospital_contact7']."',
            '".$objResult['hospital_contact8']."',
            '".$objResult['hospital_contact9']."',
            '".$objResult['hospital_mobile6']."',
            '".$objResult['hospital_mobile7']."',
            '".$objResult['hospital_mobile8']."',
            '".$objResult['hospital_mobile9']."',
            '".$objResult['hospital_mobile10']."',
            '".$objResult['email_contact6']."',
            '".$objResult['email_contact7']."',
            '".$objResult['email_contact8']."',
            '".$objResult['email_contact9']."',
            '".$objResult['email_contact10']."',
            '".$id_refSave."',
            '".$head_team."'
            )";

            $objQuery1 = mysqli_query($conn,$strSQL1) or die(mysqli_error());

            if($id_refSave!=""){
            $strSQL11 =  "UPDATE tb_register_salemk SET ckk_open = '1' , id_customer = '".$id_customerSaveNew."'  WHERE  id ='".$id_refSave."'";
            $objQuery11 = mysqli_query($conn,$strSQL11) or die(mysqli_error());	
            // echo $strSQL11;
            }
        }
        $text = '<font>ดำเนินการเสร็จสิ้น</font>';
        require_once __DIR__ . '/../views/Loading_page.php';
        echo "<meta http-equiv=refresh content=3;URL=".$_SESSION['thisDomain']."dallyreport>"; 

        mysqli_close($conn);
        exit;

    }

?>
<span id="cta" class="cta-button" style="position: fixed; bottom: 15px; right: 15px; z-index: 9999;" onclick="DetailsDemo()"><img src="assets/images/icon_system/material-symbols--help.svg" style="width: 15px; height: 15px;"  alt="" srcset="" data-bs-toggle="tooltip" data-bs-title="คำอธิบาย"></span>
<script src="src/views/details_pages/actionplan_list_demo.js"></script>