<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">สร้าง Dally Report</b>
</div>
<p style="padding: 0px 20px;">
    <form action="<?php echo $url;?>" enctype="multipart/form-data" method="get">
        <b>วันที่</b> <input type="date" name="date_plan" id="date_plan" value="<?php echo !empty($_GET['date_plan']) ? htmlspecialchars($_GET['date_plan']) : ''; ?>">
        <b>Sale</b> 
        <select class="form-select-custom-awl" name="sale_code" id="sale_code">
            <option value="">Please Select</option>
            <?php
            $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 
            UNION SELECT sale_code,sale_name FROM tb_team_ss2
            UNION SELECT sale_code,sale_name FROM tb_team_ss3
            ";
            $objQuery5 = mysqli_query($conn, $strSQL5);
            while ($objResuut5 = mysqli_fetch_array($objQuery5)) {  
                $selected = (!empty($_GET['sale_code']) && $_GET['sale_code'] == $objResuut5["sale_code"]) ? 'selected' : '';
                echo '<option value="' . htmlspecialchars($objResuut5["sale_code"]) . '" ' . $selected . '>' . htmlspecialchars($objResuut5["sale_code"]) . ' - ' . htmlspecialchars($objResuut5["sale_name"]) . '</option>';
            }
            ?>
        </select>
        <button class="btn-custom-awl">Search</button>
    </form>
</p>
<hr style="margin: 20px 0px;">

<section class="font-custom-awl-14 px-2">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div style="font-weight: bold;">
            <kbd style="background-color: #EBE4ED; width: 20px; max-height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ plan ไว้แล้ว
            <kbd style="background-color: #FFFF99; width: 20px; max-height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ไม่ได้ plan ไว้
            <kbd style="background-color: #99FF33; width: 20px; max-height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Sup เพิ่มให้
            <kbd style="background-color: #DDA0DD; width: 20px; max-height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่สร้างจากประมาณการขาย
            <kbd style="background-color: #66FFFF; width: 20px; max-height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Sup ไปแล้ว
            <kbd style="background-color: #FFCC99; width: 20px; max-height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Copy งานเดิม
        </div>
        <div><a href="dallyreport_register"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;"></a></div>
    </div>
</section>
<div class="table-responsive mt-3 px-2">
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary" >
        <thead>
            <tr>
                <th data-orderable="false" style="width: 15%;">วันที่</th>
                <th data-orderable="false" style="width: 30%;">โรงพยาบาล</th>
                <th data-orderable="false" style="width: 10%;">ตึก</th>
                <th data-orderable="false" style="width: 10%;">ชั้น</th>
                <th data-orderable="false" style="width: 10%;">หน่วยงาน</th>
                <th data-orderable="false" style="width: 10%;">ผู้ติดต่อ</th>
                <th data-orderable="false" style="width: 10%;">เขตการขาย</th>
                <th data-orderable="false" style="width: 5%;">Edit</th>
            </tr>
        </thead>
    </table>
    <script>
        $(document).ready(function() {
            var datePlan = "<?php echo !empty($_GET['date_plan']) ? htmlspecialchars($_GET['date_plan']) : ''; ?>";
            var saleCode = "<?php echo !empty($_GET['sale_code']) ? htmlspecialchars($_GET['sale_code']) : ''; ?>";
            
            $('#unitTable').DataTable({
                "lengthChange": false,
                "searching": false, 
                "processing": true, // แสดง "Processing..." ขณะโหลด
                "serverSide": true, // เปิดใช้งาน Server-Side Processing
                "pageLength": 50,
                "order": [],
                "ajax": {
                    "url": `<?php echo $dallyreport1_api;?>`, // เข้าถึงจาก env
                    "type": "POST", // ใช้ POST เพื่อส่งพารามิเตอร์
                    "data": function(d) {
                        d.date_plan = datePlan; // ส่ง date_plan
                        d.sale_code = saleCode; // ส่ง Sale 
                    },
                    "dataSrc": "data" // ชี้ไปที่ key "data" ใน JSON
                },
                "columns": [
                    { "data": "date_plan" },   // คอลัมน์แรกแสดง id
                    { "data": "hospital_name" },
                    { "data": "hospital_buiding" },
                    { "data": "hospital_class" },
                    { "data": "hospital_ward" },
                    { "data": "hospital_contact" },
                    { "data": "sales_area" },
                    { "data": "edit" }
                ],
                "createdRow": function(row, data, dataIndex) {
                    // ใช้ data.daily โดยตรง
                    switch (data.daily) {
                        case '0': $(row).css('background-color', '#EBE4ED'); break;
                        case '1': $(row).css('background-color', '#FFFF99'); break;
                        case '2': $(row).css('background-color', '#99FF33'); break;
                        case '3': $(row).css('background-color', '#DDA0DD'); break;
                        case '4': $(row).css('background-color', '#66FFFF'); break;
                        case '5': $(row).css('background-color', '#FFCC99'); break;
                        default: $(row).css('background-color', '#FFFFFF');
                    }
                },
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
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
