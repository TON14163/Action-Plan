<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">สร้าง Action Plan</b>
</div>
<p style="padding: 0px 20px;">
    <b>ค้นหาลูกค้า</b> 
    <input type="text" class="form-search-custom" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
    <button class="btn-custom1">Search</button>
</p>
<hr style="margin: 20px 0px;">
<p style="padding: 0px 20px;">
    <b>วันที่</b>
    <input type="date" name="" id="">
    <button class="btn-custom1" style="background-color: #16BE00;">ส่งข้อมูล</button>
</p>
<br>
<div style="padding: 0px 0px;">
    <table class="table-thead-custom">
        <thead>
            <tr>
                <th style="width: 5%;">Visit</th>
                <th style="width: 20%;">โรงพยาบาล</th>
                <th style="width: 20%;">ตึก</th>
                <th style="width: 5%;">ชั้น</th>
                <th style="width: 20%;">หน่วยงาน</th>
                <th style="width: 15%;">ผู้ติดต่อ</th>
                <th style="width: 15%;">วัตถุประสงค์</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input style="width: 15px; height: 15px;" type="checkbox" name="" id=""></td>
                <td>โรงพยาบาล</td>
                <td>ตึก</td>
                <td>ชั้น</td>
                <td>หน่วยงาน</td>
                <td>ผู้ติดต่อ</td>
                <td>วัตถุประสงค์</td>
            </tr>
        </tbody>
    </table>
</div>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
