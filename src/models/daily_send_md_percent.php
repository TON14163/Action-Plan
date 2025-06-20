<?php 
$statuschk = $_GET['statuschk'];
$id_work = $_GET['id_work'];
$docOld = $_GET['docOld'];
$sale_name = "$_SESSION[name_show]";
$date_save = date('Y-m-d');
$add_date = date('Y-m-d H:i:s');
$sale_area = $_SESSION["em_id"];

if($statuschk == '1'){

    $percent = $_GET['percent'];
    $note = $_GET['note'];

    switch ($docOld) {
        case '1': $percent_newname = '100 %'; break;
        case '2': $percent_newname = '90-99 %'; break;
        case '3': $percent_newname = '80-89 %'; break;
        case '4': $percent_newname = '50-80 %'; break;
        case '5': $percent_newname = '0-50 %'; break;
        default: $percent_newname = '0'; break;
    }

    $strSQL = "INSERT INTO tb_apppercent (id_work,date_save,add_by,status_doc,description,percent_old,percent_oldname,percent_new,percent_newname,add_date,sale_code) 
    VALUES('".$id_work."','".$date_save."','".$sale_name."','Request','".$note."','".$docOld."','".$docOld."','".$docOld."','".$percent_newname."','".$add_date."','".$sale_area."')";
    $objQuery = mysqli_query($conn,$strSQL) or die(mysqli_error());
    // echo $strSQL.'<hr>';

} else if($statuschk == '2'){

    $note = $_GET['note'];
    $date = $_GET['date'];

    $strSQLDate = "INSERT INTO tb_appdatesend (id_work,date_save,add_by,status_doc,description,date_sendnew,date_sendold,add_date,sale_code) 
    VALUES('".$id_work."','".$date_save."','".$sale_name."','Request','".$note."','".$date."','".$docOld."','".$add_date."','".$sale_area."')";
    $qstrSQLDate = mysqli_query($conn,$strSQLDate) or die(mysqli_error());
    // echo $strSQLDate.'<hr>';
}

$text = 'กำลังดำเนินการกรุณารอสักครู่...';
require_once __DIR__ . '/../views/Loading_page.php';
echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."daily_report_edit?id_work=".$id_work.">"; 
mysqli_close($conn);
exit; 
?>