<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 


if (!empty($_GET['noti'])) { ?>
    <div style="position: fixed; top:30px; right: 20px; " class="alert alert-success alert-dismissible fade show" role="alert">
        <img src="assets/images/icon_system/lets-icons--check-fill.svg" style="width: 20px; height: 20px;"> <?php if($_GET['noti'] == 1){ echo 'ลงทะเบียนข้อมูลลูกค้าสำเร็จแล้ว';} else { echo 'แก้ไขข้อมูลลูกค้าสำเร็จแล้ว';}?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        setTimeout(function() {
            let alertEl = document.querySelector('.alert');
            if (alertEl) alertEl.style.display = 'none';
        }, 4000);
    </script>
<?php } 
?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ข้อมูลลูกค้า</b>
</div>
<section style="padding: 0px 20px;" class="font-custom-awl-14">
        <div style="display:flex; justify-content: space-between; ">
            <div>
                <form action="<?php echo $url;?>" enctype="multipart/form-data" method="get">
                    <b>ค้นหา</b> 
                    <input type="text" class="form-search-custom-awl" name="cuss_earch" id="cuss_earch" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['cuss_earch']) ? htmlspecialchars($_GET['cuss_earch']) : ''; ?>">
                    <button class="btn-custom-awl">Search</button>
                </form>
            </div>
            <div>
                <!-- ลงทะเบียนข้อมูลลูกค้า Modal start -->
                    <span data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;"></span>
                    <?php include 'components/user_customer_from.php'; ?>
                <!-- ลงทะเบียนข้อมูลลูกค้า Modal end -->
            </div>
        </div>
</section>
<hr style="margin: 20px 0px;">
<div class="table-responsive font-custom-awl-14 px-2">
    <table id="unitTable"  class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th data-orderable="false" style="width: 11%;">รหัสลูกค้า</th>
                <th data-orderable="false" style="width: 11%;">คำนำหน้า</th>
                <th data-orderable="false" style="width: 11%;">ชื่อลูกค้า</th>
                <th data-orderable="false" style="width: 11%;">เขตการขาย</th>
                <th data-orderable="false" style="width: 18%;">ที่อยู่</th>
                <th data-orderable="false" style="width: 11%;">จังหวัด</th>
                <th data-orderable="false" style="width: 11%;">เบอร์โทรศัพท์</th>
                <th data-orderable="false" style="width: 11%;">เครดิต</th>
                <th data-orderable="false" style="width: 5%;">Edit</th>
            </tr>
        </thead>
    </table>
    <?php include 'components/user_customer_edit.php'; ?>
<div hidden>
    <script>
        $(document).ready(function() {
            var cuss_Earch = "<?php echo !empty($_GET['cuss_earch']) ? htmlspecialchars($_GET['cuss_earch']) : ''; ?>";
            
            $('#unitTable').DataTable({
                "lengthChange": false,
                "searching": false, 
                "processing": true, // แสดง "Processing..." ขณะโหลด
                "serverSide": true, // เปิดใช้งาน Server-Side Processing
                "pageLength": 50,
                "order": [],
                "ajax": {
                    "url": `<?=$usercustomer1_api;?>`, // เข้าถึงจาก env
                    "type": "POST", // ใช้ POST เพื่อส่งพารามิเตอร์
                    "data": function(d) {
                        d.cuss_earch = cuss_Earch; // ส่ง ค้นหาไปยัง API
                    },
                    "dataSrc": "data" // ชี้ไปที่ key "data" ใน JSON
                },
                "columns": [
                    { "data": "id_hospital" },   // คอลัมน์แรกแสดง id
                    { "data": "title_name" },
                    { "data": "customer_name" },
                    { "data": "sale_area" },
                    { "data": "address_name" },
                    { "data": "province" },
                    { "data": "customer_tel" },
                    { "data": "customer_credit" },
                    { "data": "edit" }
                ],
                "language": {
                    "info": "พบทั้งหมด _TOTAL_ รายการ : จำนวน _PAGES_ หน้า : _PAGE_",
                    "infoFiltered": "" // ลบส่วน filtered from ออก
                },
                "initComplete": function() {
                    this.api().column(1).visible(false); // ซ่อนคอลัมน์ที่ 1
                }
            });
        });
    </script>
</div>
</div>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
