<?php
ob_start();
require_once __DIR__ . '/../controllers/MainControllersAll.php';

// Auto-export to Excel (CSV format)
function exportToExcel($conn) {
    // Set headers for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="Quotation_Report_' . date('Ymd_His') . '.csv"');
    
    // Add BOM for UTF-8 to support Thai characters in Excel
    echo "\xEF\xBB\xBF";
    
    // Create output stream
    $output = fopen('php://output', 'w');
    
    // Define column headers (in Thai, matching the table)
    $headers = [
        'วันที่',
        'โรงพยาบาล',
        'หน่วยงาน',
        'รายการ',
        'จำนวน',
        'มูลค่า',
        'ประเภท',
        'ผู้ติดต่อ',
        'เปอร์เซ็น',
        'วันที่ได้ P/O',
        'วันที่ส่งของ',
        'เขต'
    ];
    fputcsv($output, $headers);
    
    // Query to fetch data (same as in the table, without LIMIT/OFFSET for full data)
    $sql = "SELECT mode_pro1, date_plan, hospital_name, hospital_ward, summary_quote, summary_product1, remark_pro1, unit_product1, type_cus, pre_name, percent_id, percent_name, month_po, date_request, sale_area, sum_price_product, unit_name1
            FROM tb_register_data 
            WHERE summary_order = '0' AND summary_product1 != '' AND date_request != '0000-00-00' ";
            if($_GET['sale_code'] !="" ){ $sql .= ' AND sale_area = "'.$_GET['sale_code'].'"'; }
            if($_GET['hospital_name'] != '') { $sql .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_name']) . "%' "; }
            if($_GET['percent_name'] != '') { $sql .= "AND percent_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['percent_name']) . "%' "; }
            if(!empty($_GET['date_start']) && !empty($_GET['date_end'])) { $sql .= "AND date_plan BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date_start']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date_end']) . "' "; }
            if(!empty($_GET['date1_buy']) && !empty($_GET['date2_buy'])) { $sql .= "AND date_request BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date1_buy']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date2_buy']) . "' "; }
            if($_GET['prorival_name'] !="" ){ $sql .= ' AND mode_pro1 = "'.$_GET['prorival_name'].'"'; }
            if($_GET['type_cus'] !="" ){ $sql .= ' AND type_cus = "'.$_GET['type_cus'].'"'; }
    $sql .= "ORDER BY date_plan DESC";
    $query = mysqli_query($conn, $sql) or die("Query Error: " . mysqli_error($conn));
    
    // Fetch and write data rows
    while ($row = mysqli_fetch_assoc($query)) {
        // Get type_code for type_cus
        $type_sql = "SELECT type_code FROM tb_typecus WHERE id = '" . mysqli_real_escape_string($conn, $row['type_cus']) . "'";
        $type_query = mysqli_query($conn, $type_sql);
        $type_code = $type_query ? mysqli_fetch_assoc($type_query)['type_code'] ?? '' : '';
        
        // Prepare row data
        $data = [
            DateThai($row['date_plan']),
            $row['hospital_name'],
            $row['hospital_ward'],
            $row['summary_quote'] . $row['summary_product1'] . ' ' . $row['remark_pro1'],
            $row['unit_product1'] != '0' ? $row['unit_product1'] . ' ' . $row['unit_name1'] : '',
            number_format($row['sum_price_product'], 0),
            $type_code,
            $row['pre_name'],
            $row['percent_name'],
            $row['month_po'],
            DateThai($row['date_request']) != '0000-00-00' ? DateThai($row['date_request']) : '',
            $row['sale_area']
        ];
        
        // Write to CSV
        fputcsv($output, $data);
    }
    
    // Close the output stream
    fclose($output);
    exit; // Stop further execution to ensure only the CSV is sent
}

// Trigger export immediately
exportToExcel($conn);
?>