<?php 
error_reporting(0);

require_once __DIR__ . '/../controllers/daily_report_edit_controllers.php'; // ข้อมูลทั้งหมดจะอยู่ในส่วนนี้
$show = new DailyReportEdit(); // เรียกใช้งาน class DailyReportEdit นี้ที่มีข้อมูลอยู่มาแสดง

function FigString1($nameKey){
    global $conn; // ใช้ตัวแปร $conn ที่ประกาศไว้ภายนอกฟังก์ชัน
    if (isset($_POST[$nameKey]) && trim($_POST[$nameKey]) !== '') { 
        $nameKey = htmlspecialchars(mysqli_real_escape_string($conn,$_POST[$nameKey]),ENT_COMPAT); 
    } else {
        $nameKey = ''; // กำหนดค่าเริ่มต้นเป็นค่าว่างถ้าไม่พบข้อมูล
    }
    return $nameKey;
}
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

// dallyreport_register_details1

$addDate = date('Y-m-d H:i:s');
$id_work = $_POST['id_work'];
$date_plan = $_POST['date_plan'];
$id_customer = $_POST['id_customer'];
$id_pro = $_POST['id_pro'];
$hospital_buiding = FigString2('hospital_buiding');
$hospital_class = FigString2('hospital_class');
$hospital_ward = FigString2('hospital_ward');
$hospital_name = FigString2('hospital_name');

$hospital_contact = FigString1('hospital_contact');   // ชื่อผู้ติดต่อ
$hospital_contact1 = FigString1('hospital_contact1'); // ชื่อผู้ติดต่อ
$hospital_contact2 = FigString1('hospital_contact2'); // ชื่อผู้ติดต่อ
$hospital_contact3 = FigString1('hospital_contact3'); // ชื่อผู้ติดต่อ
$hospital_contact4 = FigString1('hospital_contact4'); // ชื่อผู้ติดต่อ
$hospital_contact5 = FigString1('hospital_contact5'); // ชื่อผู้ติดต่อ
$hospital_contact6 = FigString1('hospital_contact6'); // ชื่อผู้ติดต่อ
$hospital_contact7 = FigString1('hospital_contact7'); // ชื่อผู้ติดต่อ
$hospital_contact8 = FigString1('hospital_contact8'); // ชื่อผู้ติดต่อ
$hospital_contact9 = FigString1('hospital_contact9'); // ชื่อผู้ติดต่อ

$hospital_mobile1 = FigString1('hospital_mobile1');     // หมายเลขโทรศัพท์
$hospital_mobile2 = FigString1('hospital_mobile2');     // หมายเลขโทรศัพท์
$hospital_mobile3 = FigString1('hospital_mobile3');     // หมายเลขโทรศัพท์
$hospital_mobile4 = FigString1('hospital_mobile4');     // หมายเลขโทรศัพท์
$hospital_mobile5 = FigString1('hospital_mobile5');     // หมายเลขโทรศัพท์
$hospital_mobile6 = FigString1('hospital_mobile6');     // หมายเลขโทรศัพท์
$hospital_mobile7 = FigString1('hospital_mobile7');     // หมายเลขโทรศัพท์
$hospital_mobile8 = FigString1('hospital_mobile8');     // หมายเลขโทรศัพท์
$hospital_mobile9 = FigString1('hospital_mobile9');     // หมายเลขโทรศัพท์
$hospital_mobile10 = FigString1('hospital_mobile10');   // หมายเลขโทรศัพท์

$email_contact1 = FigString1('email_contact1');   // อีเมลล์
$email_contact2 = FigString1('email_contact2');   // อีเมลล์
$email_contact3 = FigString1('email_contact3');   // อีเมลล์
$email_contact4 = FigString1('email_contact4');   // อีเมลล์
$email_contact5 = FigString1('email_contact5');   // อีเมลล์
$email_contact6 = FigString1('email_contact6');   // อีเมลล์
$email_contact7 = FigString1('email_contact7');   // อีเมลล์
$email_contact8 = FigString1('email_contact8');   // อีเมลล์
$email_contact9 = FigString1('email_contact9');   // อีเมลล์
$email_contact10 = FigString1('email_contact10'); // อีเมลล์

// dallyreport_register_details2  เลือกสินค้า
$plan_work = FigString1('plan_work');

$planitemlist = isset($_POST['planitemlist']) ? $_POST['planitemlist'] : []; // check if planitemlist is an array
$product_present = []; // เอาไว้เก็บค่า JSON objects
if (!empty($planitemlist)) {
    foreach ($planitemlist as $key => $value) {
        $sanitizedValue = htmlspecialchars(mysqli_real_escape_string($conn, $value), ENT_COMPAT);
        $product_present[] = ['itemlist' => $sanitizedValue]; // เข้าค่าเข้าไปใน JSON object
    }
}
$product_present = json_encode($product_present, JSON_UNESCAPED_UNICODE); // แปลงเป็น JSON string

// ประมาณการขาย
// if (isset($_POST['listmain1'])){
    $product_onelist = FigString2('product_onelist');                                                   // รายการสินค้า Name
    $product_outlistone1 = FigString2('product_outlistone1');                                           // รายการสินค้า ID
    $remark_pro1 = FigString2('remark_pro1');                                                           // หมายเหตุ
    $unit_product1 = FigString2('unit_product1');                                                       // จำนวน
    $price_unit1 = FigString2('price_unit1');                                                           // ราคา / หน่วย
    $price_product1 = FigString2('price_product1');                                                     // มูลค่า
    $percent_full = explode("|",FigString2('percent_code'));                                            // เปอร์เซ็นต์
    $percent_code = $percent_full[0];                                                                   // เปอร์เซ็นต์
    $percent_id = $percent_full[1];                                                                     // เปอร์เซ็นต์
    $month_po = FigString2('month_po');                                                                 // วันที่จะได้รับ P/O
    $sum_price_product = FigString2('sum_price_product');                                               // มูลค่าทั้งหมด
    $date_request = FigString2('date_request');                                                         // วันที่ต้องการสินค้า
    $type_cus = $_POST['type_cus'];                                                                     // ประเภท
    $cus_free = $_POST['cus_free'];                                                                     // ประเภทลูกค้า
    $description_focast = FigString2('description_focast');                                             // รายละเอียดงาน : Update ประมาณการขาย
    $description_focastnew = FigString2('description_focastnew');                                       // รายละเอียดงาน : ประมาณการขายใหม่
    $date_update = FigString2('date_update');                                                           // วันที่อัพเดท
    $date_order = FigString2('date_order');                                                             // วันที่ออกบิล
    $summary_order = FigString2('summary_order');                                                       // สรุปขายสมบูรณ์
    $pre_name = FigString2('pre_name');                                                                 // ผู้แนะนำ
// }

// echo $cus_free;
// exit;

// Demo ทดลองสินค้า
// if (isset($_POST['listmain2'])){
        $product_outlist = $_POST['product_outlist'];       // รายการสินค้า
        $cusrequest_like = $_POST['cusrequest_like'];       // ต้องการ / ชอบ
        $cusrequest_dislike = $_POST['cusrequest_dislike']; // ไม่ต้องการ / ไม่ชอบ
        $list2_old_file = $_POST['list2_old_file'];

// แนบไฟล์ (รองรับ multiple files สำหรับแต่ละแถว) Start
        if (isset($_FILES['list2file']) && !empty($_FILES['list2file']['name'])) {
            $uploadDir = "uploads/";
            $uploadedFiles = [];

            // ตรวจสอบว่า folder uploads มีอยู่หรือไม่ ถ้าไม่มีให้สร้าง
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // วนลูปแต่ละแถว (row) ของรุ่นสินค้า
            foreach ($_FILES['list2file']['name'] as $rowNumber => $files) {
                $uploadedFiles[$rowNumber] = []; // เก็บชื่อไฟล์สำหรับแถวนี้

                // วนลูปจัดการแต่ละไฟล์ในแถว
                foreach ($files as $index => $fileName) {
                    if (!empty($fileName) && $_FILES['list2file']['error'][$rowNumber][$index] === UPLOAD_ERR_OK) {
                        // แปลงชื่อไฟล์จาก UTF-8 เป็น TIS-620
                        $safeFileName = iconv("UTF-8", "TIS-620", $fileName);
                        // เพิ่ม timestamp เพื่อป้องกันชื่อไฟล์ซ้ำ
                        $safeFileName = time() . '_' . $safeFileName;
                        $filePath = $uploadDir . $safeFileName;

                        // อัปโหลดไฟล์
                        if (move_uploaded_file($_FILES['list2file']['tmp_name'][$rowNumber][$index], $filePath)) {
                            // เก็บชื่อไฟล์ที่ปลอดภัย
                            $escapedFileName = htmlspecialchars(mysqli_real_escape_string($conn, $safeFileName), ENT_COMPAT);
                            $uploadedFiles[$rowNumber][] = $escapedFileName;
                            // echo "File uploaded successfully for row $rowNumber: $escapedFileName<br>";
                        } else {
                            // echo "Failed to upload file for row $rowNumber: $safeFileName<br>";
                        }
                    } elseif ($_FILES['list2file']['error'][$rowNumber][$index] !== UPLOAD_ERR_NO_FILE) {
                        // echo "Error uploading file for row $rowNumber: $fileName, Error: " . $_FILES['list2file']['error'][$rowNumber][$index] . "<br>";
                    }
                }
            }

            // แปลง array ของชื่อไฟล์เป็น string หรือบันทึกลงฐานข้อมูลตามต้องการ
            $list2file = [];
            foreach ($uploadedFiles as $rowNumber => $files) {
                if (!empty($files)) {
                    $list2file[$rowNumber] = implode('","', $files); // รวมชื่อไฟล์ในแถวด้วย comma
                }
            }

            // หากต้องการเก็บทั้งหมดในตัวแปรเดียว (ขึ้นอยู่กับโครงสร้างฐานข้อมูล)
            $list2fileString = $list2file[1]; // เก็บเป็น JSON หรือปรับตามความเหมาะสม
            // echo strval(htmlspecialchars($list2fileString));

        } else {
            echo "No files uploaded or an error occurred.<br>";
        }
// แนบไฟล์ (รองรับ multiple files สำหรับแต่ละแถว) END

        $MyProdoctDemoValue = [];
        $myIdNum = 1;

        foreach($product_outlist as $key => $value) {
            
            if([$list2file[$myIdNum]] != [null]){ // เก็บค่าใหม่ที่มี

                if($list2file[$myIdNum] == [null]){ // เก็บค่าใหม่
                    $memoryfileValue = [$list2file[$myIdNum]];
                } else { // กรณีมีค่าเก่า และมีค่าใหม่ Add เข้ามาให้เอาค่าใหม่เข้าไปต่อค่าเก่า
                    // สมมติว่า $list2_old_file และ $list2file เป็นอาร์เรย์ที่มีข้อมูล
                    $memoryfileValue = $list2_old_file[$myIdNum]; // ได้ค่าจาก $list2_old_file
                    $memoryfileValue[] = $list2file[$myIdNum];   // เพิ่มค่าใหม่จาก $list2file เข้าไปใน $memoryfileValue

                    // กรองค่า "" ออกจาก $memoryfileValue (ไม่ใช่ $memoryfile)
                    $filtered_array = array_filter($memoryfileValue, function($value) {
                        return $value !== "";
                    });

                    // อัปเดต $memoryfileValue ด้วยอาร์เรย์ที่กรองแล้ว
                    $memoryfileValue = array_values($filtered_array); // ใช้ array_values เพื่อจัดเรียงดัชนีใหม่
                }

            } else if([$list2file[$myIdNum]] == [null]){ // เก็บค่า เก่าที่มี
                if($list2_old_file[$myIdNum] != [null]){
                    $memoryfileValue = $list2_old_file[$myIdNum];
                } else {
                    $memoryfileValue = [];
                }
            }
            
            $product_outlistNew = $product_outlist[$key];
            $cusrequest_likeNew = $cusrequest_like[$key];
            $cusrequest_dislikeNew = $cusrequest_dislike[$key];

            if($product_outlistNew != ''){
                $memoryfile[] = $myIdNum;
                $MyProdoctDemoValue[] = [
                    'id' => $myIdNum,
                    'productid' => $product_outlistNew,
                    'productname' => $show->showProduct($product_outlistNew,'product_name'),
                    'inlike' => $cusrequest_likeNew,
                    'dislike' => $cusrequest_dislikeNew,
                    'memoryfile' => $memoryfileValue ,
                ];
                $myIdNum++;
            }
        }
        $MyProdoctDemoValue = json_encode($MyProdoctDemoValue, JSON_UNESCAPED_UNICODE);
        $cuspre_descript = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['cuspre_descript']),ENT_COMPAT); // รายละเอียดเพิ่มเติม
// echo $MyProdoctDemoValue;
// header('Content-type: application/json');
// exit;
// }

// ออกบูธ (Group Presentation)
// if (isset($_POST['listmain3'])){
    $present_id = FigString2('present_id');                                                         // PK tb_present_booth
    $work_name = FigString2('work_name');                                                           // ชื่องาน
    $work_date = FigString2('work_date');                                                           // วันที่จัดงาน
    $end_date = FigString2('end_date');                                                             // ถึง
    $price_work = FigString2('price_work');                                                         // งบค่าใช้จ่าย
    $count_work = FigString2('count_work');                                                         // จำนวนผู้เข้าร่วม
    $des_cus1 = FigString2('des_cus1');                                                             // ผู้เข้าร่วม
    $sum_wordpre = FigString2('sum_wordpre');                                                       // มุมมอง "ลูกค้า" ต่อ "สินค้า & การแนะนำ & การซื้อ"
    if (isset($_POST['typ_work1'])){ $typ_work1 = $_POST['typ_work1']; } else { $typ_work1 = 0; }   // Powerpoint
    if (isset($_POST['typ_work2'])){ $typ_work2 = $_POST['typ_work2']; } else { $typ_work2 = 0; }   // นำสินค้าไปสาธิต
// }

// ข้อมูลคู่เเข่ง
// if (isset($_POST['listmain4'])){

    function multiArray($keysNameinputs) {
        global $conn; // ใช้ตัวแปร $conn ที่ประกาศไว้ภายนอกฟังก์ชัน
    
        $keysNameinput = isset($_POST[$keysNameinputs]);
        if($keysNameinput == true ){
            $keysNameinput = $_POST[$keysNameinputs];
            foreach($keysNameinput as $key => $value) {
                $keysNameinput[$key] = htmlspecialchars(mysqli_real_escape_string($conn,$value),ENT_COMPAT);
                return $keysNameinput[$key];
            }
        }
    }

// }

// แก้ไขข้อมูลผู้แข่ง

    $h_product_rival = $_POST['h_product_rival'] ?? []; // ประเภทสินค้า PK
    $product_presentList = [];  // ประเภทสินค้า รายงาน Daily Report

    $product_rival = $_POST['product_rival'] ?? []; // ประเภทสินค้า
    $company_rival = $_POST['company_rival'] ?? []; // บริษัท
    $rival_brand = $_POST['rival_brand'] ?? []; // ยี่ห้อ
    $rival_model = $_POST['rival_model'] ?? []; // รุ่น
    $rival_country = $_POST['rival_country'] ?? []; // รุ่น
    $price_to_unit = $_POST['price_to_unit'] ?? []; // ราคา/หน่วย
    $unit = $_POST['unit'] ?? []; // จำนวนซื้อ
    $promotion = $_POST['promotion'] ?? []; // เงื่อนไขพิเศษ
    $description = $_POST['description'] ?? []; // หมายเหตุ
    $no_auto = $_POST['no_auto'] ?? []; // ลำดับรายการ
    $id_story = $_POST['id_story'] ?? []; // PK itemlist
    
    foreach ($h_product_rival as $key => $value) {
        // Sanitize inputs
        $current_no_auto = htmlspecialchars(mysqli_real_escape_string($conn, $no_auto[$key] ?? ''), ENT_COMPAT);
        $h_product_rivalNew = htmlspecialchars(mysqli_real_escape_string($conn, $h_product_rival[$key] ?? ''), ENT_COMPAT);
        $product_rivalNew = htmlspecialchars(mysqli_real_escape_string($conn, $product_rival[$key] ?? ''), ENT_COMPAT);
        $company_rivalNew = htmlspecialchars(mysqli_real_escape_string($conn, $company_rival[$key] ?? ''), ENT_COMPAT);
        $rival_brandNew = htmlspecialchars(mysqli_real_escape_string($conn, $rival_brand[$key] ?? ''), ENT_COMPAT);
        $rival_modelNew = htmlspecialchars(mysqli_real_escape_string($conn, $rival_model[$key] ?? ''), ENT_COMPAT);
        $rival_countryNew = htmlspecialchars(mysqli_real_escape_string($conn, $rival_country[$key] ?? ''), ENT_COMPAT);
        $price_to_unitNew = htmlspecialchars(mysqli_real_escape_string($conn, $price_to_unit[$key] ?? ''), ENT_COMPAT);
        $unitNew = htmlspecialchars(mysqli_real_escape_string($conn, $unit[$key] ?? ''), ENT_COMPAT);
        $promotionNew = htmlspecialchars(mysqli_real_escape_string($conn, $promotion[$key] ?? ''), ENT_COMPAT);
        $descriptionNew = htmlspecialchars(mysqli_real_escape_string($conn, $description[$key] ?? ''), ENT_COMPAT);
        $id_storyNew = htmlspecialchars(mysqli_real_escape_string($conn, $id_story[$key] ?? ''), ENT_COMPAT);

        
        $sqlProrival = "SELECT id,prorival_name FROM tb_prorival WHERE id = '".$h_product_rivalNew."' ";
        $qsqlProrival = mysqli_query($conn,$sqlProrival);
        while($vsqlProrival = mysqli_fetch_array($qsqlProrival)){
            $product_presentList[] = $vsqlProrival['prorival_name'];
        }
        
    
        // จัดการไฟล์แนบสำหรับ no_auto ปัจจุบัน
        $file_nap1 = json_encode([], JSON_UNESCAPED_UNICODE); // Default to empty JSON
        $upload_dir = 'uploads/';
        $allowed_extensions = ['svg', 'pdf', 'jpg', 'png']; // นามสกุลที่อนุญาต 'svg', 'pdf', 'jpg', 'png'
    
        if (isset($_FILES['list4file']['name'][$current_no_auto]) && !empty($_FILES['list4file']['name'][$current_no_auto])) {
            // สร้างโฟลเดอร์ถ้ายังไม่มี
            if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0755, true);
            }
        
            $file_list = [];
            $file_names = $_FILES['list4file']['name'][$current_no_auto];
            $file_tmp_names = $_FILES['list4file']['tmp_name'][$current_no_auto];
            $file_errors = $_FILES['list4file']['error'][$current_no_auto];
        
            foreach ($file_names as $index => $file_name) {
            if ($file_errors[$index] === UPLOAD_ERR_OK && !empty($file_name)) {
                // ตรวจสอบนามสกุลไฟล์
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                if (in_array($file_ext, $allowed_extensions)) {
                // สร้างชื่อไฟล์ใหม่
                $new_file_name = time() . '_' . $current_no_auto . '_' . $index . '.' . $file_ext;
                // Sanitize ชื่อไฟล์
                $file_name_sanitized = htmlspecialchars(mysqli_real_escape_string($conn, $new_file_name), ENT_COMPAT);
                // ย้ายไฟล์ไปยังโฟลเดอร์
                $destination = $upload_dir . $file_name_sanitized;
                if (move_uploaded_file($file_tmp_names[$index], $destination)) {
                    $file_list[] = ['file' => $file_name_sanitized];
                }
                }
            }
            }
            $file_nap1 = json_encode($file_list, JSON_UNESCAPED_UNICODE);
        }
    
        // echo  $current_no_auto;
        // exit;

            if ($h_product_rivalNew != ''){ // and $product_rival != ''

                if($id_storyNew != '' ){
                    $strSQLrivalUp =  "UPDATE tb_storyrival  SET 
                    id_customer = '".$id_customer."',
                    customer_name = '".$hospital_name."',
                    create_date = '".$addDate."',
                    product_rival = '".$show->showProrivalValue($h_product_rivalNew)."',
                    company_rival = '".$company_rivalNew."',
                    rival_brand = '".$rival_brandNew."',
                    rival_model = '".$rival_modelNew."',
                    rival_country = '".$rival_countryNew."',
                    price_to_unit = '".$price_to_unitNew."',
                    unit = '".$unitNew."',
                    promotion = '".$promotionNew."',
                    description = '".$descriptionNew."',
                    sale_area = '".$_SESSION['em_id']."',
                    add_date = '".$addDate."',
                    add_by = '".$_SESSION['username']."',
                    h_product_rival = '".$h_product_rivalNew."' 
                    WHERE id_story = '".$id_storyNew."' 
                    ";
                    $objQueryrivalUp = mysqli_query($conn,$strSQLrivalUp) or die(mysqli_error());
                    // echo $strSQLrivalUp . '<hr>';
                }

                $chkSqlNoAuto = "SELECT * FROM tb_storyrival WHERE no_auto = '".$current_no_auto."' AND refid_work = '".$id_work."' ";
                $chkQueryNoAuto = mysqli_query($conn,$chkSqlNoAuto);
                $chkNumNoAuto = mysqli_num_rows($chkQueryNoAuto);
                if($chkNumNoAuto == 0 ){
                $rowNoAuto = mysqli_fetch_array($chkQueryNoAuto);

                    $strSQLrival = "INSERT INTO tb_storyrival (no_auto, refid_work, id_customer, customer_name, create_date, product_rival, company_rival, rival_brand, rival_model,rival_country,price_to_unit, unit, promotion, description, file_nap1, sale_area, add_date, add_by, h_product_rival) 
                    VALUES ('$current_no_auto', '$id_work', '$id_customer', '$hospital_name', '$addDate', '" . $show->showProrivalValue($h_product_rivalNew) . "', '$company_rivalNew', '$rival_brandNew', '$rival_modelNew', '$rival_countryNew', 
                    '$price_to_unitNew', '$unitNew', '$promotionNew', '$descriptionNew', '$file_nap1', '" . $_SESSION['em_id'] . "', '$addDate', '" . $_SESSION['username'] . "', '$h_product_rivalNew')";
                    $objQueryrival = mysqli_query($conn, $strSQLrival) or die(mysqli_error($conn));
                    // echo $strSQLrival . '<hr>';

                }

            }
        

    }



    // --------------------------------------------------------------------- เก็บข้อมูลลงฐานข้อมูล
    // วันที่ติดตามครั้งล่าสุด Start Input
    $date_follow_update = [];
    $date_follow_insert = [];
    $date_follow_insert_value = [];
    for ($i = 1; $i <= 15; $i++) {
        ${"date_follow$i"} = FigString1("date_follow$i");

        if(${"date_follow$i"} != ''){ // หาค่า ( ครั้งที่ ? ) ไม่ใช่ค่าว่างเก็บลงไปใน array
            $date_follow_update[] = 'date_follow'.$i.' = "'.${"date_follow$i"}.'"';
            $date_follow_insert[] = 'date_follow'.$i;
            $date_follow_insert_value[] = '"'.${"date_follow$i"}.'"';
        }

        ${"plan_follow$i"} = FigString1("plan_follow$i"); // แผนงาน ส่วนที่ 1 // ส่วนนี้จะเอาแผน  1-15 ไม่สนว่ากรอกมาหรือไม่

        if(${"date_follow$i"} != ''){ // หาค่า ( ครั้งที่ ? ) อีกครั้งเพื่อสร้าง แผนใหม่ตามวันของแต่ละครั้ง ?
            $sqlChkFollowAdd = "INSERT INTO tb_register_data (id_customer,date_plan,sale_name,sale_area,head_area,hospital_name,hospital_buiding,hospital_class,hospital_ward,hospital_contact,hospital_contact1,hospital_contact2,hospital_contact3,hospital_contact4,hospital_contact5,hospital_contact6,hospital_contact7,hospital_contact8,hospital_contact9,hospital_mobile1,hospital_mobile2,hospital_mobile3,hospital_mobile4,hospital_mobile5,hospital_mobile6,hospital_mobile7,hospital_mobile8,hospital_mobile9,hospital_mobile10,email_contact1,email_contact2,email_contact3,email_contact4,email_contact5,email_contact6,email_contact7,email_contact8,email_contact9,email_contact10,plan_work,product_present,add_date,daily,summary_product1,product_id1,remark_pro1,mode_pro1,unit_product1,unit_name1,price_product1,price_unit1,sum_price_product,percent_id,percent_name,month_po,summary_order,date_request,date_update,date_order,type_cus,pre_name,description_focast,description_focastnew,cus_free) 
            VALUES('".$id_customer."','".${"date_follow$i"}."','".$_SESSION['name_show']."' ,'".$_SESSION['em_id']."','".$_SESSION['head_area']."','".$hospital_name."','".$hospital_buiding."','".$hospital_class."','".$hospital_ward."','".$hospital_contact."','".$hospital_contact1."','".$hospital_contact2."','".$hospital_contact3."','".$hospital_contact4."','".$hospital_contact5."','".$hospital_contact6."','".$hospital_contact7."','".$hospital_contact8."','".$hospital_contact9."','".$hospital_mobile1."','".$hospital_mobile2."','".$hospital_mobile3."','".$hospital_mobile4."','".$hospital_mobile5."','".$hospital_mobile6."','".$hospital_mobile7."','".$hospital_mobile8."','".$hospital_mobile9."','".$hospital_mobile10."','".$email_contact1."','".$email_contact2."','".$email_contact3."','".$email_contact4."','".$email_contact5."','".$email_contact6."','".$email_contact7."','".$email_contact8."','".$email_contact9."','".$email_contact10."','".${"plan_follow$i"}."','".$product_present."','".$addDate."','3','".$product_onelist."','".$product_outlistone1."','".$remark_pro1."','".ModeProMain($product_outlistone1)."','".$unit_product1."','".UnitNameMain($product_outlistone1)."','".$price_product1."','".$price_unit1."','".$sum_price_product."','".$percent_id."','".$percent_code."','".$month_po."','".$summary_order."','".$date_request."','".$date_update."','".$date_order."','".$type_cus."','".$pre_name."','".$description_focast."','".$description_focastnew."','".$cus_free."')";
            $qSqlChkFollowAdd = mysqli_query($conn,$sqlChkFollowAdd);
        }
    }

    $dateFollowUpdateSql = implode(',', $date_follow_update);
    $dateFollowInsertSql = implode(',', $date_follow_insert);
    $dateFollowInsertValueSql = implode(',', $date_follow_insert_value);

    // echo $dateFollowInsertSql.'<hr>';        // ส่วน (=col)   insert DB
    // echo $dateFollowInsertValueSql.'<hr>';   // ส่วน (=value) insert DB
    // รวมค่า plan_follow1 ถึง plan_follow15 เป็น array
    // แผนงาน ส่วนที่ 2
    $plan_follow_array = [];
    for ($i = 1; $i <= 15; $i++) { // รวมแผน 1-15 ไม่สนว่ากรอกมาหรือไม่ เก็บไว้ในตัวแปร plan_follow_array เพื่อยัดลง DB เป็นก้อน Array เลย
        $plan_follow_array[] = ${"plan_follow$i"};
    }
    // แปลงเป็น JSON แล้วเก็บไว้ที่ plan_work_add
    $plan_work_add = json_encode($plan_follow_array, JSON_UNESCAPED_UNICODE);

    // วันที่ติดตามครั้งล่าสุด End Input
    if($product_present == '[]'){ $product_present = ''; }
    // $product_rivalDB = json_encode($product_presentList, JSON_UNESCAPED_UNICODE); // ไม่ใช้แต่เก็บไว้ก่อน

    $sqlMainsave3 = "UPDATE tb_customer_contact SET hospital_contact1 = '".$hospital_contact."',hospital_contact2 = '".$hospital_contact1."',hospital_contact3 = '".$hospital_contact2."',hospital_contact4 = '".$hospital_contact3."',hospital_contact5 = '".$hospital_contact4."',hospital_contact6 = '".$hospital_contact5."',hospital_contact7 = '".$hospital_contact6."',hospital_contact8 = '".$hospital_contact7."',hospital_contact9 = '".$hospital_contact8."',hospital_contact10 = '".$hospital_contact9."',hospital_mobile1 = '".$hospital_mobile1."',hospital_mobile2 = '".$hospital_mobile2."',hospital_mobile3 = '".$hospital_mobile3."',hospital_mobile4 = '".$hospital_mobile4."',hospital_mobile5 = '".$hospital_mobile5."',hospital_mobile6 = '".$hospital_mobile6."',hospital_mobile7 = '".$hospital_mobile7."',hospital_mobile8 = '".$hospital_mobile8."',hospital_mobile9 = '".$hospital_mobile9."',hospital_mobile10 = '".$hospital_mobile10."',email_contact1 = '".$email_contact1."',email_contact2 = '".$email_contact2."',email_contact3 = '".$email_contact3."',email_contact4 = '".$email_contact4."',email_contact5 = '".$email_contact5."',email_contact6 = '".$email_contact6."',email_contact7 = '".$email_contact7."',email_contact8 = '".$email_contact8."',email_contact9 = '".$email_contact9."',email_contact10 = '".$email_contact10."',hospital_buiding = '".$hospital_buiding."',hospital_class = '".$hospital_class."',hospital_ward = '".$hospital_ward."' ,type_cus = '".$cus_free."' WHERE id_customer = '".$id_customer."' ";
    
    if($dateFollowUpdateSql != ''){
        $sqlMainsave1 = "UPDATE tb_register_data SET date_plan = '".$date_plan."', description_focast = '".$description_focast."', description_focastnew = '".$description_focastnew."', product_present = '".$product_present."', hospital_contact = '".$hospital_contact."', hospital_contact1 = '".$hospital_contact1."', hospital_contact2 = '".$hospital_contact2."', hospital_contact3 = '".$hospital_contact3."', hospital_contact4 = '".$hospital_contact4."', hospital_contact5 = '".$hospital_contact5."', hospital_contact6 = '".$hospital_contact6."', hospital_contact7 = '".$hospital_contact7."', hospital_contact8 = '".$hospital_contact8."', hospital_contact9 = '".$hospital_contact9."' , hospital_mobile1 = '".$hospital_mobile1."', hospital_mobile2 = '".$hospital_mobile2."', hospital_mobile3 = '".$hospital_mobile3."', hospital_mobile4 = '".$hospital_mobile4."', hospital_mobile5 = '".$hospital_mobile5."', hospital_mobile6 = '".$hospital_mobile6."', hospital_mobile7 = '".$hospital_mobile7."', hospital_mobile8 = '".$hospital_mobile8."', hospital_mobile9 = '".$hospital_mobile9."', hospital_mobile10 = '".$hospital_mobile10."', email_contact1 = '".$email_contact1."', email_contact2 = '".$email_contact2."', email_contact3 = '".$email_contact3."', email_contact4 = '".$email_contact4."', email_contact5 = '".$email_contact5."', email_contact6 = '".$email_contact6."', email_contact7 = '".$email_contact7."', email_contact8 = '".$email_contact8."', email_contact9 = '".$email_contact9."', email_contact10 = '".$email_contact10."', hospital_buiding = '".$hospital_buiding."', hospital_class = '".$hospital_class."' , hospital_ward = '".$hospital_ward."', summary_product1 = '".$product_onelist."',remark_pro1 = '".$remark_pro1."', unit_product1 = '".$unit_product1."', price_product1 = '".$price_product1."', price_unit1 = '".$price_unit1."', product_id1 = '".$product_outlistone1."', percent_name = '".$percent_code."', percent_id = '".$percent_id."', sum_price_product = '".$sum_price_product."', month_po = '".$month_po."', unit_name1 = '".UnitNameMain($product_outlistone1)."', mode_pro1 = '".ModeProMain($product_outlistone1)."', type_cus = '".$type_cus."' ,pre_name = '".$pre_name."', cus_free = '".$cus_free."', date_request = '".$date_request."', head_area = '".$_SESSION['head_area']."', date_update = '".$date_update."', summary_order = '".$summary_order."', date_order = '".$date_order."' ,plan_work = '".$plan_work."',plan_work_add = '".$plan_work_add."' , $dateFollowUpdateSql  WHERE id_work = '".$id_work."' ";
        $sqlMainsave2 = "INSERT INTO tb_regist_realtime (date_plan,description_focast,description_focastnew,product_present,hospital_contact,hospital_contact1,hospital_contact2,hospital_contact3,hospital_contact4,hospital_contact5,hospital_contact6,hospital_contact7,hospital_contact8,hospital_contact9,hospital_mobile1,hospital_mobile2,hospital_mobile3,hospital_mobile4,hospital_mobile5,hospital_mobile6,hospital_mobile7,hospital_mobile8,hospital_mobile9,hospital_mobile10,email_contact1,email_contact2,email_contact3,email_contact4,email_contact5,email_contact6,email_contact7,email_contact8,email_contact9,email_contact10,hospital_buiding,hospital_class,hospital_ward,summary_product1,remark_pro1,unit_product1,price_product1,product_id1,percent_name,sum_price_product,month_po,percent_id,unit_name1,price_unit1,mode_pro1,type_cus,pre_name,cus_free,id_work,sale_area,sale_name,hospital_name,date_request,id_customer,date_update,summary_order,date_order,plan_work,plan_work_add,$dateFollowInsertSql) VALUES ('".$date_plan."','".$description_focast."','".$description_focastnew."','".$product_present."','".$hospital_contact."','".$hospital_contact1."','".$hospital_contact2."','".$hospital_contact3."','".$hospital_contact4."','".$hospital_contact5."','".$hospital_contact6."','".$hospital_contact7."','".$hospital_contact8."','".$hospital_contact9."','".$hospital_mobile1."','".$hospital_mobile2."','".$hospital_mobile3."','".$hospital_mobile4."','".$hospital_mobile5."','".$hospital_mobile6."','".$hospital_mobile7."','".$hospital_mobile8."','".$hospital_mobile9."','".$hospital_mobile10."','".$email_contact1."','".$email_contact2."','".$email_contact3."','".$email_contact4."','".$email_contact5."','".$email_contact6."','".$email_contact7."','".$email_contact8."','".$email_contact9."','".$email_contact10."','".$hospital_buiding."','".$hospital_class."' ,'".$hospital_ward."','".$product_onelist."','".$remark_pro1."','".$unit_product1."','".$price_product1."','".$product_outlistone1."','".$percent_code."','".$sum_price_product."','".$month_po."','".$percent_id."','".UnitNameMain($product_outlistone1)."','".$price_unit1."','".ModeProMain($product_outlistone1)."','".$type_cus."','".$pre_name."' ,'".$cus_free."','".$id_work."','".$_SESSION['em_id']."','".$_SESSION['name_show']."','".$hospital_name."','".$date_request."','".$id_customer."','".$date_update."','".$summary_order."','".$date_order."','".$plan_work."','".$plan_work_add."',$dateFollowInsertValueSql)";

        $sqlChkFollow = "SELECT * FROM tb_datefollow WHERE refid_work = '".$id_work."' ";
        $qsqlChkFollow = mysqli_query($conn,$sqlChkFollow);
        $nsqlChkFollow = mysqli_num_rows($qsqlChkFollow);

        if($nsqlChkFollow == 0){ // รายการแรกให้สร้างเพิ่มใหม่
            $follwStrSQL1 =  "INSERT INTO tb_datefollow (refid_work,$dateFollowInsertSql) values ('".$id_work."',$dateFollowInsertValueSql)";
            $follwObjQuery1 = mysqli_query($conn,$follwStrSQL1) or die(mysqli_error());
        } else { // ถ้าไม่ใช่รายการแรกให้ทำการอัพเดท
            $follwStrSQL2 =  "UPDATE tb_datefollow SET $dateFollowUpdateSql WHERE refid_work = '".$id_work."' ";
            $follwObjQuery2 = mysqli_query($conn,$follwStrSQL2) or die(mysqli_error());
        }

    } else {
        $sqlMainsave1 = "UPDATE tb_register_data SET date_plan = '".$date_plan."', description_focast = '".$description_focast."', description_focastnew = '".$description_focastnew."', product_present = '".$product_present."', hospital_contact = '".$hospital_contact."', hospital_contact1 = '".$hospital_contact1."', hospital_contact2 = '".$hospital_contact2."', hospital_contact3 = '".$hospital_contact3."', hospital_contact4 = '".$hospital_contact4."', hospital_contact5 = '".$hospital_contact5."', hospital_contact6 = '".$hospital_contact6."', hospital_contact7 = '".$hospital_contact7."', hospital_contact8 = '".$hospital_contact8."', hospital_contact9 = '".$hospital_contact9."' , hospital_mobile1 = '".$hospital_mobile1."', hospital_mobile2 = '".$hospital_mobile2."', hospital_mobile3 = '".$hospital_mobile3."', hospital_mobile4 = '".$hospital_mobile4."', hospital_mobile5 = '".$hospital_mobile5."', hospital_mobile6 = '".$hospital_mobile6."', hospital_mobile7 = '".$hospital_mobile7."', hospital_mobile8 = '".$hospital_mobile8."', hospital_mobile9 = '".$hospital_mobile9."', hospital_mobile10 = '".$hospital_mobile10."', email_contact1 = '".$email_contact1."', email_contact2 = '".$email_contact2."', email_contact3 = '".$email_contact3."', email_contact4 = '".$email_contact4."', email_contact5 = '".$email_contact5."', email_contact6 = '".$email_contact6."', email_contact7 = '".$email_contact7."', email_contact8 = '".$email_contact8."', email_contact9 = '".$email_contact9."', email_contact10 = '".$email_contact10."', hospital_buiding = '".$hospital_buiding."', hospital_class = '".$hospital_class."' , hospital_ward = '".$hospital_ward."', summary_product1 = '".$product_onelist."',remark_pro1 = '".$remark_pro1."', unit_product1 = '".$unit_product1."', price_product1 = '".$price_product1."', price_unit1 = '".$price_unit1."', product_id1 = '".$product_outlistone1."', percent_name = '".$percent_code."', percent_id = '".$percent_id."', sum_price_product = '".$sum_price_product."', month_po = '".$month_po."', unit_name1 = '".UnitNameMain($product_outlistone1)."', mode_pro1 = '".ModeProMain($product_outlistone1)."', type_cus = '".$type_cus."' ,pre_name = '".$pre_name."', cus_free = '".$cus_free."', date_request = '".$date_request."', head_area = '".$_SESSION['head_area']."', date_update = '".$date_update."', summary_order = '".$summary_order."', date_order = '".$date_order."' ,plan_work = '".$plan_work."',plan_work_add = '".$plan_work_add."'   WHERE id_work = '".$id_work."' ";
        $sqlMainsave2 = "INSERT INTO tb_regist_realtime (date_plan,description_focast,description_focastnew,product_present,hospital_contact,hospital_contact1,hospital_contact2,hospital_contact3,hospital_contact4,hospital_contact5,hospital_contact6,hospital_contact7,hospital_contact8,hospital_contact9,hospital_mobile1,hospital_mobile2,hospital_mobile3,hospital_mobile4,hospital_mobile5,hospital_mobile6,hospital_mobile7,hospital_mobile8,hospital_mobile9,hospital_mobile10,email_contact1,email_contact2,email_contact3,email_contact4,email_contact5,email_contact6,email_contact7,email_contact8,email_contact9,email_contact10,hospital_buiding,hospital_class,hospital_ward,summary_product1,remark_pro1,unit_product1,price_product1,product_id1,percent_name,sum_price_product,month_po,percent_id,unit_name1,price_unit1,mode_pro1,type_cus,pre_name,cus_free,id_work,sale_area,sale_name,hospital_name,date_request,id_customer,date_update,summary_order,date_order,plan_work,plan_work_add) VALUES ('".$date_plan."','".$description_focast."','".$description_focastnew."','".$product_present."','".$hospital_contact."','".$hospital_contact1."','".$hospital_contact2."','".$hospital_contact3."','".$hospital_contact4."','".$hospital_contact5."','".$hospital_contact6."','".$hospital_contact7."','".$hospital_contact8."','".$hospital_contact9."','".$hospital_mobile1."','".$hospital_mobile2."','".$hospital_mobile3."','".$hospital_mobile4."','".$hospital_mobile5."','".$hospital_mobile6."','".$hospital_mobile7."','".$hospital_mobile8."','".$hospital_mobile9."','".$hospital_mobile10."','".$email_contact1."','".$email_contact2."','".$email_contact3."','".$email_contact4."','".$email_contact5."','".$email_contact6."','".$email_contact7."','".$email_contact8."','".$email_contact9."','".$email_contact10."','".$hospital_buiding."','".$hospital_class."' ,'".$hospital_ward."','".$product_onelist."','".$remark_pro1."','".$unit_product1."','".$price_product1."','".$product_outlistone1."','".$percent_code."','".$sum_price_product."','".$month_po."','".$percent_id."','".UnitNameMain($product_outlistone1)."','".$price_unit1."','".ModeProMain($product_outlistone1)."','".$type_cus."', '".$pre_name."' ,'".$cus_free."','".$id_work."','".$_SESSION['em_id']."','".$_SESSION['name_show']."','".$hospital_name."','".$date_request."','".$id_customer."','".$date_update."','".$summary_order."','".$date_order."','".$plan_work."','".$plan_work_add."')";
    }
    // ส่วนของ  Demo ทดลองสินค้า
    // ให้ Loop ตามการเพิ่ม รุ่นสินค้า
    if($id_pro != ''){
        $sqlList2_1 =  "UPDATE tb_product_delivery SET id_customer = '".$id_customer."',
        ref_idwork = '".$id_work."', hospital_name = '".$hospital_name."', create_date = '".$addDate."', sale_area = '".$_SESSION['em_id']."', add_date = '".$addDate."', add_by = '".$_SESSION['username']."', product_1 = '".$MyProdoctDemoValue."', product_pre = '".$product_present."', cuspre_descript='".$cuspre_descript."'  WHERE id_pro = '".$id_pro."' ";
        $qsqlList2_1 = mysqli_query($conn,$sqlList2_1);
    } else if($id_pro == '' and $MyProdoctDemoValue != ''){
        $sqlList2_2 =  "INSERT INTO tb_product_delivery(id_customer,ref_idwork,hospital_name,create_date,sale_area,add_date,add_by,product_1,product_pre,cuspre_descript) VALUES ('".$id_customer."','".$id_work."','".$hospital_name."','".$addDate."','".$_SESSION['em_id']."','".$addDate."','".$_SESSION['username']."','".$MyProdoctDemoValue."','".$product_present."','".$cuspre_descript."')";
        $qsqlList2_1 = mysqli_query($conn,$sqlList2_2);
    }

    // ออกบูธ (Group Presentation)
    if($present_id !='') {
    $sqlList3 =  "UPDATE tb_present_booth  SET work_name='".$work_name."',work_date='".$work_date."',count_work='".$count_work."',price_work='".$price_work."',typ_work1='".$typ_work1."',typ_work2='".$typ_work2."',sum_wordpre='".$sum_wordpre."',end_date='".$end_date."',des_cus1='".$des_cus1."' WHERE present_id = '".$present_id."' ";
    $qsqlList3 = mysqli_query($conn,$sqlList3);
    } else if($present_id =='') {
    $sqlList3 = "INSERT INTO  tb_present_booth (ref_idwork,id_customer,hospital_name,create_date,sale_area,add_date,add_by,work_name,work_date,count_work,price_work,typ_work1,typ_work2,sum_wordpre,end_date,des_cus1) VALUES ('".$id_work."','".$id_customer."','".$hospital_name."','".$create_date."','".$_SESSION['em_id']."','".$add_date."','".$add_by."','".$work_name."','".$work_date."','".$count_work."','".$price_work."','".$typ_work1."','".$typ_work2."','".$sum_wordpre."','".$end_date."','".$des_cus1."')";
    $qsqlList3 = mysqli_query($conn,$sqlList3);
    }
    // echo $sqlList3;
    
// echo $sqlMainsave1; // แก้ไขข้อมูลรายละเอียดที่ Plan ไว้
$sqlMainsave_1 = mysqli_query($conn,$sqlMainsave1) or die(mysqli_error($conn));
// echo $sqlMainsave2; // เก็บเพิ่มไปเรื่อยๆตามการแก้ไขข้อมูล
$sqlMainsave_2 = mysqli_query($conn,$sqlMainsave2) or die(mysqli_error($conn));
// echo $sqlMainsave3; // แก้ไขข้อมูลลูกค้า
$sqlMainsave_3 = mysqli_query($conn,$sqlMainsave3) or die(mysqli_error($conn));
// exit; 

$text = 'กำลังดำเนินการกรุณารอสักครู่...';
require_once __DIR__ . '/../views/Loading_page.php';
echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."daily_report_edit?id_work=".$id_work.">"; 
mysqli_close($conn);
exit; 
?>
