<?php 
require_once __DIR__ . '/../../config/database.php'; // ข้อมูลของ  DB Connection
class ReportForecastTime {
    public $id_story; // PK
    public $columnsName; // Columns Name
    public $conn; // DB Connection allwell_sale
    public $sol; // DB Connection allwell_sol

    function Col2NewMonth($summary_order, $date_start, $date_end, $sale_code, $percent_id) {
        $this->conn = $GLOBALS['conn'];
        $sale_code_str = is_array($sale_code) ? implode("','", array_map('mysqli_real_escape_string', array_fill(0, count($sale_code), $this->conn), $sale_code)) : mysqli_real_escape_string($this->conn, $sale_code);
        $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  
        FROM tb_register_data 
        WHERE 
        summary_order = '" . mysqli_real_escape_string($this->conn, $summary_order) . "' AND
        sum_price_product != '0' AND
        summary_product1 != '' AND
        percent_id = '" . mysqli_real_escape_string($this->conn, $percent_id) . "' AND
        date_plan LIKE '%" . mysqli_real_escape_string($this->conn, substr($date_start, 0, -3)) . "%' AND
        ( date_order BETWEEN '" . mysqli_real_escape_string($this->conn, $date_start) . "' AND '" . mysqli_real_escape_string($this->conn, $date_end) . "' ) AND
        sale_area IN ('" . $sale_code_str . "')  ";
        $objQuery = mysqli_query($this->conn, $strSQL) or die ("Error Query [" . $strSQL . "]");
        $viewSql = mysqli_fetch_array($objQuery);	
        return isset($viewSql["sum_price_product"]) ? $viewSql["sum_price_product"] : "0";
    }

    function Col2NewMonth_r7_c1($date_start, $date_end, $sale_code) {
        $this->sol = $GLOBALS['sol'];
        $sale_code_str = is_array($sale_code) ? implode("','", array_map('mysqli_real_escape_string', array_fill(0, count($sale_code), $this->sol), $sale_code)) : mysqli_real_escape_string($this->sol, $sale_code);
        $strSQL = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) 
        WHERE 
        status_doc = 'Approve' AND
        iv_no !='' AND
        ( iv_date BETWEEN '" . mysqli_real_escape_string($this->sol, $date_start) . "' AND '" . mysqli_real_escape_string($this->sol, $date_end) . "' ) AND
        sale_code IN ('" . $sale_code_str . "') ";
        $objQuery = mysqli_query($this->sol, $strSQL) or die ("Error Query [" . $strSQL . "]");
        $viewSql = mysqli_fetch_array($objQuery);	
        return isset($viewSql["amount"]) ? $viewSql["amount"] : "0";
    }

    function Col2NewMonth07($date_start, $date_end, $sale_code) {
        $this->sol = $GLOBALS['sol'];
        $sale_code_str = is_array($sale_code) ? implode("','", array_map('mysqli_real_escape_string', array_fill(0, count($sale_code), $this->sol), $sale_code)) : mysqli_real_escape_string($this->sol, $sale_code);
        $strSQL = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) 
        WHERE 
        status_doc = 'Approve' AND
        iv_no !='' AND
        plan_ckk ='1' AND
        ( iv_date BETWEEN '" . mysqli_real_escape_string($this->sol, $date_start) . "' AND '" . mysqli_real_escape_string($this->sol, $date_end) . "' ) AND
        sale_code IN ('" . $sale_code_str . "') ";
        $objQuery = mysqli_query($this->sol, $strSQL) or die ("Error Query [" . $strSQL . "]");
        $viewSql = mysqli_fetch_array($objQuery);	
        return isset($viewSql["amount"]) ? $viewSql["amount"] : "0";
    }
    
    function Col3Estimates($summary_order, $date_start, $date_end, $sale_code, $percent_id) {
        $this->conn = $GLOBALS['conn'];
        $sale_code_str = is_array($sale_code) ? implode("','", array_map('mysqli_real_escape_string', array_fill(0, count($sale_code), $this->conn), $sale_code)) : mysqli_real_escape_string($this->conn, $sale_code);
        $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data 
        WHERE 
        summary_order = '" . mysqli_real_escape_string($this->conn, $summary_order) . "' AND
        sum_price_product != '0' AND
        summary_product1 != '' AND
        percent_id = '" . mysqli_real_escape_string($this->conn, $percent_id) . "' AND
        date_plan NOT LIKE '%" . mysqli_real_escape_string($this->conn, substr($date_start, 0, -3)) . "%' AND
        sale_area IN ('" . $sale_code_str . "') ";
        if ($date_start != "") { $strSQL .= " AND date_order >= '" . mysqli_real_escape_string($this->conn, $date_start) . "'"; }
        if ($date_end != "") { $strSQL .= " AND date_order <= '" . mysqli_real_escape_string($this->conn, $date_end) . "'"; }
        $objQuery = mysqli_query($this->conn, $strSQL) or die ("Error Query [" . $strSQL . "]");
        $viewSql = mysqli_fetch_array($objQuery);	
        return isset($viewSql["sum_price_product"]) ? $viewSql["sum_price_product"] : "0";
    }
    
    function NewSalesEstimates($summary_order, $date_start, $date_end, $sale_code, $percent_id) {
        $this->conn = $GLOBALS['conn'];
        $sale_code_str = is_array($sale_code) ? implode("','", array_map('mysqli_real_escape_string', array_fill(0, count($sale_code), $this->conn), $sale_code)) : mysqli_real_escape_string($this->conn, $sale_code);
        $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data 
        WHERE 
        summary_order = '" . mysqli_real_escape_string($this->conn, $summary_order) . "' AND
        sum_price_product != '0' AND
        summary_product1 != '' AND
        percent_id = '" . mysqli_real_escape_string($this->conn, $percent_id) . "' AND
        ( date_plan BETWEEN '" . mysqli_real_escape_string($this->conn, $date_start) . "' AND '" . mysqli_real_escape_string($this->conn, $date_end) . "' ) AND
        sale_area IN ('" . $sale_code_str . "') ";
        $objQuery = mysqli_query($this->conn, $strSQL) or die ("Error Query [" . $strSQL . "]");
        $viewSql = mysqli_fetch_array($objQuery);	
        return isset($viewSql["sum_price_product"]) ? $viewSql["sum_price_product"] : "0";
    }

    function Actualsales($summary_order, $date_start, $date_end, $dateM, $sale_code, $percent_id) {
        $this->conn = $GLOBALS['conn'];
        $sale_code_str = is_array($sale_code) ? implode("','", array_map('mysqli_real_escape_string', array_fill(0, count($sale_code), $this->conn), $sale_code)) : mysqli_real_escape_string($this->conn, $sale_code);
        $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  
        FROM tb_register_data 
        WHERE summary_order = '" . mysqli_real_escape_string($this->conn, $summary_order) . "' 
        AND sum_price_product != '0'
        AND summary_product1 != '' 
        AND percent_id = '" . mysqli_real_escape_string($this->conn, $percent_id) . "' 
        AND sale_area IN ('" . $sale_code_str . "')  ";

        if ($dateM == 'date_update') {
            if ($date_start != "") { $strSQL .= " AND date_update >= '" . mysqli_real_escape_string($this->conn, $date_start) . "'"; }
            if ($date_end != "") { $strSQL .= " AND date_update <= '" . mysqli_real_escape_string($this->conn, $date_end) . "'"; }
            if ($date_start != "") { $strSQL .= " AND date_plan <= '" . mysqli_real_escape_string($this->conn, $date_start) . "'"; }
        } else if ($dateM == 'date_plan') {
            if ($date_start != "") { $strSQL .= " AND date_plan > '" . mysqli_real_escape_string($this->conn, $date_start) . "'"; }
            if ($date_end != "") { $strSQL .= " AND date_plan <= '" . mysqli_real_escape_string($this->conn, $date_end) . "'"; }
        }

        $objQuery = mysqli_query($this->conn, $strSQL) or die ("Error Query [" . $strSQL . "]");
        $viewSql = mysqli_fetch_array($objQuery);	
        return isset($viewSql["sum_price_product"]) ? $viewSql["sum_price_product"] : "0";
    }

    function sumArray($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if (is_numeric($number)) {
                $sum += (float)$number;
            }
        }
        return $sum;
    }

    function Col45678($date_start, $date_end, $sale_code, $percent_id, $percent) {
        $this->conn = $GLOBALS['conn'];
        $sale_code_str = is_array($sale_code) ? implode("','", array_map('mysqli_real_escape_string', array_fill(0, count($sale_code), $this->conn), $sale_code)) : mysqli_real_escape_string($this->conn, $sale_code);
        $strSQL1 = "SELECT id_work, sum_price_product FROM tb_register_data 
        WHERE
        summary_order = '0' AND
        summary_product1 != '' AND
        percent_id = '" . mysqli_real_escape_string($this->conn, $percent_id) . "' AND
        sale_area IN ('" . $sale_code_str . "') ";
        $strSQL1 .= " AND ( date_update BETWEEN '" . mysqli_real_escape_string($this->conn, $date_start) . "' AND '" . mysqli_real_escape_string($this->conn, $date_end) . "') ";
        $objQuery1 = mysqli_query($this->conn, $strSQL1);

        $sum = 0;
        $i = 0;

        while ($objResult1 = mysqli_fetch_array($objQuery1)) {
            $strSQL = "SELECT id_work, sum_price_product, percent_id  FROM tb_regist_realtime  
            WHERE id_work = '" . mysqli_real_escape_string($this->conn, $objResult1["id_work"]) . "'
            AND sum_price_product != '0'
            AND summary_product1 != ''
            AND sale_area IN ('" . $sale_code_str . "') 
            ";
            $strSQL .= " AND date_update <= '" . mysqli_real_escape_string($this->conn, $date_start) . "' ";
            $strSQL .= " ORDER BY id_run DESC ";

            $objQuery = mysqli_query($this->conn, $strSQL);
            $objResult = mysqli_fetch_array($objQuery);

            if ($objResult && isset($objResult["percent_id"]) && $objResult["percent_id"] == $percent) {
                $sum = $objResult1["sum_price_product"] + $sum;
                $sum++;
                $i++;
            }
        }
        $result = $sum - $i; 
        return isset($result) ? $result : "0";
    }
}
?>