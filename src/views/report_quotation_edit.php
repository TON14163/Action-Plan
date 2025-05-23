<?php 
    ob_start(); // เปิดใช้งานการเก็บข้อมูล content
    require_once __DIR__ . '/../controllers/report_quotation_controllers.php';
    $show = new ReportQuotation();
    require_once __DIR__ . '/../controllers/daily_report_edit_controllers.php';
    $show1 = new DailyReportEdit();
    $id_work = $_REQUEST['id_work'];
    $id_customer = $_REQUEST['id_customer'];
    $warp = $_REQUEST['warp'];
?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานประมาณการขาย [Forcast]</b>
</div>
    <section style="padding: 10px 0%;" class="font-custom-awl-14">
        <form action="report_quotation_save" method="post">
            <span class="my-2">วันที่ :  <input type="date" name="date_plan" id="date_plan" required></span>
            <input type="hidden" name="id_customer" id="id_customer" value="<?php echo $show->showReportQuotation1($id_customer,'id_customer');?>">
            <input type="hidden" name="id_work" id="id_work" value="<?php echo $show->showReportQuotation2($id_work,'id_work');?>">
            <input type="hidden" name="cus_free" id="cus_free" value="<?php echo $show1->showCustomerLevelNumber($id_work);?>">
            <input type="hidden" name="warp" id="warp" value="<?php echo $warp;?>">

                <div class="row p-3 pt-2 rounded-3" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; line-height: 2.5;">
                    <div class="col-12 d-flex justify-content-between">
                        <span><label for="hospital_name">โรงพยาบาล :&nbsp;</label><input type="text" name="hospital_name" id="hospital_name" value="<?php echo $show->showReportQuotation2($id_work,'hospital_name');?>" required></span>
                        <span><label for="hospital_buiding">ตึก :&nbsp;</label><input class="border border-danger" type="text" name="hospital_buiding" id="hospital_buiding" value="<?php  echo $show->showReportQuotation1($id_customer,'hospital_buiding');?>" required></span>
                        <span><label for="hospital_class">ชั้น :&nbsp;</label><input class="border border-danger" type="text" name="hospital_class" id="hospital_class" value="<?php  echo $show->showReportQuotation1($id_customer,'hospital_class');?>" required></span>
                        <span><label for="hospital_ward">Ward :&nbsp;</label><input class="border border-danger" type="text" name="hospital_ward" id="hospital_ward" value="<?php  echo $show->showReportQuotation1($id_customer,'hospital_ward');?>" required></span>
                        
                    </div>
                    <div class="col-12" style="line-height: 1;">
                        <small style="font-size: 10px; color:#ff8080; ">
                            **กรุณาพิมพ์ข้อมูลบางส่วนเพื่อเลือกชื่อโรงพยาบาล หากไม่มีชื่อโรงพยาบาลที่ต้องการรบกวนแจ้ง IT <br>
                            **หมายเหตุ : หากแก้ไขข้อมูลในช่องสีแดงจะ Save ทับข้อมูลของผู้ติดต่อในฐานด้วยค่ะ
                        </small>
                    </div>
                </div>

                <div class="row mt-3 p-3 pt-2 rounded-3" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; line-height: 2.5;">
                    <div class="row">
                        <?php for ($i = 1; $i <= 10; $i++): ?>
                            <div class="col-4">
                                ผู้ติดต่อ <?php echo $i; ?> : 
                                <input type="text" name="hospital_contact<?php echo $i; ?>" id="hospital_contact<?php echo $i; ?>" value="<?php echo $show->showReportQuotation1($id_customer,"hospital_contact$i");?>" >
                            </div>
                            <div class="col-4">
                                เบอร์โทร <?php echo $i; ?> : 
                                <input type="text" name="hospital_mobile<?php echo $i; ?>" id="hospital_mobile<?php echo $i; ?>" value="<?php echo $show->showReportQuotation1($id_customer,"hospital_mobile$i");?>" >
                            </div>
                            <div class="col-4">
                                email <?php echo $i; ?> : 
                                <input type="text" name="email_contact<?php echo $i; ?>" id="email_contact<?php echo $i; ?>" value="<?php echo $show->showReportQuotation1($id_customer,"email_contact$i");?>" >
                            </div>
                            <?php endfor; ?>
                    </div>
                </div>

                <div class="row mt-3 p-3 rounded-3" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; line-height: 2.5;" >
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
                                    <?php if($show1->showDetails($id_work,'product_id1') == '' || $show1->showDetails($id_work,'product_id1') == '0' ){ ?>
                                            value=""
                                    <?php } else { ?>
                                            value="<?php echo $show1->showProduct($show1->showDetails($id_work,'product_id1'),'product_name');?>"
                                    <?php } ?>
                                    />
                                    <input type="hidden" name="product_outlistone1" id="product_outlistone1" value="<?php echo $show1->showDetails($id_work,'product_id1');?>" />
                                    <div id="txtHintone1" name="txtHintMain" style="display: none; position: absolute; text-align: left; max-height: 20em; border: 0 none; overflow-x: hidden; overflow-y: auto; z-index: 999; background-color: #FFFFFF; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:8px; font-size: 0.8em; padding: 0.3em 1em; cursor: pointer;"><?php echo $show1->showProduct($show1->showDetails($id_work,'product_id1'),'product_name');?></div>
                                </div>
                            </td>
                            <td><input class="text-center" type="text" name="unit_product1" id="unit_product1" placeholder="0" onchange="CalculatorItem()" value="<?php echo $show1->showDetails($id_work,'unit_product1');?>"></td>
                            <td><input class="text-center" type="text" name="price_unit1" id="price_unit1" placeholder="0.00" onchange="CalculatorItem()" value="<?php echo $show1->showDetails($id_work,'price_unit1');?>"></td>
                            <td><input class="text-center" type="text" name="price_product1" id="price_product1" placeholder="0.00" value="<?php echo $show1->showDetails($id_work,'price_product1');?>" readonly></td>
                        </tr>
                    </table>
                    <div class="d-flex align-items-center justify-content-between my-4">
                        <label for="inputPassword" class="">เปอร์เซ็นต์&nbsp;</label> 
                        <select name="percent_code" id="percent_code" style="width: 100px;">
                            <option value="">Please Select</option>
                            <option value="100 %|1" <?php if($show1->showDetails($id_work,'percent_name') == '100 %'){ ?> selected <?php } ?>>100 %</option>
                            <option value="90-99 %|2" <?php if($show1->showDetails($id_work,'percent_name') == '90-99 %'){ ?> selected <?php } ?>>90-99 %</option>
                            <option value="80-89 %|3" <?php if($show1->showDetails($id_work,'percent_name') == '80-89 %'){ ?> selected <?php } ?>>80-89 %</option>
                            <option value="50-80 %|4" <?php if($show1->showDetails($id_work,'percent_name') == '50-80 %'){ ?> selected <?php } ?>>50-80 %</option>
                            <option value="0-50 %|5" <?php if($show1->showDetails($id_work,'percent_name') == '0-50 %'){ ?> selected <?php } ?>>0-50 %</option>
                        </select>
                        <label for="inputPassword" class="">วันที่จะได้รับ P/O&nbsp;</label> <input class="text-center" style="width: 143px;" type="date" name="month_po" id="month_po" value="<?php echo $show1->showDetails($id_work,'month_po');?>">
                        <label for="inputPassword" class="">มูลค่าทั้งหมด&nbsp;</label> <input class="text-center" style="width: 100px;" type="text" name="sum_price_product" id="sum_price_product" placeholder="0" value="<?php echo $show1->showDetails($id_work,'sum_price_product');?>" data-bs-toggle="tooltip" data-bs-title="จำนวน*ราคาต่อหน่วย" readonly>
                        <label for="inputPassword" class="">วันที่ต้องการสินค้า&nbsp;</label> <input class="text-center" style="width: 143px;" type="date" name="date_request" id="date_request" value="<?php echo $show1->showDetails($id_work,'date_request');?>">
                        <label for="inputPassword" class="">ประเภท&nbsp;</label>
                        <select name="type_cus" id="type_cus"  style="width: 151px;">
                            <option value="">Please Select</option>
                            <option value="1" <?php if($show1->showDetails($id_work,'type_cus') == '1'){ ?> selected <?php } ?>>ProA (Project A+ / A)</option>
                            <option value="2" <?php if($show1->showDetails($id_work,'type_cus') == '2'){ ?> selected <?php } ?>>NewB (New Building)</option>
                            <option value="3" <?php if($show1->showDetails($id_work,'type_cus') == '3'){ ?> selected <?php } ?>>NewF (New Forecast)</option>
                            <option value="4" <?php if($show1->showDetails($id_work,'type_cus') == '4'){ ?> selected <?php } ?>>Pre/B (Present / Booth)</option>
                            <option value="5" <?php if($show1->showDetails($id_work,'type_cus') == '5'){ ?> selected <?php } ?>>ลูกค้าทั่วไป / เจ้าหน้าที่รพ.</option>
                        </select>
                    </div>
                    <div>
                        <textarea class="textarea-form-control" style="width:100%;" name="description_focastnew" id="description_focastnew"  rows="3" placeholder=" รายละเอียดงาน : Update ประมาณการขาย"><?php echo $show1->showDetails($id_work,'description_focastnew');?></textarea>
                        <div>
                            วันที่ Update : <input type="date" name="date_update" id="date_update" value="<?php echo $show1->showDetails($id_work,'date_update');?>">
                            <input type="checkbox" name="summary_order" id="summary_order"> <label for="summary_order">สรุปขายสมบูรณ์</label>
                            <br>
                            <b>วันที่ติดตามครั้งล่าสุด</b><br>
                            <?php 
                            $strFollow = "SELECT * FROM tb_datefollow WHERE refid_work = '".$id_work."' ";
                            $objFollow = mysqli_query($conn, $strFollow);
                            $ResultFollow = mysqli_fetch_array($objFollow);
                            for ($i = 1; $i <= 100; $i++) {
                                $dateFollow = isset($ResultFollow["date_follow$i"]) ? $ResultFollow["date_follow$i"] : '';
                                if ($dateFollow && $dateFollow !== '0000-00-00') {
                            ?>
                                ครั้งที่ <?php echo $i; ?> : 
                                <input type="date" name="date_follow<?php echo $i; ?>" id="date_follow<?php echo $i; ?>" value="<?php echo $dateFollow; ?>">
                                <br>
                            <?php 
                                }
                            }
                            ?>

                            <span class="badge" style="cursor: pointer; background-color: #525252;" onclick="toggleAddDateFollow();"> <img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มวันที่ติดตาม</span> 
                            <div style="display:none;" id="add_date_follow"> 
                                วันที่ติดตาม :&nbsp;<input type="date" name="" id="">
                                <label for=""> แผนงาน : </label> &nbsp; <input style="width: 50%;" type="text" name="" id="" placeholder="รายละเอียดแผนงาน . . ."> 
                            </div>
                            <script>
                            function toggleAddDateFollow() {
                                var el = document.getElementById('add_date_follow');
                                el.style.display = (el.style.display === 'none' || el.style.display === '') ? 'block' : 'none';
                            }
                            </script>
                        </div>
                    </div>
                </div>
                            <p class="text-center my-3">
                                <button type="submit" class="badge" style="background-color: #19D700; color:#FFFFFF; border: hidden;"><img src="assets/images/icon_system/icon-park--save-one.png" style="width:15px; height:15px; color:#FFFFFF;" >บันทึก</button>
                            </p>
        </form>
    </section>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>


<script>
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