<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="user_customer_from_save" method="post">
            <div class="modal-header" style="background-color: #F1E1FF;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ลงทะเบียนข้อมูลลูกค้า</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <section class="modal-body" style="line-height: 2;">
                <!-- ประเภทลูกค้า <br>
                    <input type="radio" name="cus_free" id="Normal" value="1" required> <label for="Normal">Normal</label>
                    <input type="radio" name="cus_free" id="VIP" value="2" required> <label for="VIP">VIP</label>
                    <input type="radio" name="cus_free" id="VVIP" value="3" required> <label for="VVIP">VVIP</label>
                    <input type="radio" name="cus_free" id="Null1" value="0" required> <label for="Null1">ไม่ได้เลือก</label>
                <br> -->
                <label for="">คำนำหน้า</label>
                <input type="text" style="width: 100%;" name="title_name" id="title_name" required>
                <br>
                <label for="">ชื่อลูกค้า</label>
                <input type="text" style="width: 100%;" name="customer_name" id="customer_name" required>
                <br>
                <label for="">เบอร์โทรศัพท์</label>
                <input type="text" style="width: 100%;" name="customer_tel" id="customer_tel" required>
                <label for="">FAX</label>
                <input type="text" style="width: 100%;" name="fax" id="fax" required>
                <br>
                <label for="">ที่อยู่</label>
                <input type="text" style="width: 100%;" name="address_name" id="address_name" required>
                <br>
                <label for="">จังหวัด</label>
                <select name="province" id="province" style="width: 100%;" required>
                    <option value="">**Please Select**</option>
                </select>
                <br>
                <label for="">รหัสไปรษณีย์</label>
                <input type="number" name="zip_code" id="zip_code" style="width: 100%;" required>
                <script>
                    fetch('<?php echo $_SESSION['thisDomain'];?>province.json')
                        .then(response => response.json())
                        .then(datas => {
                            datas.forEach(data => {
                                document.getElementById('province').innerHTML += `<option value="${data.name_th}" >${data.name_th}</option>`;
                            });
                        })
                        .catch(error => console.error(error));
                </script>
                <br>
                Credit
                <select name="customer_credit" id="customer_credit" style="width: 100%;">
                    <option value="">**Please Select**</option>
                    <option value="เงินสด">เงินสด</option>
                    <option value="30 วัน">30 วัน</option>
                    <option value="45 วัน">45 วัน</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                </select>
                เขตการขาย
                <br>
                <select name="sale_area" id="sale_area" style="width: 100%;">
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
                <input type="hidden" name="save" id="save" value="1" >
            </div>
        </form>
        </div>
    </div>
</div>