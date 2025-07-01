<form action="<?php echo $_SESSION['url'];?>user_contact_save" method="post" id="myform">
<div class="modal fade" id="add_plus" tabindex="-1" aria-labelledby="add_plusLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="add_plusLabel">เพิ่มข้อมูลผู้ติดต่อ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row" style="line-height: 2;">
                <div class="col-lg-6 d-flex justify-content-between" >
                    <div>
                        <div style="display: flex;">
                            <label for="customer"><b>โรงพยาบาล : </b></label> &nbsp;
                        </div>
                    </div>
                    <div>
                        <input style="width: 240px;" type="text" name="cus_keyword2" id="cus_keyword2" autocomplete="off" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['cus_keyword2']) ? htmlspecialchars($_GET['cus_keyword2']) : ''; ?>" oninput="customersDataAll('cus_keyword2','customerDropdown2','customerSelectNewView2')" >
                            <div id="customerDropdown2" class="customerDropdown2 shadow-sm" style="overflow-x: hidden; max-height: 150px; max-width: 250px; overflow-y: scroll; position: absolute; z-index: 999; cursor: pointer; padding:5px 10px; border-radius:8px; font-size:14px;">
                                <div class="customerSelectNewView2" style="background-color:#FCFCFC; position: relative; padding:2px; border-radius: 8px; "></div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-between align-content-center">
                        ประเภทลูกค้า :
                        <div>
                            <input type="radio" name="cus_free" id="Normal" value="1" required> <label for="Normal">Normal</label>
                            <input type="radio" name="cus_free" id="VIP" value="2" required> <label for="VIP">VIP</label>
                            <input type="radio" name="cus_free" id="VVIP" value="3" required> <label for="VVIP">VVIP</label>
                            <input type="radio" name="cus_free" id="Null1" value="0" required> <label for="Null1">ไม่ได้เลือก</label>
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
            
                <div id="contact-rows">
                    <div class="row" data-index="1">
                    <div class="col-sm-4 d-flex justify-content-between">
                        <label for="">ผู้ติดต่อ 1 :</label> <input type="text" name="hospital_contact1" id="hospital_contact1">
                    </div>
                    <div class="col-sm-4 d-flex justify-content-between">
                        <label for="">เบอร์โทร 1 :</label> <input type="text" name="hospital_mobile1" id="hospital_mobile1">
                    </div>
                    <div class="col-sm-4 d-flex justify-content-between">
                        <label for="">email 1 :</label> <input type="text" name="email_contact1" id="email_contact1">
                    </div>
                    </div>
                </div>
            
            <div class="col-12 mt-3">
                <button type="button" id="add-row" class="btn-custom-awl btn btn-primary">เพิ่มแถว</button>
                <button type="button" id="remove-row" class="btn-custom-awl btn btn-danger" disabled>ลบแถว</button>
            </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-custom-awl btn bg-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn-custom-awl btn" style="background-color: #19D700;"> <img src="assets/images/icon_system/icon-park--save-one.png" style="width:15px; height:15px; color:#FFFFFF;"> Save Add</button>
            <input type="text" name="save" id="save" value="1" hidden>
        </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const contactRows = document.getElementById('contact-rows');
    const addButton = document.getElementById('add-row');
    const removeButton = document.getElementById('remove-row');
    let rowCount = 1;
    const maxRows = 10;

    addButton.addEventListener('click', () => {
        if (rowCount < maxRows) {
        rowCount++;
        const newRow = document.createElement('div');
        newRow.className = 'contact-row row';
        newRow.style.display = 'flex';
        newRow.style.justifyContent = 'between';
        newRow.setAttribute('data-index', rowCount);
        newRow.innerHTML = `
            <hr style="border:2px dashed #8080c0;" class="mt-2">
            <div class="col-sm-4 d-flex justify-content-between">
            <label for="">ผู้ติดต่อ ${rowCount} :</label> <input type="text" name="hospital_contact${rowCount}" id="hospital_contact${rowCount}">
            </div>
            <div class="col-sm-4 d-flex justify-content-between">
            <label for="">เบอร์โทร ${rowCount} :</label> <input type="text" name="hospital_mobile${rowCount}" id="hospital_mobile${rowCount}">
            </div>
            <div class="col-sm-4 d-flex justify-content-between">
            <label for="">email ${rowCount} :</label> <input type="text" name="email_contact${rowCount}" id="email_contact${rowCount}">
            </div>
        `;
        contactRows.appendChild(newRow);
        removeButton.disabled = false;
        
        if (rowCount === maxRows) {
            addButton.disabled = true;
        }
        }
    });

    removeButton.addEventListener('click', () => {
        if (rowCount > 1) {
        const lastRow = contactRows.querySelector(`.contact-row[data-index="${rowCount}"]`);
        contactRows.removeChild(lastRow);
        rowCount--;
        addButton.disabled = false;
        
        if (rowCount === 1) {
            removeButton.disabled = true;
        }
        }
    });
    });
</script>
</form>

