<?php 
// error_reporting(0);

// dallyreport_register_details1
$hospital_buiding = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_buiding']),ENT_COMPAT);
$hospital_class = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_class']),ENT_COMPAT);
$hospital_ward = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_ward']),ENT_COMPAT);

$hospital_contact = ''; if (isset($_POST['hospital_contact']) && trim($_POST['hospital_contact']) !== '') { $hospital_contact = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_contact']),ENT_COMPAT); }
$hospital_contact1 = ''; if (isset($_POST['hospital_contact1']) && trim($_POST['hospital_contact1']) !== '') { $hospital_contact1 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_contact1']),ENT_COMPAT); }
$hospital_contact2 = ''; if (isset($_POST['hospital_contact2']) && trim($_POST['hospital_contact2']) !== '') { $hospital_contact2 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_contact2']),ENT_COMPAT); }
$hospital_contact3 = ''; if (isset($_POST['hospital_contact3']) && trim($_POST['hospital_contact3']) !== '') { $hospital_contact3 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_contact3']),ENT_COMPAT); }
$hospital_contact4 = ''; if (isset($_POST['hospital_contact4']) && trim($_POST['hospital_contact4']) !== '') { $hospital_contact4 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_contact4']),ENT_COMPAT); }
$hospital_contact5 = ''; if (isset($_POST['hospital_contact5']) && trim($_POST['hospital_contact5']) !== '') { $hospital_contact5 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_contact5']),ENT_COMPAT); }
$hospital_contact6 = ''; if (isset($_POST['hospital_contact6']) && trim($_POST['hospital_contact6']) !== '') { $hospital_contact6 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_contact6']),ENT_COMPAT); }
$hospital_contact7 = ''; if (isset($_POST['hospital_contact7']) && trim($_POST['hospital_contact7']) !== '') { $hospital_contact7 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_contact7']),ENT_COMPAT); }
$hospital_contact8 = ''; if (isset($_POST['hospital_contact8']) && trim($_POST['hospital_contact8']) !== '') { $hospital_contact8 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_contact8']),ENT_COMPAT); }
$hospital_contact9 = ''; if (isset($_POST['hospital_contact9']) && trim($_POST['hospital_contact9']) !== '') { $hospital_contact9 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_contact9']),ENT_COMPAT); } 

$hospital_mobile1 = '';  if (isset($_POST['hospital_mobile1']) && trim($_POST['hospital_mobile1']) !== '') { $hospital_mobile1 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_mobile1']),ENT_COMPAT); }
$hospital_mobile2 = '';  if (isset($_POST['hospital_mobile2']) && trim($_POST['hospital_mobile2']) !== '') { $hospital_mobile2 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_mobile2']),ENT_COMPAT); }
$hospital_mobile3 = '';  if (isset($_POST['hospital_mobile3']) && trim($_POST['hospital_mobile3']) !== '') { $hospital_mobile3 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_mobile3']),ENT_COMPAT); }
$hospital_mobile4 = '';  if (isset($_POST['hospital_mobile4']) && trim($_POST['hospital_mobile4']) !== '') { $hospital_mobile4 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_mobile4']),ENT_COMPAT); }
$hospital_mobile5 = '';  if (isset($_POST['hospital_mobile5']) && trim($_POST['hospital_mobile5']) !== '') { $hospital_mobile5 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_mobile5']),ENT_COMPAT); }
$hospital_mobile6 = '';  if (isset($_POST['hospital_mobile6']) && trim($_POST['hospital_mobile6']) !== '') { $hospital_mobile6 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_mobile6']),ENT_COMPAT); }
$hospital_mobile7 = '';  if (isset($_POST['hospital_mobile7']) && trim($_POST['hospital_mobile7']) !== '') { $hospital_mobile7 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_mobile7']),ENT_COMPAT); }
$hospital_mobile8 = '';  if (isset($_POST['hospital_mobile8']) && trim($_POST['hospital_mobile8']) !== '') { $hospital_mobile8 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_mobile8']),ENT_COMPAT); }
$hospital_mobile9 = '';  if (isset($_POST['hospital_mobile9']) && trim($_POST['hospital_mobile9']) !== '') { $hospital_mobile9 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_mobile9']),ENT_COMPAT); }
$hospital_mobile10 = ''; if (isset($_POST['hospital_mobile10']) && trim($_POST['hospital_mobile10']) !== '') { $hospital_mobile10 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['hospital_mobile10']),ENT_COMPAT); } 

$email_contact1 = '';  if (isset($_POST['email_contact1']) && trim($_POST['email_contact1']) !== '') { $email_contact1 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email_contact1']),ENT_COMPAT); }
$email_contact2 = '';  if (isset($_POST['email_contact2']) && trim($_POST['email_contact2']) !== '') { $email_contact2 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email_contact2']),ENT_COMPAT); }
$email_contact3 = '';  if (isset($_POST['email_contact3']) && trim($_POST['email_contact3']) !== '') { $email_contact3 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email_contact3']),ENT_COMPAT); }
$email_contact4 = '';  if (isset($_POST['email_contact4']) && trim($_POST['email_contact4']) !== '') { $email_contact4 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email_contact4']),ENT_COMPAT); }
$email_contact5 = '';  if (isset($_POST['email_contact5']) && trim($_POST['email_contact5']) !== '') { $email_contact5 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email_contact5']),ENT_COMPAT); }
$email_contact6 = '';  if (isset($_POST['email_contact6']) && trim($_POST['email_contact6']) !== '') { $email_contact6 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email_contact6']),ENT_COMPAT); }
$email_contact7 = '';  if (isset($_POST['email_contact7']) && trim($_POST['email_contact7']) !== '') { $email_contact7 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email_contact7']),ENT_COMPAT); }
$email_contact8 = '';  if (isset($_POST['email_contact8']) && trim($_POST['email_contact8']) !== '') { $email_contact8 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email_contact8']),ENT_COMPAT); }
$email_contact9 = '';  if (isset($_POST['email_contact9']) && trim($_POST['email_contact9']) !== '') { $email_contact9 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email_contact9']),ENT_COMPAT); }
$email_contact10 = ''; if (isset($_POST['email_contact10']) && trim($_POST['email_contact10']) !== '') { $email_contact10 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email_contact10']),ENT_COMPAT); } 

// dallyreport_register_details2  เลือกสินค้า
$planitemlist = isset($_POST['planitemlist']); // check if planitemlist is an array
if($planitemlist == true ){
    $planitemlist = $_POST['planitemlist'];
    foreach($planitemlist as $key => $value) {
        $planitemlist[$key] = htmlspecialchars(mysqli_real_escape_string($conn,$value),ENT_COMPAT);
        echo $planitemlist[$key].'<br>';
    }
}

// ประมาณการขาย
if (isset($_POST['listmain1'])){
    $product_outlistone1 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['product_outlistone1']),ENT_COMPAT);     // รายการสินค้า
    $unit_product1 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['unit_product1']),ENT_COMPAT);                 // จำนวน
    $price_unit1 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['price_unit1']),ENT_COMPAT);                     // ราคา / หน่วย
    $price_product1 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['price_product1']),ENT_COMPAT);               // มูลค่า
    $percent_code = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['percent_code']),ENT_COMPAT);                   // เปอร์เซ็นต์
    $month_po = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['month_po']),ENT_COMPAT);                           // วันที่จะได้รับ P/O
    $sum_price_product = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['sum_price_product']),ENT_COMPAT);         // มูลค่าทั้งหมด
    $date_request = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['date_request']),ENT_COMPAT);                   // วันที่ต้องการสินค้า
    $type_cus = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['type_cus']),ENT_COMPAT);                           // ประเภท
    $description_focastnew = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['description_focastnew']),ENT_COMPAT); // รายละเอียด
}
// Demo ทดลองสินค้า
if (isset($_POST['listmain2'])){
// pro_img1
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
    $work_name = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['work_name']),ENT_COMPAT);     // ชื่องาน
    $work_date = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['work_date']),ENT_COMPAT);     // วันที่จัดงาน 
    $end_date = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['end_date']),ENT_COMPAT);       // ถึง 
    $price_work = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['price_work']),ENT_COMPAT);   // งบค่าใช้จ่าย 
    $count_work = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['count_work']),ENT_COMPAT);   // จำนวนผู้เข้าร่วม 
    $des_cus1 = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['des_cus1']),ENT_COMPAT);       // ผู้เข้าร่วม
    if (isset($_POST['typ_work1'])){ $typ_work1 = $_POST['typ_work1']; } else { $typ_work1 = 0; }  // Powerpoint
    if (isset($_POST['typ_work2'])){ $typ_work2 = $_POST['typ_work2']; } else { $typ_work2 = 0; }  // นำสินค้าไปสาธิต
    $sum_wordpre = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['sum_wordpre']),ENT_COMPAT); // มุมมอง "ลูกค้า" ต่อ "สินค้า & การแนะนำ & การซื้อ"
}

// ข้อมูลคู่เเข่ง
if (isset($_POST['listmain4'])){

function escapeArray($keysNameinputs) {
    global $conn; // ใช้ตัวแปร $conn ที่ประกาศไว้ภายนอกฟังก์ชัน

    $keysNameinput = isset($_POST[$keysNameinputs]); // รายการสินค้า
    if($keysNameinput == true ){
        $keysNameinput = $_POST[$keysNameinputs];
        foreach($keysNameinput as $key => $value) {
            $keysNameinput[$key] = htmlspecialchars(mysqli_real_escape_string($conn,$value),ENT_COMPAT);
            return $keysNameinput[$key].'<br>';
        }
    }
}

echo escapeArray('h_product_rival');
echo escapeArray('product_rival');
echo escapeArray('company_rival');
echo escapeArray('rival_brand');
echo escapeArray('rival_model');
echo escapeArray('promotion');
echo escapeArray('unit');
echo escapeArray('date_open');
echo escapeArray('description');



}
?>