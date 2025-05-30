<?php
error_reporting(0);
@session_start();
if($_SESSION['em_id'] != ''){
    require_once __DIR__ . '/../../config/database.php';
    require_once __DIR__ . '/../controllers/MainControllersAll.php';
    
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: *"); // ถ้าต้องการอนุญาต CORS

    if($_SESSION['typelogin'] == 'Supervisor'){
        switch ($_SESSION["head_area"]) {
            case 'SM1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_sm1 "; break;
            case 'SS1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 "; break;
            case 'SS2': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss2 "; break;
            case 'SS3': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss3 "; break;
            default:
                $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 
                UNION SELECT sale_code,sale_name FROM tb_team_ss2
                UNION SELECT sale_code,sale_name FROM tb_team_ss3
                UNION SELECT sale_code,sale_name FROM tb_team_sm1 ";
            break;
        }
        $objQuery5 = mysqli_query($conn, $strSQL5);
        $allSale = array();
        while ($objResuut5 = mysqli_fetch_array($objQuery5)) {  
            $allSale[] = htmlspecialchars($objResuut5["sale_code"]);
        }
        $em_idFull = implode("','", $allSale);
        $cuss = "SELECT distinct customer_name FROM tb_customer_contact WHERE customer_name != '' AND sale_code IN ('".$em_idFull."') ORDER BY customer_name ASC ";
    } else {
        $em_idFull = $_SESSION['em_id'];
        $cuss = "SELECT distinct customer_name FROM tb_customer_contact WHERE customer_name != '' AND sale_code = '".$em_idFull."' ORDER BY customer_name ASC ";
    }
        // echo $cuss;
    $qcus = mysqli_query($conn, $cuss);
    $customers = mysqli_fetch_all($qcus, MYSQLI_ASSOC);
    echo json_encode($customers);
    // ปิดการเชื่อมต่อ
    mysqli_close($conn);
} else {
    print "<meta http-equiv=refresh content=0;URL='https://www.google.co.th/search?sca_esv=4ad496d1768baf99&sxsrf=AHTn8zpQPrNhKqCEpDxCUBsIcsB9LU5aiQ:1742783288650&q=%E0%B8%81%E0%B8%A3%E0%B8%87&udm=2&fbs=ABzOT_CvTum9bfMS_keiIOkwIHYPyLRk8LKB_RhroNc3NpN1yQTaG3g7af7Cm37b7h9B7YJ8N4Ny7BtT2f9IHmME4ftR32IDq0YA12-ZvbYhRvM6OH2xa_EuAmTTzpSY3H3gDXV65qQhn3tO4GwABxMWgM7XAXWRu1uVY34Uot_-7U-KhVEaN3l-TwtbbdS8wvMSbm2WVPa9lbZZjqYWekJahi5QT_9hKrvbuLGFAPrp6q0lkdGen3cGhPp2pH0bNlNbIJz7wohktr8ZEKHWOF32HNc0XBw8rD3t71p3HSpK396vhSNUw18&sa=X&ved=2ahUKEwiZu9zW1aGMAxUGRmwGHcblAtEQtKgLegQIGBAB&biw=1366&bih=617&dpr=1'>"; 
}
?>