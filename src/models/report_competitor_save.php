<?php

$file_all = isset($_POST['file_all']) ? json_decode($_POST['file_all'], true) : []; // ไฟล์เดิมที่มี
if (!empty($_FILES['attachments']['name'][0])) {
    foreach ($_FILES['attachments']['name'] as $key => $name) {
        $tmp_name = $_FILES['attachments']['tmp_name'][$key];
        $new_name = "uploads/" . iconv("UTF-8", "TIS-620", $name);
        if (move_uploaded_file($tmp_name, $new_name)) {
            $file_all[] = ["file" => $name];
        }
    }
}

$file_nap1 = json_encode($file_all); // Encode the array back to JSON for output

$id_story = $_POST['id_story'];
$open_ckk = $_POST['open_ckk'];
$date_open = $_POST['date_open'];
$product_rival = $_POST['product_rival'];
$rival_brand = $_POST['rival_brand'];
$rival_model = $_POST['rival_model'];
$price_to_unit = $_POST['price_to_unit'];
$unit = $_POST['unit'];
$waranty = $_POST['waranty'];
$company_rival = $_POST['company_rival'];
$rival_country = $_POST['rival_country'];
$product_des = $_POST['product_des'];
$promotion = $_POST['promotion'];
$service = $_POST['service'];
$cus_like = $_POST['cus_like'];
$cus_dislike = $_POST['cus_dislike'];
$description = $_POST['description'];

$upSql = "UPDATE tb_storyrival SET 
        product_rival = '".$product_rival."',
        rival_brand = '".$rival_brand."',
        rival_model = '".$rival_model."',
        price_to_unit = '".$price_to_unit."',
        unit = '".$unit."',
        waranty = '".$waranty."',
        company_rival = '".$company_rival."',
        rival_country = '".$rival_country."',
        product_des = '".$product_des."',
        promotion = '".$promotion."',
        service = '".$service."',
        cus_like = '".$cus_like."',
        cus_dislike = '".$cus_dislike."',
        description = '".$description."',
        file_nap1 = '".$file_nap1."',
        open_ckk = '".$open_ckk."',
        date_open = '".$date_open."'
        WHERE id_story = '".$id_story."' ";

$qupSql = mysqli_query($conn,$upSql);
// echo $upSql;
// exit;

$text = 'กำลังดำเนินการกรุณารอสักครู่...';
require_once __DIR__ . '/../views/Loading_page.php';
echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."report_competitor_edit?id_story=".$id_story.">"; 
mysqli_close($conn);
exit; 
?>