<?php
ob_start();
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';

// Get parameters from GET request
$sale_code = isset($_GET['sale_code']) ? mysqli_real_escape_string($conn, $_GET['sale_code']) : $_SESSION['em_id'];

// Build the SQL query
$strSQL = "SELECT * FROM tb_register_data WHERE sale_area = '" . mysqli_real_escape_string($conn, $sale_code) . "' AND head_area = '" . mysqli_real_escape_string($conn, $_SESSION['head_area']) . "' AND summary_order IN ('1','2') ";

if (!empty($_GET['date_start']) && !empty($_GET['date_end'])) {
    $strSQL .= "AND date_update BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date_start']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date_end']) . "' ";
}
if (!empty($_GET['grade_a'])) {
    $strSQL .= "AND grade_a = '" . mysqli_real_escape_string($conn, $_GET['grade_a']) . "' ";
}
if (!empty($_GET['date_order'])) {
    $strSQL .= "AND date_order = '" . mysqli_real_escape_string($conn, $_GET['date_order']) . "' ";
}
if (!empty($_GET['hospital_name'])) {
    $strSQL .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_name']) . "%' ";
}
if (!empty($_GET['buy1']) && empty($_GET['buy2'])) {
    $strSQL .= "AND summary_order = '1' ";
} elseif (empty($_GET['buy1']) && !empty($_GET['buy2'])) {
    $strSQL .= "AND summary_order = '2' ";
}

$strSQL .= " ORDER BY date_plan DESC";

// Execute query
$objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");

// Set headers for CSV download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="sales_closure_report_' . date('Ymd_His') . '.csv"');

// Add BOM for UTF-8 support in Excel
echo "\xEF\xBB\xBF";

// Create a file pointer
$output = fopen('php://output', 'w');

// Define column headers for CSV
$headers = [
    'วันที่',
    'โรงพยาบาล',
    'หน่วยงาน',
    'รายการ',
    'มูลค่า',
    'เปอร์เซ็น',
    'เขต',
    'ซื้อ/ไม่ซื้อ',
    'เหตุผล',
    'วันที่ออกบิล'
];

// Write headers to CSV
fputcsv($output, $headers);

// Fetch and write data rows
while ($objResult = mysqli_fetch_array($objQuery)) {
    // Format the product summary
    $product_summary = htmlspecialchars($objResult["summary_product1"]);
    if ($objResult["unit_product1"] != '0') {
        $product_summary .= " " . htmlspecialchars($objResult["unit_product1"]) . " " . htmlspecialchars($objResult["unit_name1"]);
    }

    // Format buy/not buy
    $summary_order = '';
    switch ($objResult["summary_order"]) {
        case '1':
            $summary_order = 'ซื้อ';
            break;
        case '2':
            $summary_order = 'ไม่ซื้อ';
            break;
        default:
            $summary_order = 'N/A';
            break;
    }

    // Prepare row data
    $row = [
        DateThai($objResult["date_plan"]),
        htmlspecialchars($objResult["hospital_name"]),
        htmlspecialchars($objResult["hospital_ward"]),
        $product_summary,
        number_format($objResult["sum_price_product"], 2),
        htmlspecialchars($objResult["percent_name"]),
        htmlspecialchars($objResult["sale_area"]),
        $summary_order,
        htmlspecialchars($objResult["description_order"]),
        DateThai($objResult["date_order"])
    ];

    // Write row to CSV
    fputcsv($output, $row);
}

// Close the file pointer
fclose($output);

// Free the result set
mysqli_free_result($objQuery);

// End output buffering and send content
ob_end_flush();
exit;
?>