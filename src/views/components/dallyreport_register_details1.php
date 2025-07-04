<input type="hidden" name="id_work" id="id_work" value="<?php echo $id_work;?>">
<input type="hidden" name="id_customer" id="id_customer" value="<?php echo $show->showDetails($id_work,'id_customer');?>">
<input type="hidden" name="id_pro" id="id_pro" value="<?php echo $show->showDelivery($id_work,'id_pro');?>">
<input type="hidden" name="present_id" id="present_id" value="<?php echo $show->showBooth($id_work,'present_id');?>">
<input type="hidden" name="id_story" id="id_story" value="<?php echo $show->showStoryrival($id_work,'refid_work');?>">
<section>
    <div class="row font-custom-awl-14" style="padding: 10px 20px; font-weight: bold;" id="feature2">
        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-3 col-form-label">วันที่</label>
                <div class="col-9">
                <input type="date" class="form-control" id="date_plan" name="date_plan" value="<?php echo $show->showDetails($id_work,'date_plan');?>" readonly>
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
            <a style="text-decoration: none;" href="customer_salesave?id_work=<?=$id_work;?>" target="_blank" rel="noopener noreferrer" data-bs-toggle="tooltip" data-bs-title="ไปยังหน้าข้อมูลลูกค้า !!">
                <span id="feature3" class="badge rounded-pill" style="background-color: #FF0004; color:#FFFFFF; padding-left: 15px; padding-right: 15px; display: flex; align-items: center;">
                    <img src="assets/images/icon_system/raphael--home.png" style="width:15px; height:15px;"> &nbsp; ดูข้อมูลตึกใหม่
                </span>
            </a>
        </div>
        <div class="col-3 text-end" ><img src="assets/images/add-plus.png" id="feature5" style="width: 30px; height: 30px; cursor: pointer;" onclick="copyPlan(<?php if(isset($id_work)){ echo $id_work; } ?>);"  data-bs-toggle="tooltip" data-bs-title="Copy แผลนงานเดิม !!"></div>

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
        <div class="col-2 d-flex align-items-center" id="feature4"> 
            <?php
            if($show->showCustomerLevelNumber($id_work) != '0'){
                    echo $show->showCustomerLevel($id_work);
                    ?>
                    <input type="hidden" name="cus_free" id="cus_free" value="<?php echo $show->showCustomerLevelNumber($id_work);?>">
                    <?php
            } else { ?>
                <small>
                    <input type="radio" name="cus_free" id="cus_free1" value="1"> <label for="cus_free1">Normal</label>&nbsp;
                    <input type="radio" name="cus_free" id="cus_free2" value="2"> <label for="cus_free2">VIP</label>&nbsp;
                    <br>
                    <input type="radio" name="cus_free" id="cus_free3" value="3"> <label for="cus_free3">VVIP</label>&nbsp;
                    <input type="radio" name="cus_free" id="cus_free4" value="0" checked> <label for="cus_free4">ไม่ได้ระบุ</label>&nbsp;
                </small>
            <?php } ?> 

        </div>
        <!--  -->
        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-3 col-form-label">ผู้ติดต่อ</label>
                <div class="col-9">
                <input type="text" class="form-control text-center" id="hospital_contact" name="hospital_contact" value="<?php echo $show->showDetails($id_work,'hospital_contact');?>" placeholder="ผู้ติดต่อ 1">
                </div>
            </div>
            <?php 
            $numC = 1;
            for ($i = 1; $i <= 9; $i++) { 
            $hospital_contact = 'hospital_contact' . $i;
                if($show->showDetails($id_work, $hospital_contact) != ''){ ?>
                    <div class="row d-flex align-items-center">
                        <label for="" class="col-3 col-form-label">ผู้ติดต่อ</label>
                        <div class="col-9">
                            <input type="text" class="form-control text-center" id="<?php echo $hospital_contact;?>" name="<?php echo $hospital_contact;?>" value="<?php echo $show->showDetails($id_work, $hospital_contact);?>" placeholder="ผู้ติดต่อ <?php echo $i+1;?>">
                        </div>
                    </div>
                <?php 
                $numC++;
                }
            } 
            ?>
        </div>
        <div class="col-4">
        <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">เบอร์โทร</label>
                <div class="col-8">
                <input type="text" class="form-control text-center" id="hospital_mobile1" name="hospital_mobile1" value="<?php echo $show->showDetails($id_work,'hospital_mobile1');?>" placeholder="เบอร์โทร 1">
                </div>
        </div>
        <?php 
            for ($i = 1; $i <= 9; $i++) { 
            $hospital_contact = 'hospital_contact'.$i;
            $hospital_mobile = 'hospital_mobile'.$i+1;
            if($show->showDetails($id_work, $hospital_contact) != ''){ ?>
                    <div class="row d-flex align-items-center">
                        <label for="" class="col-4 col-form-label">เบอร์โทร</label>
                        <div class="col-8">
                            <input type="text" class="form-control text-center" id="<?php echo $hospital_mobile;?>" name="<?php echo $hospital_mobile;?>" value="<?php echo $show->showDetails($id_work, $hospital_mobile);?>" placeholder="เบอร์โทร <?php echo $i+1;?>">
                        </div>
                    </div>
                <?php 
                }
            }
            ?>
        </div>
        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">E-mail</label>
                <div class="col-8">
                <input type="text" class="form-control text-center" id="email_contact1" name="email_contact1" value="<?php echo $show->showDetails($id_work,'email_contact1');?>" placeholder="E-mail 1" >
                </div>
            </div>

            <?php 
            for ($i = 1; $i <= 9; $i++) { 
            $hospital_contact = 'hospital_contact'.$i;
            $email_contact = 'email_contact'.$i+1;
                if($show->showDetails($id_work, $hospital_contact) != ''){ ?>
                        <div class="row d-flex align-items-center">
                            <label for="" class="col-4 col-form-label">E-mail</label>
                            <div class="col-8">
                                <input type="text" class="form-control text-center" id="<?php echo $email_contact;?>" name="<?php echo $email_contact;?>" value="<?php echo $show->showDetails($id_work, $email_contact);?>" placeholder="E-mail <?php echo $i+1;?>">
                            </div>
                        </div>
                    <?php 
                }
            } 
            ?>

        </div>
        <!--  -->
        <div class="col-2 d-flex align-items-center"><font style="font-size: 10px; color:red;">*หมายเหตุ : หากแก้ไขข้อมูลลูกค้า ข้อมูลจะถูก Save ทับข้อมูลเดิมในฐานอัตโนมัติ</font></div>

    </div>
    <?php if($numC != '10'){?>
        &nbsp;&nbsp;&nbsp;<input type="checkbox" name="viewcontxt" id="viewcontxt"> <label for="viewcontxt" data-bs-toggle="tooltip" data-bs-title="เพิ่ม ผู้ติดต่อ,เบอร์โทร,E-mail"><b style="font-size: 14px;" id="feature7">เพิ่มเติม</b></label>
    <?php } ?>
        <div style="font-size: 14px; font-weight: bold; display: none;" id="view_contxt" class="row px-3">

            <script>
            let viewcontxt = document.getElementById('viewcontxt');
            let viewContxtDiv = document.getElementById('view_contxt');

            viewcontxt.addEventListener('change', function() {
                if (this.checked) {
                viewContxtDiv.style.display = 'flex'; // Show the div
                } else {
                viewContxtDiv.style.display = 'none'; // Hide the div
                }
            });
            </script>

            <?php 
            for ($i = 2; $i <= 10; $i++) {
                $hospital_contact = 'hospital_contact' . $i-1;
                $hospital_mobile = 'hospital_mobile' . $i;
                $email_contact = 'email_contact' . $i;
                ?>
                <div class="col-3">
                    <div class="row d-flex align-items-center">
                        <label for="" class="col-3 col-form-label">ผู้ติดต่อ</label>
                        <div class="col-9">
                            <input type="text" class="form-control text-center" id="<?php echo $hospital_contact;?>" name="<?php echo $hospital_contact;?>" value="<?php echo $show->showDetails($id_work, $hospital_contact);?>" placeholder="ผู้ติดต่อ <?php echo $i;?>">
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="row d-flex align-items-center">
                        <label for="" class="col-4 col-form-label">เบอร์โทร</label>
                        <div class="col-8">
                            <input type="text" class="form-control text-center" id="<?php echo $hospital_mobile;?>" name="<?php echo $hospital_mobile;?>" value="<?php echo $show->showDetails($id_work, $hospital_mobile);?>" placeholder="เบอร์โทร <?php echo $i;?>">
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="row d-flex align-items-center">
                        <label for="" class="col-4 col-form-label">E-mail</label>
                        <div class="col-8">
                            <input type="text" class="form-control text-center" id="<?php echo $email_contact;?>" name="<?php echo $email_contact;?>" value="<?php echo $show->showDetails($id_work, $email_contact);?>" placeholder="E-mail <?php echo $i;?>" >
                        </div>
                    </div>
                </div>
                <div class="col-2 d-flex justify-content-between"></div>
            <?php 
            }
            ?>
        </div>

</section>