<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานสรุปประมานการขายตามสินค้า</b>
</div>

<section style="padding: 10px 20px;" class="font-custom-awl-14">

    <div style="display:flex; justify-content: space-between; margin-bottom: 10px;">
        <div>
            <b>วันที่ตั้งเรื่อง</b> <input type="date" name="" id="">
            <b>ถึง</b> <input type="date" name="" id="">
            <b>วันที่ส่งสินค้า</b> <input type="date" name="" id="">
            <b>ถึง</b> <input type="date" name="" id="">
        </div>
        <div>
            <a href="#"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;"></a>
        </div>
    </div>

    <p>
        <b>โรงพยาบาล</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
        <b>ชื่อสินค้า</b> <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
    </p>
    <p>
        <b>เปอร์เซ็นต์</b> 
        <select class="form-select-custom-awl" name="" id="">
            <option value="">Please Select</option>
            <option value="1">bsssssssss</option>
            <option value="2">bsssssssss</option>
        </select>
        <b>Sale</b> 
        <select class="form-select-custom-awl" name="" id="">
            <option value="">Please Select</option>
            <option value="1">bsssssssss</option>
            <option value="2">bsssssssss</option>
        </select>
        <button class="btn-custom-awl">Search</button>
    </p>
</section>
<hr style="margin: 20px 0px;">

<div style="text-align: right; margin-bottom: 20px;">
    <a href="#"><img src="assets/images/icon_system/print2.png" style="width: 30px; height: 30px;"></a>
    &nbsp;
    <a href="#"><img src="assets/images/icon_system/print.png" style="width: 30px; height: 30px;"></a>
</div>

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
                <th style="width: 5%;">โรงพยาบาล</th>
                <th style="width: 5%;">หน่วยงาน</th>
                <th style="width: 5%;">รายการ</th>
                <th style="width: 5%;">จำนวน</th>
                <th style="width: 5%;">มูลค่า</th>
                <th style="width: 5%;">เปอร์เซ็นต์</th>
                <th style="width: 5%;">วันที่ส่งสินค้า</th>
                <th style="width: 5%;">เขตการขาย</th>
            </tr>
        </thead>
        <tbody>
            <tr style="background-color: #FFFFFF;">
                <td style="width: 5%;">วันที่</td>
                <td style="width: 5%;">โรงพยาบาล</td>
                <td style="width: 5%;">หน่วยงาน</td>
                <td style="width: 5%;">รายการ</td>
                <td style="width: 5%;">จำนวน</td>
                <td style="width: 5%;">มูลค่า</td>
                <td style="width: 5%;">เปอร์เซ็นต์</td>
                <td style="width: 5%;">วันที่ส่งสินค้า</td>
                <td style="width: 5%;">เขตการขาย</td>
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





