<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';
?>
<style>
    .dangerMain{
        background-color:rgb(240, 198, 198);
    }
</style>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">แก้ไขข้อมูลคู่แข่ง</b>
</div>

<div style="color: #ff8080;">**กรุณากรอกข้อมูลในกรอบสีแดงให้ครบถ้วน</div>

<section class="pt-3">
    <div class="row mb-3">
        <div class="col-4"><input type="checkbox" name="" id=""> : ผลเปิดซอง</div>
        <div class="col-4">&nbsp;วันที่ : <input class="dangerMain" type="date" name="" id=""></div>
        <div class="col-4"></div>
    </div>

    <div class="row my-3" style="row-gap: 0;">
        <div class="col-4">สินค้า : <input class="dangerMain" type="text" name="" id=""></div>
        <div class="col-4">ยี่ห้อ : <input class="dangerMain" type="text" name="" id=""></div>
        <div class="col-4">รุ่น : <input class="dangerMain" type="text" name="" id=""></div>
    </div>

    <div class="row my-3">
        <div class="col-4">ราคาต่อหน่วย : <input class="dangerMain" type="text" name="" id=""></div>
        <div class="col-4">จำนวนซื้อ : <input class="dangerMain" type="text" name="" id=""></div>
        <div class="col-4">รายละเอียดสินค้า : <input type="text" name="" id=""></div>
    </div>

    <div class="row my-3">
        <div class="col-4">รับประกัน : <input type="text" name="" id=""></div>
        <div class="col-4">บริษัท : <input class="dangerMain" type="text" name="" id=""></div>
        <div class="col-4">ประเทศ : <input type="text" name="" id=""></div>
    </div>
</section>


<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>