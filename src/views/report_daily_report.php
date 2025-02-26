<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงาน Daily Report</b>
</div>
<p style="padding: 10px 20px;" class="font-custom-awl-14">
    <b>ค้นหาลูกค้า</b> 
    <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . ">
    <button class="btn-custom-awl">Search</button>
</p>
<hr style="margin: 20px 0px;">

<p>
    <div style="display: flex; justify-content: space-between; align-items: center;" class="font-custom-awl-14">
        <div style="font-weight: bold;">
            <kbd style="background-color: #EBE4ED; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ plan ไว้เเล้ว
            <kbd style="background-color: #FFFF99; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ไม่ได้ plan ไว้
            <kbd style="background-color: #99FF33; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Sup เพิ่มให้
            <kbd style="background-color: #99FF33; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่สร้างจากประมาณการขาย
            <kbd style="background-color: #66FFFF; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Sup ไปแล้ว
            <kbd style="background-color: #FFCC99; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Copy งานเดิม
        </div>
        <div>
            <a href="dallyreport_register"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;"></a>
            <a href="dallyreport_register"><img src="assets/images/icon_system/print.png" style="width: 30px; height: 30px;"></a>
        </div>
    </div>
</p>
<br>
<div class="table-responsive font-custom-awl-14">
    <table class="table-thead-custom-awl">
        <thead>
            <tr>
                <th style="width: 10%;">วันที่</th>
                <th style="width: 15%;">โรงพยาบาล</th>
                <th style="width: 10%;">หน่วยงาน</th>
                <th style="width: 10%;">ประเภทสินค้า</th>
                <th style="width: 10%;">Activity</th>
                <th style="width: 25%;">รายละเอียด</th>
                <th style="width: 10%;">ผู้ติดต่อ</th>
                <th style="width: 15%;">เขตการขาย</th>
            </tr>
        </thead>
        <tbody>
            <tr style="background-color: #FFFFFF;">
                <td>14 ม.ค. 2568</td>
                <td>โรงพยาบาล</td>
                <td>ตึก</td>
                <td>ชั้น</td>
                <td>หน่วยงาน</td>
                <td>พี่เมย์บอกว่าพี่เมย์สนใจที่จะนำเครื่องวัดน้ำตาลเข้าใช้ที่หน่วยฝากครรภ์เพราะเดิมปัจจุบันในส่วนของโรงบาลมีใช้อยู่สองยี่ห้อคือแอคคิวเช็คและ control พลัส ส่วนยี่ห้อวันทัชนั้น ทางหน่วยจะออกเป็นคูปองเพื่อให้ไปซื้อที่ร้านยา ศิริราชบำรุงเวชช ศิริราชบำรุงเวช ในราคาที่ 760 บาท ซึ่งจะถูกกว่าขายคนทั่วไปพี่เมย์บอกว่าหากสนใจที่จะนำทำเข้าโรงพยาบาลต้องไปเสนอที่อาจารย์ ดิฐกานต์ โดยอาจารย์จะลงตรวจทุกวันจันทร์ เพราะอาจารย์ก็ให้ยี่ห้อวันทัช เสนอเข้าเหมือนกัน</td>
                <td>ผู้ติดต่อ</td>
                <td>S24</td>
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
