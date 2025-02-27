<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ลงทะเบียนข้อมูลผู้ติดต่อ</b>
</div>
<section style="padding: 10px 20px;" class="font-custom-awl-14">
    <p>
        <b>เขตการขาย</b> 
        <select class="form-select-custom-awl" name="" id="">
            <option value="">Please Select</option>
            <option value="key">User</option>
        </select>
    </p>
    
    <p>
        <b>โรงพยาบาล</b>  <input type="text" name="" id=""> <small style="color:#FF8080;">*หากไม่มีชื่อโรงพยาบาลที่ต้องการรบกวนแจ้ง Admin เพื่อเพิ่มรายชื่อ</small>
    </p>

    <p>
        <b>ตึก</b> <input type="text" name="" id="">
        <b>ชั้น</b> <input type="text" name="" id="">
        <b>หน่วยงาน</b> <input type="text" name="" id="">
    </p>

    <p>
        <b>ผู้ติดต่อ 1</b> <input type="text" name="" id="">
        <b>เบอร์โทร 1</b> <input type="text" name="" id="">
        <b>E-mail</b> <input type="text" name="" id="">
        <b>Line</b> <input type="text" name="" id="">
    </p>

    <p>
    <a href="" style="display: flex; align-items: center; text-decoration: none;"><span class="badge rounded-pill text-bg-secondary" style="padding-left: 15px; padding-right: 15px;  text-decoration: none;"><img src="assets/images/icon_system/icon-park--add-one.png" style="width:15px; height:15px; color:#FFFFFF;"> &nbsp; เพิ่มข้อมูลผู้ติดต่อ</span></a>
    </p>

    <button type="submit" style="border: hidden; background-color: #FFFFFF;">
        <span class="badge rounded-pill" style="background-color: #19D700; color:#FFFFFF; padding-left: 15px; padding-right: 15px; display: flex; align-items: center;">
                <img src="assets/images/icon_system/icon-park--save-one.png" style="width:15px; height:15px; color:#FFFFFF;" > &nbsp; บันทึก
        </span>
    </button>

</section>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
