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
                <?php if($_SESSION['typelogin'] == 'Supervisor'){ $saleSet = ''; ?>
                    <select class="form-select-custom-awl" name="sale_code" id="sale_code">
                        <option value="">Please Select</option>
                        <?php
                        switch ($_SESSION["head_area"]) {
                            case 'SM1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_sm1 "; break;
                            case 'SS1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 "; break;
                            case 'SS2': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss2 "; break;
                            case 'SS3': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss3 "; break;
                            default:
                                $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 
                                UNION sale_code,sale_name FROM tb_team_ss2
                                UNION sale_code,sale_name FROM tb_team_ss3
                                UNION sale_code,sale_name FROM tb_team_sm1 ";
                            break;
                        }
                        $objQuery5 = mysqli_query($conn, $strSQL5);
                        while ($objResuut5 = mysqli_fetch_array($objQuery5)) {  
                            $selected = (!empty($_GET['sale_code']) && $_GET['sale_code'] == $objResuut5["sale_code"]) ? 'selected' : '';
                            echo '<option value="' . htmlspecialchars($objResuut5["sale_code"]) . '" ' . $selected . '>' . htmlspecialchars($objResuut5["sale_code"]) . ' - ' . htmlspecialchars($objResuut5["sale_name"]) . '</option>';
                        }
                        ?>
                    </select>
                <?php } else { $saleSet = $_SESSION['em_id']; ?> 
                    <input type="text" style="text-align: center;" name="sale_code" id="sale_code" value="<?php echo $_SESSION['em_id'];?>" readonly> 
                <?php } ?>
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
        <div>
            <img src="assets/images/add-plus.png" style="width: 30px; height: 30px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <form action="#" enctype="multipart/form-data" method="post">
            <!-- <form action="<?php // echo $url;?>" enctype="multipart/form-data" method="post"> -->
                <!--  -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ลงทะเบียนทั่วไป</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row" style="line-height: 2.5;">
                                    <div class="col-6 p-5">
                                        <b>วันที่</b> : <input style="width: 261px; margin-left:45px;" type="date" name="" id="">
                                        <br>
                                        <b>เขตการขาย</b> : 
                                        <select style="width: 261px;" name="" id="">
                                            <option value="">Please Select</option>"></option>
                                        </select>
                                        <br>
                                                <label for="customer"><b>โรงพยาบาล :</b></label>
                                                <?php if(isset($_GET["dallyadd"])){?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
                                                <input type="search" class="form-search-custom-awl" list="customerSelect" id="cus_keyword" name="cus_keyword" autocomplete="off" placeholder="ระบุข้อมูล . . . " value="<?php  echo !empty($_GET['cus_keyword']) ? htmlspecialchars($_GET['cus_keyword']) : ''; ?>"  />
                                                <datalist id="customerSelect">
                                                    <option value="">-- เลือกลูกค้า --</option>
                                                </datalist>
                                        <br>
                                        <b>รายละเอียด</b> : <br> <textarea style="width: 100%;" name="" id="" rows="4"></textarea>
                                    </div>
                                    <div class="col-6 p-5">
                                        <b>แนบไฟล์</b> 
                                        <span><input type="file" name="" id="" style="width: 100%;"></span>
                                        <span><input type="file" name="" id="" style="width: 100%;"></span>
                                        <span><input type="file" name="" id="" style="width: 100%;"></span>
                                        <span><input type="file" name="" id="" style="width: 100%;"></span>
                                        <span><input type="file" name="" id="" style="width: 100%;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-custom-awl btn bg-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn-custom-awl btn" style="background-color: #19D700;"> <img src="assets/images/icon_system/icon-park--save-one.png" style="width:15px; height:15px; color:#FFFFFF;"> Save Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!--  -->
            </form>
        </div>
    </div>
</p>
<div class="table-responsive mt-3 px-2">
    <table id="the_matter" class="table-thead-custom-awl table-bordered border-secondary p-0 w-100" >
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
                // "initComplete": function() {
                //     this.api().column(1).visible(false); // ซ่อนคอลัมน์ที่ 1
                // }
            });
        });
    </script>
</div>
<?php 
    $content = ob_get_clean();
    require_once __DIR__ . '/layouts/Main.php';
?>

<script>
    // ใช้ fetch API เพื่อดึงข้อมูลจาก API
    fetch(`<?php echo $cumapi;?>`)
        // fetch(<?php // echo $customerapi;?>)
        .then(response => response.json())
        .then(data => {
            var selectElement = document.getElementById('customerSelect');
            
            data.forEach(function(customer) {
                var option = document.createElement('option');
                option.value = customer.customer_name;
                option.textContent = customer.customer_name;
                selectElement.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
</script>