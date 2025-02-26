<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">สร้าง Dally Report</b>
</div>
<p style="padding: 10px 20px;">
    <b>วันที่</b> 
    <input type="date" name="" id="">
    <b>Sale</b> 
    <select class="form-select-custom-awl" name="" id="">
        <option value="">Please Select</option>
        <option value="key">User</option>
    </select>
    <button class="btn-custom-awl">Search</button>
</p>
<hr style="margin: 20px 0px;">

<p>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div style="font-weight: bold;">
            <kbd style="background-color: #EBE4ED; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ plan ไว้แล้ว
            <kbd style="background-color: #FFFF99; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ไม่ได้ plan ไว้
            <kbd style="background-color: #99FF33; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Sup เพิ่มให้
            <kbd style="background-color: #DDA0DD; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่สร้างจากประมาณการขาย
            <kbd style="background-color: #66FFFF; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Sup ไปแล้ว
            <kbd style="background-color: #FFCC99; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Copy งานเดิม
        </div>
        <div><a href="dallyreport_register"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;"></a></div>
    </div>
</p>
<br>
<div class="table-responsive">
    <table class="table-thead-custom-awl">
        <thead>
            <tr>
                <th style="width: 15%;">วันที่</th>
                <th style="width: 25%;">โรงพยาบาล</th>
                <th style="width: 15%;">ตึก</th>
                <th style="width: 5%;">ชั้น</th>
                <th style="width: 10%;">หน่วยงาน</th>
                <th style="width: 15%;">ผู้ติดต่อ</th>
                <th style="width: 15%;">เขตการขาย</th>
                <th style="width: 5%;">Edit</th>
            </tr>
        </thead>
        <tbody>
            <tr style="background-color: #99FF33;">
                <td>14 ม.ค. 2568</td>
                <td>โรงพยาบาล</td>
                <td>ตึก</td>
                <td>ชั้น</td>
                <td>หน่วยงาน</td>
                <td>ผู้ติดต่อ</td>
                <td>ผู้ติดต่อ</td>
                <td><img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;"></td>
            </tr>
            <tr style="background-color: #FFFF99;">
                <td>14 ม.ค. 2568</td>
                <td>โรงพยาบาล</td>
                <td>ตึก</td>
                <td>ชั้น</td>
                <td>หน่วยงาน</td>
                <td>ผู้ติดต่อ</td>
                <td>ผู้ติดต่อ</td>
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
