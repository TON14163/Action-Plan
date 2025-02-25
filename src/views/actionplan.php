<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">สร้าง Action Plan</b>
</div>
<p style="padding: 10px 20px;">
    <b>ค้นหาลูกค้า</b> 
    <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
    <button class="btn-custom-awl">Search</button>
</p>
<hr style="margin: 20px 0px;">
<p style="padding: 0px 20px;">
    <b>วันที่</b>
    <input type="date" name="" id="">
    <button class="btn-custom-awl" style="background-color: #16BE00;">ส่งข้อมูล</button>
</p>
<br>
<div class="table-responsive">
    <table class="table-thead-custom-awl">
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
                <td>
                    <select class="form-select-custom-awl" name="" id="">
                        <option value="">Please Select</option>
                        <option value="Awareness">Awareness</option>
                        <option value="Consideration">Consideration</option>
                        <option value="Decision">Decision</option>
                        <option value="Use">Use</option>
                        <option value="Loyalty">Loyalty</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
