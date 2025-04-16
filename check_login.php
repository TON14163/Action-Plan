<?php 

require_once __DIR__ . '/config/database.php';
date_default_timezone_set("Asia/Bangkok"); 
$sql = "select * from tb_user where user_id='".$_POST["user_id_login"]."' and pass='".$_POST["pass_login"]."' "; 
$dbquery = mysqli_query($conn,$sql)or die(mysqli_error());
$data = mysqli_fetch_array($dbquery);
$rows = mysqli_num_rows($dbquery);

$strSQL1 = "SELECT line_add FROM tb_user WHERE user_id = '".$_POST["user_id_login"]."' ";
$objQuery1 = mysqli_query($conn,$strSQL1);
$objResult1 = mysqli_fetch_array($objQuery1);
$line_add = $objResult1["line_add"];

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

if ($domain_only === '127.0.0.1' || $domain_only === '37d4-184-82-245-228.ngrok-free.app') {
    $thisDomain = "/Action-Plan/";
} elseif ($domain_only === 'testpr-wr.allwellcenter.com') {
    $thisDomain =  "/";
} else {
    echo "ไม่รู้จักโดเมนนี้";
}
// เช็ค domain เพื่อใช้รัน ระบบในเครื่องหรือบน domain   END

    if($rows == 1){
        @session_start();
        $_SESSION['user_id_login'] = $data["user_id"];
        $_SESSION['name_show'] = $data["name"];
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
        $_SESSION["head_area"] = $data["head_area"];
        $_SESSION['thisDomain'] =  $thisDomain;

        header("location:home");
        
    } else {
        echo  "<script>alert('Login Failed! Please check your username and password'); window.location='index.php'</script>";
    }
?>