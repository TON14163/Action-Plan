<?php 
ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
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
    <b style="font-size: 20px;">ลงทะเบียน Daily Report</b> <span>( เพิ่มประมาณการขายใหม่ Status <kbd style="background-color: #EBE4ED; width: 10px; max-height: 10px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ plan ไว้แล้ว )</span> 
</div>
<!--  -->
            <form action="daily_report_plannew_save" method="post">
                    <div class="row my-2">
                        <div class="col-1 text-center">วันที่ : </div>
                        <div class="col-2"> <input style="background-color: #e0e0e0; cursor:no-drop;" type="date" name="date_plan" id="date_plan" value="<?php echo $show->showDetails($id_work,'date_plan');?>" readonly></div>
                        <div class="col-1 text-center">แผนงาน : </div>
                        <div class="col-8"><input style="width: 100%; background-color: #e0e0e0; cursor:no-drop;" type="text" name="plan_work" id="plan_work" value="<?php echo $show->showDetails($id_work,'plan_work');?>" placeholder="รายละเอียดแผนงาน . . ." readonly> </div>
                    </div>
                <input type="hidden" name="id_work" id="id_work" value="<?php echo $id_work;?>">
                <input type="hidden" name="id_customer" id="id_customer" value="<?php echo $show->showDetails($id_work,'id_customer');?>">
                <input type="hidden" name="cus_free" id="cus_free" value="<?php echo $show->showCustomerLevelNumber($id_work);?>">
                <table class="table-thead-custom-awl table-bordered border-secondary" style="width: 100%; table-layout: fixed;">
                    <tr>
                        <th style="width: 10%;">ลำดับ</th>
                        <th style="width: 30%;">รายการสินค้า</th>
                        <th style="width: 30%;">หมายเหตุ</th>
                        <th style="width: 10%;">จำนวน</th>
                        <th style="width: 10%;">ราคา / หน่วย</th>
                        <th style="width: 10%;">มูลค่า</th>
                    </tr>
                    <tr>
                        <td style="padding: 5px;">1</td>
                        <td style="padding: 5px;">
                            <div class="product-data-container">
                                <input class="form-search-custom-awl" type="text" list="product_onedata1" name="product_onelist" id="product_onelist1" onkeyup="addProductRow('1','product_outlistone1',this.value,'txtHintone1','product_onelist1')" placeholder="Product Search" autocomplete="off" value="" required/>
                                <input type="hidden" name="product_outlistone1" id="product_outlistone1" value="<?php echo $show->showDetails($id_work,'product_id1');?>" />
                                <div id="txtHintone1" name="txtHintMain" style="display: none; position: absolute; text-align: left; max-height: 20em; border: 0 none; overflow-x: hidden; overflow-y: auto; z-index: 999; background-color: #FFFFFF; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:8px; font-size: 0.8em; padding: 0.3em 1em; cursor: pointer;"><?php echo $show->showProduct($show->showDetails($id_work,'product_id1'),'product_name');?></div>
                            </div>
                        </td>
                        <td style="vertical-align: middle; text-align: center; padding:12px 5px 5px 5px;">
                            <textarea style="width:100%; height: 24px; padding:0px;" name="remark_pro1" id="remark_pro1"></textarea>
                        </td>
                        <td style="padding: 5px;"><input class="text-center" style="width: 100%;" type="text" name="unit_product1" id="unit_product1" placeholder="0" onchange="CalculatorItem()" value="" required></td>
                        <td style="padding: 5px;"><input class="text-center" style="width: 100%;" type="text" name="price_unit1" id="price_unit1" placeholder="0.00" onchange="CalculatorItem()" value="" required></td>
                        <td style="padding: 5px;"><input class="text-center" style="background-color: #e0e0e0; width: 100%; cursor:no-drop;" type="text" name="price_product1" id="price_product1" placeholder="0.00" value="" readonly></td>
                    </tr>
                </table>
                <div class="d-flex align-items-center justify-content-between my-4">
                    <label for="inputPassword" class="">เปอร์เซ็นต์&nbsp;</label> 
                    <select name="percent_code" id="percent_code" style="width: 100px;" required>
                        <option value="">Please Select</option>
                        <option value="100 %|1">100 %</option>
                        <option value="90-99 %|2">90-99 %</option>
                        <option value="80-89 %|3">80-89 %</option>
                        <option value="50-80 %|4">50-80 %</option>
                        <option value="0-50 %|5">0-50 %</option>
                    </select>
                    <label for="inputPassword" class="">วันที่จะได้รับ P/O&nbsp;</label> <input class="text-center" style="width: 143px;" type="date" name="month_po" id="month_po" value="">
                    <label for="inputPassword" class="">มูลค่าทั้งหมด&nbsp;</label> <input class="text-center" style="width: 100px; background-color: #e0e0e0; cursor:no-drop;" type="text" name="sum_price_product" id="sum_price_product" placeholder="0" value="" data-bs-toggle="tooltip" data-bs-title="จำนวน*ราคาต่อหน่วย" readonly>
                    <label for="inputPassword" class="">วันที่ต้องการสินค้า&nbsp;</label> <input class="text-center" style="width: 143px;" type="date" name="date_request" id="date_request" value="">
                    <label for="inputPassword" class="">ประเภท&nbsp;</label>
                    <select name="type_cus" id="type_cus" style="width: 151px;">
                        <option value="">Please Select</option>
                        <option value="1">ProA (Project A+ / A)</option>
                        <option value="2">NewB (New Building)</option>
                        <option value="3">NewF (New Forecast)</option>
                        <option value="4">Pre/B (Present / Booth)</option>
                        <option value="5">ลูกค้าทั่วไป / เจ้าหน้าที่รพ.</option>
                    </select>
                </div>
                <div>
                    <textarea class="textarea-form-control" style="width:100%;" name="description_focastnew" id="description_focastnew"  rows="3" placeholder=" รายละเอียดงาน : เพิ่มประมาณการขายใหม่"><?php echo $show->showDetails($id_work,'description_focastnew');?></textarea>
                </div>
                <span>
                    <label for="proceed1" class="badge rounded-pill" style="background-color: #19D700; color:#FFFFFF; padding-left: 15px; padding-right: 15px; margin-right: 10px; cursor: pointer;" data-bs-toggle="tooltip" data-bs-title="งานที่สร้างจากประมาณการขาย"><img src="assets/images/icon_system/icon-park--save-one.png" style="width:15px; height:15px; color:#FFFFFF;"> &nbsp; บันทึก</label>
                    <input type="submit" value="บันทึก" id="proceed1" name="proceed1" style="display: none;">
                </span>
            </form>
            <div>
                <p style="font-size: 12px; color:#FF0004; margin-top: 5px;">
                    <b>*หมายเหตุ</b>
                    <br>
                    # ข้อมูลพื้นฐาน<ins>ลูกค้า</ins>จะดึงมาจากใบปัจุบันที่ท่านได้เปิดก่อนหน้านี้ <br>
                    หลังจากบันทึกข้อมูลไปแล้วจะเด้งไปยังหน้า ลงทะเบียน Daily Report ใบนี้ที่สร้างมาใหม่
                </p>
            </div>
<!--  -->
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
