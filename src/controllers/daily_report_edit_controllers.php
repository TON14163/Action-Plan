<?php 
require_once __DIR__ . '/../../config/database.php'; // ข้อมูลของ  DB Connection

class DailyReportEdit {
    public $id_work; // PK
    public $product_ID; // PK
    public $columnsName; // Columns Name
    public $conn; // DB Connection allwell_sale
    public $sol; // DB Connection allwell_sol
    
    function showDetails($id_work,$columnsName) {
        $this->conn = $GLOBALS['conn'];
        $this->id_work = htmlspecialchars($id_work, ENT_COMPAT, 'UTF-8');
        $this->columnsName = htmlspecialchars($columnsName, ENT_COMPAT, 'UTF-8');
        $sql = "SELECT $this->columnsName FROM tb_register_data WHERE id_work = '".$this->id_work."' ";
        $qsql = mysqli_query($this->conn,$sql);
        $vsql = mysqli_fetch_array($qsql);
        return $vsql[$this->columnsName];
    }

    function showDelivery($id_work,$columnsName) {
        $this->conn = $GLOBALS['conn'];
        $this->id_work = htmlspecialchars($id_work, ENT_COMPAT, 'UTF-8');
        $this->columnsName = htmlspecialchars($columnsName, ENT_COMPAT, 'UTF-8');
        
        $sql = "SELECT $this->columnsName FROM tb_product_delivery WHERE ref_idwork = '".$this->id_work."' ";
        $qsql = mysqli_query($this->conn,$sql);
        $nsql = mysqli_num_rows($qsql);
        $vsql = mysqli_fetch_array($qsql);
        if($nsql > 0){
            return $vsql[$this->columnsName];
        } else {
            return '';
        }
    }

    function showBooth($id_work,$columnsName) {
        $this->conn = $GLOBALS['conn'];
        $this->id_work = htmlspecialchars($id_work, ENT_COMPAT, 'UTF-8');
        $this->columnsName = htmlspecialchars($columnsName, ENT_COMPAT, 'UTF-8');
        
        $sql = "SELECT $this->columnsName FROM tb_present_booth WHERE ref_idwork = '".$this->id_work."' ";
        $qsql = mysqli_query($this->conn,$sql);
        $nsql = mysqli_num_rows($qsql);
        $vsql = mysqli_fetch_array($qsql);
        if($nsql > 0){
            return $vsql[$this->columnsName];
        } else {
            return '';
        }
    }

    function showCustomerLevel($id_work) {
        $this->conn = $GLOBALS['conn'];
        $this->id_work = htmlspecialchars($id_work, ENT_COMPAT, 'UTF-8');

        $sql = "SELECT r.id_customer,c.id_customer,c.type_cus
        FROM tb_register_data r
        RIGHT JOIN tb_customer_contact c
        ON r.id_customer = c.id_customer
        WHERE id_work = '".$this->id_work."' ";
        $qsql = mysqli_query($this->conn,$sql);
        $vsql = mysqli_fetch_array($qsql);

        switch ($vsql['type_cus']) {
            case '1': $type_cus = '<span class="badge rounded-pill text-bg-secondary" style="background-color: #FF0004; color:#FFFFFF; padding-left: 15px; padding-right: 15px; display: flex; align-items: center;"><img src="assets/images/icon_system/user-solid-24.png" style="width:15px; height:15px; color:#FFFFFF;"> &nbsp; Normal</span>'; break;
            case '2': $type_cus = '<span class="badge rounded-pill text-bg-secondary" style="background-color: #FF0004; color:#FFFFFF; padding-left: 15px; padding-right: 15px; display: flex; align-items: center;"><img src="assets/images/icon_system/user-solid-24.png" style="width:15px; height:15px; color:#FFFFFF;"> &nbsp; VIP</span>'; break;
            case '3': $type_cus = '<span class="badge rounded-pill text-bg-secondary" style="background-color: #FF0004; color:#FFFFFF; padding-left: 15px; padding-right: 15px; display: flex; align-items: center;"><img src="assets/images/icon_system/user-solid-24.png" style="width:15px; height:15px; color:#FFFFFF;"> &nbsp; VVIP</span>'; break;
            default: $type_cus = ''; break;
        }
        return $type_cus;
    }

    function showCustomerLevelNumber($id_work) {
        $this->conn = $GLOBALS['conn'];
        $this->id_work = htmlspecialchars($id_work, ENT_COMPAT, 'UTF-8');

        $sql = "SELECT r.id_customer,c.id_customer,c.type_cus
        FROM tb_register_data r
        RIGHT JOIN tb_customer_contact c
        ON r.id_customer = c.id_customer
        WHERE id_work = '".$this->id_work."' ";
        $qsql = mysqli_query($this->conn,$sql);
        $vsql = mysqli_fetch_array($qsql);
        return $vsql['type_cus'];
    }

    function showProrival(){
        $this->conn = $GLOBALS['conn'];

        $sql = "SELECT id,prorival_name FROM tb_prorival ";
        $qsql = mysqli_query($this->conn,$sql);
        $prorival_name = [];
        while($vsql = mysqli_fetch_array($qsql)){
            $prorival_name .= '<option value="'.$vsql['id'].'">'.$vsql['prorival_name'].'</option>';
        }

        return $prorival_name;
    }

    function showProduct($product_ID,$columnsName) {
        $this->sol = $GLOBALS['sol'];
        $this->product_ID = htmlspecialchars($product_ID, ENT_COMPAT, 'UTF-8');
        $this->columnsName = htmlspecialchars($columnsName, ENT_COMPAT, 'UTF-8');
        $sql = "SELECT $this->columnsName FROM tb_product WHERE product_ID = '".$this->product_ID."' ";
        $qsql = mysqli_query($this->sol,$sql);
        $vsql = mysqli_fetch_array($qsql);
        return $vsql[$this->columnsName];
    }

}
?>