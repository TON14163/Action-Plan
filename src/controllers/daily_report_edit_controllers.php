<?php 
require_once __DIR__ . '/../../config/database.php'; // ข้อมูลของ  DB Connection

class DailyReportEdit {
    public $id_work; // PK
    public $id_story; // PK
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
    
    function showStoryrival($id_work,$columnsName) {
        $this->conn = $GLOBALS['conn'];
        $this->id_work = htmlspecialchars($id_work, ENT_COMPAT, 'UTF-8');
        $this->columnsName = htmlspecialchars($columnsName, ENT_COMPAT, 'UTF-8');
        
        $sql = "SELECT $this->columnsName FROM tb_storyrival WHERE refid_work = '".$this->id_work."' ";
        $qsql = mysqli_query($this->conn,$sql);
        $nsql = mysqli_num_rows($qsql);
        $vsql = mysqli_fetch_array($qsql);
        if($nsql > 0){
            return $vsql[$this->columnsName];
        } else {
            return '';
        }
    }

    function showStoryrivalNo_auto($id_work,$columnsName) {
        $this->conn = $GLOBALS['conn'];
        $this->id_work = htmlspecialchars($id_work, ENT_COMPAT, 'UTF-8');
        $this->columnsName = htmlspecialchars($columnsName, ENT_COMPAT, 'UTF-8');
        
        $sql = "SELECT $this->columnsName FROM tb_storyrival WHERE refid_work = '".$this->id_work."' ORDER BY no_auto DESC ";
        $qsql = mysqli_query($this->conn,$sql);
        $nsql = mysqli_num_rows($qsql);
        $vsql = mysqli_fetch_array($qsql);
        if($nsql > 0){
            return $vsql['no_auto']+1;
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

    function showProrivalName(){
        $this->conn = $GLOBALS['conn'];
        $sql = "SELECT id,prorival_name FROM tb_prorival ";
        $qsql = mysqli_query($this->conn,$sql);
        $vsql = mysqli_fetch_array($qsql);
        return $vsql['prorival_name'];
    }
    
    function showProrivalValue($idpk){
        $this->conn = $GLOBALS['conn'];
        $sql = "SELECT id,prorival_name FROM tb_prorival WHERE id = '".$idpk."' ";
        $qsql = mysqli_query($this->conn,$sql);
        $vsql = mysqli_fetch_array($qsql);
        return $vsql['prorival_name'];
    }

    function showProduct($product_ID,$columnsName) {
        $this->conn = $GLOBALS['conn'];
        $this->product_ID = htmlspecialchars($product_ID, ENT_COMPAT, 'UTF-8');
        $this->columnsName = htmlspecialchars($columnsName, ENT_COMPAT, 'UTF-8');
        $sql = "SELECT $this->columnsName FROM tb_product WHERE product_ID = '".$this->product_ID."' ";
        $qsql = mysqli_query($this->conn,$sql);
        $vsql = mysqli_fetch_array($qsql);
        return $vsql[$this->columnsName];
    }


    function InfoList4Table($id_work){
        $this->conn = $GLOBALS['conn'];
        $this->id_work = htmlspecialchars($id_work, ENT_COMPAT, 'UTF-8');

        $sql = "SELECT * FROM tb_storyrival WHERE refid_work = '".$this->id_work."' ORDER BY no_auto ASC ";
        $qsql = mysqli_query($this->conn,$sql);
        $nsql = mysqli_num_rows($qsql);

        if($nsql > 0){
            $viewMain = "";
            while($vsql = mysqli_fetch_array($qsql)){
            $viewMain .= "
            <div class='table-responsive p-2'>
            <table class='table-thead-custom-awl table-bordered border-secondary' style='width: 100%;'>
                <tr>
                        <th style='width: 25%;'>ประเภทสินค้า</th>
                        <th style='width: 15%;'>บริษัท</th>
                        <th style='width: 15%;'>ยี่ห้อ</th>
                        <th style='width: 15%;'>รุ่น</th>
                        <th style='width: 10%;'>ราคา/หน่วย</th>
                        <th style='width: 10%;'>จำนวนซื้อ</th>
                        <th style='width: 10%;'>เงื่อนไขพิเศษ</th>
                </tr>
                <tr>
                    <td style='padding: 8px;'>
                        <select class='form-search-custom-awl' style='width: 100%;' name='h_product_rival[]' id='h_product_rival1'>
                        <option value=".$vsql['h_product_rival'].">".$vsql['product_rival']."</option>
                            <option value=''>Search</option>";
                            $sql2 = "SELECT id,prorival_name FROM tb_prorival ";
                            $qsql2 = mysqli_query($this->conn,$sql2);
                            while($vsql2 = mysqli_fetch_array($qsql2)){
                                $viewMain .= '<option value="'.$vsql2['id'].'">'.$vsql2['prorival_name'].'</option>';
                            }
                            $viewMain .="
                        </select>
                    </td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='text' name='company_rival[]' id='company_rival1' placeholder='Please fill out' value=".$vsql['company_rival']."></td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='text' name='rival_brand[]' id='rival_brand1' placeholder='Please fill out' value=".$vsql['rival_brand']."></td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='text' name='rival_model[]' id='rival_model1' placeholder='Please fill out' value=".$vsql['rival_model']."></td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='number' name='price_to_unit[]' id='price_to_unit1' value=".$vsql['price_to_unit']."></td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='number' name='unit[]' id='unit1' value=".$vsql['unit']."></td>
                    <td style='padding: 8px;'><input style='width: 100%;' type='text' name='promotion[]' id='promotion1' value=".$vsql['promotion']."></td>
                </tr>
            </table>
            </div>
            <p class='p-2'>
                หมายเหตุ
                <textarea class='textarea-form-control' style='width:100%;' name='description[]' id='description1' rows='3'>".$vsql['description']."</textarea>
            </p>
            <input hidden='text' name='no_auto[]' id='no_auto".$vsql['no_auto']."' value=".$vsql['no_auto'].">
            <input type='hidden' name='id_story[]' id='id_story".$vsql['id_story']."' value=".$vsql['id_story'].">


<div style='display: flex; justify-content: space-between; align-items: center;'>

<span>
<span class='badge rounded-pill' style='background-color: #525252; color:#FFFFFF; padding-left: 10px; cursor: pointer;'>ไฟล์ที่แนบ</span>
";
$images = json_decode($vsql['file_nap1'], true);
foreach ($images as $image) {
    $viewMain .= "<a class='list2file1_allfile1Styel' href='uploads/{$image['file']}' target='_blank' rel='noopener noreferrer'>{$image['file']}</a>&nbsp;";
}
$viewMain .= "
</span>
<span>
    <span class='badge rounded-pill multi-delete' style='background-color: #FF0004; color:#FFFFFF; padding: 5px 10px; cursor: pointer;' onclick='deleteList4(".$this->id_work.",".$vsql['id_story'].")'> - ลบข้อมูลคู่แข่ง</span>
</span>
</div>
            <hr style='border: 1px dashed #000;'>
                ";
            }
            return $viewMain;
        } 
    }
}
?>
