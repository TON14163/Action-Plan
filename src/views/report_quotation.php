<?php ob_start();
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';
$sale_code = isset($_GET['sale_code']) ? $_GET['sale_code'] : ($_SESSION['em_id'] ?? '');

// Function to generate colored percentage cells
function percentItem($percent_id, $percent_name) {
    $colors = [
        '1' => '#00FF00',
        '2' => '#CCFF99',
        '3' => '#FFFF00',
        '4' => '#FF6600',
        '5' => '#FF0000'
    ];
    $bgcolor = $colors[$percent_id] ?? '';
    return $bgcolor ? "<td style=\"background-color: $bgcolor;\">$percent_name</td>" : '<td></td>';
}

// Function to fetch percentage summaries in one query
function getPercentSummaries($conn) {
    $percent_ranges = ['100 %', '90-99 %', '80-89 %', '50-80 %', '0-50 %'];
    $results = ['total_count' => 0, 'total_sum' => 0, 'ranges' => []];
    
    // Single query to get all summaries
    $sqlHead = "SELECT 
                SUM(sum_price_product) AS sum_price_product,
                SUM(unit_product1) AS unit_product1
            FROM tb_register_data 
            WHERE summary_order = '0' AND summary_product1 != '' ";
    if ($_SESSION['typelogin'] == 'Supervisor') { 
        $sale_code_safe = mysqli_real_escape_string($conn, $_GET['sale_code']);
        $em_id_safe = mysqli_real_escape_string($conn, $_SESSION['em_id']);
        $sqlHead .= "AND (sale_area = '$em_id_safe' OR sale_area = '$sale_code_safe') ";
    } else {
        $em_id_safe = mysqli_real_escape_string($conn, $_SESSION['em_id']);
        $sqlHead .= "AND sale_area = '$em_id_safe' ";
    }
    if ($_GET['hospital_name'] != '') { $sqlHead .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_name']) . "%' "; }
    if ($_GET['percent_name'] != '') { $sqlHead .= "AND percent_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['percent_name']) . "%' "; }
    if (!empty($_GET['date_start']) && !empty($_GET['date_end'])) { $sqlHead .= "AND date_plan BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date_start']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date_end']) . "' "; }
    if (!empty($_GET['date1_buy']) && !empty($_GET['date2_buy'])) { $sqlHead .= "AND date_request BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date1_buy']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date2_buy']) . "' "; }
    if($_GET['prorival_name'] !=""){ $sqlHead .= ' AND mode_pro1 = "'.$_GET['prorival_name'].'"'; }
    if($_GET['type_cus'] !=""){ $sqlHead .= ' AND type_cus = "'.$_GET['type_cus'].'"'; }
    $sqlHead .= "GROUP BY percent_name WITH ROLLUP ";
    
    $query = mysqli_query($conn, $sqlHead) or die("Query Error: " . mysqli_error($conn));
    
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['percent_name'] === NULL) {
            // ROLLUP row for total
            $results['total_count'] = $row['unit_product1'] ?? 0;
            $results['total_sum'] = $row['sum_price_product'] ?? 0;
        } elseif (in_array($row['percent_name'], $percent_ranges)) {
            $results['ranges'][$row['percent_name']] = [
                'sum' => (int)($row['sum_price_product'] ?? 0),
                'count' => (int)($row['unit_product1'] ?? 0)
            ];
        }
    }
    
    // Ensure all ranges are initialized
    foreach ($percent_ranges as $range) {
        if (!isset($results['ranges'][$range])) {
            $results['ranges'][$range] = ['sum' => 0, 'count' => 0];
        }
    }
    
    return $results;
}
?>
<!-- Minified and optimized HTML/CSS -->
<div style="background: #F1E1FF; height: 45px; display: flex; align-items: center; padding: 0 20px; margin-bottom: 20px;">
    <b style="font-size: 20px;">รายงานสรุปเสนอราคา</b>
</div>
<form action="<?php echo $url; ?>" enctype="multipart/form-data" method="get">
    <section style="padding: 10px 20px; font-size: 14px;">
        <p style="margin: 5px 0;">
            <b>วันที่</b>&nbsp;&nbsp;<input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>">
            &nbsp;<b>ถึง</b>&nbsp;&nbsp;<input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>">
            <b>วันที่สั่งของ</b>&nbsp;&nbsp;<input type="date" name="date1_buy" id="date1_buy" value="<?php echo !empty($_GET['date1_buy']) ? htmlspecialchars($_GET['date1_buy']) : ''; ?>">
            &nbsp;<b>ถึง</b>&nbsp;&nbsp;<input type="date" name="date2_buy" id="date2_buy" value="<?php echo !empty($_GET['date2_buy']) ? htmlspecialchars($_GET['date2_buy']) : ''; ?>">
        </p>
        <p class="my-3">
            <label for="customer"><b>โรงพยาบาล</b></label>
            <?php if(isset($_GET["dallyadd"])){ ?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
            <input type="search" style="width: 310px;" class="form-search-custom-awl" list="customerSelect" id="hospital_name" name="hospital_name" autocomplete="off" placeholder="ระบุข้อมูล . . . " onkeyup="fetchData('customerSelect','<?php echo $cumapi; ?>')" value="<?php echo !empty($_GET['hospital_name']) ? htmlspecialchars($_GET['hospital_name']) : ''; ?>" />
            <datalist id="customerSelect">
                <option value="">-- เลือกลูกค้า --</option>
            </datalist>
            <b>ประเภท</b> 
            <select name="type_cus" id="type_cus" class="form-select-custom-awl">
                <option value="">**Please Select**</option>
                    <?php
                    $strSQL5 = "SELECT * FROM tb_typecus ORDER BY id ASC";
                    $objQuery5 = mysqli_query($conn,$strSQL5);
                    while($objResuut5 = mysqli_fetch_array($objQuery5)){
                    if($_GET['type_cus'] == $objResuut5['id']) { 
                        $sel = "selected"; 
                    } else { 
                        $sel = ""; 
                    }
                    ?>
                <option value="<?php echo $objResuut5["id"];?>"<?php echo $sel;?>><?php echo $objResuut5["type_code"];?> - <?php echo $objResuut5["type_name"];?></option>
                <?php } ?>
            </select>
            <b>หมวดสินค้า</b>
            <select name="prorival_name" id="prorival_name" class="form-select-custom-awl">
                <option value="">**Please Select**</option>
                    <?php
                    $strSQL5 = "SELECT id,prorival_name FROM tb_prorival ";
                    $objQuery5 = mysqli_query($conn,$strSQL5);
                    while($objResuut5 = mysqli_fetch_array($objQuery5)){
                    if($_GET['prorival_name'] == $objResuut5['id']) { 
                        $sel = "selected"; 
                    } else { 
                        $sel = ""; 
                    }
                    ?>
                <option value="<?php echo $objResuut5["prorival_name"];?>"<?php echo $sel;?>><?php echo $objResuut5["prorival_name"];?></option>
                <?php } ?>
            </select>
        </p>
        <p style="margin: 5px 0;">
            <b>เปอร์เซ็นต์</b> 
            <select name="percent_name" id="percent_name" class="form-select-custom-awl">
                <option value="">Please Select</option>
                <option <?php if($_GET['percent_name'] == '100 %'){ ?> selected <?php } ?> value="100 %">100 %</option>
                <option <?php if($_GET['percent_name'] == '90-99 %'){ ?> selected <?php } ?> value="90-99 %">90-99 %</option>
                <option <?php if($_GET['percent_name'] == '80-89 %'){ ?> selected <?php } ?> value="80-89 %">80-89 %</option>
                <option <?php if($_GET['percent_name'] == '50-80 %'){ ?> selected <?php } ?> value="50-80 %">50-80 %</option>
                <option <?php if($_GET['percent_name'] == '0-50 %'){ ?> selected <?php } ?> value="0-50 %">0-50 %</option>
            </select>
            <b>Sale</b> 
            <?php if($_SESSION['typelogin'] == 'Supervisor'){ $saleSet = ''; ?>
                <select class="form-select-custom-awl" name="sale_code" id="sale_code">
                    <option>Please Select</option>
                    <?php
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
                    while ($objResuut5 = mysqli_fetch_array($objQuery5)) {  
                        $selected = (!empty($_GET['sale_code']) && $_GET['sale_code'] == $objResuut5["sale_code"]) ? 'selected' : '';
                        echo '<option value="' . htmlspecialchars($objResuut5["sale_code"]) . '" ' . $selected . '>' . htmlspecialchars($objResuut5["sale_code"]) . ' - ' . htmlspecialchars($objResuut5["sale_name"]) . '</option>';
                    }
                    ?>
                </select>
            <?php } else { $saleSet = $_SESSION['em_id']; ?> 
                <input type="text" style="text-align: center;" name="sale_code" id="sale_code" value="<?php echo $_SESSION['em_id']; ?>" readonly> 
            <?php } ?>
            <button class="btn-custom-awl">Search</button>
        </p>
    </section>
</form>
<hr style="margin: 20px 0;">

<?php
$percent_data = getPercentSummaries($conn);
$colors = [
    '100 %' => '#00FF00',
    '90-99 %' => '#CCFF99',
    '80-89 %' => '#FFFF00',
    '50-80 %' => '#FF6600',
    '0-50 %' => '#FF0000'
];
$ordered_ranges = ['100 %', '90-99 %', '80-89 %', '50-80 %', '0-50 %'];
?>

<div style="font-size: 14px; font-weight: bold; position: relative;" class="my-4">
    <a href="report_quotation_excel?date_start=<?php echo $_GET['date_start'];?>&date_end=<?php echo $_GET['date_end'];?>&date1_buy=<?php echo $_GET['date1_buy'];?>&date2_buy=<?php echo $_GET['date2_buy'];?>&hospital_name=<?php echo $_GET['hospital_name'];?>&type_cus=<?php echo $_GET['type_cus'];?>&prorival_name=<?php echo $_GET['prorival_name'];?>&percent_name=<?php echo $_GET['percent_name'];?>&sale_code=<?php echo $_GET['sale_code'];?>" target="_blank" style="position: absolute; top: -15px; right: 10px; width: 30px; height: 30px;"><img src="assets/images/icon_system/vscode-icons--file-type-excel.svg" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="Export File.csv"></a>
    <?php foreach ($ordered_ranges as $range): ?>
        <div style="text-align: center; background: <?php echo $colors[$range]; ?>; border: 0.1px solid #000; border-bottom: none;">
            <?php echo htmlspecialchars($range); ?> = <?php echo number_format($percent_data['ranges'][$range]['sum'], 0); ?> บาท
        </div>
    <?php endforeach; ?>
    <div style="text-align: center; background: #FFF; border: 0.1px solid #000;">
        จำนวนสินค้าทั้งหมด <?php echo number_format($percent_data['total_count'], 0); ?> ชิ้น ยอดรวมทั้งหมด <?php echo number_format($percent_data['total_sum'], 0); ?> บาท
    </div>
</div>

<div class="table-responsive" style="font-size: 14px;">
    <table class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th style="width: 9%;">วันที่</th>
                <th style="width: 10%;">โรงพยาบาล</th>
                <th style="width: 10%;">หน่วยงาน</th>
                <th style="width: 10%;">รายการ</th>
                <th style="width: 5%;">จำนวน</th>
                <th style="width: 7%;">มูลค่า</th>
                <th style="width: 7%;">ประเภท</th>
                <th style="width: 10%;">ผู้ติดต่อ</th>
                <th style="width: 6%;">เปอร์เซ็น</th>
                <th style="width: 9%;">วันที่ได้ P/O</th>
                <th style="width: 9%;">วันที่ส่งของ</th>
                <th style="width: 4%;">เขต</th>
                <th style="width: 4%;">Edit</th>
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

        // นับจำนวนแถวทั้งหมดสำหรับเพจจิเนชั่น
        $sql_count = "SELECT COUNT(*) as total 
                        FROM tb_register_data 
                        WHERE summary_order = '0' AND summary_product1 != '' AND date_request != '0000-00-00' ";
        if ($_SESSION['typelogin'] == 'Supervisor') {
            $sale_code_safe = mysqli_real_escape_string($conn, $_GET['sale_code']);
            $em_id_safe = mysqli_real_escape_string($conn, $_SESSION['em_id']);
            $sql_count .= "AND (sale_area = '$em_id_safe' OR sale_area = '$sale_code_safe') ";
        } else {
            $em_id_safe = mysqli_real_escape_string($conn, $_SESSION['em_id']);
            $sql_count .= "AND sale_area = '$em_id_safe' ";
        }
        if ($_GET['hospital_name'] != '') { $sql_count .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_name']) . "%' "; }
        if ($_GET['percent_name'] != '') { $sql_count .= "AND percent_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['percent_name']) . "%' "; }
        if (!empty($_GET['date_start']) && !empty($_GET['date_end'])) { $sql_count .= "AND date_plan BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date_start']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date_end']) . "' "; }
        if (!empty($_GET['date1_buy']) && !empty($_GET['date2_buy'])) { $sql_count .= "AND date_request BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date1_buy']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date2_buy']) . "' "; }
        if($_GET['prorival_name'] !=""){ $sql_count .= ' AND mode_pro1 = "'.$_GET['prorival_name'].'"'; }
        if($_GET['type_cus'] !=""){ $sql_count .= ' AND type_cus = "'.$_GET['type_cus'].'"'; }
        $result_count = mysqli_query($conn, $sql_count) or die("Query Error: " . mysqli_error($conn));
        $total_rows = mysqli_fetch_assoc($result_count)['total'];
        $total_pages = ceil($total_rows / $items_per_page);

        // Query สำหรับดึงข้อมูลในหน้าปัจจุบัน
        $sql = "SELECT id_work, mode_pro1, date_plan, hospital_name, hospital_ward, summary_quote, summary_product1, remark_pro1, unit_product1, type_cus, pre_name, percent_id, percent_name, month_po, date_request, sale_area, sum_price_product, unit_name1
                FROM tb_register_data 
                WHERE summary_order = '0' AND summary_product1 != '' AND date_request != '0000-00-00' ";
        if ($_SESSION['typelogin'] == 'Supervisor') {
            $sql .= "AND (sale_area = '$em_id_safe' OR sale_area = '$sale_code_safe') ";
        } else {
            $sql .= "AND sale_area = '$em_id_safe' ";
        }
        if ($_GET['hospital_name'] != '') { $sql .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_name']) . "%' "; }
        if ($_GET['percent_name'] != '') { $sql .= "AND percent_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['percent_name']) . "%' "; }
        if (!empty($_GET['date_start']) && !empty($_GET['date_end'])) { $sql .= "AND date_plan BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date_start']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date_end']) . "' "; }
        if (!empty($_GET['date1_buy']) && !empty($_GET['date2_buy'])) { $sql .= "AND date_request BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date1_buy']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date2_buy']) . "' "; }
        if($_GET['prorival_name'] !="" ){ $sql .= ' AND mode_pro1 = "'.$_GET['prorival_name'].'"'; }
        if($_GET['type_cus'] !="" ){ $sql .= ' AND type_cus = "'.$_GET['type_cus'].'"'; }	
        $sql .= "ORDER BY date_plan DESC LIMIT $items_per_page OFFSET $offset ";
        // echo $sql;
        $query = mysqli_query($conn, $sql) or die("Query Error: " . mysqli_error($conn));
        
        while ($row = mysqli_fetch_assoc($query)) {
            $type_sql = "SELECT type_code FROM tb_typecus WHERE id = '" . mysqli_real_escape_string($conn, $row['type_cus']) . "'";
            $type_query = mysqli_query($conn, $type_sql);
            $type_code = $type_query ? mysqli_fetch_assoc($type_query)['type_code'] ?? '' : '';
        ?>
            <tr>
                <td><?php echo DateThai($row['date_plan']); ?></td>
                <td><?php echo htmlspecialchars($row['hospital_name']); ?></td>
                <td><?php echo htmlspecialchars($row['hospital_ward']); ?></td>
                <td><?php echo htmlspecialchars($row['summary_quote'] . $row['summary_product1'] . ' ' . $row['remark_pro1']); ?></td>
                <td><?php echo $row['unit_product1'] != '0' ? $row['unit_product1'] . ' ' . $row['unit_name1'] : ''; ?></td>
                <td><?php echo number_format($row['sum_price_product'], 0); ?></td>
                <td><?php echo htmlspecialchars($type_code); ?></td>
                <td><?php echo htmlspecialchars($row['pre_name']); ?></td>
                <?php echo percentItem($row['percent_id'], $row['percent_name']); ?>
                <td><?php echo DateThai($row['month_po']); ?></td>
                <td><?php echo $row['date_request'] != '0000-00-00' ? DateThai($row['date_request']) : ''; ?></td>
                <td><?php echo htmlspecialchars($row['sale_area']); ?></td>
                <td style="text-align: center;">
                    <a href="quo_edit.php?id_work=<?php echo $row['id_work']; ?>">
                        <img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;" alt="Edit">
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <!-- สร้าง query string สำหรับพารามิเตอร์ทั้งหมด -->
    <?php
    $base_params = [
        'sale_code' => isset($_GET['sale_code']) ? $_GET['sale_code'] : '',
        'hospital_name' => isset($_GET['hospital_name']) ? $_GET['hospital_name'] : '',
        'hospital_ward' => isset($_GET['hospital_ward']) ? $_GET['hospital_ward'] : '',
        'date_start' => isset($_GET['date_start']) ? $_GET['date_start'] : '',
        'date_end' => isset($_GET['date_end']) ? $_GET['date_end'] : '',
        'dallyadd' => isset($_GET['dallyadd']) ? $_GET['dallyadd'] : ''
    ];
    $query_string = http_build_query(array_filter($base_params, function($value) {
        return $value !== '';
    }));
    ?>

<section style="display: flex; justify-content: space-between; align-items: center; " class="mt-4">

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

<div class="loading-overlay" id="loadingOverlay"><div class="dots-flow"><span></span><span></span><span></span></div></div> <!-- Loading Animation -->

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