<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานสรุปเสนอราคา</b>
</div>

<section style="padding: 10px 20px;" class="font-custom-awl-14">
<p>
        <b>วันที่</b> <input type="date" name="" id="">
        <b>ถึง</b> <input type="date" name="" id="">
        <b>วันที่สั่งของ</b> <input type="date" name="" id="">
        <b>ถึง</b> <input type="date" name="" id="">
    </p>
    <p>
        <b>โรงพยาบาล</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
        <b>ประเภทสินค้า</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
        <b>สินค้า</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
    </p>
    <p>
        <b>เปอร์เซ็นต์</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
        <b>Sale</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
        <button class="btn-custom-awl">Search</button>
    </p>
</section>
<hr style="margin: 20px 0px;">

<div style="text-align: right; margin-bottom: 20px;"><a href="dallyreport_register"><img src="assets/images/icon_system/print.png" style="width: 30px; height: 30px;"></a></div>

<div style="text-align: center; background-color: #00FF00; border: 0.5px solid #202020; border-bottom: hidden;">100% =  0  บาท</div>
<div style="text-align: center; background-color: #CCFF99; border: 0.5px solid #202020; border-bottom: hidden;">90-99% =  330,000  บาท</div>
<div style="text-align: center; background-color: #FFFF00; border: 0.5px solid #202020; border-bottom: hidden;">80-89% =  1,000,000  บาท</div>
<div style="text-align: center; background-color: #FF6600; border: 0.5px solid #202020; border-bottom: hidden;">50-80% =  637,500  บาท</div>
<div style="text-align: center; background-color: #FF0000; border: 0.5px solid #202020; border-bottom: hidden;">0-50%  =  68,000  บาท</div>
<div style="text-align: center; background-color: #FFFFFF; border: 0.5px solid #202020;">จำนวนสินค้าทั้งหมด  172  ชิ้น  ยอดรวมทั้งหมด  2,035,500  บาท</div>
<br>



<div class="table-responsive font-custom-awl-14">
    <table class="table-thead-custom-awl">
        <thead>
            <tr>
                <th style="width: 5%;">วันที่</th>
                <th style="width: 10%;">โรงพยาบาล</th>
                <th style="width: 10%;">หน่วยงาน</th>
                <th style="width: 10%;">รายการ</th>
                <th style="width: 5%;">จำนวน</th>
                <th style="width: 5%;">มูลค่า</th>
                <th style="width: 10%;">ประเภท</th>
                <th style="width: 10%;">ผู้ติดต่อ</th>
                <th style="width: 5%;">เปอร์เซ็น</th>
                <th style="width: 10%;">วันที่ได้ P/O</th>
                <th style="width: 10%;">วันที่ส่งของ</th>
                <th style="width: 5%;">เขต</th>
                <th style="width: 5%;">Edit</th>
            </tr>
        </thead>
        <tbody>
            <tr style="background-color: #FFFFFF;">
                <td>10 ต.ค. 2566</td>
                <td>โรงพยาบาล</td>
                <td>หน่วยงาน</td>
                <td>รายการ</td>
                <td>จำนวน</td>
                <td>มูลค่า</td>
                <td>ประเภท</td>
                <td>ผู้ติดต่อ</td>
                <td>เปอร์เซ็น</td>
                <td>วันที่ได้ P/O</td>
                <td>วันที่ส่งของ</td>
                <td>เขต</td>
                <td><img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;"></td>
            </tr>
        </tbody>
    </table>
    <br>
    <p>พบทั้งหมด 1 รายการ : จำนวน 1 หน้า : 1</p>
</div>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>





