<?php
ob_start();
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';

// Get and sanitize input parameters
$sale_code = isset($_GET['sale_code']) ? mysqli_real_escape_string($conn, $_GET['sale_code']) : $_SESSION['em_id'];
$date_start = isset($_GET['date_start']) ? mysqli_real_escape_string($conn, $_GET['date_start']) : '';
$date_end = isset($_GET['date_end']) ? mysqli_real_escape_string($conn, $_GET['date_end']) : '';

// Check if all required parameters are present for auto-export
$auto_export = !empty($date_start) && !empty($date_end) && !empty($sale_code);

if ($auto_export) {
    // Set headers for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="Action_Plan_Report_' . date('Ymd_His') . '.csv"');

    // Add UTF-8 BOM for Thai character support in Excel
    echo "\xEF\xBB\xBF";

    // Create output stream
    $output = fopen('php://output', 'w');

    // Write CSV headers
    fputcsv($output, [
        'วันที่',
        'โรงพยาบาล',
        'หน่วยงาน',
        'ผู้ติดต่อ',
        'วัตถุประสงค์',
        'ประเภทสินค้า',
        'Activity',
        'เขตการขาย'
    ], ',', '"');

    // Build SQL query for export
    $sqlPlan = "SELECT * FROM tb_register_data WHERE 1=1 ";
    if (!empty($date_start) && !empty($date_end)) {
        $sqlPlan .= "AND date_plan BETWEEN '$date_start' AND '$date_end' ";
    }
    $sqlPlan .= "AND sale_area = '$sale_code' ";
    $sqlPlan .= "ORDER BY id_work DESC";

    $queryPlan = mysqli_query($conn, $sqlPlan) or die("Query failed: " . mysqli_error($conn));

    // Write data rows
    while ($rowPlan = mysqli_fetch_array($queryPlan)) {
        // Fetch product types
        $product_rivals = '';
        $sqltypeproduct = "SELECT product_rival FROM tb_storyrival WHERE refid_work = '" . mysqli_real_escape_string($conn, $rowPlan['id_work']) . "' ORDER BY id_story DESC LIMIT 20";
        $querytypeproduct = mysqli_query($conn, $sqltypeproduct) or die("Query failed: " . mysqli_error($conn));
        while ($rowtypeproduct = mysqli_fetch_array($querytypeproduct)) {
            $product_rivals .= $rowtypeproduct['product_rival'] . "\n";
        }

        fputcsv($output, [
            DateThai($rowPlan['date_plan']),
            $rowPlan['hospital_name'],
            $rowPlan['hospital_ward'],
            $rowPlan['hospital_contact'],
            $rowPlan['objective'],
            $product_rivals,
            $rowPlan['plan_work'],
            $rowPlan['sale_area']
        ], ',', '"');
    }

    fclose($output);
    exit();
} else { ?>
<script> history.back(); </script>
<?php 
echo "<center style='margin-top:20vw;'><h1>ไม่มีข้อมูลที่ระบุ . . .</h1></center>";
exit;
}
?>

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
            </tr>
        </thead>
        <tbody>
        <?php
        // Pagination logic
        $items_per_page = 25;
        $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($current_page - 1) * $items_per_page;

        // Count total rows
        $sql_total = "SELECT COUNT(*) as total FROM tb_register_data WHERE 1=1 ";
        if (!empty($date_start) && !empty($date_end)) {
            $sql_total .= "AND date_plan BETWEEN '$date_start' AND '$date_end' ";
        }
        if ($_SESSION['typelogin'] == 'Supervisor') {
            $sql_total .= "AND (sale_area = '" . mysqli_real_escape_string($conn, $_SESSION['em_id']) . "' OR sale_area = '$sale_code') ";
        } else {
            $sql_total .= "AND sale_area = '" . mysqli_real_escape_string($conn, $_SESSION['em_id']) . "' ";
        }
        $result_total = mysqli_query($conn, $sql_total) or die("Query failed: " . mysqli_error($conn));
        $total_rows = mysqli_fetch_assoc($result_total)['total'];
        $total_pages = ceil($total_rows / $items_per_page);

        // Fetch data for current page
        $sqlPlan = "SELECT * FROM tb_register_data WHERE 1=1 ";
        if (!empty($date_start) && !empty($date_end)) {
            $sqlPlan .= "AND date_plan BETWEEN '$date_start' AND '$date_end' ";
        }
        if ($_SESSION['typelogin'] == 'Supervisor') {
            $sqlPlan .= "AND sale_area = '" . ($sale_code ?: $_SESSION['em_id']) . "' ";
        } else {
            $sqlPlan .= "AND sale_area = '" . $_SESSION['em_id'] . "' ";
        }
        $sqlPlan .= "ORDER BY id_work DESC LIMIT $items_per_page OFFSET $offset";
        $queryPlan = mysqli_query($conn, $sqlPlan) or die("Query failed: " . mysqli_error($conn));
        $numPlan = mysqli_num_rows($queryPlan);

        if ($numPlan > 0) {
            while ($rowPlan = mysqli_fetch_array($queryPlan)) {
                $colorTable = '';
                if ($rowPlan['daily'] == '3') {
                    $colorTable = 'background-color: #DDA0DD;';
                } elseif ($rowPlan['daily'] == '4') {
                    $colorTable = 'background-color: #66FFFF;';
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
                    $sqltypeproduct = "SELECT product_rival FROM tb_storyrival WHERE refid_work = '" . mysqli_real_escape_string($conn, $rowPlan['id_work']) . "' ORDER BY id_story DESC LIMIT 20";
                    $querytypeproduct = mysqli_query($conn, $sqltypeproduct) or die("Query failed: " . mysqli_error($conn));
                    while ($rowtypeproduct = mysqli_fetch_array($querytypeproduct)) {
                        echo $rowtypeproduct['product_rival'] . '<br>';
                    }
                    ?>
                </td>
                <td style="<?php echo $colorTable; ?>"><?php echo $rowPlan['plan_work']; ?></td>
                <td style="<?php echo $colorTable; ?>"><?php echo $rowPlan['sale_area']; ?></td>
            </tr>
        <?php } } ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/layouts/Main.php';
?>