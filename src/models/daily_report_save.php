<?php 
// error_reporting(0);
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
    global $sol; // ใช้ตัวแปร $sol ที่ประกาศไว้ภายนอกฟังก์ชัน
    $result = $sol->query("SELECT product_ID, unit_name FROM tb_product WHERE product_ID = '" . mysqli_real_escape_string($sol, $keyID) . "'");
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
$id_work = $_POST['id_work'];
$date_plan = $_POST['date_plan'];
$hospital_buiding = FigString2('hospital_buiding');
$hospital_class = FigString2('hospital_class');
$hospital_ward = FigString2('hospital_ward');

$hospital_contact = FigString1('hospital_contact'); // ชื่อผู้ติดต่อ
$hospital_contact1 = FigString1('hospital_contact1'); // ชื่อผู้ติดต่อ
$hospital_contact2 = FigString1('hospital_contact2'); // ชื่อผู้ติดต่อ
$hospital_contact3 = FigString1('hospital_contact3'); // ชื่อผู้ติดต่อ
$hospital_contact4 = FigString1('hospital_contact4'); // ชื่อผู้ติดต่อ
$hospital_contact5 = FigString1('hospital_contact5'); // ชื่อผู้ติดต่อ
$hospital_contact6 = FigString1('hospital_contact6'); // ชื่อผู้ติดต่อ
$hospital_contact7 = FigString1('hospital_contact7'); // ชื่อผู้ติดต่อ
$hospital_contact8 = FigString1('hospital_contact8'); // ชื่อผู้ติดต่อ
$hospital_contact9 = FigString1('hospital_contact9'); // ชื่อผู้ติดต่อ

$hospital_mobile1 = FigString1('hospital_mobile1'); // หมายเลขโทรศัพท์
$hospital_mobile2 = FigString1('hospital_mobile2'); // หมายเลขโทรศัพท์
$hospital_mobile3 = FigString1('hospital_mobile3'); // หมายเลขโทรศัพท์
$hospital_mobile4 = FigString1('hospital_mobile4'); // หมายเลขโทรศัพท์
$hospital_mobile5 = FigString1('hospital_mobile5'); // หมายเลขโทรศัพท์
$hospital_mobile6 = FigString1('hospital_mobile6'); // หมายเลขโทรศัพท์
$hospital_mobile7 = FigString1('hospital_mobile7'); // หมายเลขโทรศัพท์
$hospital_mobile8 = FigString1('hospital_mobile8'); // หมายเลขโทรศัพท์
$hospital_mobile9 = FigString1('hospital_mobile9'); // หมายเลขโทรศัพท์
$hospital_mobile10 = FigString1('hospital_mobile10'); // หมายเลขโทรศัพท์

$email_contact1 = FigString1('email_contact1'); // อีเมลล์
$email_contact2 = FigString1('email_contact2'); // อีเมลล์
$email_contact3 = FigString1('email_contact3'); // อีเมลล์
$email_contact4 = FigString1('email_contact4'); // อีเมลล์
$email_contact5 = FigString1('email_contact5'); // อีเมลล์
$email_contact6 = FigString1('email_contact6'); // อีเมลล์
$email_contact7 = FigString1('email_contact7'); // อีเมลล์
$email_contact8 = FigString1('email_contact8'); // อีเมลล์
$email_contact9 = FigString1('email_contact9'); // อีเมลล์
$email_contact10 = FigString1('email_contact10'); // อีเมลล์

// dallyreport_register_details2  เลือกสินค้า
$planitemlist = isset($_POST['planitemlist']) ? $_POST['planitemlist'] : []; // check if planitemlist is an array
$product_present = []; // เอาไว้เก็บค่า JSON objects
if (!empty($planitemlist)) {
    foreach ($planitemlist as $key => $value) {
        $sanitizedValue = htmlspecialchars(mysqli_real_escape_string($conn, $value), ENT_COMPAT);
        $product_present[] = ['itemlist' => $sanitizedValue]; // เข้าค่าเข้าไปใน JSON object
        echo $sanitizedValue . ',';
    }
}
$product_present = json_encode($product_present, JSON_UNESCAPED_UNICODE); // แปลงเป็น JSON string

// ประมาณการขาย
if (isset($_POST['listmain1'])){
    $product_onelist = FigString2('product_onelist');                       // รายการสินค้า Name
    $product_outlistone1 = FigString2('product_outlistone1');               // รายการสินค้า ID
    $unit_product1 = FigString2('unit_product1');                           // จำนวน
    $price_unit1 = FigString2('price_unit1');                               // ราคา / หน่วย
    $price_product1 = FigString2('price_product1');                         // มูลค่า
    $percent_full = explode("|",FigString2('percent_code'));                // เปอร์เซ็นต์
    $percent_code = $percent_full[0];                                       // เปอร์เซ็นต์
    $percent_id = $percent_full[1];                                         // เปอร์เซ็นต์
    $month_po = FigString2('month_po');                                     // วันที่จะได้รับ P/O
    $sum_price_product = FigString2('sum_price_product');                   // มูลค่าทั้งหมด
    $date_request = FigString2('date_request');                             // วันที่ต้องการสินค้า
    $type_cus = FigString2('type_cus');                                     // ประเภท
    $description_focastnew = FigString2('description_focastnew');           // รายละเอียด
}
// Demo ทดลองสินค้า
if (isset($_POST['listmain2'])){
// pro_img1

// echo multiArray('product_outlist');
// echo multiArray('cusrequest_like');
// echo multiArray('cusrequest_dislike');

    $product_outlist = isset($_POST['product_outlist']); // รายการสินค้า
    if($product_outlist == true ){
        $product_outlist = $_POST['product_outlist'];
        foreach($product_outlist as $key => $value) {
            $product_outlist[$key] = htmlspecialchars(mysqli_real_escape_string($conn,$value),ENT_COMPAT);
            echo $product_outlist[$key].'<br>';
        }
    }
    $cusrequest_like = isset($_POST['cusrequest_like']); // ต้องการ / ชอบ
    if($cusrequest_like == true ){
        $cusrequest_like = $_POST['cusrequest_like'];
        foreach($cusrequest_like as $key => $value) {
            $cusrequest_like[$key] = htmlspecialchars(mysqli_real_escape_string($conn,$value),ENT_COMPAT);
            echo $cusrequest_like[$key].'<br>';
        }
    }
    $cusrequest_dislike = isset($_POST['cusrequest_dislike']); // ไม่ต้องการ / ไม่ชอบ
    if($cusrequest_dislike == true ){
        $cusrequest_dislike = $_POST['cusrequest_dislike'];
        foreach($cusrequest_dislike as $key => $value) {
            $cusrequest_dislike[$key] = htmlspecialchars(mysqli_real_escape_string($conn,$value),ENT_COMPAT);
            echo $cusrequest_dislike[$key].'<br>';
        }
    }

    $cuspre_descript = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['cuspre_descript']),ENT_COMPAT); // รายละเอียดเพิ่มเติม

    // แนบไฟล์ (รองรับ multiple files)
    if (isset($_FILES['list2file']) && !empty($_FILES['list2file']['name'][0])) {
        $uploadDir = "uploads/";
        $uploadedFiles = [];
        
        // ตรวจสอบว่า folder uploads มีอยู่หรือไม่ ถ้าไม่มีให้สร้าง
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // วนลูปจัดการแต่ละไฟล์
        for ($i = 0; $i < count($_FILES['list2file']['name']); $i++) {
            if ($_FILES['list2file']['error'][$i] === UPLOAD_ERR_OK) {
                // แปลงชื่อไฟล์จาก UTF-8 เป็น TIS-620
                $fileName = iconv("UTF-8", "TIS-620", $_FILES['list2file']['name'][$i]);
                // เพิ่ม timestamp เพื่อป้องกันชื่อไฟล์ซ้ำ
                $fileName = time() . '_' . $fileName;
                $filePath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['list2file']['tmp_name'][$i], $filePath)) {
                    $safeFileName = htmlspecialchars(mysqli_real_escape_string($conn, $fileName), ENT_COMPAT);
                    $uploadedFiles[] = $safeFileName;
                    echo "File uploaded successfully: " . $safeFileName . '<br>';
                } else {
                    echo "Failed to upload file: " . $fileName . '<br>';
                }
            } else {
                echo "Error uploading file " . $_FILES['list2file']['name'][$i] . ': ' . $_FILES['list2file']['error'][$i] . '<br>';
            }
        }
        
        // หากต้องการเก็บชื่อไฟล์ทั้งหมดในตัวแปรเดียว
        if (!empty($uploadedFiles)) {
            $list2file = implode(',', $uploadedFiles); // รวมชื่อไฟล์ด้วย comma
        }
    } else {
        echo "No files uploaded or an error occurred.<br>";
    }
}

// ออกบูธ (Group Presentation)
if (isset($_POST['listmain3'])){
    $work_name = FigString2('work_name');         // ชื่องาน
    $work_date = FigString2('work_date');         // วันที่จัดงาน
    $end_date = FigString2('end_date');           // ถึง
    $price_work = FigString2('price_work');       // งบค่าใช้จ่าย
    $count_work = FigString2('count_work');       // จำนวนผู้เข้าร่วม
    $des_cus1 = FigString2('des_cus1');           // ผู้เข้าร่วม
    $sum_wordpre = FigString2('sum_wordpre');     // มุมมอง "ลูกค้า" ต่อ "สินค้า & การแนะนำ & การซื้อ"
    if (isset($_POST['typ_work1'])){ $typ_work1 = $_POST['typ_work1']; } else { $typ_work1 = 0; }  // Powerpoint
    if (isset($_POST['typ_work2'])){ $typ_work2 = $_POST['typ_work2']; } else { $typ_work2 = 0; }  // นำสินค้าไปสาธิต
}

// ข้อมูลคู่เเข่ง
if (isset($_POST['listmain4'])){

    function multiArray($keysNameinputs) {
        global $conn; // ใช้ตัวแปร $conn ที่ประกาศไว้ภายนอกฟังก์ชัน
    
        $keysNameinput = isset($_POST[$keysNameinputs]);
        if($keysNameinput == true ){
            $keysNameinput = $_POST[$keysNameinputs];
            foreach($keysNameinput as $key => $value) {
                $keysNameinput[$key] = htmlspecialchars(mysqli_real_escape_string($conn,$value),ENT_COMPAT);
                return $keysNameinput[$key].'<br>';
            }
        }
    }
    
echo multiArray('h_product_rival');
echo multiArray('product_rival');
echo multiArray('company_rival');
echo multiArray('rival_brand');
echo multiArray('rival_model');
echo multiArray('promotion');
echo multiArray('unit');
echo multiArray('date_open');
echo multiArray('description');
}


// --------------------------------------------------------------------- เก็บข้อมูลลงฐานข้อมูล



$strSQL = "UPDATE tb_register_data SET 
date_plan='".$date_plan."',
description_focastnew = '".$description_focastnew."',
product_present = '".$product_present."',
hospital_contact = '".$hospital_contact."',
hospital_contact1 = '".$hospital_contact1."',
hospital_contact2 = '".$hospital_contact2."',
hospital_contact3 = '".$hospital_contact3."',
hospital_contact4 = '".$hospital_contact4."',
hospital_contact5 = '".$hospital_contact5."',
hospital_contact6 = '".$hospital_contact6."',
hospital_contact7 = '".$hospital_contact7."',
hospital_contact8 = '".$hospital_contact8."',
hospital_contact9 = '".$hospital_contact9."' ,
hospital_mobile1 = '".$hospital_mobile1."',
hospital_mobile2 = '".$hospital_mobile2."',
hospital_mobile3 = '".$hospital_mobile3."',
hospital_mobile4 = '".$hospital_mobile4."',
hospital_mobile5 = '".$hospital_mobile5."',
hospital_mobile6 = '".$hospital_mobile6."',
hospital_mobile7 = '".$hospital_mobile7."',
hospital_mobile8 = '".$hospital_mobile8."',
hospital_mobile9 = '".$hospital_mobile9."',
hospital_mobile10 = '".$hospital_mobile10."',
email_contact1 = '".$email_contact1."',
email_contact2 = '".$email_contact2."',
email_contact3 = '".$email_contact3."',
email_contact4 = '".$email_contact4."',
email_contact5 = '".$email_contact5."',
email_contact6 = '".$email_contact6."',
email_contact7 = '".$email_contact7."',
email_contact8 = '".$email_contact8."',
email_contact9 = '".$email_contact9."',
email_contact10 = '".$email_contact10."',
hospital_buiding = '".$hospital_buiding."',
hospital_class = '".$hospital_class."' ,
hospital_ward = '".$hospital_ward."',
summary_product1 = '".$product_onelist."',
unit_product1 = '".$unit_product1."',
price_product1 = '".$price_product1."',
price_unit1 = '".$price_unit1."',
product_id1 = '".$product_outlistone1."',
percent_name = '".$percent_code."',
percent_id = '".$percent_id."',
sum_price_product = '".$sum_price_product."',
month_po = '".$month_po."',
unit_name1 = '".UnitNameMain($product_outlistone1)."',
mode_pro1 = '".ModeProMain($product_outlistone1)."',
remark_pro1 = '".$remark_pro1."',
contact_ckk = '".$contact_ckk."',
type_cus = '".$type_cus."',
pre_name = '".$pre_name."',
cus_free = '".$cus_free."',
date_update = '".$date_update."',
date_request = '".$date_request."',
head_area = '".$head_area."' 
WHERE id_work = '".$id_work."'
";
echo $strSQL;



?>