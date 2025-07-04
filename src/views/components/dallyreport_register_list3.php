<div class="accordion-item rounded-0 border border-0">
    <p class="accordion-header d-flex align-items-center justify-content-between" style="background-color: #FAFAFA; margin-top: 20px;" id="feature12">
        <span class="collapsed rounded-0 border border-0"><input type="checkbox" name="listmain3" id="listmain3" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse3" aria-expanded="false" aria-controls="panelsStayOpen-collapse3" value="1"> &nbsp; &nbsp; <label for="listmain3">ออกบูธ (Group Presentation)</label></span>
        <span id="panelsStayOpen-collapse3" class="accordion-collapse collapse"><a href="" data-bs-toggle="tooltip" data-bs-title="Google Form เบิกของออกบูท"><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 15px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> Google Form เบิกของออกบูท</span></a></span>
    </p>
    <div id="panelsStayOpen-collapse3" class="accordion-collapse collapse" >
        <div class="accordion-body">
            <!--  -->
                <p>
                    ชื่องาน <input type="text" name="work_name" id="work_name" placeholder="Please fill out this field" value="<?php echo $show->showBooth($id_work,'work_name');?>">
                    วันที่จัดงาน <input type="date" name="work_date" id="work_date" value="<?php echo $show->showBooth($id_work,'work_date');?>">
                    ถึง <input type="date" name="end_date" id="end_date" value="<?php echo $show->showBooth($id_work,'end_date');?>">
                    งบค่าใช้จ่าย <input type="text" name="price_work" id="price_work" value="<?php echo $show->showBooth($id_work,'price_work');?>">
                </p>
                <p>
                    จำนวนผู้เข้าร่วม <input type="text" name="count_work" id="count_work" value="<?php echo $show->showBooth($id_work,'count_work');?>">
                    ผู้เข้าร่วม <input type="text" name="des_cus1" id="des_cus1" value="<?php echo $show->showBooth($id_work,'des_cus1');?>">
                </p>

                <div class="row my-2" style="width: 80%;">
                    <div class="col-2"> การนำเสนอ </div>
                    <div class="col-2"> <input type="checkbox" name="typ_work1" id="typ_work1" value="1" <?php if($show->showBooth($id_work,'typ_work1') == 1) { ?> checked <?php } ?> > <label for="typ_work1">Powerpoint</label> </div>
                    <div class="col-2"> <input type="checkbox" name="typ_work2" id="typ_work2" value="1" <?php if($show->showBooth($id_work,'typ_work2') == 1) { ?> checked <?php } ?> > <label for="typ_work2">นำสินค้าไปสาธิต</label> </div>
                    <div class="col-6"></div>
                </div>

                <p>
                มุมมอง "ลูกค้า" ต่อ "สินค้า & การแนะนำ & การซื้อ"
                <textarea class="textarea-form-control" style="width:100%;" name="sum_wordpre" id="sum_wordpre"  rows="3"><?php echo $show->showBooth($id_work,'sum_wordpre');?></textarea>
                </p>
            <!--  -->
        </div>
    </div>
</div>