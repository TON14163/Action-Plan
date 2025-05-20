<?php 
require_once __DIR__ . '/../../config/database.php'; // ข้อมูลของ  DB Connection
class ReportQuotation {

    public $conn; // DB Connection allwell_sale
    public $sol; // DB Connection allwell_sol
    
    function showReportQuotation1($id_customer,$columnsName) {
        $sql = "SELECT $columnsName FROM tb_customer_contact WHERE id_customer = '".$id_customer."' ";
        $qsql = mysqli_query($GLOBALS['conn'],$sql);
        $vsql = mysqli_fetch_array($qsql);
        return $vsql[$columnsName];
    }

    function showReportQuotation2($id_work,$columnsName) {
        $sql = "SELECT $columnsName FROM tb_register_data WHERE id_work = '".$id_work."' ";
        $qsql = mysqli_query($GLOBALS['conn'],$sql);
        $vsql = mysqli_fetch_array($qsql);
        return $vsql[$columnsName];
    }
    
}
?>