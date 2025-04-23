<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';
(!isset($_GET['sale_code'])) ? $sale_code = $_SESSION['em_id'] : $sale_code = $_GET['sale_code'] ;
?>

<style>
/* CSS สำหรับ dots-flow loading animation */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.dots-flow {
    display: flex;
    gap: 10px;
}

.dots-flow span {
    width: 12px;
    height: 12px;
    background: #ffffff;
    border-radius: 50%;
    animation: dots-flow 0.8s infinite;
}

.dots-flow span:nth-child(2) {
    animation-delay: 0.2s;
}

.dots-flow span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes dots-flow {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
}
</style>

<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงาน Action Plan</b>
</div>

<p>
    <form action="<?php echo $url;?>" enctype="multipart/form-data" method="get">
        <b>&nbsp;&nbsp; วันที่</b> <input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>">
        <b>ถึง</b> <input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>">
        <b>Sale</b> 
        <?php if($_SESSION['typelogin'] == 'Supervisor'){ $saleSet = ''; ?>
            <select class="form-select-custom-awl" name="sale_code" id="sale_code">
                <option value="">Please Select</option>
                <?php
                $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 
                UNION SELECT sale_code,sale_name FROM tb_team_ss2
                UNION SELECT sale_code,sale_name FROM tb_team_ss3
                ";
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
        <button class="btn-custom-awl">Search</button>
    </form>
</p>

<hr style="margin: 20px 0px;">
<p>
    <div style="display: flex; justify-content: space-between; align-items: center;" class="font-custom-awl-14">
        <div style="font-weight: bold;">
            <kbd style="background-color: #DDA0DD; width: 30px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่สร้างจากประมาณการขาย
            <kbd style="background-color: #66FFFF; width: 30px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Sup ไปแล้ว
        </div>
        <div><a href="dallyreport_register"><img src="assets/images/icon_system/print.png" style="width: 30px; height: 30px;"></a></div>
    </div>
</p>
<div class="table-responsive">
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th style="width: 10%;">วันที่</th>
                <th style="width: 15%;">โรงพยาบาล</th>
                <th style="width: 15%;">หน่วยงาน</th>
                <th style="width: 10%;">ผู้ติดต่อ</th>
                <th style="width: 10%;">วัตถุประสงค์</th>
                <th style="width: 17%;">ประเภทสินค้า</th>
                <th style="width: 10%;">Activity</th>
                <th style="width: 7%;">เขตการขาย</th>
                <th style="width: 5%;">Delete</th>
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
        if($_SESSION['typelogin'] == 'Supervisor'){ 
            if ($sale_code == '') {
                $sqlPlan .= "AND sale_area = '".$_SESSION['em_id']."' ";
            } else {
                $sqlPlan .= "AND sale_area = '".$_SESSION['em_id']."' ";
            }
        } else {
            $sqlPlan .= "AND sale_area = '".$_SESSION['em_id']."' ";
        }
        $sqlPlan .= "ORDER BY id_work DESC LIMIT $items_per_page OFFSET $offset";
        $queryPlan = mysqli_query($conn, $sqlPlan);
        $numPlan = mysqli_num_rows($queryPlan);

        if ($numPlan > 0) {
            while ($rowPlan = mysqli_fetch_array($queryPlan)) { 
                if ($rowPlan['daily'] == '3') {
                    $colorTable = 'background-color: #DDA0DD;';
                } else if ($rowPlan['daily'] == '4') {
                    $colorTable = 'background-color: #66FFFF;';
                } else {
                    $colorTable = '';
                }
        ?>
            <tr style="background-color: #FFFFFF;">
                <td style="<?php echo $colorTable; ?>"><?php echo DateThai($rowPlan['date_plan']); ?></td>
                <td style="<?php echo $colorTable; ?>"><?php echo $rowPlan['hospital_name']; ?></td>
                <td style="<?php echo $colorTable; ?>"><?php echo $rowPlan['hospital_ward']; ?></td>
                <td style="<?php echo $colorTable; ?>"><?php echo $rowPlan['hospital_contact']; ?></td>
                <td style="<?php echo $colorTable; ?>"><?php echo $rowPlan['objective']; ?></td>
                <td style="<?php echo $colorTable; ?>">
                    <?php
                    $sqltypeproduct = "SELECT * FROM tb_storyrival WHERE refid_work = '".$rowPlan['id_work']."' ORDER BY id_story DESC LIMIT 20";
                    $querytypeproduct = mysqli_query($conn, $sqltypeproduct);
                    while ($rowtypeproduct = mysqli_fetch_array($querytypeproduct)) {
                        echo $rowtypeproduct['product_rival'].'<br>';
                    }
                    ?>
                </td>
                <td style="<?php echo $colorTable; ?>"><?php echo $rowPlan['plan_work']; ?></td>
                <td style="<?php echo $colorTable; ?>"><?php echo $rowPlan['sale_area']; ?></td>
                <td style="<?php echo $colorTable; ?>"><img src="assets/images/icon_system/x-regular-24 (1).png" style="width: 25px; height: 25px;"></td>
            </tr>
        <?php } } ?>
        </tbody>
    </table>
    <br>
<div style="display: flex; justify-content: space-between; align-items: center; ">

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
                    <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
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
                    <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a>
                </li>
            <?php } ?>

            <!-- ปุ่ม Next -->
            <li class="page-item <?php echo ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&page=<?php echo $current_page + 1; ?>">Next</a>
            </li>
        </ul>
    </nav>
</div>

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