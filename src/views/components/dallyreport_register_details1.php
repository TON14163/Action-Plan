<section>
    <div class="row font-custom-awl-14" style="padding: 10px 20px; font-weight: bold;">
        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-3 col-form-label">วันที่</label>
                <div class="col-9">
                <input type="date" class="form-control" id="" name="" value="<?php echo $show->showDetails($id_work,'date_plan');?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">โรงพยาบาล</label>
                <div class="col-8">
                <input type="text" class="form-control text-center" id="hospital_name" name="hospital_name" value="<?php echo $show->showDetails($id_work,'hospital_name');?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center">
            <span class="badge rounded-pill" style="background-color: #FF0004; color:#FFFFFF; padding-left: 15px; padding-right: 15px; display: flex; align-items: center;">
                <img src="assets/images/icon_system/raphael--home.png" style="width:15px; height:15px;"> &nbsp; ดูข้อมูลตึกใหม่
            </span>
        </div>
        <div class="col-3 text-end" ><img src="assets/images/add-plus.png" style="width: 30px; height: 30px; cursor: pointer;" onclick="copyPlan(<?php if(isset($id_work)){ echo $id_work; } ?>);"></div>

        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-3 col-form-label">ตึก</label>
                <div class="col-9">
                <input type="text" class="form-control text-center" id="hospital_buiding" name="hospital_buiding" value="<?php echo $show->showDetails($id_work,'hospital_buiding');?>">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">ชั้น</label>
                <div class="col-8">
                <input type="text" class="form-control text-center" id="hospital_class" name="hospital_class" value="<?php echo $show->showDetails($id_work,'hospital_class');?>" >
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">หน่วยงาน</label>
                <div class="col-8">
                <input type="text" class="form-control text-center" id="hospital_ward" name="hospital_ward" value="<?php echo $show->showDetails($id_work,'hospital_ward');?>" >
                </div>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center"> <?php echo $show->showCustomerLevel($id_work);?> </div>
        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-3 col-form-label">ผู้ติดต่อ</label>
                <div class="col-9">
                <input type="text" class="form-control text-center" id="hospital_contact" name="hospital_contact" value="<?php echo $show->showDetails($id_work,'hospital_contact');?>" >
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">เบอร์โทร</label>
                <div class="col-8">
                <input type="text" class="form-control text-center" id="hospital_mobile1" name="hospital_mobile1" value="<?php echo $show->showDetails($id_work,'hospital_mobile1');?>" >
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">E-mail</label>
                <div class="col-8">
                <input type="text" class="form-control" id="email_contact1" name="email_contact1" value="<?php echo $show->showDetails($id_work,'email_contact1');?>" >
                </div>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center"><font style="font-size: 10px; color:red;">*หมายเหตุ : หากแก้ไขข้อมูลลูกค้า ข้อมูลจะถูก Save ทับข้อมูลเดิมในฐานอัตโนมัติ</font></div>

    </div>
</section>