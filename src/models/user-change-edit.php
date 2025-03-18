<?php

// error_reporting(0); 
$passOld = isset($_POST['passOld']) ? $_POST['passOld'] : '';
$passNew = isset($_POST['passNew']) ? $_POST['passNew'] : '';
$passNewChk = isset($_POST['passNewChk']) ? $_POST['passNewChk'] : '';

$user_tb = "SELECT * FROM tb_user WHERE em_id = '".$_SESSION['em_id']."' AND pass = '".$passOld."' ";
$quety_user = mysqli_query($conn,$user_tb) or die ('Error in query');
$num_user = mysqli_num_rows($quety_user);
$view_user = mysqli_fetch_array($quety_user);

if($num_user == 0){

    $text = 'รหัสเดิมไม่ถูกต้อง';
    require_once __DIR__ . '/../views/Loading_page.php';
    print "<meta http-equiv=refresh content=3;URL='../../user-change'>"; 
    mysqli_close($conn);
    exit;
    
}

if($passOld != '' && $passNew != '' && $passNewChk != ''){

    if($passNew == $passNewChk){

        $user_tbup = "UPDATE tb_user SET pass = '".$passNew."' WHERE em_id = '".$_SESSION['em_id']."' AND pass = '".$passOld."' ";
        $quety_userup = mysqli_query($conn,$user_tbup) or die ('Error in query');

        $text = '';
        require_once __DIR__ . '/../views/Loading_page.php';
        print "<meta http-equiv=refresh content=3;URL='../../user-change'>"; 
        mysqli_close($conn);
        exit; 

    } else {

        $text = 'รหัสใหม่ / ยืนยันรหัสใหม่ ไม่ตรงกัน กรุณาดำเนินการใหม่อีกครั้ง !!';
        require_once __DIR__ . '/../views/Loading_page.php';
        print "<meta http-equiv=refresh content=3;URL='../../user-change'>"; 
        mysqli_close($conn);
        exit; 

    }

} else {

    $text = 'กรุณาตรวจสอบข้อมูลของท่าน';
    require_once __DIR__ . '/../views/Loading_page.php';
    print "<meta http-equiv=refresh content=3;URL='../../user-change'>"; 
    mysqli_close($conn);
    exit; 

}
?>