<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานคู่แข่ง</b>
</div>

<p style="padding: 10px 20px;" class="font-custom-awl-14">
<div style="display:flex; justify-content: space-between; margin-bottom: 15px;">
<div>
    <b>วันที่</b> <input type="date" name="" id="">
    <b>ถึง</b> <input type="date" name="" id="">
    </div>
        <div>
            <a href="#"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;"></a>
        </div>
    </div>
    <b>โรงพยาบาล</b> 
    <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
    <b>ประเภทสินค้า</b> 
    <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
    <b>Sale</b> 
    <select class="form-select-custom-awl" name="" id="">
        <option value="">Please Select</option>
        <option value="key">User</option>
    </select>
    <button class="btn-custom-awl">Search</button>
    <br><br>
    <input type="checkbox" name="" id=""> <label for="">ผลการเปิดซอง</label>
</p>

<hr style="margin: 20px 0px;">

<div class="table-responsive font-custom-awl-14">
    <table class="table-thead-custom-awl">
        <thead>
            <tr>
                <th style="width: 5%;">วันที่</th>
                <th style="width: 5%;">โรงพยาบาล</th>
                <th style="width: 5%;">หน่วยงาน</th>
                <th style="width: 5%;">ประเภทสินค้า</th>
                <th style="width: 5%;">บริษัทคู่เเข่ง</th>
                <th style="width: 5%;">ยี่ห้อ</th>
                <th style="width: 5%;">รุ่น</th>
                <th style="width: 5%;">ประเทศ</th>
                <th style="width: 5%;">ราคา/หน่วย</th>
                <th style="width: 5%;">จำนวนซื้อ</th>
                <th style="width: 5%;">เงื่อนไขพิเศษ</th>
                <th style="width: 5%;">วันที่เปิดซอง</th>
                <th style="width: 5%;">เขตการขาย</th>
                <th style="width: 5%;">Edit</th>
            </tr>
        </thead>
        <tbody>
            <tr style="background-color: #FFFFFF;">
                <td>วันที่</td>
                <td>โรงพยาบาล</td>
                <td>หน่วยงาน</td>
                <td>ประเภทสินค้า</td>
                <td>บริษัทคู่เเข่ง</td>
                <td>ยี่ห้อ</td>
                <td>รุ่น</td>
                <td>ประเทศ</td>
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
