<?php 
    // error_reporting(0);
    require_once __DIR__ . '/../controllers/daily_report_edit_controllers.php'; // ข้อมูลทั้งหมดจะอยู่ในส่วนนี้
    $show = new DailyReportEdit(); // เรียกใช้งาน class DailyReportEdit นี้ที่มีข้อมูลอยู่มาแสดง

    function FigString2($nameKey){
        global $conn; // ใช้ตัวแปร $conn ที่ประกาศไว้ภายนอกฟังก์ชัน
            $nameKey = htmlspecialchars(mysqli_real_escape_string($conn,$_POST[$nameKey]),ENT_COMPAT);
        return $nameKey;
    }
    function UnitNameMain($keyID){
        global $conn; // ใช้ตัวแปร $conn ที่ประกาศไว้ภายนอกฟังก์ชัน
        $result = $conn->query("SELECT product_ID, unit_name FROM tb_product WHERE product_ID = '" . mysqli_real_escape_string($conn, $keyID) . "'");
        if ($result && $row = $result->fetch_assoc()) {
            return $row['unit_name'];
        } else {
            return ''; // กรณีไม่พบข้อมูล
        }
    }
    function ModeProMain($keyID){
        global $conn; // ใช้ตัวแปร $conn ที่ประกาศไว้ภายนอกฟังก์ชัน
        $result = $conn->query("SELECT product_ID, mode_pro FROM tb_product WHERE product_ID = '" . mysqli_real_escape_string($conn, $keyID) . "'");
        if ($result && $row = $result->fetch_assoc()) {
            return $row['mode_pro'];
        } else {
            return ''; // กรณีไม่พบข้อมูล
        }
    }
    
    $id_work = $_POST['id_work'];                                      // ID งาน
    $id_customer = $_POST['id_customer'];                              // ID ลูกค้า
    $product_onelist = FigString2('product_onelist');                  // รายการสินค้า Name
    $remark_pro1 = FigString2('remark_pro1');                          // หมายเหตุ
    $product_outlistone1 = FigString2('product_outlistone1');          // รายการสินค้า ID
    $unit_product1 = FigString2('unit_product1');                      // จำนวน
    $price_unit1 = FigString2('price_unit1');                          // ราคา / หน่วย
    $price_product1 = FigString2('price_product1');                    // มูลค่า
    $percent_full = explode("|",FigString2('percent_code'));           // เปอร์เซ็นต์
    $percent_code = $percent_full[0];                                  // เปอร์เซ็นต์
    $percent_id = $percent_full[1];                                    // เปอร์เซ็นต์
    $month_po = FigString2('month_po');                                // วันที่จะได้รับ P/O
    $sum_price_product = FigString2('sum_price_product');              // มูลค่าทั้งหมด
    $date_request = FigString2('date_request');                        // วันที่ต้องการสินค้า
    $type_cus = FigString2('type_cus');                                // ประเภท
    $cus_free = FigString2('cus_free');                                // ประเภทลูกค้า
    $description_focastnew = FigString2('description_focastnew');      // รายละเอียด
    $unit_name1 = UnitNameMain($product_outlistone1);                  // หน่วยสินค้า
    $mode_pro1 = ModeProMain($product_outlistone1);                    // รูปแบบสินค้า

    // $num_follow = $_POST['num_follow'];                                // จำนวนการติดตามครั้งที่ ?
    // $date_index = 'date_follow'.$num_follow;                           // วันที่ติดตาม index
    // $date_value = $_POST['date_follow'.$num_follow];                   // วันที่ติดตาม value
    // $plan_work_follow = $_POST['plan_work_follow'.$num_follow];        // แผนงาน
    
    $date_plan = $_POST['date_plan'];                                // วันที่
    $plan_work = $_POST['plan_work'];                                // แผนงาน

    $dailyValue = '0';
    $copySql = "INSERT INTO tb_register_data (id_customer, date_plan, sale_name, sale_area, head_area, hospital_name, hospital_buiding, hospital_class, hospital_ward, hospital_ward_search, hospital_contact, hospital_contact1, hospital_contact2, hospital_contact3, hospital_contact4, hospital_contact5, hospital_contact6, hospital_contact7, hospital_contact8, hospital_contact9, hospital_mobile1, hospital_mobile2, hospital_mobile3, hospital_mobile4, hospital_mobile5, hospital_mobile6, hospital_mobile7, hospital_mobile8, hospital_mobile9, hospital_mobile10, email_contact1, email_contact2, email_contact3, email_contact4, email_contact5, email_contact6, email_contact7, email_contact8, email_contact9, email_contact10, contact_ckk, plan_work, product_present, description_work, date_contact, add_date, daily, summary_saleorder, summary_quote, summary_product1, product_id1, remark_pro1, mode_pro1, unit_product1, unit_name1, price_product1, price_unit1, sum_price_product, percent_id, percent_name, month_po, month_id, summary_order, date_request, date_update, date_order, description_order, ckk_follow, id_referent, type_sale, status_reser, ckk_acc, reser_ckk, ckk_st, project_des, support_des, grade_a, type_cus, pre_name, description_focast, description_focastnew, id_newbui, remark_newbui, cus_free, id_ref, objective)
                SELECT id_customer, '$date_plan', sale_name, sale_area, head_area, hospital_name, hospital_buiding, hospital_class, hospital_ward, hospital_ward_search, hospital_contact, hospital_contact1, hospital_contact2, hospital_contact3, hospital_contact4, hospital_contact5, hospital_contact6, hospital_contact7, hospital_contact8, hospital_contact9, hospital_mobile1, hospital_mobile2, hospital_mobile3, hospital_mobile4, hospital_mobile5, hospital_mobile6, hospital_mobile7, hospital_mobile8, hospital_mobile9, hospital_mobile10, email_contact1, email_contact2, email_contact3, email_contact4, email_contact5, email_contact6, email_contact7, email_contact8, email_contact9, email_contact10, contact_ckk, '$plan_work', product_present, description_work, date_contact, add_date, '$dailyValue', summary_saleorder, summary_quote, '$product_onelist', '$product_outlistone1', '$remark_pro1', '$mode_pro1', '$unit_product1', '$unit_name1', '$price_product1', '$price_unit1', '$sum_price_product', '$percent_id', '$percent_code', '$month_po', month_id, summary_order, '$date_request', date_update, date_order, description_order, ckk_follow, '$id_work', type_sale, status_reser, ckk_acc, reser_ckk, ckk_st, project_des, support_des, grade_a, '$type_cus', pre_name, description_focast, '$description_focastnew', id_newbui, remark_newbui, '$cus_free', id_ref, objective FROM tb_register_data WHERE id_work = '" . mysqli_real_escape_string($conn, $id_work) . "'";
    $qcopySql = mysqli_query($conn,$copySql) or die ('Error in query');
    // echo $copySql;


    // if($num_follow == 1){               // รายการแรกให้สร้างเพิ่มใหม่
    //     $strSQL1 =  "INSERT INTO tb_datefollow ($date_index,refid_work) values ('".$date_value."','$id_work')";
    //     $objQuery1 = mysqli_query($conn,$strSQL1) or die(mysqli_error());
    //     // echo $strSQL1;
    // } else {                            // ถ้าไม่ใช่รายการแรกให้ทำการอัพเดท
    //     $strSQL2 =  "UPDATE tb_datefollow SET $date_index = '".$date_value."' WHERE refid_work = '".$id_work."' ";
    //     $objQuery2 = mysqli_query($conn,$strSQL2) or die(mysqli_error());
    //     // echo $strSQL2;
    // }
    // exit;

    // หาค่า ID_word ล่าสุด เพื่อไปยังหน้านั้น
    $sql_warp = "SELECT id_customer,id_work FROM tb_register_data WHERE id_customer = '" . mysqli_real_escape_string($conn, $id_customer) . "' AND sale_area = '".$_SESSION['em_id']."' ORDER BY id_work DESC LIMIT 1";
    $qsql_warp = mysqli_query($conn,$sql_warp) or die ('Error in query');
    $nsql_warp = mysqli_num_rows($qsql_warp);
    $row_warp = mysqli_fetch_array($qsql_warp);
    $id_work_warp = $row_warp['id_work'];
    // echo $sql_warp;
    // exit;
    
    if ($nsql_warp > 0) {
        $text = 'กำลังดำเนินการกรุณารอสักครู่...';
        require_once __DIR__ . '/../views/Loading_page.php';
        echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."daily_report_edit?id_work=$id_work_warp&addPlanPurple=1>"; 
        mysqli_close($conn);
        exit; 
    } else {
        $text = 'เขตข้อมูลไม่ถูกต้องกรุณาตรวจสอบข้อมูลอีกครั้ง...';
        require_once __DIR__ . '/../views/Loading_page.php';
        echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."daily_report_edit?id_work=$id_work_warp&addPlanPurple=2>"; 
        mysqli_close($conn);
        exit; 
    }
    
?>