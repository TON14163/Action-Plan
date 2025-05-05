<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';
(!isset($_GET['sale_code'])) ? $sale_code = $_SESSION['em_id'] : $sale_code = $_GET['sale_code'] ;
?>

<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงาน Daily Report</b>
</div>

<p style="font-size: 14px;">
<form action="<?php echo $url;?>" enctype="multipart/form-data" method="get">
                <b>วันที่</b> <input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>">
                <b>ถึง</b> <input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>">
                <b>Sale</b> 
                    <?php if($_SESSION['typelogin'] == 'Supervisor'){ $saleSet = ''; ?>
                        <select class="form-select-custom-awl" name="sale_code" id="sale_code">
                            <option value="">Please Select</option>
                            <?php
                            switch ($_SESSION["head_area"]) {
                                case 'SM1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_sm1 "; break;
                                case 'SS1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 "; break;
                                case 'SS2': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss2 "; break;
                                case 'SS3': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss3 "; break;
                                default:
                                    $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 
                                    UNION sale_code,sale_name FROM tb_team_ss2
                                    UNION sale_code,sale_name FROM tb_team_ss3
                                    UNION sale_code,sale_name FROM tb_team_sm1 ";
                                break;
                            }
                            $objQuery5 = mysqli_query($conn, $strSQL5);
                            while ($objResuut5 = mysqli_fetch_array($objQuery5)) {  
                                $selected = (!empty($_GET['sale_code']) && $_GET['sale_code'] == $objResuut5["sale_code"]) ? 'selected' : '';
                                echo '<option value="' . htmlspecialchars($objResuut5["sale_code"]) . '" ' . $selected . '>' . htmlspecialchars($objResuut5["sale_code"]) . ' - ' . htmlspecialchars($objResuut5["sale_name"]) . '</option>';
                            }
                            ?>
                        </select>
                    <?php } else { $saleSet = $_SESSION['em_id']; ?> 
                        <input type="text" style="text-align: center;" name="sale_code" id="sale_code" value="<?php echo $_SESSION['em_id'];?>" readonly> 
                    <?php } ?>
                <b>ประเภทสินค้า</b> <input type="text" class="form-search-custom-awl" name="product_rival" id="product_rival" value="">
        <br>
                <br>

    <label for="customer"><b>โรงพยาบาล</b></label>
    <?php if(isset($_GET["dallyadd"])){?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
    <input type="search" style="width: 310px;" class="form-search-custom-awl" list="customerSelect" id="hospital_name" name="hospital_name" autocomplete="off" placeholder="ระบุข้อมูล . . . " onkeyup="fetchData('customerSelect','<?php echo $cumapi;?>')" value="<?php  echo !empty($_GET['hospital_name']) ? htmlspecialchars($_GET['hospital_name']) : ''; ?>"  />
    <datalist id="customerSelect">
        <option value="">-- เลือกลูกค้า --</option>
    </datalist>

                
                <b>ตึก</b> &nbsp; <input type="text" class="form-search-custom-awl" name="hospital_buiding" id="hospital_buiding" placeholder="ระบุข้อมูล . . . " value="<?php if(!empty($_GET['hospital_buiding'])){} echo htmlspecialchars($_GET['hospital_buiding']); ?>">
                <b>หน่วยงาน</b>&nbsp;&nbsp;&nbsp; <input type="text" class="form-search-custom-awl" name="hospital_ward" id="hospital_ward" placeholder="ระบุข้อมูล . . . " value="<?php if(!empty($_GET['hospital_ward'])){} echo htmlspecialchars($_GET['hospital_ward']); ?>">
                <button class="btn-custom-awl">Search</button>

</form>
</p>

<hr style="margin: 20px 0px;">
<p>
    <div style="display: flex; justify-content: space-between; align-items: center;" class="font-custom-awl-14">
        <div style="font-weight: bold;">
            <kbd style="background-color: #EBE4ED; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ plan ไว้เเล้ว
            <kbd style="background-color: #FFFF99; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ไม่ได้ plan ไว้
            <kbd style="background-color: #99FF33; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Sup เพิ่มให้
            <kbd style="background-color: #DDA0DD; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่สร้างจากประมาณการขาย
            <kbd style="background-color: #66FFFF; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Sup ไปแล้ว
            <kbd style="background-color: #FFCC99; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Copy งานเดิม
        </div>
        <div>
            <?php if($_SESSION['typelogin'] != 'Supervisor'){ ?>
                <a href="actionplan?dallyadd=1"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="งานที่ไม่ได้ plan ไว้"></a>
            <?php } ?>
                <a href="report_daily_report_excel?date_start=<?php if(!empty($_GET['date_start'])){ echo htmlspecialchars($_GET['date_start']);}?>&date_end=<?php if(!empty($_GET['date_end'])){ echo htmlspecialchars($_GET['date_end']);}?>&hospital_buiding=<?php if(!empty($_GET['hospital_buiding'])){ echo htmlspecialchars($_GET['hospital_buiding']);}?>&hospital_ward=<?php if(!empty($_GET['hospital_ward'])){ echo htmlspecialchars($_GET['hospital_ward']);}?>&hospital_name=<?php if(!empty($_GET['hospital_name'])){ echo htmlspecialchars($_GET['hospital_name']);}?>&sale_code=<?php if(!empty($_GET['sale_code'])){ echo htmlspecialchars($_GET['sale_code']);}?>"><img src="assets/images/icon_system/vscode-icons--file-type-excel.svg" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="Export File.csv"></a>
        </div>
    </div>
</p>
<div class="table-responsive">
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr style="font-size: 14px;">
                <th style="width: 10%;">วันที่</th>
                <th style="width: 12%;">โรงพยาบาล</th>
                <th style="width: 12%;">หน่วยงาน</th>
                <th style="width: 15%;">ประเภทสินค้า</th>
                <th style="width: 15%;">Activity</th>
                <th style="width: 19%;">รายละเอียด</th>
                <th style="width: 10%;">ผู้ติดต่อ</th>
                <th style="width: 7%;">เขตการขาย</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        // กำหนดจำนวนรายการต่อหน้า
        $items_per_page = 25;
        // รับค่าหน้าปัจจุบันจาก URL ถ้าไม่มีให้ตั้งเป็นหน้า 1
        $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        // คำนวณ OFFSET
        $offset = ($current_page - 1) * $items_per_page;

        // นับจำนวนข้อมูลทั้งหมด
        $sql_total = "SELECT COUNT(*) as total FROM tb_register_data WHERE 1=1 ";
        if (!empty($_GET['date_start']) && !empty($_GET['date_end'])) {
            $sql_total .= "AND date_plan BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date_start']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date_end']) . "' ";
        }
        if (!empty($_GET['hospital_buiding'])) {
            $sql_total .= "AND hospital_buiding LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_buiding']) . "%' ";
        }
        if (!empty($_GET['hospital_ward'])) {
            $sql_total .= "AND hospital_ward LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_ward']) . "%' ";
        }
        if (!empty($_GET['hospital_name'])) {
            $sql_total .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_name']) . "%' ";
        }
        if ($_SESSION['typelogin'] == 'Supervisor') { 
            $sale_code_safe = mysqli_real_escape_string($conn, $_GET['sale_code']);
            $em_id_safe = mysqli_real_escape_string($conn, $_SESSION['em_id']);
            $sql_total .= "AND (sale_area = '$em_id_safe' OR sale_area = '$sale_code_safe') ";
        } else {
            $em_id_safe = mysqli_real_escape_string($conn, $_SESSION['em_id']);
            $sql_total .= "AND sale_area = '$em_id_safe' ";
        }
        $result_total = mysqli_query($conn, $sql_total);
        $total_rows = mysqli_fetch_assoc($result_total)['total'];
        // คำนวณจำนวนหน้าทั้งหมด
        $total_pages = ceil($total_rows / $items_per_page);

        // ดึงข้อมูลสำหรับหน้าปัจจุบัน
        $sqlPlan = "SELECT * FROM tb_register_data WHERE 1=1 ";
        if (!empty($_GET['date_start']) && !empty($_GET['date_end'])) {
            $sqlPlan .= "AND date_plan BETWEEN '".$_GET['date_start']."' AND '".$_GET['date_end']."' ";
        }
        if (!empty($_GET['hospital_buiding'])) {
            $sqlPlan .= "AND hospital_buiding LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_buiding']) . "%' ";
        }
        if (!empty($_GET['hospital_ward'])) {
            $sqlPlan .= "AND hospital_ward LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_ward']) . "%' ";
        }
        if (!empty($_GET['hospital_name'])) {
            $sqlPlan .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_name']) . "%' ";
        }
        if($_SESSION['typelogin'] == 'Supervisor'){ 
            if ($sale_code == '') {
                $sqlPlan .= "AND sale_area = '".$_SESSION['em_id']."' ";
            } else {
                $sqlPlan .= "AND sale_area = '".$_SESSION['em_id']."' ";
            }
        } else {
            $sqlPlan .= "AND sale_area = '".$_SESSION['em_id']."' ";
        }
        $sqlPlan .= "ORDER BY date_plan DESC LIMIT $items_per_page OFFSET $offset";
        $queryPlan = mysqli_query($conn, $sqlPlan);
        $numPlan = mysqli_num_rows($queryPlan);

        if ($numPlan > 0) {
            while ($rowPlan = mysqli_fetch_array($queryPlan)) { 
            switch ($rowPlan['daily']) {
                case '0': $colorTable = 'background-color:#EBE4ED'; break;
                case '1': $colorTable = 'background-color:#FFFF99'; break;
                case '2': $colorTable = 'background-color:#99FF33'; break;
                case '3': $colorTable = 'background-color:#DDA0DD'; break;
                case '4': $colorTable = 'background-color:#66FFFF'; break;
                case '5': $colorTable = 'background-color:#FFCC99'; break;
                default:  $colorTable = 'background-color:#FFFFFF'; break;
            } 
        ?>
            <tr style="background-color: #FFFFFF; font-size: 14px;">
                <td style="<?php echo $colorTable;?>"><?php echo DateThai($rowPlan['date_plan']);?></td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['hospital_name'];?></td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['hospital_ward'];?></td>
                <td style="<?php echo $colorTable;?>">
                    <?php
                    $sqltypeproduct = "SELECT * FROM tb_storyrival WHERE refid_work = '".$rowPlan['id_work']."' ORDER BY id_story DESC LIMIT 20";
                    $querytypeproduct = mysqli_query($conn, $sqltypeproduct);
                    while ($rowtypeproduct = mysqli_fetch_array($querytypeproduct)) {
                        echo $rowtypeproduct['product_rival'].'<br>';
                    }
                    ?>
                </td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['description_focastnew'];?></td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['plan_work'];?></td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['hospital_contact'];?></td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['sale_area'];?></td>
            </tr>
        <?php } } ?>
        </tbody>
    </table>
    <br>
<section style="display: flex; justify-content: space-between; align-items: center; ">

    <p>พบทั้งหมด <?php echo $total_rows; ?> รายการ : จำนวน <?php echo $total_pages; ?> หน้า : หน้าปัจจุบัน <?php echo $current_page; ?></p>

            <!-- Pagination -->
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <!-- ปุ่ม Previous -->
            <li class="page-item <?php echo ($current_page <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&page=<?php echo $current_page - 1; ?>">Previous</a>
            </li>
            <?php
            // จำกัดจำนวนหน้าที่แสดง (เช่น แสดงสูงสุด 5 หน้า)
            $max_visible_pages = 5;
            // คำนวณช่วงของหน้าที่จะแสดง
            $start_page = max(1, $current_page - floor($max_visible_pages / 2));
            $end_page = min($total_pages, $start_page + $max_visible_pages - 1);

            // ปรับ start_page หาก end_page ถึงหน้าสุดท้าย
            if ($end_page - $start_page + 1 < $max_visible_pages) {
                $start_page = max(1, $end_page - $max_visible_pages + 1);
            }

            // แสดงหน้าแรกถ้า start_page ไม่ใช่ 1
            if ($start_page > 1) {
            ?>
                <li class="page-item">
                    <a class="page-link" href="?sale_code=&page=1">1</a>
                </li>
                <?php if ($start_page > 2) { ?>
                    <li class="page-item disabled">
                        <span class="page-link">…</span>
                    </li>
                <?php } ?>
            <?php } ?>

            

            <!-- แสดงหน้าตามช่วง -->
            <?php for ($i = $start_page; $i <= $end_page; $i++) { ?>
                <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&hospital_name=<?php echo $_GET['hospital_name'];?>&hospital_buiding=<?php echo $_GET['hospital_buiding'];?>&hospital_ward=<?php echo $_GET['hospital_ward'];?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>

            <!-- แสดงหน้าสุดท้ายถ้า end_page ไม่ถึงหน้าสุดท้าย -->
            <?php if ($end_page < $total_pages) { ?>
                <?php if ($end_page < $total_pages - 1) { ?>
                    <li class="page-item disabled">
                        <span class="page-link">…</span>
                    </li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&hospital_name=<?php echo $hospital_name;?>&hospital_buiding=<?php echo $hospital_buiding;?>&hospital_ward=<?php echo $hospital_ward;?>&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a>
                </li>
            <?php } ?>

            <!-- ปุ่ม Next -->
            <li class="page-item <?php echo ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&hospital_name=<?php echo $hospital_name;?>&hospital_buiding=<?php echo $hospital_buiding;?>&hospital_ward=<?php echo $hospital_ward;?>&page=<?php echo $current_page + 1; ?>">Next</a>
            </li>
        </ul>
    </nav>
</section>

    <!-- Loading Animation -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="dots-flow">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

</div>

<script>
// JavaScript สำหรับควบคุม loading animation
document.addEventListener('DOMContentLoaded', function() {
    const paginationLinks = document.querySelectorAll('.pagination .page-link');
    const loadingOverlay = document.getElementById('loadingOverlay');

    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // แสดง loading animation
            loadingOverlay.style.display = 'flex';
        });
    });
});
</script>

<?php 
$content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
require_once __DIR__ . '/layouts/Main.php';
?>

<script src="<?php echo $_SESSION['thisDomain'];?>/assets/js/fetchData.js"></script> <!-- โรงพยาบาล -->