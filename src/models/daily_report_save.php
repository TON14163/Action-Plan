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
if (isset($_POST['listmain1'])){
    $product_onelist = FigString2('product_onelist');                                                   // รายการสินค้า Name
    $product_outlistone1 = FigString2('product_outlistone1');                                           // รายการสินค้า ID
    $unit_product1 = FigString2('unit_product1');                                                       // จำนวน
    $price_unit1 = FigString2('price_unit1');                                                           // ราคา / หน่วย
    $price_product1 = FigString2('price_product1');                                                     // มูลค่า
    $percent_full = explode("|",FigString2('percent_code'));                                            // เปอร์เซ็นต์
    $percent_code = $percent_full[0];                                                                   // เปอร์เซ็นต์
    $percent_id = $percent_full[1];                                                                     // เปอร์เซ็นต์
    $month_po = FigString2('month_po');                                                                 // วันที่จะได้รับ P/O
    $sum_price_product = FigString2('sum_price_product');                                               // มูลค่าทั้งหมด
    $date_request = FigString2('date_request');                                                         // วันที่ต้องการสินค้า
    $type_cus = FigString2('type_cus');                                                                 // ประเภท
    $cus_free = FigString2('cus_free');                                                                 // ประเภทลูกค้า
    $description_focastnew = FigString2('description_focastnew');                                       // รายละเอียด
}

// Demo ทดลองสินค้า
if (isset($_POST['listmain2'])){
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
            $product_outlistNew = $product_outlist[$key];
            $cusrequest_likeNew = $cusrequest_like[$key];
            $cusrequest_dislikeNew = $cusrequest_dislike[$key];

            if($product_outlistNew != ''){
                $memoryfile[] = $myIdNum;
                $MyProdoctDemoValue[] = [
                    'id' => $myIdNum,
                    'productid' => $product_outlistNew,
                    'productname' => $show->showProduct($product_outlistNew,'sol_name'),
                    'inlike' => $cusrequest_likeNew,
                    'dislike' => $cusrequest_dislikeNew,
                    'memoryfile' => ([$list2file[$myIdNum]] != [null]) ? [$list2file[$myIdNum]] : $list2_old_file[$myIdNum],
                ];
                $myIdNum++;
            }
        }
        $MyProdoctDemoValue = json_encode($MyProdoctDemoValue, JSON_UNESCAPED_UNICODE);
        $cuspre_descript = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['cuspre_descript']),ENT_COMPAT); // รายละเอียดเพิ่มเติม
echo $MyProdoctDemoValue;
header('Content-type: application/json');
exit;
}

// ออกบูธ (Group Presentation)
if (isset($_POST['listmain3'])){
    $present_id = FigString2('present_id');       // PK tb_present_booth
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

if($product_present == '[]'){ $product_present = ''; }

$sqlMainsave1 = "UPDATE tb_register_data SET date_plan = '".$date_plan."', description_focastnew = '".$description_focastnew."', product_present = '".$product_present."', hospital_contact = '".$hospital_contact."', hospital_contact1 = '".$hospital_contact1."', hospital_contact2 = '".$hospital_contact2."', hospital_contact3 = '".$hospital_contact3."', hospital_contact4 = '".$hospital_contact4."', hospital_contact5 = '".$hospital_contact5."', hospital_contact6 = '".$hospital_contact6."', hospital_contact7 = '".$hospital_contact7."', hospital_contact8 = '".$hospital_contact8."', hospital_contact9 = '".$hospital_contact9."' , hospital_mobile1 = '".$hospital_mobile1."', hospital_mobile2 = '".$hospital_mobile2."', hospital_mobile3 = '".$hospital_mobile3."', hospital_mobile4 = '".$hospital_mobile4."', hospital_mobile5 = '".$hospital_mobile5."', hospital_mobile6 = '".$hospital_mobile6."', hospital_mobile7 = '".$hospital_mobile7."', hospital_mobile8 = '".$hospital_mobile8."', hospital_mobile9 = '".$hospital_mobile9."', hospital_mobile10 = '".$hospital_mobile10."', email_contact1 = '".$email_contact1."', email_contact2 = '".$email_contact2."', email_contact3 = '".$email_contact3."', email_contact4 = '".$email_contact4."', email_contact5 = '".$email_contact5."', email_contact6 = '".$email_contact6."', email_contact7 = '".$email_contact7."', email_contact8 = '".$email_contact8."', email_contact9 = '".$email_contact9."', email_contact10 = '".$email_contact10."', hospital_buiding = '".$hospital_buiding."', hospital_class = '".$hospital_class."' , hospital_ward = '".$hospital_ward."', summary_product1 = '".$product_onelist."', unit_product1 = '".$unit_product1."', price_product1 = '".$price_product1."', price_unit1 = '".$price_unit1."', product_id1 = '".$product_outlistone1."', percent_name = '".$percent_code."', percent_id = '".$percent_id."', sum_price_product = '".$sum_price_product."', month_po = '".$month_po."', unit_name1 = '".UnitNameMain($product_outlistone1)."', mode_pro1 = '".ModeProMain($product_outlistone1)."', type_cus = '".$type_cus."', cus_free = '".$cus_free."', date_request = '".$date_request."', head_area = '".$_SESSION['head_area']."' WHERE id_work = '".$id_work."' ";
$sqlMainsave2 = "INSERT INTO tb_regist_realtime (date_plan,description_focastnew,product_present,hospital_contact,hospital_contact1,hospital_contact2,hospital_contact3,hospital_contact4,hospital_contact5,hospital_contact6,hospital_contact7,hospital_contact8,hospital_contact9,hospital_mobile1,hospital_mobile2,hospital_mobile3,hospital_mobile4,hospital_mobile5,hospital_mobile6,hospital_mobile7,hospital_mobile8,hospital_mobile9,hospital_mobile10,email_contact1,email_contact2,email_contact3,email_contact4,email_contact5,email_contact6,email_contact7,email_contact8,email_contact9,email_contact10,hospital_buiding,hospital_class,hospital_ward,summary_product1,unit_product1,price_product1,product_id1,percent_name,sum_price_product,month_po,percent_id,unit_name1,price_unit1,mode_pro1,type_cus,cus_free,id_work,sale_area,sale_name,hospital_name,date_request,id_customer) VALUES ('".$date_plan."','".$description_focastnew."','".$product_present."','".$hospital_contact."','".$hospital_contact1."','".$hospital_contact2."','".$hospital_contact3."','".$hospital_contact4."','".$hospital_contact5."','".$hospital_contact6."','".$hospital_contact7."','".$hospital_contact8."','".$hospital_contact9."','".$hospital_mobile1."','".$hospital_mobile2."','".$hospital_mobile3."','".$hospital_mobile4."','".$hospital_mobile5."','".$hospital_mobile6."','".$hospital_mobile7."','".$hospital_mobile8."','".$hospital_mobile9."','".$hospital_mobile10."','".$email_contact1."','".$email_contact2."','".$email_contact3."','".$email_contact4."','".$email_contact5."','".$email_contact6."','".$email_contact7."','".$email_contact8."','".$email_contact9."','".$email_contact10."','".$hospital_buiding."','".$hospital_class."' ,'".$hospital_ward."','".$product_onelist."','".$unit_product1."','".$price_product1."','".$product_outlistone1."','".$percent_code."','".$sum_price_product."','".$month_po."','".$percent_id."','".UnitNameMain($product_outlistone1)."','".$price_unit1."','".ModeProMain($product_outlistone1)."','".$type_cus."','".$cus_free."','".$id_work."','".$_SESSION['em_id']."','".$_SESSION['name_show']."','".$hospital_name."','".$date_request."','".$id_customer."')";
$sqlMainsave3 = "UPDATE tb_customer_contact SET hospital_contact1 = '".$hospital_contact."',hospital_contact2 = '".$hospital_contact1."',hospital_contact3 = '".$hospital_contact2."',hospital_contact4 = '".$hospital_contact3."',hospital_contact5 = '".$hospital_contact4."',hospital_contact6 = '".$hospital_contact5."',hospital_contact7 = '".$hospital_contact6."',hospital_contact8 = '".$hospital_contact7."',hospital_contact9 = '".$hospital_contact8."',hospital_contact10 = '".$hospital_contact9."',hospital_mobile1 = '".$hospital_mobile1."',hospital_mobile2 = '".$hospital_mobile2."',hospital_mobile3 = '".$hospital_mobile3."',hospital_mobile4 = '".$hospital_mobile4."',hospital_mobile5 = '".$hospital_mobile5."',hospital_mobile6 = '".$hospital_mobile6."',hospital_mobile7 = '".$hospital_mobile7."',hospital_mobile8 = '".$hospital_mobile8."',hospital_mobile9 = '".$hospital_mobile9."',hospital_mobile10 = '".$hospital_mobile10."',email_contact1 = '".$email_contact1."',email_contact2 = '".$email_contact2."',email_contact3 = '".$email_contact3."',email_contact4 = '".$email_contact4."',email_contact5 = '".$email_contact5."',email_contact6 = '".$email_contact6."',email_contact7 = '".$email_contact7."',email_contact8 = '".$email_contact8."',email_contact9 = '".$email_contact9."',email_contact10 = '".$email_contact10."',hospital_buiding = '".$hospital_buiding."',hospital_class = '".$hospital_class."',hospital_ward = '".$hospital_ward."' WHERE id_customer = '".$id_customer."' ";


// แก้ไขข้อมูลผู้แข่ง ส่วนนี้ยังไม่ทำค่อยไปทำในส่วน edit
// if ($id_story != '' ){

// 	$strSQLrival =  "UPDATE   tb_storyrival  SET company_rival ='".$company_rival."',rival_brand='".$rival_brand."',product_rival='".$product_rival."',rival_model='".$rival_model."',rival_country='".$rival_country."',price_to_unit='".$price_to_unit."',unit='".$unit."',waranty='".$waranty."',promotion='".$promotion."',service='".$service."',cus_like='".$cus_like."',cus_dislike='".$cus_dislike."',description='".$description."',file_nap5='".$file_nap5."',file_nap4='".$file_nap4."',file_nap3='".$file_nap3."',file_nap2='".$file_nap2."',file_nap1='".$file_nap1."',file_nap6='".$file_nap6."',file_nap7='".$file_nap7."',file_nap8='".$file_nap8."',file_nap9='".$file_nap9."',file_nap10='".$file_nap10."',product_pre='".$product_present1."',h_product_rival='".$h_product_rival."',product_des='".$product_des."',open_ckk='".$open_ckk."',date_open='".$date_open."'  where id_story='".$id_story."' ";
// 	$objQueryrival = mysqli_query($conn,$strSQLrival) or die(mysqli_error());

// } else if ($id_story == '' and $product_rival != ''){

// 	$strSQLrival =  "INSERT INTO  tb_storyrival  (no_auto,refid_work,id_customer,customer_name,create_date,product_rival,company_rival,rival_brand,rival_model,price_to_unit,unit,waranty,promotion,service,cus_like,cus_dislike,description,file_nap1,file_nap2,file_nap3,file_nap4,file_nap5,sale_area,add_date,add_by,product_pre,h_product_rival,product_des,rival_country,open_ckk,date_open,file_nap6,file_nap7,file_nap8,file_nap9,file_nap10) VALUES ('".$no_auto."','".$id_work."','".$id_customer."','".$hospital_name."','".$create_date."','".$product_rival."','".$company_rival."','".$rival_brand."','".$rival_model."','".$price_to_unit."','".$unit."','".$waranty."','".$promotion."','".$service."','".$cus_like."','".$cus_dislike."','".$description."','".$file_nap1."','".$file_nap2."','".$file_nap3."','".$file_nap4."','".$file_nap5."','".$sale_area."','".$add_date."','".$add_by."','".$product_present1."','".$h_product_rival."','".$product_des."','".$rival_country."','".$open_ckk."','".$date_open."','".$file_nap6."','".$file_nap7."','".$file_nap8."','".$file_nap9."','".$file_nap10."')   ";
// 	$objQueryrival = mysqli_query($conn,$strSQLrival) or die(mysqli_error());

// }



    // ส่วนของ  Demo ทดลองสินค้า
    // ให้ Loop ตามการเพิ่ม รุ่นสินค้า
    if($id_pro != ''){
        $sqlList2_1 =  "UPDATE tb_product_delivery SET id_customer = '".$id_customer."', ref_idwork = '".$id_work."', hospital_name = '".$hospital_name."', create_date = '".$addDate."', sale_area = '".$_SESSION['em_id']."', add_date = '".$addDate."', add_by = '".$_SESSION['username']."', product_1 = '".$MyProdoctDemoValue."', product_pre = '".$product_present."', cuspre_descript='".$cuspre_descript."'  WHERE id_pro = '".$id_pro."' ";
        $qsqlList2_1 = mysqli_query($conn,$sqlList2_1);
        echo $sqlList2_1;
    } else if($id_pro == '' and $MyProdoctDemoValue != ''){
        $sqlList2_2 =  "INSERT INTO tb_product_delivery(id_customer,ref_idwork,hospital_name,create_date,sale_area,add_date,add_by,product_1,product_pre,cuspre_descript) VALUES ('".$id_customer."','".$id_work."','".$hospital_name."','".$addDate."','".$_SESSION['em_id']."','".$addDate."','".$_SESSION['username']."','".$MyProdoctDemoValue."','".$product_present."','".$cuspre_descript."')";
        $qsqlList2_1 = mysqli_query($conn,$sqlList2_2);
        echo $sqlList2_2;
    }

    // ออกบูธ (Group Presentation)
    if($present_id !='') {
    $sqlList3 =  "UPDATE tb_present_booth  SET work_name='".$work_name."',work_date='".$work_date."',count_work='".$count_work."',price_work='".$price_work."',typ_work1='".$typ_work1."',typ_work2='".$typ_work2."',sum_wordpre='".$sum_wordpre."',end_date='".$end_date."',des_cus1='".$des_cus1."' WHERE present_id = '".$present_id."' ";
    $qsqlList3 = mysqli_query($conn,$sqlList3);
    } else if($present_id =='') {
    $sqlList3 = "INSERT INTO  tb_present_booth (ref_idwork,id_customer,hospital_name,create_date,sale_area,add_date,add_by,work_name,work_date,count_work,price_work,typ_work1,typ_work2,sum_wordpre,end_date,des_cus1) VALUES ('".$id_work."','".$id_customer."','".$hospital_name."','".$create_date."','".$_SESSION['em_id']."','".$add_date."','".$add_by."','".$work_name."','".$work_date."','".$count_work."','".$price_work."','".$typ_work1."','".$typ_work2."','".$sum_wordpre."','".$end_date."','".$des_cus1."')";
    $qsqlList3 = mysqli_query($conn,$sqlList3);
    }
    echo $sqlList3;



echo $sqlMainsave1; // แก้ไขข้อมูลรายละเอียดที่ Plan ไว้
$sqlMainsave_1 = mysqli_query($conn,$sqlMainsave1) or die(mysqli_error($conn));
echo $sqlMainsave2; // เก็บเพิ่มไปเรื่อยๆตามการแก้ไขข้อมูล
$sqlMainsave_2 = mysqli_query($conn,$sqlMainsave2) or die(mysqli_error($conn));
echo $sqlMainsave3; // แก้ไขข้อมูลลูกค้า
$sqlMainsave_3 = mysqli_query($conn,$sqlMainsave3) or die(mysqli_error($conn));
?>