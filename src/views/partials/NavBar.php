<!-- 
ใน navbar.php 
ถ้าเพิ่มเมนูต้องไปกำหนด routes ที่หน้า index_chk ด้วยสำคัญมากเพราะถ้าไม่ใส่จะขึ้น Error 404 
-->

<?php 
$HTTP_HOSTS = $_SERVER['HTTP_HOST'];
if($HTTP_HOSTS == 'testpr-wr.allwellcenter.com'){
    $nameHost = "";
} else {
    $nameHost = "/Action-Plan/";
}
if ($_SESSION['em_id'] == '' ) { ?> 
    <script>
            Swal.fire({
            title: "คุณยังไม่ได้ Login / หมดเวลาการเข้าใช้งาน",
            width: 600,
            padding: "3em",
            color: "#716add",
            backdrop: `
                rgba(0,0,123,0.4)
                url("/assets/images/background_main.jpg")
                left top
                no-repeat
            `
            });
    </script>
<?php 
    print "<meta http-equiv=refresh content=1;URL=index.php>"; 
    session_destroy();
    error_reporting(0); 
    exit; 
    } 
?>

<link rel="stylesheet" href="assets/css/NavBar.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/loadingNextPage.css">
<script src="assets/js/NavBar.js"></script>
<nav class="menu-nav0">
    <div class="menu-nav1">
        <a href="<?php echo $nameHost;?>home" style="text-decoration: none;"><img src="assets/images/Awl-logo.png" style="width: 90px; height: auto;">&nbsp; ERP</a>
    </div>

        <!-- <div>
            <span class="menu-nav4" onclick="menuNav4()"><img src="assets/images/icon_system/iconamoon--menu-burger-vertical-fill.png" style="width: 23px; height: 23px; "></span>
            <span class="menu-nav3" onclick="menuNav3()"><img src="assets/images/icon_system/famicons--menu.svg" style="width: 23px; height: 23px; "></span>
        </div> -->
    
    <ul class="menu-nav2">
        <?php if($_SESSION['em_id'] != 'MK'){ ?>
        <li><a class="hover-nav-item" href="<?php echo $nameHost;?>actionplan">Action Plan</a></li>
        <li><a class="hover-nav-item" href="<?php echo $nameHost;?>dallyreport">Dally Report</a></li>
        <li>
            <span class="hover-nav-item arrow-top-down">
            Report &nbsp;
                <span class="arrow-drop-down">
                    <a href="<?php echo $nameHost;?>report_actionplan">รายงาน Action Plan</a>
                    <a href="<?php echo $nameHost;?>report_daily_report">รายงาน Daily Report</a>
                    <a href="<?php echo $nameHost;?>report_quotation">รายงานสรุปเสนอราคา</a>
                    <a href="<?php echo $nameHost;?>report_sales_closure">รายงานปิดการขาย</a>
                    <?php if($_SESSION['typelogin'] == 'Supervisor'){ ?>
                    <a href="<?php echo $nameHost;?>report_summary_newjane2">รายงานสรุปการปรับปรุงการประมานการขายตามช่วงเวลา</a> <!-- ใช้ของเดิมต้นฉบับ sup -->
                    <?php } else { ?>
                    <a href="<?php echo $nameHost;?>report_summary_newsale">รายงานสรุปการปรับปรุงการประมานการขายตามช่วงเวลา</a> <!-- ใช้ของเดิมต้นฉบับ sale -->
                    <?php } ?>
                    <!-- <a href="<?php // echo $nameHost;?>report_forecast_time">รายงานสรุปการปรับปรุงการประมานการขายตามช่วงเวลา</a> --> <!-- ใช้ของใหม่ -->
                    <a href="<?php echo $nameHost;?>report_competitor">รายงานคู่แข่ง</a>
                    <?php // if($_SESSION['em_id'] == 'VMD' || $_SESSION['em_id'] == 'MD1' || $_SESSION['em_id'] == 'PRM' || $_SESSION['em_id'] == 'IT2'){ ?>
                    <a href="<?php echo $nameHost;?>report_summary_supsum5">รายงานสรุปผลการขายตามช่วงเวลา</a>
                    <a href="<?php echo $nameHost;?>report_presentsup">รายงานการจัด Present / การออก Booth</a>
                    <?php // } ?>
                </span>
            </span>
        </li>
        <?php } ?>
        <li><a class="hover-nav-item" href="<?php echo $nameHost;?>list_receive_the_matter">รายการรับเรื่อง</a></li>
        <li>
            <span class="hover-nav-item arrow-top-down">
            <img src="assets/images/icon_system/lets-icons--user-cicrle-light.svg" style="width: 18px; height: auto;">&nbsp;<?php echo $_SESSION['name_show'].' '.$_SESSION['surname_show'];?> &nbsp;
                <span class="arrow-drop-down-right">
                    <a href="<?php echo $nameHost;?>user-contact">ข้อมูลผู้ติดต่อ </a>
                    <a href="<?php echo $nameHost;?>user-customer">ข้อมูลลูกค้า</a>
                    <?php if($_SESSION['em_id'] == 'IT2' OR $_SESSION['em_id'] == 'PRM'){ ?>
                    <a href="<?php echo $nameHost;?>register_user">ข้อมูลผู้ใช้งาน</a>
                    <?php } ?>
                    <a href="<?php echo $nameHost;?>user-change">เปลี่ยนรหัสผ่าน</a>
                    <a href="<?php echo $nameHost;?>user-logout">ออกจากระบบ</a>
                </span>
            </span>
        </li>
    </ul>
    
</nav>


<!-- <script>
    function menuNav3(){
        document.querySelector('.menu-nav3').style.display = 'none';
        document.querySelector('.menu-nav4').style.display = 'block';
        document.querySelector('.menu-nav0').style.flexDirection = 'column';
        document.querySelector('.menu-nav2').style.flexDirection = 'row';
    }
    function menuNav4(){
        document.querySelector('.menu-nav4').style.display = 'none';
        document.querySelector('.menu-nav3').style.display = 'block';
        document.querySelector('.menu-nav0').style.flexDirection = 'column';
        document.querySelector('.menu-nav2').style.flexDirection = 'row';
    }
</script> -->