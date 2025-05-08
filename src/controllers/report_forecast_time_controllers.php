<?php 
require_once __DIR__ . '/../../config/database.php'; // ข้อมูลของ  DB Connection
class ReportForecastTime {
    public $id_story; // PK
    public $columnsName; // Columns Name
    public $conn; // DB Connection allwell_sale
    public $sol; // DB Connection allwell_sol

    function Col2NewMonth($summary_order,$date_start,$date_end,$sale_code,$percent_id){
        $this->conn = $GLOBALS['conn'];
        $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  
        FROM tb_register_data 
        WHERE 
        summary_order = '".$summary_order."' AND
        sum_price_product != '0' AND
        summary_product1 != '' AND
        percent_id = '".$percent_id."' AND
        date_plan LIKE '%".$date_start."%' AND
        ( date_order BETWEEN '".$date_start."' AND '".$date_end."' ) AND
        sale_area = '".$sale_code."' ";
        $objQuery = mysqli_query($this->conn,$strSQL) or die ("Error Query [".$strSQL."]");
        $viewSql = mysqli_fetch_array($objQuery);	
        return isset($viewSql["sum_price_product"]) ? $viewSql["sum_price_product"] : "0";
    }

    function Col2NewMonth_r7_c1($date_start,$date_end,$sale_code){
        $this->sol = $GLOBALS['sol'];
        $strSQL = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) 
        WHERE 
        status_doc = 'Approve' AND
        iv_no !='' AND
        ( iv_date BETWEEN '".$date_start."' AND '".$date_end."' ) AND
        sale_code = '".$sale_code."' ";
        $objQuery = mysqli_query($this->sol,$strSQL) or die ("Error Query [".$strSQL."]");
        $viewSql = mysqli_fetch_array($objQuery);	
        return isset($viewSql["amount"]) ? $viewSql["amount"] : "0";
    }

    function Col2NewMonth07($date_start,$date_end,$sale_code){
        $this->sol = $GLOBALS['sol'];
        $strSQL = "SELECT SUM(amount) AS amount  FROM (hos__so  LEFT JOIN hos__subso ON hos__so.ref_id=hos__subso.ref_idd) 
        WHERE 
        status_doc = 'Approve' AND
        iv_no !='' AND
        plan_ckk ='1' AND
        ( iv_date BETWEEN '".$date_start."' AND '".$date_end."' ) AND
        sale_code = '".$sale_code."' ";
        $objQuery = mysqli_query($this->sol,$strSQL) or die ("Error Query [".$strSQL."]");
        $viewSql = mysqli_fetch_array($objQuery);	
        return isset($viewSql["amount"]) ? $viewSql["amount"] : "0";
    }
    
    function Col3Estimates($summary_order,$date_start,$date_end,$sale_code,$percent_id){
        $this->conn = $GLOBALS['conn'];
        $strSQL = "SELECT SUM(sum_price_product) AS sum_price_product  FROM tb_register_data 
        WHERE 
        summary_order = '".$summary_order."' AND
        sum_price_product != '0' AND
        summary_product1 != '' AND
        percent_id = '".$percent_id."' AND
        date_plan NOT LIKE '%".$date_start."%' AND
        ( date_order BETWEEN '".$date_start."' AND '".$date_end."' ) AND
        sale_area ='".$sale_code."'";
        $objQuery = mysqli_query($this->conn,$strSQL) or die ("Error Query [".$strSQL."]");
        $viewSql = mysqli_fetch_array($objQuery);	
        return isset($viewSql["sum_price_product"]) ? $viewSql["sum_price_product"] : "0";
    }

    function sumArray($numbers){
        $sum = 0;
        foreach ($numbers as $number) {
            // ตรวจสอบว่าเป็นตัวเลขหรือสามารถแปลงเป็นตัวเลขได้
            if (is_numeric($number)) {
                $sum += (float)$number; // แปลงเป็น float เพื่อความปลอดภัย
            }
        }
        return $sum;
    }

    //100%	
    function Col45678($date_start,$date_end,$sale_code,$percent_id,$percent){
        $this->conn = $GLOBALS['conn'];
        $strSQL1 = "SELECT id_work,sum_price_product FROM tb_register_data 
        WHERE
        summary_order = '0' AND
        summary_product1 != '' AND
        percent_id = '".$percent_id."' AND
        ( date_update BETWEEN '".$date_start."' AND '".$date_end."' ) AND
        sale_area = '" . $sale_code . "'";
        $objQuery1 = mysqli_query($this->conn, $strSQL1);

        $sum = 0;
        $i = 0;

        while ($objResult1 = mysqli_fetch_array($objQuery1)) {

            $strSQL = "SELECT sum_price_product,percent_id  FROM tb_regist_realtime  
            WHERE
            id_work = '" . $objResult1["id_work"] . "' AND
            sum_price_product != '0' AND
            summary_product1 != '' AND
            ( date_update BETWEEN '".$date_start."' AND '".$date_end."' ) AND
            sale_area = '" . $sale_code . "' 
            order by id_run DESC";

            $objQuery = mysqli_query($this->conn, $strSQL);
            $objResult = mysqli_fetch_array($objQuery);


            if ($objResult["percent_id"] == $percent) {
                $sum = $objResult1["sum_price_product"] + $sum;
                $sum++;
                $i++;
            }
        }
        $result = $sum-$i; 
        return $result;
    }


}
?>


