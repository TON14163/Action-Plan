<?php
require_once __DIR__ . '/../../config/database.php';

class ReportForecastTime {
    public $conn;
    public $sol;

    public function getTableData($date_start, $date_end, $sale_code) {
        $this->conn = $GLOBALS['conn'];
        $this->sol = $GLOBALS['sol'];

        $result = [
            'rows' => [],
            'real_sales' => 0,
            'new_month_sum' => 0,
            'estimates_sum' => 0,
            'new_month_07' => 0
        ];

        // สร้างข้อมูลเริ่มต้นสำหรับทุก percent_id
        $percent_ids = [1, 2, 3, 4, 5];
        $rows = [];
        foreach ($percent_ids as $percent_id) {
            $rows[$percent_id] = [
                'percent_id' => $percent_id,
                'new_month' => 0,
                'estimates' => 0,
                'col45678' => array_fill(1, 5, 0)
            ];
        }

        // Query รวมสำหรับ Col2NewMonth และ Col3Estimates
        $strSQL = "SELECT percent_id, 
                          SUM(CASE WHEN date_plan LIKE ? THEN sum_price_product ELSE 0 END) AS new_month,
                          SUM(CASE WHEN date_plan NOT LIKE ? THEN sum_price_product ELSE 0 END) AS estimates
                   FROM tb_register_data
                   WHERE summary_order = '1'
                   AND sum_price_product != '0'
                   AND summary_product1 != ''
                   AND percent_id IN (1, 2, 3, 4, 5)
                   AND date_order BETWEEN ? AND ?
                   AND sale_area IN (\"" . $sale_code . "\")
                   GROUP BY percent_id";
        $stmt = mysqli_prepare($this->conn, $strSQL);
        $like_date = '%' . $date_start . '%';
        mysqli_stmt_bind_param($stmt, 'ssss', $like_date, $like_date, $date_start, $date_end);
        mysqli_stmt_execute($stmt);
        $result_query = mysqli_stmt_get_result($stmt);
        while ($data = mysqli_fetch_assoc($result_query)) {
            $percent_id = $data['percent_id'];
            $rows[$percent_id]['new_month'] = $data['new_month'] ?? 0;
            $rows[$percent_id]['estimates'] = $data['estimates'] ?? 0;
        }

        // Query สำหรับ Col45678 ใช้ JOIN
        $strSQL = "SELECT r.percent_id, rt.percent_id AS rt_percent_id, SUM(r.sum_price_product) AS sum_price, COUNT(*) AS count
                   FROM tb_register_data r
                   LEFT JOIN (
                       SELECT id_work, percent_id
                       FROM tb_regist_realtime
                       WHERE sum_price_product != '0'
                       AND summary_product1 != ''
                       AND date_update BETWEEN ? AND ?
                       AND sale_area IN (\"" . $sale_code . "\")
                       GROUP BY id_work
                       HAVING MAX(id_run)
                   ) rt ON r.id_work = rt.id_work
                   WHERE r.summary_order = '0'
                   AND r.summary_product1 != ''
                   AND r.percent_id IN (1, 2, 3, 4, 5)
                   AND r.date_update BETWEEN ? AND ?
                   AND r.sale_area IN (\"" . $sale_code . "\")
                   GROUP BY r.percent_id, rt.percent_id";
        $stmt = mysqli_prepare($this->conn, $strSQL);
        mysqli_stmt_bind_param($stmt, 'ssss', $date_start, $date_end, $date_start, $date_end);
        mysqli_stmt_execute($stmt);
        $result_query = mysqli_stmt_get_result($stmt);
        while ($data = mysqli_fetch_assoc($result_query)) {
            $percent_id = $data['percent_id'];
            $rt_percent_id = $data['rt_percent_id'] ?? 0;
            if ($rt_percent_id > 0) {
                $rows[$percent_id]['col45678'][$rt_percent_id] = ($data['sum_price'] ?? 0) - ($data['count'] ?? 0);
            }
        }

        // Col2NewMonth_r7_c1
        $strSQL = "SELECT SUM(amount) AS amount
                   FROM hos__so
                   LEFT JOIN hos__subso ON hos__so.ref_id = hos__subso.ref_idd
                   WHERE status_doc = 'Approve'
                   AND iv_no != ''
                   AND iv_date BETWEEN ? AND ?
                   AND sale_code IN (\"" . $sale_code . "\")";
        $stmt = mysqli_prepare($this->sol, $strSQL);
        mysqli_stmt_bind_param($stmt, 'ss', $date_start, $date_end);
        mysqli_stmt_execute($stmt);
        $result_query = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($result_query);
        $result['real_sales'] = $data['amount'] ?? 0;

        // Col2NewMonth07
        $strSQL = "SELECT SUM(amount) AS amount
                   FROM hos__so
                   LEFT JOIN hos__subso ON hos__so.ref_id = hos__subso.ref_idd
                   WHERE status_doc = 'Approve'
                   AND iv_no != ''
                   AND plan_ckk = '1'
                   AND iv_date BETWEEN ? AND ?
                   AND sale_code IN (\"" . $sale_code . "\")";
        $stmt = mysqli_prepare($this->sol, $strSQL);
        mysqli_stmt_bind_param($stmt, 'ss', $date_start, $date_end);
        mysqli_stmt_execute($stmt);
        $result_query = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($result_query);
        $result['new_month_07'] = $data['amount'] ?? 0;

        // คำนวณผลรวม
        $result['new_month_sum'] = array_sum(array_column($rows, 'new_month'));
        $result['estimates_sum'] = array_sum(array_column($rows, 'estimates'));
        $result['rows'] = $rows;
        return $result;
    }

    public function sumArray($numbers) {
        return array_sum(array_filter($numbers, 'is_numeric'));
    }
}
?>