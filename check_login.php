<?php 
error_reporting(0);
require_once __DIR__ . '/config/database.php';
date_default_timezone_set("Asia/Bangkok"); 
$sql = "select * from tb_user where user_id='".$_POST["user_id_login"]."' and pass='".$_POST["pass_login"]."' "; 
$dbquery = mysqli_query($conn,$sql)or die(mysqli_error());
$data = mysqli_fetch_array($dbquery);
$rows = mysqli_num_rows($dbquery);

$browser="";       
function chkBrowser($nameBroser){ 
return preg_match("/".$nameBroser."/",$_SERVER['HTTP_USER_AGENT']); 
} 
if(chkBrowser("MSIE")==1){
    $browser="IE 9";
    if(chkBrowser("MSIE 8")==1){
        $browser="IE 8";
    } else if(chkBrowser("MSIE 7")==1){
        $browser="IE 7";
    } else if(chkBrowser("MSIE 10")==1){
        $browser="IE 10";
    } else if(chkBrowser("MSIE 6")==1){
        $browser="IE 6";
    } else {
        $browser="OTHER IE more than Version 9";
    }  

} else if(chkBrowser("Firefox")==1){
    $browser="Firefox";
} else if(chkBrowser("Chrome")==1){
    $browser="Chrome";
} else if(chkBrowser("Chrome")==0 && chkBrowser("Safari")==1){
    $browser="Safari";
} else if(chkBrowser("Opera")==1){
    $browser="Opera";
} else if(chkBrowser("Netscape")==1){
    $browser="Netscape";
} else {
    $browser="OTHER IE more than Version 9";
}
$Com_name=gethostbyaddr($_SERVER['REMOTE_ADDR']);
$ip=GetHostByName($_SERVER['REMOTE_ADDR']);

$date_today = date('Y-m-d H:i:s');
$date = date('Y-m-d H:i:s');
$timestamp = strtotime($date);
$timestamp1 = $timestamp*1000;

// เช็ค domain เพื่อใช้รัน ระบบในเครื่องหรือบน domain   Start
$domain = $_SERVER['HTTP_HOST'];
$domain_only = explode(':', $domain)[0]; // ตัดพอร์ตออก

if ($domain_only === '127.0.0.1' || $domain_only === $IP_NAME_DOMAIN) {
    $thisDomain = "/Action-Plan/";
} elseif ($domain_only === 'action-plans.allwellcenter.com') {
    $thisDomain =  "/";
} else {
    echo "ไม่รู้จักโดเมนนี้";
}
// เช็ค domain เพื่อใช้รัน ระบบในเครื่องหรือบน domain   END

    if($rows == 1){

        $selectedFullSupMain = array();
        $strSQLFull = "SELECT n_id,m_id FROM user_permissions WHERE n_id = '".$data['id']."' ORDER BY sort_user ASC ";
        $objQueryFull = mysqli_query($conn, $strSQLFull);
        while ($objResuutFull = mysqli_fetch_array($objQueryFull)) {  
            $strSQLFull1 = "SELECT em_id,name FROM tb_user WHERE id = '".$objResuutFull['m_id']."' ";
            $objQueryFull1 = mysqli_query($conn, $strSQLFull1);
            $objResuutFull1 = mysqli_fetch_array($objQueryFull1);
            if($objResuutFull1['name'] != ''){
                $selectedFullSupMain[] = $objResuutFull1["em_id"];
            }
        }
        $selectedFullSupMain_string = "IN ('".implode("','",$selectedFullSupMain)."')";
        // ตัวอย่างการเรียกใช้งาน $_SESSION['selectedFull']
        // $saleqq_str = isset($_SESSION['selectedFull']) ? $_SESSION['selectedFull'] : "IN ('')";
        // $strSQL = "SELECT em_id, name FROM tb_user WHERE em_id $saleqq_str ORDER BY head_area DESC ";

        @session_start();
        $_SESSION['selectedFull'] = $selectedFullSupMain_string;
        $_SESSION['id'] = $data["id"];
        $_SESSION['user_id_login'] = $data["user_id"];
        $_SESSION['name_show'] = $data["name"];
        $_SESSION['em_code'] = $data["em_code"];
        $_SESSION['surname_show'] = $data["surname"];
        $_SESSION['username'] = $_SESSION['name_show'].' .'.$_SESSION['surname_show'];
        $_SESSION['telephone'] = $data["tel"]; 
        $_SESSION['typelogin'] = $data["user_type"]; 
        $_SESSION['position']= $data["position"];
        $_SESSION['em_id']= $data["em_id"];
        $_SESSION['main_edit']= $data["main_edit"];
        $_SESSION["pass"] = $data["pass"];
        $_SESSION["type_sale"] = $data["type_sale"];
        $_SESSION["mail_intra"] = $data["mail_intra"];
        $_SESSION["group"] = $data["group"];
        $_SESSION["head_area"] = $data["head_area"];
        $_SESSION["ext"] = $data["ext"];
        $_SESSION['thisDomain'] =  $thisDomain;

        header("location:home");
        
    } else {
        echo  "<script>alert('Login Failed! Please check your username and password'); window.location='index.php'</script>";
    }
?>