<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">เปลี่ยนรหัสผ่าน</b>
</div>
<section style="padding: 10px 0px; font-weight: bold;" class="font-custom-awl-14 row">
    <div class="col-4 m-2" style="line-height: 0.9;">
        <span style="background-color: #FAFAFA;">
            <p> Username : xxxxxxxxxxxx </p>
            <p> ชื่อ-สกุล : xxxxxxxxxxxx </p>
            <p> แผนก/ฝ่าย : xxxxxxxxxxxx </p>
            <p> E-mail : xxxxxxxxxxxx </p>
        </span>
    </div>
    <div class="col-4  m-2">
        <span style="background-color: #FAFAFA;">
            <p style="display: flex; justify-content: space-between;"> <label for="">รหัสเดิม<font color="red">*</font></label>  <input type="text" name="" id=""> </p>
            <p style="display: flex; justify-content: space-between;"> <label for="">รหัสใหม่<font color="red">*</font></label>  <input type="text" name="" id=""> </p>
            <p style="display: flex; justify-content: space-between;"> <label for="">ยืนยันรหัสใหม่<font color="red">*</font></label>  <input type="text" name="" id=""> </p>
        </span>
    </div>
    <div class="col-4  m-2"></div>
    <div class="col-12 text-center"><button class="btn-custom-awl" style="background-color: #19D700; color:#FAFAFA;">ยืนยัน</button></div>
</section>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
