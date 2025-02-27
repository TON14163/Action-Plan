<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ข้อมูลผู้ติดต่อ</b>
</div>
<section style="padding: 10px 20px;" class="font-custom-awl-14">
    <div style="display:flex; justify-content: space-between; margin-bottom: 10px;">
        <div>
            <b>ค้นหา</b> 
            <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
            <button class="btn-custom-awl">Search</button>
        </div>
        <div>
            <a href="user-contact-register"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;"></a>
        </div>
    </div>
</section>

<hr style="margin: 20px 0px;">

แสดง 
<select name="" id="">
    <option value="">100</option>
</select>
รายการ
<br><br>
<div class="table-responsive font-custom-awl-14">
    <table class="table-thead-custom-awl">
        <thead>
            <tr>
                <th style="width: 20%;">โรงพยาบาล </th>
                <th style="width: 20%;">ตึก </th>
                <th style="width: 10%;">ชั้น </th>
                <th style="width: 20%;">หน่วยงาน </th>
                <th style="width: 20%;">ผู้ติดต่อ </th>
                <th style="width: 10%;">Edit</th>
            </tr>
        </thead>
        <tbody>
            <tr style="background-color: #FFFFFF;">
                <td>ราคา/หน่วย</td>
                <td>จำนวนซื้อ</td>
                <td>เงื่อนไขพิเศษ</td>
                <td>วันที่เปิดซอง</td>
                <td>เขตการขาย</td>
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
