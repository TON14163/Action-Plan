<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">สร้าง Dally Report</b>
</div>
<p style="padding: 10px 20px;">
    <b>วันที่</b> 
    <input type="date" name="" id="">
    <b>Sale</b> 
    <select class="form-select-custom-awl" name="" id="">
        <option value="">Please Select</option>
<?php
$strSQL5 = "SELECT * FROM tb_unit ";
$objQuery5 = mysqli_query($conn,$strSQL5);
while($objResuut5 = mysqli_fetch_array($objQuery5)){ ?>
		<option value=""><?php echo $objResuut5["unit_name"];?></option>
<?php } ?>
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
    <table id="employeeTable" class="table-thead-custom-awl">
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
    </table>
    <script>
        $(document).ready(function() {
            $('#employeeTable').DataTable({
                "processing": true, // แสดง "Processing..." ขณะโหลดข้อมูล
                "serverSide": true, // ใช้ Server-Side Processing
                "ajax": {
                    "url": "dallyreport_fetch.php", // ไฟล์ PHP ที่จะดึงข้อมูล
                    "type": "POST" // ใช้ POST เพื่อส่งข้อมูล
                },
                "columns": [
                    { "data": "id" },
                    { "data": "em_id" },
                    { "data": "user_id" },
                    { "data": "pass" },
                    { "data": "name" }
                ]
            });
        });
    </script>
</div>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
