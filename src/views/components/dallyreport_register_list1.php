<div class="accordion-item rounded-0 border border-0" id="listWarp1">
    <p class="accordion-header d-flex align-items-center justify-content-between" style="background-color: #FAFAFA;" id="feature10">
        <span class="rounded-0 border border-0"><input type="checkbox" name="listmain1" id="listmain1" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse1" aria-expanded="true" aria-controls="panelsStayOpen-collapse1" value="1" checked> &nbsp; &nbsp; <label for="listmain1">ประมาณการขาย</label></span>
        <span id="panelsStayOpen-collapse1" class="accordion-collapse collapse show">
            <a href="https://allwellcenter.com/voc/" target="_blank" data-bs-toggle="tooltip" data-bs-title="ไปยังเว็บไซต์ allwellcenter.com"><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 10px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> แบบฟอร์มข้อร้องเรียน</span></a>
            <a href="https://quotation.allwellcenter.com/" target="_blank" data-bs-toggle="tooltip" data-bs-title="ไปยังเว็บไซต์ quotation.allwellcenter.com"><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 15px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> ใบเสนอราคา</span></a>
            <a href="https://sol.allwellcenter.com/" target="_blank" data-bs-toggle="tooltip" data-bs-title="ไปยังเว็บไซต์ sol.allwellcenter.com"><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 15px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> ERP SALE</span></a>
        </span>
    </p>
    

    <div id="panelsStayOpen-collapse1" class="accordion-collapse collapse show">
        <div class="accordion-body">
            <!--  -->
            <?php
            $strSQLne = "SELECT id_work,date_plan,summary_quote,summary_product1,remark_pro1,unit_product1,unit_name1,sum_price_product,percent_id,percent_name,month_po,date_request,type_cus,summary_order 
            FROM tb_register_data 
            WHERE id_customer = '".$show->showDetails($id_work,'id_customer')."' AND summary_order = '0'  AND  summary_product1 != '' ORDER BY percent_id ASC , date_request ASC ";
            $objQueryne  = mysqli_query($conn,$strSQLne);
            $numRowne = mysqli_num_rows($objQueryne);
            if($numRowne > 0){ ?>
            <div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; background-color: #e0e0e0;" class="p-3 pt-2 rounded-3">
                <b style="font-size: 10px; color:#ff8080;">ประมาณการขายเดิม</b>
                <table class="table-thead-custom-awl table-bordered border-secondary">
                    <tr>
                        <th>วันที่</th>
                        <th>รายการ</th>
                        <th>จำนวน</th>
                        <th>มูลค่า</th>
                        <th>เปอร์เซ็น</th>
                        <th>วันที่จะได้รับ P/O</th>
                        <th>วันที่ต้องการสินค้า</th>
                        <th>สรุปขายสมบูรณ์</th>
                        <th>ประเภท</th>
                        <th>Plan</th>
                    </tr>
                    <?php
                    while($objResultne = mysqli_fetch_array($objQueryne)) { ?>
                        <tr>
                            <td><?php echo DateThai($objResultne["date_plan"]);?></td>
                            <td style="text-align: left; padding:0px 5px;"><?php echo $objResultne["summary_quote"];?><?php echo $objResultne["summary_product1"];?>&nbsp;&nbsp; <?php echo $objResultne["remark_pro1"];?></td>
                            <td><?php if ($objResultne["unit_product1"]!='0') { echo $objResultne["unit_product1"]; }?>&nbsp;<?php echo $objResultne["unit_name1"];?></td>
                            <td><?php echo number_format($objResultne["sum_price_product"],0)."";?></td>
                            <?php if ($objResultne["percent_id"]=='1'){ ?>
                                <td bgcolor="#00FF00"><?php echo $objResultne["percent_name"];?></td>
                            <?php } else if ($objResultne["percent_id"]=='2'){ ?>
                                <td bgcolor="#CCFF99"><?php echo $objResultne["percent_name"];?></td>
                            <?php } else if ($objResultne["percent_id"]=='3'){ ?>
                                <td bgcolor="#FFFF00"><?php echo $objResultne["percent_name"];?></td>
                            <?php } else if ($objResultne["percent_id"]=='4'){ ?>	
                                <td bgcolor="#FF6600"><?php echo $objResultne["percent_name"];?></td>
                            <?php } else if ($objResultne["percent_id"]=='5'){ ?>	
                                <td bgcolor="#FF0000"><?php echo $objResultne["percent_name"];?></td>
                            <?php } else { ?> <td></td> <?php } ?>
                            <td><?php echo DateThai($objResultne["month_po"]);?></td>
                            <td><?php echo DateThai($objResultne["date_request"]);?></td>
                            <td>
                                <?php if($show->showDetails($objResultne['id_work'], 'summary_order') == '1'){ ?>
                                    <img src="assets/images/icon_system/check.png" style="width: 20px; height: 20px;">
                                <?php } else if($show->showDetails($objResultne['id_work'], 'summary_order') == '2'){ ?>
                                    <img src="assets/images/icon_system/x-regular-24 (1).png" style="width: 20px; height: 20px;">
                                <?php } else { ?>
                                    ยังไม่ระบุ
                                <?php } ?>
                            </td>
                            <td>
                                <?php 
                                    $sqlType = "SELECT type_code FROM tb_typecus where id = '".$objResultne["type_cus"]."'";
                                    $qryType = mysqli_query($conn,$sqlType);
                                    $numType = mysqli_num_rows($qryType);
                                    $rsResultType = mysqli_fetch_assoc($qryType);
                                    if($numType != 0){
                                        echo $rsResultType["type_code"];
                                    }
                                ?>
                            </td>
                            <td>
                                <?php if($objResultne['id_work'] != $id_work){ ?>
                                    <a href="daily_report_edit?id_work=<?php echo $objResultne['id_work'];?>&planLink=1" data-bs-toggle="tooltip" data-bs-title="สลับการเข้าถึง Plan จากประมาณการขาย"><img src="assets/images/icon_system/swap-horizontal.png" style="width: 20px; height: 20px;"></a>
                                <?php } else {
                                    echo '<font style="font-size:10px;">ใบปัจจุบัน</font>';
                                } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="mt-4">
                <textarea class="textarea-form-control" style="width:100%;" name="description_focast" id="description_focast"  rows="3" placeholder="รายละเอียดงาน : Update ประมาณการขาย"><?php echo $show->showDetails($id_work,'description_focast');?></textarea>
            </div>
            <?php } ?>
            <div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" class="mt-3 p-3 pt-2 rounded-3">
                <b style="font-size: 10px; color:#ff8080;">ประมาณการขายใหม่</b>
                <table class="table-thead-custom-awl table-bordered border-secondary">
                    <tr>
                        <th>ลำดับ</th>
                        <th>รายการสินค้า</th>
                        <th>หมายเหตุ</th>
                        <th>จำนวน</th>
                        <th>ราคา / หน่วย</th>
                        <th>มูลค่า</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td style="vertical-align: middle; text-align: center; padding:5px;">
                            <div class="product-data-container">
                                <input class="form-search-custom-awl" type="text" list="product_onedata1" name="product_onelist" id="product_onelist1" onkeyup="addProductRow('1','product_outlistone1',this.value,'txtHintone1','product_onelist1')" placeholder="Product Search" autocomplete="off" 
                                <?php if($show->showDetails($id_work,'product_id1') == '' || $show->showDetails($id_work,'product_id1') == '0' ){ ?>
                                        value=""
                                <?php } else { ?>
                                        value="<?php echo $show->showProduct($show->showDetails($id_work,'product_id1'),'product_name');?>"
                                <?php } ?>
                                />
                                <input type="hidden" name="product_outlistone1" id="product_outlistone1" value="<?php echo $show->showDetails($id_work,'product_id1');?>" />
                                <div id="txtHintone1" name="txtHintMain" style="display: none; position: absolute; text-align: left; max-height: 20em; border: 0 none; overflow-x: hidden; overflow-y: auto; z-index: 999; background-color: #FFFFFF; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:8px; font-size: 0.8em; padding: 0.3em 1em; cursor: pointer;"><?php echo $show->showProduct($show->showDetails($id_work,'product_id1'),'product_name');?></div>
                            </div>
                        </td>
                        <td style="vertical-align: middle; text-align: center; padding:12px 5px 5px 5px;">
                            <textarea style="width:100%; height: 24px; padding:0px;" name="remark_pro1" id="remark_pro1" ><?php echo $show->showDetails($id_work,'remark_pro1');?></textarea>
                        </td>
                        <td style="vertical-align: middle; text-align: center; padding:5px;"><input class="text-center" type="text" name="unit_product1" id="unit_product1" placeholder="0" onchange="CalculatorItem()" value="<?php echo $show->showDetails($id_work,'unit_product1');?>"></td>
                        <td style="vertical-align: middle; text-align: center; padding:5px;"><input class="text-center" type="text" name="price_unit1" id="price_unit1" placeholder="0.00" onchange="CalculatorItem()" value="<?php echo $show->showDetails($id_work,'price_unit1');?>"></td>
                        <td style="vertical-align: middle; text-align: center; padding:5px;"><input class="text-center" style="background-color: #e0e0e0; cursor:no-drop;" type="text" name="price_product1" id="price_product1" placeholder="0.00" value="<?php echo $show->showDetails($id_work,'price_product1');?>" readonly></td>
                    </tr>
                </table>
                <div class="row mt-1">
                    <div class="col-4 my-2 d-flex justify-content-between">
                        <label for="inputPassword" class="">เปอร์เซ็นต์&nbsp;</label> 
                        <select name="percent_code" id="percent_code" style="width: 70%;">
                            <option value="">Please Select</option>
                            <option value="100 %|1" <?php if($show->showDetails($id_work,'percent_name') == '100 %'){ ?> selected <?php } ?>>100 %</option>
                            <option value="90-99 %|2" <?php if($show->showDetails($id_work,'percent_name') == '90-99 %'){ ?> selected <?php } ?>>90-99 %</option>
                        <?php if($show->showDetails($id_work,'percent_name') != '100 %' AND $show->showDetails($id_work,'percent_name') != '90-99 %'){ ?>
                            <option value="80-89 %|3" <?php if($show->showDetails($id_work,'percent_name') == '80-89 %'){ ?> selected <?php } ?>>80-89 %</option>
                            <option value="50-80 %|4" <?php if($show->showDetails($id_work,'percent_name') == '50-80 %'){ ?> selected <?php } ?>>50-80 %</option>
                            <option value="0-50 %|5" <?php if($show->showDetails($id_work,'percent_name') == '0-50 %'){ ?> selected <?php } ?>>0-50 %</option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="col-4 my-2 d-flex justify-content-between">
                        <label for="inputPassword" class="">วันที่จะได้รับ P/O&nbsp;</label> <input class="text-center" style="width: 60%;" type="date" name="month_po" id="month_po" value="<?php echo $show->showDetails($id_work,'month_po');?>">
                    </div>
                    <div class="col-4 my-2 d-flex justify-content-between">
                        <label for="inputPassword" class="">มูลค่าทั้งหมด&nbsp;</label> <input class="text-center" style="width: 70%; background-color: #e0e0e0; cursor:no-drop;" type="text" name="sum_price_product" id="sum_price_product" placeholder="0" value="<?php echo $show->showDetails($id_work,'sum_price_product');?>" data-bs-toggle="tooltip" data-bs-title="จำนวน*ราคาต่อหน่วย" readonly>
                    </div>
                    <div class="col-4 my-2 d-flex justify-content-between">
                        <label for="inputPassword" class="">วันที่ต้องการสินค้า&nbsp;</label> <input class="text-center" style="width: 60%;" type="date" name="date_request" id="date_request" value="<?php echo $show->showDetails($id_work,'date_request');?>">
                    </div>
                    <div class="col-4 my-2 d-flex justify-content-between">
                        <label for="inputPassword" class="">ประเภท&nbsp;</label>
                        <select name="type_cus" id="type_cus"  style="width: 70%;">
                            <option value="">Please Select</option>
                            <option value="1" <?php if($show->showDetails($id_work,'type_cus') == '1'){ ?> selected <?php } ?>>ProA (Project A+ / A)</option>
                            <option value="2" <?php if($show->showDetails($id_work,'type_cus') == '2'){ ?> selected <?php } ?>>NewB (New Building)</option>
                            <option value="3" <?php if($show->showDetails($id_work,'type_cus') == '3'){ ?> selected <?php } ?>>NewF (New Forecast)</option>
                            <option value="4" <?php if($show->showDetails($id_work,'type_cus') == '4'){ ?> selected <?php } ?>>Pre/B (Present / Booth)</option>
                            <option value="5" <?php if($show->showDetails($id_work,'type_cus') == '5'){ ?> selected <?php } ?>>ลูกค้าทั่วไป / เจ้าหน้าที่รพ.</option>
                        </select>
                    </div>
                    <div class="col-4 my-2 d-flex justify-content-between">
                        <label for="">ผู้แนะนำ : </label><input type="text"  style="width: 70%;" name="pre_name" id="pre_name" value="<?php echo $show->showDetails($id_work,'pre_name');?>" placeholder="Input for text . . .">
                    </div>
                </div>
                <p class="mt-2">
                    <?php if($show->showDetails($id_work,'percent_name') == '100 %' || $show->showDetails($id_work,'percent_name') == '90-99 %'){ ?>
                    <span class="badge rounded-pill text-bg-info" style="cursor: pointer;" onclick="sendMd('<?php echo $id_work;?>',1,'แก้ไขเปอร์เซ็นต์ประมาณการขาย','เปอร์เซ็นต์ใหม่สาเหตุการแก้ไข','<?php echo $show->showDetails($id_work,'type_cus');?>')" data-bs-toggle="tooltip" data-bs-title="(ปรับเปอร์เซ็นต์) กรณีที่ 90-100% หากปรับลดจำเป็นต้องระบุหมายเหตุเพื่อขออนุมัติจากผู้บริหารถึงจะปรับลดได้">ปรับ<ins>เปอร์เซ็นต์</ins>ประมาณการขาย</span>
                    <span class="badge rounded-pill text-bg-warning" style="cursor: pointer;" onclick="sendMd('<?php echo $id_work;?>',2,'แก้ไขวันที่ต้องการสินค้า','วันที่ต้องการสินค้าสาเหตุการแก้ไข','<?php echo $show->showDetails($id_work,'date_request');?>')" data-bs-toggle="tooltip" data-bs-title="(วันที่ต้องการสินค้า) กรณีที่ 90-100% หากปรับลดจำเป็นต้องระบุหมายเหตุเพื่อขออนุมัติจากผู้บริหารถึงจะปรับวันที่ได้"><ins>ปรับวันที่</ins>ต้องการสินค้า(เปลี่ยนเดือน)</span>
                    <?php } ?>
                </p>
                <div>
                    <textarea class="textarea-form-control" style="width:100%;" name="description_focastnew" id="description_focastnew"  rows="3" placeholder="รายละเอียดงาน : ประมาณการขายใหม่"><?php echo $show->showDetails($id_work,'description_focastnew');?></textarea>
                </div>
                <!--  -->
                <section class="font-custom-awl-14" style="line-height: 2.5;">
                            <input type="hidden" name="date_update" id="date_update" value="<?php echo date('Y-m-d');?>"><!-- วันที่ Update : -->

                            <input type="radio" name="summary_order" id="summary_order1" value="1" <?php if($show->showDetails($id_work,'summary_order') == '1'){ ?> checked <?php } ?>> 
                            <label for="summary_order1">สรุปขายสมบูรณ์</label>

                            <input type="radio" name="summary_order" id="summary_order2" value="2" <?php if($show->showDetails($id_work,'summary_order') == '2'){ ?> checked <?php } ?>> 
                            <label for="summary_order2">ไม่ซื้อ</label>

                            <input type="radio" name="summary_order" id="summary_order3" value="0" <?php if($show->showDetails($id_work,'summary_order') == '0'){ ?> checked <?php } ?>> 
                            <label for="summary_order3">ยังไม่ระบุ</label>
                            <br>
                            วันที่ออกบิล : <input type="date" name="date_order" id="date_order" value="<?php echo $show->showDetails($id_work,'date_order');?>">
                            <br>
                            <b><ins>วันที่ติดตามครั้งล่าสุด</ins></b>
                            <br>
                            <?php
                            $numDateFollow = 0;
                            for ($i = 1; $i <= 15; $i++) {
                                $date_follow = $show->showDetails($id_work, "date_follow{$i}");
                                if ( (!empty($date_follow) AND $date_follow != '0000-00-00') || !empty($plan_follow) ) {
                                    echo "ครั้งที่ {$i} : <i style='color:#808080; font-weight:100; cursor:no-drop;'>" . DateThai(htmlspecialchars($date_follow))."</i> ";

                                    $planWorks = json_decode($show->showDetails($id_work,'plan_work_add'), true);
                                    if (is_array($planWorks) && !empty($planWorks[$i-1])) {
                                        echo " แผนงาน : <i style='color:#808080; font-weight:100; cursor:no-drop;'>" . htmlspecialchars($planWorks[$i-1]).'<input type="hidden" name="plan_follow'.$i.'" id="plan_follow'.$i.'" value="'.htmlspecialchars($planWorks[$i-1]).'" placeholder="รายละเอียดแผนงาน... "></i>';
                                    }
                                    $numDateFollow++;
                                    echo "<br>";
                                }
                            }
                            // echo $show->showDetails($id_work,'plan_work_add');
                            ?>
                </section>
                <!--  -->
            </div>

            <div id="follow-up-list" >
                <div class="follow-up-item" style="display: flex; align-items: center; width: 100%; margin-bottom: 10px;">
                </div>
            </div>

            <div class="d-flex align-items-center">
                <span class="badge rounded-pill" style="background-color:#525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer; margin-top: 10px;" data-bs-toggle="tooltip" data-bs-title="เพิ่มวันที่ติดตามนี้จะอยู่ใน Status Plan งานที่สร้างจากประมาณการขาย " onclick="addFollowUp()">
                    <img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มวันติดตตาม
                </span>
                &nbsp;&nbsp;
                <div id="follow-up-del" style="display: none;" onclick="removeFollowUp()">
                    <div style="display: flex; align-items: center;">
                        <span class="badge rounded-pill mt-2" style="background-color: #FF0004; color:#FFFFFF; padding: 5px 10px; cursor: pointer; " >
                            <img src="assets/images/icon_system/streamline-block--basic-ui-delete-2.svg" style="width:12px; height:12px; color:#FFFFFF;"> Del ครั้งที่ <font id="follow-up-count"></font>
                        </span>
                        <span style="font-size: 10px; color:#DDA0DD; padding-top:15px;">
                            ส่วนนี้จะไปเพิ่ม Plan ใหม่
                        </span>
                    </div>
                </div>
                
            </div>

            <script>
            let followUpCount = <?php echo $numDateFollow;?>;
            function addFollowUp() {
                followUpCount++;
                const followUpList = document.getElementById('follow-up-list');
                const followUpCountView = document.getElementById('follow-up-count');
                const followUpDel = document.getElementById('follow-up-del');
                followUpCountView.textContent = followUpCount;
                followUpDel.style.display = 'block';
                const div = document.createElement('div');
                div.className = 'follow-up-item';
                div.style = "display: flex; align-items: center; width: 100%; margin-bottom: 10px;";
                div.innerHTML = `
                    <div style="margin-right: 10px; background-color:#FFFFFF; border-radius: 8px; width: 20%; padding:14px 10px; text-align: center; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                        วันที่ติดตามครั้งที่ ${followUpCount} : <br>
                        <input type="date" name="date_follow${followUpCount}" class="date_follow">
                    </div>
                    <div style="background-color:#FFFFFF; border-radius: 8px; width: 80%; padding: 10px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                        แผนงาน : <br>
                        <textarea name="plan_follow${followUpCount}" style="height: 25px; min-width: 100%;" placeholder="รายละเอียดแผนงาน . . . "></textarea>
                    </div>
                `;
                followUpList.appendChild(div);
            }
            function removeFollowUp(){
                if (followUpCount > 0) {
                    const followUpList = document.getElementById('follow-up-list');
                    // Remove the last follow-up item
                    if (followUpList.lastElementChild) {
                        followUpList.removeChild(followUpList.lastElementChild);
                        followUpCount--;
                        const followUpCountView = document.getElementById('follow-up-count');
                        followUpCountView.textContent = followUpCount;
                        // Hide delete button if no follow-up left
                        if (followUpCount === <?php echo $numDateFollow;?>) {
                            document.getElementById('follow-up-del').style.display = 'none';
                        }
                    }
                }
            }
            </script>

            <div class="mt-3">
                <a href="daily_report_edit_plannew?id_work=<?php echo $id_work;?>" rel="noopener noreferrer">
                    <span class="badge rounded-pill" style="background-color:#525252; color:#FFFFFF; padding-left: 10px; padding-right: 15px; cursor: pointer;" data-bs-toggle="tooltip" data-bs-title="Status งานที่ plan ไว้แล้ว"> 
                        <img src="assets/images/icon_system/majesticons--link-circle.svg" style="width:15px; height:15px; color:#FFFFFF;"> เพิ่มประมาณการขายใหม่
                    </span>
                </a>
            </div>
            <!--  -->

        </div>
    </div>
</div>

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



function sendMd(id_workMd,statusChk, Message1, Message2,docOld) {
    if (statusChk === 2) {
        (async () => {
            const { value: formValues } = await Swal.fire({
                title: Message1,
                html:
                    `
                    <div style="width:100%; padding:10px; text-align:left;">
                    <b>วันที่ต้องการสินค้า :</b>
                    <input type="date" id="swal-input-date" style="width:100%;" placeholder="${Message2}" style="margin-bottom:10px;">
                    <br>
                    <b>${Message2} :</b>
                    <textarea id="swal-input-textarea"  placeholder="${Message2}" style="width:100%;"></textarea>
                    </div>
                    `,
                focusConfirm: false,
                showCancelButton: true,
                preConfirm: () => {
                    return {
                        date: document.getElementById('swal-input-date').value,
                        note: document.getElementById('swal-input-textarea').value
                    }
                },
                didOpen: () => {
                    const today = (new Date()).toISOString().split("T")[0];
                    document.getElementById('swal-input-date').min = today;
                }
            });
            if (formValues && formValues.date) {
                Swal.fire("บันทึกสำเร็จ", `วันที่: ${formValues.date}<br>หมายเหตุ: ${formValues.note}`, "success");
            }
            window.location.href = `daily_send_md_percent?id_work=${id_workMd}&statuschk=${statusChk}&date=${formValues.date}&note=${formValues.note}&docOld=${docOld}`;
        })();
    } else {
        (async () => {
            const { value: formValues } = await Swal.fire({
                title: Message1,
                html:
                    `
                    <div style="width:100%; padding:10px; text-align:left;">
                    <b>เลือกเปอร์เซ็นต์ใหม่ :</b>
                    <select id="swal-input-select" style="margin-bottom:10px; width:100%;">
                        <option value="">เลือกตัวเลือก</option>
                        <option value="100 %">100 %</option>
                        <option value="90-99 %">90-99 %</option>
                        <option value="80-89 %">80-89 %</option>
                        <option value="50-80 %">50-80 %</option>
                        <option value="0-50 %">0-50 %</option>
                    </select>
                    <br>
                    <b>${Message2} :</b>
                    <textarea id="swal-input-textarea"  placeholder="${Message2}" style="width:100%;"></textarea>
                    </div>
                    `,
                focusConfirm: false,
                showCancelButton: true,
                preConfirm: () => {
                    return {
                        percent: document.getElementById('swal-input-select').value,
                        note: document.getElementById('swal-input-textarea').value
                    }
                }
            });
            if (formValues && formValues.percent) {
                Swal.fire("บันทึกสำเร็จ", `เปอร์เซ็นต์: ${formValues.percent}<br>หมายเหตุ: ${formValues.note}`, "success");
            }
            window.location.href = `daily_send_md_percent?id_work=${id_workMd}&statuschk=${statusChk}&percent=${formValues.percent}&note=${formValues.note}&docOld=${docOld}`;
        })();
    }
}

</script>