<!-- Modal -->
<div class="modal fade" id="editCustomer" tabindex="-1" aria-labelledby="editCustomerLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #F1E1FF;">
        <h1 class="modal-title fs-5" id="exampleModalLabel">แก้ไขการลงทะเบียนข้อมูลลูกค้า</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="user_customer_from_edit" method="post">
            <section class="modal-body" style="line-height: 2;">
                <input type="hidden" style="width: 100%;" name="id_edit" id="id_edit" required>
                <!-- ประเภทลูกค้า <br>
                <input type="radio" name="cus_free0" id="Normal1" value="1" > <label for="Normal1">Normal</label>
                <input type="radio" name="cus_free0" id="VIP2" value="2" > <label for="VIP2">VIP</label>
                <input type="radio" name="cus_free0" id="VVIP3" value="3" > <label for="VVIP3">VVIP</label>
                <input type="radio" name="cus_free0" id="Null0" value="0" > <label for="Null0">ไม่ได้เลือก</label>
                <br> -->
                <label for="">คำนำหน้า</label>
                <input type="text" style="width: 100%;" name="title_name_edit" id="title_name_edit" required>
                <br>
                <label for="">ชื่อลูกค้า</label>
                <input type="text" style="width: 100%;" name="customer_name_edit" id="customer_name_edit" required>
                <br>
                <label for="">เบอร์โทรศัพท์</label>
                <input type="text" style="width: 100%;" name="customer_tel_edit" id="customer_tel_edit" required>
                <label for="">FAX</label>
                <input type="text" style="width: 100%;" name="fax_edit" id="fax_edit" value="" required>
                <br>
                <label for="">ที่อยู่</label>
                <input type="text" style="width: 100%;" name="address_name_edit" id="address_name_edit" required>
                <br>
                <label for="">จังหวัด</label>
                <select name="province_edit" id="province_edit" style="width: 100%;" required>
                    <option value="">**Please Select**</option>
                </select>
                <br>
                <label for="">รหัสไปรษณีย์</label>
                <input type="number" name="zip_code_edit" id="zip_code_edit" style="width: 100%;" required>
                <script>
                    fetch('<?php echo $_SESSION['thisDomain'];?>/province.json')
                        .then(response => response.json())
                        .then(datas => {
                            datas.forEach(data => {
                                document.getElementById('province_edit').innerHTML += `<option value="${data.name_th}" >${data.name_th}</option>`;
                            });
                        })
                        .catch(error => console.error(error));
                </script>
                <br>
                Credit
                <select name="customer_credit_edit" id="customer_credit_edit" style="width: 100%;">
                    <option value="">**Please Select**</option>
                    <option value="เงินสด">เงินสด</option>
                    <option value="30 วัน">30 วัน</option>
                    <option value="45 วัน">45 วัน</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                </select>
                เขตการขาย
                <br>
                <select name="sale_area_edit" id="sale_area_edit" style="width: 100%;">
                    <option value="">**Please Select**</option>
                    <option value="MM1">MM1 MM1</option>
                    <option value="PM1">PM1 PM1</option>
                    <option value="S11">S11  ตะวันออก</option>
                    <option value="S12">S12 ตะวันตก</option>
                    <option value="S13">S13 เหนือตอนบน</option>
                    <option value="S14">S14 เหนือตอนล่าง</option>
                    <option value="S15">S15 ตะวันออกเฉียงเหนือตอนล่าง</option>
                    <option value="S16">S16 ตะวันออกเฉียงเหนือตอนบน</option>
                    <option value="S17">S17 ใต้</option>
                    <option value="S21">S21 กรุงเทพ1</option>
                    <option value="S22">S22 กรุงเทพ2</option>
                    <option value="S23">S23 กรุงเทพ3</option>
                    <option value="S24">S24 กรุงเทพ4</option>
                    <option value="S31">S31 ร้านขายยา</option>
                    <option value="S32">S32 ศูนย์ผู้สูงอายุ</option>
                    <option value="S51">S51 Port</option>
                    <option value="SAll">SAll อื่นๆ</option>
                    <option value="SM1">SM1 SM1</option>
                </select>
            </section>
            <div class="modal-footer">
                <button type="button" class="btn-custom-awl btn bg-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn-custom-awl btn" style="background-color: #19D700;"> <img src="assets/images/icon_system/icon-park--save-one.png" style="width:15px; height:15px; color:#FFFFFF;"> Save Add</button>
                <input type="hidden" name="save" id="save" value="1">
            </div>
        </form>
    </div>
  </div>
</div>