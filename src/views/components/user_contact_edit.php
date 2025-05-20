<form action="<?php echo $_SESSION['url'];?>user_contact_save" method="post" id="myform">
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="editLabel">แก้ไขข้อมูลผู้ติดต่อ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id_customer" id="id_customer" required>
                <div class="row" style="line-height: 2;">
                    <div class="col-6 d-flex justify-content-between">
                        โรงพยาบาล : <input type="text" name="customer_name" id="customer_name" required>
                    </div>
                    <div class="col-6"><font style="font-size: 10px; color:#ff8080;">**กรุณาพิมพ์ข้อมูลบางส่วนเพื่อเลือกชื่อโรงพยาบาล หากไม่มีชื่อโรงพยาบาลที่ต้องการรบกวนแจ้ง Admin เพื่อเพิ่มรายชื่อค่ะ</font></div>
                    <div class="col-6 d-flex justify-content-between">
                        <label for="hospital_buiding">ตึก : </label><input type="text" name="hospital_buiding" id="hospital_buiding" required>
                    </div>
                    <div class="col-6 d-flex justify-content-between">
                        <label for="hospital_class">ชั้น : </label><input type="text" name="hospital_class" id="hospital_class" required>
                    </div>
                    <div class="col-6 d-flex justify-content-between">
                        <label for="hospital_ward_present">กลุ่ม Ward : </label><input type="text" name="hospital_ward_present" id="hospital_ward_present" required>
                    </div>
                    <div class="col-6 d-flex justify-content-between">
                        <label for="hospital_ward">Ward : </label><input type="text" name="hospital_ward" id="hospital_ward" required>
                    </div>
                    <div class="col-12"><hr></div>

                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <div class="col-4">
                            ผู้ติดต่อ <?php echo $i; ?> : 
                            <input type="text" name="hospital_contact<?php echo $i; ?>" id="hospital_contact<?php echo $i; ?>" value="<?php echo isset(${"hospital_contact$i"}) ? ${"hospital_contact$i"} : ''; ?>">
                        </div>
                        <div class="col-4">
                            เบอร์โทร <?php echo $i; ?> : 
                            <input type="text" name="hospital_mobile<?php echo $i; ?>" id="hospital_mobile<?php echo $i; ?>" value="<?php echo isset(${"hospital_mobile$i"}) ? ${"hospital_mobile$i"} : ''; ?>">
                        </div>
                        <div class="col-4">
                            email <?php echo $i; ?> : 
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