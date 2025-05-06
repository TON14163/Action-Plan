<?php 
require_once __DIR__ . '/../../config/database.php'; // ข้อมูลของ  DB Connection
class ReportCompetitor {
    public $id_story; // PK
    public $columnsName; // Columns Name
    public $conn; // DB Connection allwell_sale
    public $sol; // DB Connection allwell_sol
    
    function showDetails($id_story,$columnsName) {
        $this->conn = $GLOBALS['conn'];
        $this->id_story = htmlspecialchars($id_story, ENT_COMPAT, 'UTF-8');
        $this->columnsName = htmlspecialchars($columnsName, ENT_COMPAT, 'UTF-8');
        $sql = "SELECT $this->columnsName FROM tb_storyrival WHERE id_story = '".$this->id_story."' ";
        $qsql = mysqli_query($this->conn,$sql);
        $vsql = mysqli_fetch_array($qsql);
        return $vsql[$this->columnsName];
    }
}
?>