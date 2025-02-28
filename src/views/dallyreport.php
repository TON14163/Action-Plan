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
<?php 
// กำหนดจำนวนรายการต่อหน้า (ปรับตามที่คอมไหว เช่น 500)
$items_per_page = 50; 

// รับหมายเลขหน้าปัจจุบันจาก URL (ถ้าไม่มีให้เริ่มที่หน้า 1)
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// คำนวณ OFFSET สำหรับ SQL
$offset = ($page - 1) * $items_per_page;

// นับจำนวนข้อมูลทั้งหมดในตาราง
$countSQL = "SELECT COUNT(*) as total FROM tb_register_data";
$countQuery = mysqli_query($conn, $countSQL);
$countResult = mysqli_fetch_array($countQuery);
$total_items = $countResult['total'];

// คำนวณจำนวนหน้าทั้งหมด
$total_pages = ceil($total_items / $items_per_page);

// กำหนดจำนวนหน้าที่แสดงใน Pagination (7 หน้า)
$max_pages_display = 7;

// คำนวณหน้าเริ่มต้นและหน้าสิ้นสุดสำหรับแสดงผล
$half_pages = floor($max_pages_display / 2); // ครึ่งหนึ่งของ 7 = 3
$start_page = max(1, $page - $half_pages); // หน้าเริ่มต้น (ไม่ต่ำกว่า 1)
$end_page = $start_page + $max_pages_display - 1; // หน้าสิ้นสุด

// ปรับถ้าท้ายสุดเกินจำนวนหน้าทั้งหมด
if ($end_page > $total_pages) {
    $end_page = $total_pages;
    $start_page = max(1, $end_page - $max_pages_display + 1);
}

$strSQL = "SELECT * FROM tb_register_data LIMIT $items_per_page OFFSET $offset";
$objQuery = mysqli_query($conn,$strSQL);
if (!$objQuery) {
    die("เกิดข้อผิดพลาด: " . mysqli_error($conn));
}
while($objResult = mysqli_fetch_array($objQuery)) { ?>
            <tr style="background-color: #99FF33;">
                <td><?php echo $objResult["date_plan"];?></td>
                <td><?php echo $objResult["hospital_name"];?></td>
                <td><?php echo $objResult["hospital_buiding"];?></td>
                <td><?php echo $objResult["hospital_class"];?></td>
                <td><?php echo $objResult["hospital_ward"];?></td>
                <td><?php echo $objResult["hospital_contact"];?></td>
                <td>ผู้ติดต่อ</td>
                <td><img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;"></td>
            </tr>
<?php } ?>
</tbody>
    </table>
    <br>
    <p>พบทั้งหมด 1 รายการ : จำนวน 1 หน้า : 1</p>
<section>
<!-- Pagination Controls -->
<div class="pagination" style="margin-top: 20px; text-align: center;">
    <?php if ($page > 1) { ?>
        <a href="?page=<?php echo $page - 1; ?>" style="padding: 5px 10px; text-decoration: none;">« ก่อนหน้า</a>
    <?php } ?>

    <?php for ($i = $start_page; $i <= $end_page; $i++) { ?>
        <a href="?page=<?php echo $i; ?>" style="padding: 5px 10px; text-decoration: none; <?php echo $i == $page ? 'font-weight: bold;' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php } ?>

    <?php if ($page < $total_pages) { ?>
        <a href="?page=<?php echo $page + 1; ?>" style="padding: 5px 10px; text-decoration: none;">ถัดไป »</a>
    <?php } ?>
</div>

<!-- แสดงข้อมูลเพิ่มเติม -->
<div style="margin-top: 10px;">
    จำนวนข้อมูลทั้งหมด: <?php echo number_format($total_items); ?> รายการ | 
    หน้า <?php echo $page; ?> จาก <?php echo $total_pages; ?> | 
    แสดงหน้าละ <?php echo $items_per_page; ?> รายการ
</div>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>
</section>
</div>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
