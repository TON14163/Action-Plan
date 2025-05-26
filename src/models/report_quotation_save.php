<?php 
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

// ส่วนที่ 1
$warp = $_POST['warp'];
$id_customer = $_POST['id_customer'];
$id_work = $_POST['id_work'];
$cus_free = $_POST['$cus_free'];

$hospital_name = $_POST['hospital_name'];
$hospital_buiding = $_POST['hospital_buiding'];
$hospital_class = $_POST['hospital_class'];
$hospital_ward = $_POST['hospital_ward'];

// ส่วนที่ 2
$hospital_contact1 = $_POST['hospital_contact1'];
$hospital_mobile1 = $_POST['hospital_mobile1'];
$email_contact1 = $_POST['email_contact1'];

$hospital_contact2 = $_POST['hospital_contact2'];
$hospital_mobile2 = $_POST['hospital_mobile2'];
$email_contact2 = $_POST['email_contact2'];

$hospital_contact3 = $_POST['hospital_contact3'];
$hospital_mobile3 = $_POST['hospital_mobile3'];
$email_contact3 = $_POST['email_contact3'];

$hospital_contact4 = $_POST['hospital_contact4'];
$hospital_mobile4 = $_POST['hospital_mobile4'];
$email_contact4 = $_POST['email_contact4'];

$hospital_contact5 = $_POST['hospital_contact5'];
$hospital_mobile5 = $_POST['hospital_mobile5'];
$email_contact5 = $_POST['email_contact5'];

$hospital_contact6 = $_POST['hospital_contact6'];
$hospital_mobile6 = $_POST['hospital_mobile6'];
$email_contact6 = $_POST['email_contact6'];

$hospital_contact7 = $_POST['hospital_contact7'];
$hospital_mobile7 = $_POST['hospital_mobile7']; 
$email_contact7 = $_POST['email_contact7'];

$hospital_contact8 = $_POST['hospital_contact8'];
$hospital_mobile8 = $_POST['hospital_mobile8'];
$email_contact8 = $_POST['email_contact8'];

$hospital_contact9 = $_POST['hospital_contact9'];
$hospital_mobile9 = $_POST['hospital_mobile9'];
$email_contact9 = $_POST['email_contact9'];

$hospital_contact10 = $_POST['hospital_contact10'];
$hospital_mobile10 = $_POST['hospital_mobile10'];
$email_contact10 = $_POST['email_contact10'];


// ส่วนที่ 3
$product_onelist = $_POST['product_onelist'];
$product_outlistone1 = $_POST['product_outlistone1'];
$unit_product1 = $_POST['unit_product1'];
$price_unit1 = $_POST['price_unit1'];
$price_product1 = $_POST['price_product1'];
$month_po = $_POST['month_po'];
$sum_price_product = $_POST['sum_price_product'];
$date_request = $_POST['date_request'];
$type_cus = $_POST['type_cus'];
$date_update = $_POST['date_update'];
$summary_order = $_POST['summary_order'];
$description_focastnew = $_POST['description_focastnew'];

$percent_full = explode("|",$_POST['percent_code']);           // เปอร์เซ็นต์
$percent_code = $percent_full[0];                                  // เปอร์เซ็นต์
$percent_id = $percent_full[1];   
$unit_name1 = UnitNameMain($product_outlistone1);
$mode_pro1 = ModeProMain($product_outlistone1);

//  งานที่สร้างจากประมาณการขาย ( บันทึก )
    $dailyValue = '3';
    $copySql = "
    INSERT INTO tb_register_data (id_customer, date_plan, sale_name, sale_area, head_area, hospital_name, hospital_buiding, hospital_class, hospital_ward, hospital_ward_search, hospital_contact, hospital_contact1, hospital_contact2, hospital_contact3, hospital_contact4, hospital_contact5, hospital_contact6, hospital_contact7, hospital_contact8, hospital_contact9, hospital_mobile1, hospital_mobile2, hospital_mobile3, hospital_mobile4, hospital_mobile5, hospital_mobile6, hospital_mobile7, hospital_mobile8, hospital_mobile9, hospital_mobile10, email_contact1, email_contact2, email_contact3, email_contact4, email_contact5, email_contact6, email_contact7, email_contact8, email_contact9, email_contact10, contact_ckk, plan_work, product_present, description_work, date_contact, add_date, daily, summary_saleorder, summary_quote, summary_product1, product_id1, remark_pro1, mode_pro1, unit_product1, unit_name1, price_product1, price_unit1, sum_price_product, percent_id, percent_name, month_po, month_id, summary_order, date_request, date_update, date_order, date_follow1, date_follow2, date_follow3, date_follow4, date_follow5, date_follow6, date_follow7, date_follow8, date_follow9, date_follow10, date_follow11, date_follow12, date_follow13, date_follow14, date_follow15, description_order, ckk_follow, id_referent, type_sale, status_reser, ckk_acc, reser_ckk, ckk_st, project_des, support_des, grade_a, type_cus, pre_name, description_focast, description_focastnew, id_newbui, remark_newbui, cus_free, id_ref, objective)
                SELECT 
                    SELECT id_customer,
                    date_plan,
                    sale_name,
                    sale_area,
                    head_area,
                    hospital_name,
                    hospital_buiding,
                    hospital_class,
                    hospital_ward,
                    hospital_ward_search,
                    '$hospital_contact1',
                    '$hospital_contact2',
                    '$hospital_contact3',
                    '$hospital_contact4',
                    '$hospital_contact5',
                    '$hospital_contact6',
                    '$hospital_contact7',
                    '$hospital_contact8',
                    '$hospital_contact9',
                    '$hospital_contact10',
                    '$hospital_mobile1',
                    '$hospital_mobile2',
                    '$hospital_mobile3',
                    '$hospital_mobile4',
                    '$hospital_mobile5',
                    '$hospital_mobile6',
                    '$hospital_mobile7',
                    '$hospital_mobile8',
                    '$hospital_mobile9',
                    '$hospital_mobile10',
                    '$email_contact1',
                    '$email_contact2',
                    '$email_contact3',
                    '$email_contact4',
                    '$email_contact5',
                    '$email_contact6',
                    '$email_contact7',
                    '$email_contact8',
                    '$email_contact9',
                    '$email_contact10',
                    contact_ckk,
                    plan_work,
                    product_present,
                    description_work,
                    date_contact,
                    add_date,
                    '$dailyValue',
                    summary_saleorder,
                    summary_quote,
                    '$product_onelist',
                    '$product_outlistone1',
                    remark_pro1,
                    '$mode_pro1',
                    '$unit_product1',
                    '$unit_name1',
                    '$price_product1',
                    '$price_unit1',
                    '$sum_price_product',
                    '$percent_id',
                    '$percent_code',
                    '$month_po',
                    month_id,
                    summary_order,
                    '$date_request',
                    date_update,
                    date_order,
                    date_follow1,
                    date_follow2,
                    date_follow3,
                    date_follow4,
                    date_follow5,
                    date_follow6,
                    date_follow7,
                    date_follow8,
                    date_follow9,
                    date_follow10,
                    date_follow11,
                    date_follow12,
                    date_follow13,
                    date_follow14,
                    date_follow15,
                    description_order,
                    ckk_follow,
                    id_referent,
                    type_sale,
                    status_reser,
                    ckk_acc,
                    reser_ckk,
                    ckk_st,
                    project_des,
                    support_des,
                    grade_a,
                    '$type_cus',
                    pre_name,
                    description_focast,
                    '$description_focastnew',
                    id_newbui,
                    remark_newbui,
                    '$cus_free',
                    id_ref,
                    objective 
                    FROM tb_register_data 
                    WHERE id_work = '" . mysqli_real_escape_string($conn, $id_work) . "'
                    ";
    // $qcopySql = mysqli_query($conn,$copySql) or die ('Error in query');
    echo $copySql;

    // หาค่า ID_word ล่าสุด เพื่อไปยังหน้านั้น
    $sql_warp = "SELECT id_customer,id_work FROM tb_register_data WHERE id_customer = '" . mysqli_real_escape_string($conn, $id_customer) . "' AND sale_area = '".$_SESSION['em_id']."' ORDER BY id_work DESC LIMIT 1";
    $qsql_warp = mysqli_query($conn,$sql_warp) or die ('Error in query');
    $nsql_warp = mysqli_num_rows($qsql_warp);
    $row_warp = mysqli_fetch_array($qsql_warp);
    $id_work_warp = $row_warp['id_work'];

    if($warp == 2){
            $text = 'กำลังดำเนินการกรุณารอสักครู่...';
            require_once __DIR__ . '/../views/Loading_page.php';
            echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."dallyreport>"; 
            mysqli_close($conn);
            exit; 
    } else {

        if ($nsql_warp > 0) {
            $text = 'กำลังดำเนินการกรุณารอสักครู่...';
            require_once __DIR__ . '/../views/Loading_page.php';
            echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."daily_report_edit?id_work=$id_work_warp>"; 
            mysqli_close($conn);
            exit; 
        } else {
            $text = 'เขตข้อมูลไม่ถูกต้องกรุณาตรวจสอบข้อมูลอีกครั้ง...';
            require_once __DIR__ . '/../views/Loading_page.php';
            echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."daily_report_edit?id_work=$id_work_warp>"; 
            mysqli_close($conn);
            exit; 
        }

    }
?>