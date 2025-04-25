<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
if(!empty($_REQUEST['id_work'])){
    $id_work = $_REQUEST['id_work'];
    require_once __DIR__ . '/../controllers/daily_report_edit_controllers.php'; // ข้อมูลทั้งหมดจะอยู่ในส่วนนี้
    $show = new DailyReportEdit(); // เรียกใช้งาน class DailyReportEdit นี้ที่มีข้อมูลอยู่มาแสดง

} else {

    $text = 'ไม่พบเลขที่อ้างอิงกรุณาดำเนินการใหม่อีกครั้ง';
    require_once __DIR__ . '/../views/Loading_page.php';
    print "<meta http-equiv=refresh content=3;URL='../Action-Plan/dallyreport'>"; 
    mysqli_close($conn);
    exit;

}
?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ลงทะเบียน Daily Report ( เพิ่มประมาณการขายใหม่ )</b>
</div>
<div class="accordion-item rounded-0 border border-0">
    <p class="accordion-header d-flex align-items-center justify-content-between" style="background-color: #FAFAFA;">
        <span class="rounded-0 border border-0"><input type="checkbox" name="listmain1" id="listmain1" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse1" aria-expanded="true" aria-controls="panelsStayOpen-collapse1" value="1" checked> &nbsp; &nbsp; <label for="listmain1">ประมาณการขาย</label></span>
        <span id="panelsStayOpen-collapse1" class="accordion-collapse collapse show">
            <!-- <a href="https://quotation.allwellcenter.com/" target="_blank" data-bs-toggle="tooltip" data-bs-title="ไปยังเว็บไซต์ quotation.allwellcenter.com"><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 15px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> ใบเสนอราคา</span></a>
            <a href="https://sol.allwellcenter.com/" target="_blank" data-bs-toggle="tooltip" data-bs-title="ไปยังเว็บไซต์ sol.allwellcenter.com"><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 15px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> ERP SALE</span></a> -->
        </span>
    </p>
    <div id="panelsStayOpen-collapse1" class="accordion-collapse collapse show">
        <div class="accordion-body">
            <!--  -->
                <table class="table-thead-custom-awl table-bordered border-secondary">
                    <tr>
                        <th>ลำดับ</th>
                        <th>รายการสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา / หน่วย</th>
                        <th>มูลค่า</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="product-data-container">
                                <input class="form-search-custom-awl" type="text" list="product_onedata1" name="product_onelist" id="product_onelist1" onkeyup="addProductRow('1','product_outlistone1',this.value,'txtHintone1','product_onelist1')" placeholder="Product Search" autocomplete="off" 
                                <?php if($show->showDetails($id_work,'product_id1') != '' ){ ?>
                                        value=""
                                <?php } else { ?>
                                        value="<?php echo $show->showProduct($show->showDetails($id_work,'product_id1'),'sol_name');?>"
                                <?php } ?>
                                />
                                <input type="hidden" name="product_outlistone1" id="product_outlistone1" value="<?php echo $show->showDetails($id_work,'product_id1');?>" />
                                <div id="txtHintone1" name="txtHintMain" style="display: none; position: absolute; text-align: left; max-height: 20em; border: 0 none; overflow-x: hidden; overflow-y: auto; z-index: 999; background-color: #FFFFFF; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:8px; font-size: 0.8em; padding: 0.3em 1em; cursor: pointer;"><?php echo $show->showProduct($show->showDetails($id_work,'product_id1'),'sol_name');?></div>
                            </div>
                        </td>
                        <td><input class="text-center" type="text" name="unit_product1" id="unit_product1" placeholder="0" onchange="CalculatorItem()" value="<?php echo $show->showDetails($id_work,'unit_product1');?>"></td>
                        <td><input class="text-center" type="text" name="price_unit1" id="price_unit1" placeholder="0.00" onchange="CalculatorItem()" value="<?php echo $show->showDetails($id_work,'price_unit1');?>"></td>
                        <td><input class="text-center" type="text" name="price_product1" id="price_product1" placeholder="0.00" value="<?php echo $show->showDetails($id_work,'price_product1');?>" readonly></td>
                    </tr>
                </table>
            <div class="d-flex align-items-center justify-content-between my-4">
                <label for="inputPassword" class="">เปอร์เซ็นต์&nbsp;</label> 
                <select name="percent_code" id="percent_code" style="width: 100px;">
                    <option value="">Please Select</option>
                    <option value="100%|1" <?php if($show->showDetails($id_work,'percent_name') == '100%'){ ?> selected <?php } ?>>100%</option>
                    <option value="90-99%|2" <?php if($show->showDetails($id_work,'percent_name') == '90-99%'){ ?> selected <?php } ?>>90-99%</option>
                    <option value="80-89%|3" <?php if($show->showDetails($id_work,'percent_name') == '80-89%'){ ?> selected <?php } ?>>80-89%</option>
                    <option value="50-80%|4" <?php if($show->showDetails($id_work,'percent_name') == '50-80%'){ ?> selected <?php } ?>>50-80%</option>
                    <option value="0-50%|5" <?php if($show->showDetails($id_work,'percent_name') == '0-50%'){ ?> selected <?php } ?>>0-50%</option>
                </select>
                <label for="inputPassword" class="">วันที่จะได้รับ P/O&nbsp;</label> <input class="text-center" style="width: 143px;" type="date" name="month_po" id="month_po" value="<?php echo $show->showDetails($id_work,'month_po');?>">
                <label for="inputPassword" class="">มูลค่าทั้งหมด&nbsp;</label> <input class="text-center" style="width: 100px;" type="text" name="sum_price_product" id="sum_price_product" placeholder="0" value="<?php echo $show->showDetails($id_work,'sum_price_product');?>" data-bs-toggle="tooltip" data-bs-title="จำนวน*ราคาต่อหน่วย" readonly>
                <label for="inputPassword" class="">วันที่ต้องการสินค้า&nbsp;</label> <input class="text-center" style="width: 143px;" type="date" name="date_request" id="date_request" value="<?php echo $show->showDetails($id_work,'date_request');?>">
                <label for="inputPassword" class="">ประเภท&nbsp;</label>
                <select name="type_cus" id="type_cus"  style="width: 151px;">
                    <option value="">Please Select</option>
                    <option value="1" <?php if($show->showDetails($id_work,'type_cus') == '1'){ ?> selected <?php } ?>>ProA (Project A+ / A)</option>
                    <option value="2" <?php if($show->showDetails($id_work,'type_cus') == '2'){ ?> selected <?php } ?>>NewB (New Building)</option>
                    <option value="3" <?php if($show->showDetails($id_work,'type_cus') == '3'){ ?> selected <?php } ?>>NewF (New Forecast)</option>
                    <option value="4" <?php if($show->showDetails($id_work,'type_cus') == '4'){ ?> selected <?php } ?>>Pre/B (Present / Booth)</option>
                    <option value="5" <?php if($show->showDetails($id_work,'type_cus') == '5'){ ?> selected <?php } ?>>ลูกค้าทั่วไป / เจ้าหน้าที่รพ.</option>
                </select>
            </div>
            <div>
                <textarea class="textarea-form-control" style="width:100%;" name="description_focastnew" id="description_focastnew"  rows="3" placeholder=" รายละเอียดงาน : เพิ่มประมาณการขายใหม่"><?php echo $show->showDetails($id_work,'description_focastnew');?></textarea>
            </div>
            <!--  -->
        </div>
    </div>
</div>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
<script>
    function CalculatorItem() {
        let count = 0;
        const unit_product1 = document.getElementById('unit_product1').value;
        const price_unit1 = document.getElementById('price_unit1').value;

        if (!isNaN(unit_product1) && !isNaN(price_unit1)) {
            count = parseFloat(unit_product1) * parseFloat(price_unit1);
            document.getElementById('price_product1').value = count.toFixed(2);
            document.getElementById('sum_price_product').value = count.toFixed(2);
        } else {
            document.getElementById('price_product1').value = "0.00";
            document.getElementById('sum_price_product').value = "0.00";
        }
    }

    function addProductRow(rowNum, fieldName, searchTerm, txtHint, product_twolist) {
        if (!searchTerm.trim() || searchTerm.length == 0) {
            document.getElementById(`${txtHint}`).innerHTML = "";
            document.getElementById(`${txtHint}`).style.display = "none";
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById(`${txtHint}`).innerHTML = this.responseText;
                document.getElementById(`${txtHint}`).style.display = "block";
            }
        };
        
        xhr.open("GET", "./src/controllers/product_list_controllers.php?q=" + encodeURIComponent(searchTerm) + "&rowNum=" + rowNum + "&fieldName=" + encodeURIComponent(fieldName) + "&txtHint=" + encodeURIComponent(txtHint) + "&product_twolist=" + encodeURIComponent(product_twolist), true);
        xhr.send();
    }
</script>
