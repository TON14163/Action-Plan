<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ลงทะเบียน Daily Report</b>
</div>
<section>
    <div class="row font-custom-awl-14" style="padding: 10px 20px; font-weight: bold;">
        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-3 col-form-label">วันที่</label>
                <div class="col-9">
                <input type="date" class="form-control" id="">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">โรงพยาบาล</label>
                <div class="col-8">
                <input type="text" class="form-control" id="" value="ซีจีเอส สายไหม">
                </div>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center">
            <span class="badge rounded-pill" style="background-color: #FF0004; color:#FFFFFF; padding-left: 15px; padding-right: 15px; display: flex; align-items: center;">
                <img src="assets/images/icon_system/raphael--home.png" style="width:15px; height:15px;"> &nbsp; ดูข้อมูลตึกใหม่
            </span>
        </div>
        <div class="col-3 text-end" ><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;" onclick="copyPlan();"></div>

        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-3 col-form-label">ตึก</label>
                <div class="col-9">
                <input type="text" class="form-control" id="">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">ชั้น</label>
                <div class="col-8">
                <input type="text" class="form-control text-center" id="" value="G">
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">หน่วยงาน</label>
                <div class="col-8">
                <input type="text" class="form-control text-center" id="" value="LAB">
                </div>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center">
            <span class="badge rounded-pill text-bg-secondary" style="background-color: #FF0004; color:#FFFFFF; padding-left: 15px; padding-right: 15px; display: flex; align-items: center;">
                <img src="assets/images/icon_system/user-solid-24.png" style="width:15px; height:15px; color:#FFFFFF;"> &nbsp; VVIP
            </span>
        </div>

        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-3 col-form-label">ผู้ติดต่อ</label>
                <div class="col-9">
                <input type="text" class="form-control text-center" id="" value="พี่เบส">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">เบอร์โทร</label>
                <div class="col-8">
                <input type="text" class="form-control" id="">
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row d-flex align-items-center">
                <label for="" class="col-4 col-form-label">E-mail</label>
                <div class="col-8">
                <input type="text" class="form-control" id="">
                </div>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center"><font style="font-size: 10px; color:red;">*หมายเหตุ : หากแก้ไขข้อมูลลูกค้า ข้อมูลจะถูก Save ทับข้อมูลเดิมในฐานอัตโนมัติ</font></div>

    </div>
</section>

<hr class="my-4">

<section>
    <div class="row font-custom-awl-14" style="padding: 0px 20px; font-weight: bold;">
        <div class="col-2">เลือกสินค้า</div>
        <div class="col-8">
            <table class="table table-borderless" style="width: 100%; border: hidden; padding:0;">
                <tr>
                    <td style="border: hidden; text-align:left; padding:0;"><input type="checkbox" name="1" id="1"> <label for="1">เตียงผู้ป่วยไฟฟ้า</label></td>
                    <td style="border: hidden; text-align:left; padding:0;"><input type="checkbox" name="2" id="2"> <label for="2">เตียงกายภาพ</label></td>
                    <td style="border: hidden; text-align:left; padding:0;"><input type="checkbox" name="3" id="3"> <label for="3">ที่นอนโฟม</label></td>
                    <td style="border: hidden; text-align:left; padding:0;"><input type="checkbox" name="4" id="4"> <label for="4">เครื่องดูดเสมหะ</label></td>
                </tr>
                <tr>
                    <td style="border: hidden; text-align:left; padding:0;"><input type="checkbox" name="5" id="5"> <label for="5">เตียงตรวจ OPD</label></td>
                    <td style="border: hidden; text-align:left; padding:0;"><input type="checkbox" name="6" id="6"> <label for="6">เตียงเคลื่อนย้าย</label></td>
                    <td style="border: hidden; text-align:left; padding:0;"><input type="checkbox" name="7" id="7"> <label for="7">เครื่องวัดน้ำตาล</label></td>
                    <td style="border: hidden; text-align:left; padding:0;"><input type="checkbox" name="8" id="8"> <label for="8">อื่นๆ / สินค้ารวม</label></td>
                </tr>
            </table>
        </div>
    </div>
</section>

<hr class="my-4">

<section>
    <div class="row font-custom-awl-14" style="padding: 0px 20px; font-weight: bold;">
        <div class="col-2">แผนงาน</div>
        <div class="col-8">
            <p>
            เครื่องวัดน้ำตาล 
            <select class="form-select-custom-awl" name="" id="">
                <option value="">Please Select</option>
                <option value="1">แจก Catalog</option>
                <option value="2">พูดคุย นำเสนอ</option>
            </select>
            </p>
            
            อื่นๆ / สินค้ารวม
            <select class="form-select-custom-awl" name="" id="">
                <option value="">Please Select</option>
                <option value="1">แจก Catalog</option>
                <option value="2">พูดคุย นำเสนอ</option>
            </select>
        </div>
        <div class="col-3">&nbsp;</div>
        <div class="col-12"><textarea class="textarea-form-control" style="width:100%;" name="" id=""  rows="3"></textarea></div>
    </div>
</section>

<hr class="my-4">

<section class="accordion font-custom-awl-14" style="font-weight:bold;" id="accordionPanelsStayOpenExample">
    <?php include 'components/dallyreport_register_part1.php'; // ประมาณการขาย ?>
    <?php include 'components/dallyreport_register_part2.php'; // Demo ทดลองสินค้า ?>
    <?php include 'components/dallyreport_register_part3.php'; // ออกบูธ (Group Presentation) ?>
    <?php include 'components/dallyreport_register_part4.php'; // ข้อมูลคู่เเข่ง ?>
</section>

<a href=""><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 10px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> แบบฟอร์มข้อร้องเรียน</span></a>

<div style="display: flex; justify-content: space-between; align-items: center; margin-top: 16px;" class="mt-4">
    <span class="badge rounded-pill" style="background-color: #19D700; color:#FFFFFF; padding-left: 15px; padding-right: 15px; margin-right: 10px; display: flex; align-items: center;">
        <img src="assets/images/icon_system/icon-park--save-one.png" style="width:15px; height:15px; color:#FFFFFF;" > &nbsp; บันทึก
    </span>
    <span class="badge rounded-pill" style="background-color: #FF0004; color:#FFFFFF; padding-left: 15px; padding-right: 15px; display: flex; align-items: center;">
        <img src="assets/images/icon_system/trash-alt-solid-24.png" style="width:15px; height:15px;"> &nbsp; Delete
    </span>
</div>

<p style="font-size: 12px; color:#FF0004; margin-top: 5px;">
*หมายเหตุ ห้ามใส่เครื่องหมาย , หรือ " หรือ ' เพราะจะทำให้บันทึกข้อมูลไม่ได้ค่ะ
</p>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>



<script>
function copyPlan(idCopy){

    Swal.fire({
    title: "<font color='#FFCC99' >งานที่ Copy งานเดิม !!</font>",
    text: "คุณแน่ใจว่าต้องการ Copy Plan ?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes!"
    }).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
        title: "COPY!",
        icon: "success"
        });
    }
    });
}
</script>