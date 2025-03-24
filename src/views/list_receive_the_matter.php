<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<style>
.table-thead-custom-awl td:nth-child(3) {
    padding: 0px 5px;
    text-align: left;
}
</style>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายการรับเรื่องและส่งต่อข้อมูล</b>
</div>
<p style="padding: 0px 20px;">
    <form action="<?php echo $url;?>" enctype="multipart/form-data" method="get">
        <b>วันที่</b> <input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>">
        <b>ถึง</b> <input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>">
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

<p>
    <div style="display: flex; justify-content: space-between; align-items: center;" class="px-2">
        <div style="font-weight: bold;">
            <kbd style="background-color: #FFFF99; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;"> </kbd> เพิ่มโดย Sup
            <kbd style="background-color: #FFCCFF; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;"> </kbd> เพิ่มโดย Marketing
        </div>
        <div><a href="#"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;"></a></div>
    </div>
</p>
<div class="table-responsive mt-3 px-2">
    <table id="the_matter" class="table-thead-custom-awl table-bordered border-secondary p-0" >
        <thead>
            <tr>
                <th data-orderable="false" style="width: 10%;">วันที่</th>
                <th data-orderable="false" style="width: 15%;">โรงพยาบาล</th>
                <th data-orderable="false" style="width: 25%;">รายละเอียด</th>
                <th data-orderable="false" style="width: 10%;">ไฟล์อัพโหลด</th>
                <th data-orderable="false" style="width: 15%;">ผู้ลงข้อมูล</th>
                <th data-orderable="false" style="width: 10%;">เขตการขาย</th>
                <th data-orderable="false" style="width: 10%;">สร้าง Action</th>
                <th data-orderable="false" style="width: 5%;">Edit</th>
            </tr>
        </thead>
    </table>
    <script>
        $(document).ready(function() {
            var dateStart = "<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>";
            var dateEnd = "<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>";
            var saleCode = "<?php echo !empty($_GET['sale_code']) ? htmlspecialchars($_GET['sale_code']) : ''; ?>";
            
            $('#the_matter').DataTable({
                "lengthChange": false,
                "searching": false, 
                "processing": true,
                "serverSide": true,
                "pageLength": 50,
                "order": [],
                "ajax": {
                    "url": `<?php echo $listreceivethematter1_api;?>`, // เข้าถึงจาก env
                    "type": "POST",
                    "data": function(d) {
                        d.date_start = dateStart;
                        d.date_end = dateEnd;
                        d.sale_code = saleCode;
                    },
                    "dataSrc": "data"
                },
                "columns": [
                    { "data": "date_salemk" },
                    { "data": "customer_name" },
                    { "data": "description" },
                    { "data": "imgFull" },
                    { "data": "add_by" },
                    { "data": "code" },
                    { "data": "create_action" },
                    { "data": "edit" }
                ],
                "columnDefs": [
                    {
                        "targets": 6, // คอลัมน์ "สร้าง Action"
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if (rowData.ckk_open === '1') {
                                $(td).css('background-color', '#00FF00'); // สีเขียวอ่อน
                            }
                        }
                    }
                ],
                "createdRow": function(row, data, dataIndex) {
                    switch (data.type_save) {
                        case '1': $(row).css('background-color', '#FFFF99'); break;
                        case '2': $(row).css('background-color', '#FFCCFF'); break;
                        default: $(row).css('background-color', '#FFFFFF');
                    }
                },
                "language": {
                    "info": "พบทั้งหมด _TOTAL_ รายการ : จำนวน _PAGES_ หน้า : _PAGE_",
                    "infoFiltered": ""
                },
                "initComplete": function() {
                    this.api().column(1).visible(false); // ซ่อนคอลัมน์ที่ 1
                }
            });
        });
    </script>
</div>
<?php 
    $content = ob_get_clean();
    require_once __DIR__ . '/layouts/Main.php';
?>