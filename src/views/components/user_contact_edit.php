<form action="<?php echo $_SESSION['url'];?>user_contact_save" method="post" id="myform">
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen ">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="editLabel">แก้ไขข้อมูลผู้ติดต่อ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id_customer" id="id_customer" required>
                <div class="row" style="line-height: 2;">
                    <div class="col-lg-6 d-flex justify-content-between">
                        <!-- โรงพยาบาล : <input type="text" name="customer_name" id="customer_name" required> -->
                    <div>
                        <div style="display: flex;">
                            <label for="customer"><b>โรงพยาบาล : </b></label> &nbsp;
                        </div>
                    </div>
                    <div>
                        <input style="width: 240px;" type="text" name="customer_name" id="customer_name" autocomplete="off" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['customer_name']) ? htmlspecialchars($_GET['customer_name']) : ''; ?>" oninput="customersDataAll('customer_name','customerDropdown3','customerSelectNewView3')" >
                            <div id="customerDropdown3" class="customerDropdown3 shadow-sm" style="overflow-x: hidden; max-height: 150px; max-width: 250px; overflow-y: scroll; position: absolute; z-index: 999; cursor: pointer; padding:5px 10px; border-radius:8px; font-size:14px;">
                                <div class="customerSelectNewView3" style="background-color:#FCFCFC; position: relative; padding:2px; border-radius: 8px; "></div>
                            </div>
                    </div>



                    </div>
                    <div class="col-lg-6 d-flex justify-content-between align-content-center">
                        ประเภทลูกค้า :
                        <div>
                            <input type="radio" name="cus_free0" id="Normal1" value="1" > <label for="Normal1">Normal</label>
                            <input type="radio" name="cus_free0" id="VIP2" value="2" > <label for="VIP2">VIP</label>
                            <input type="radio" name="cus_free0" id="VVIP3" value="3" > <label for="VVIP3">VVIP</label>
                            <input type="radio" name="cus_free0" id="Null0" value="0" > <label for="Null0">ไม่ได้เลือก</label>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-between">
                        <label for="hospital_buiding">ตึก : </label><input type="text" name="hospital_buiding" id="hospital_buiding" required>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-between">
                        <label for="hospital_class">ชั้น : </label><input type="text" name="hospital_class" id="hospital_class" required>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-between">
                        <label for="hospital_ward_present">กลุ่ม Ward : </label><input type="text" name="hospital_ward_present" id="hospital_ward_present" required>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-between">
                        <label for="hospital_ward">Ward : </label><input type="text" name="hospital_ward" id="hospital_ward" required>
                    </div>
                    <div class="col-lg-12"><hr style="border:2px dashed #8080c0;"></div>

                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <div class="col-lg-4 d-flex justify-content-between">
                            <label for="">ผู้ติดต่อ <?php echo $i; ?> : </label>
                            <input type="text" name="hospital_contact<?php echo $i; ?>" id="hospital_contact<?php echo $i; ?>" value="<?php echo isset(${"hospital_contact$i"}) ? ${"hospital_contact$i"} : ''; ?>">
                        </div>
                        <div class="col-lg-4 d-flex justify-content-between">
                            <label for="">เบอร์โทร <?php echo $i; ?> : </label>
                            <input type="text" name="hospital_mobile<?php echo $i; ?>" id="hospital_mobile<?php echo $i; ?>" value="<?php echo isset(${"hospital_mobile$i"}) ? ${"hospital_mobile$i"} : ''; ?>">
                        </div>
                        <div class="col-lg-4 d-flex justify-content-between">
                            <label for="">email <?php echo $i; ?> : </label>
                            <input type="text" name="email_contact<?php echo $i; ?>" id="email_contact<?php echo $i; ?>" value="<?php echo isset(${"email_contact$i"}) ? ${"email_contact$i"} : ''; ?>">
                        </div>
                    <?php endfor; ?>

                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-custom-awl btn bg-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn-custom-awl btn bg-warning">Edit</button>
            <input type="text" name="edit" id="edit" value="1" hidden>
        </div>
        </div>
    </div>
</div>
</form>