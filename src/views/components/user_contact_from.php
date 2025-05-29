<form action="<?php echo $_SESSION['url'];?>user_contact_save" method="post" id="myform">
<div class="modal fade" id="add_plus" tabindex="-1" aria-labelledby="add_plusLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="add_plusLabel">เพิ่มข้อมูลผู้ติดต่อ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row" style="line-height: 2;">
                <div class="col-6 d-flex justify-content-between">
                    โรงพยาบาล : <input type="text" name="customer_name" id="customer_name" required>
                </div>
                <div class="col-6 d-flex justify-content-between align-content-center">
                        ประเภทลูกค้า :
                        <div>
                            <input type="radio" name="cus_free" id="Normal" value="1" required> <label for="Normal">Normal</label>
                            <input type="radio" name="cus_free" id="VIP" value="2" required> <label for="VIP">VIP</label>
                            <input type="radio" name="cus_free" id="VVIP" value="3" required> <label for="VVIP">VVIP</label>
                            <input type="radio" name="cus_free" id="Null1" value="0" required> <label for="Null1">ไม่ได้เลือก</label>
                        </div>
                    </div>
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
            
                <div id="contact-rows">
                    <div class="contact-row d-flex justify-content-between" data-index="1">
                    <div class="col-4">
                        ผู้ติดต่อ 1 : <input type="text" name="hospital_contact1" id="hospital_contact1">
                    </div>
                    <div class="col-4">
                        เบอร์โทร 1 : <input type="text" name="hospital_mobile1" id="hospital_mobile1">
                    </div>
                    <div class="col-4">
                        email 1 : <input type="text" name="email_contact1" id="email_contact1">
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
        newRow.className = 'contact-row';
        newRow.style.display = 'flex';
        newRow.style.justifyContent = 'between';
        newRow.setAttribute('data-index', rowCount);
        newRow.innerHTML = `
            <div class="col-4">
            ผู้ติดต่อ ${rowCount} : <input type="text" name="hospital_contact${rowCount}" id="hospital_contact${rowCount}">
            </div>
            <div class="col-4">
            เบอร์โทร ${rowCount} : <input type="text" name="hospital_mobile${rowCount}" id="hospital_mobile${rowCount}">
            </div>
            <div class="col-4">
            email ${rowCount} : <input type="text" name="email_contact${rowCount}" id="email_contact${rowCount}">
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

