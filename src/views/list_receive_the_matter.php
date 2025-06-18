<?php 
ob_start(); // เปิดใช้งานการเก็บข้อมูล content
error_reporting(0);
$sale_code = isset($_GET['sale_code']) ? $_GET['sale_code'] : ($_SESSION['em_id'] ?? '');
if($_POST['save'] == 1){

    if($_SESSION['typelogin'] == 'Marketing' OR $_SESSION['name_show'] == 'ลักษณาวรรณ'){
        $type_save = '2';	
    } else {
        $type_save = '1';		
    }

if ($_FILES['img_1']['size'] == 0) {
$img_1 = "";
}else if ($_FILES['img_1']['size'] > 1100000) {
echo"<script>alert('กรุณแนบไฟล์ที่มีขนาด น้อยกว่าหรือเท่ากับ 1 MB');history.back();</script>";
exit();
}   else if ($_FILES['img_1']['size'] != 0) {
$temp1 = explode(".", $_FILES["img_1"]["name"]);
$img_1 = "img_1" . "_" . round(microtime(true)) . '.' . end($temp1);
move_uploaded_file($_FILES["img_1"]["tmp_name"], "uploads/" . $img_1);
}	

	
	
if ($_FILES['img_2']['size'] == 0) {
$img_2 = "";
}else if ($_FILES['img_2']['size'] > 1100000) {
echo"<script>alert('กรุณแนบไฟล์ที่มีขนาด น้อยกว่าหรือเท่ากับ 1 MB');history.back();</script>";
exit();
}   else if ($_FILES['img_2']['size'] != 0) {
$temp2 = explode(".", $_FILES["img_2"]["name"]);
$img_2 = "img_2" . "_" . round(microtime(true)) . '.' . end($temp2);
move_uploaded_file($_FILES["img_2"]["tmp_name"], "uploads/" . $img_2);
}	
	
	
if ($_FILES['img_3']['size'] == 0) {
$img_3 = "";
}else if ($_FILES['img_3']['size'] > 1100000) {
echo"<script>alert('กรุณแนบไฟล์ที่มีขนาด น้อยกว่าหรือเท่ากับ 1 MB');history.back();</script>";
exit();
}   else if ($_FILES['img_3']['size'] != 0) {
$temp3 = explode(".", $_FILES["img_3"]["name"]);
$img_3 = "img_3" . "_" . round(microtime(true)) . '.' . end($temp3);
move_uploaded_file($_FILES["img_3"]["tmp_name"], "uploads/" . $img_3);
}	
	
	
if ($_FILES['img_4']['size'] == 0) {
$img_4 = "";
}else if ($_FILES['img_4']['size'] > 1100000) {
echo"<script>alert('กรุณแนบไฟล์ที่มีขนาด น้อยกว่าหรือเท่ากับ 1 MB');history.back();</script>";
exit();
}   else if ($_FILES['img_4']['size'] != 0) {
$temp4 = explode(".", $_FILES["img_4"]["name"]);
$img_4 = "img_4" . "_" . round(microtime(true)) . '.' . end($temp4);
move_uploaded_file($_FILES["img_4"]["tmp_name"], "uploads/" . $img_4);
}	
	
	
	
if ($_FILES['img_5']['size'] == 0) {
$img_5 = "";
}else if ($_FILES['img_5']['size'] > 1100000) {
echo"<script>alert('กรุณแนบไฟล์ที่มีขนาด น้อยกว่าหรือเท่ากับ 1 MB');history.back();</script>";
exit();
}   else if ($_FILES['img_5']['size'] != 0) {
$temp5 = explode(".", $_FILES["img_5"]["name"]);
$img_5 = "img_5" . "_" . round(microtime(true)) . '.' . end($temp5);
move_uploaded_file($_FILES["img_5"]["tmp_name"], "uploads/" . $img_5);
}	

$cuss1 = "SELECT id_customer FROM tb_customer_contact WHERE customer_name = '".$_POST['cus_keyword']."' ";
$qcus1 = mysqli_query($conn, $cuss1);
$customers1 = mysqli_fetch_array($qcus1);


$strSQL =  "INSERT INTO tb_register_salemk (date_salemk,description,add_by,add_date,sale_code,type_save,customer_name,img_1,img_2,img_3,img_4,img_5,customer_id) 
VALUES ('".$_POST['date_salemk']."','".$_POST['description']."','".$_SESSION['name_show']."','".date('Y-m-d')."','".$_POST['sale_codemkadd']."','".$type_save."','".$_POST['cus_keyword']."','".$img_1."','".$img_2."','".$img_3."','".$img_4."','".$img_5."','".$customers1['id_customer']."')";
$objQuery = mysqli_query($conn,$strSQL)  or die(mysqli_error($strSQL));	
// echo $strSQL;
$text = 'กำลังดำเนินการกรุณารอสักครู่...';
require_once __DIR__ . '/../views/Loading_page.php';
echo "<meta http-equiv=refresh content=2;URL=".$_SESSION['thisDomain']."list_receive_the_matter>"; 
mysqli_close($conn);
exit; } ?>
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
        <?php include 'set_area_select.php'; // แสดงในส่วนของ Select sale  ?>
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
            <form action="<?php echo $url;?>" enctype="multipart/form-data" method="post">
            <!-- <form action="<?php // echo $url;?>" enctype="multipart/form-data" method="post"> -->
                <!--  -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ลงทะเบียนทั่วไป</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div style="line-height: 2;">
                                        <input type="hidden" name="save" id="save" value="1">
                                        <b>วันที่ : </b><br>
                                        <input class="form-control" style="width: 100%;" type="date" name="date_salemk" id="date_salemk">
                                        <b>เขตการขาย : </b><br>
                                        <select class="form-select-custom-awl" style="width: 100%;" name="sale_codemkadd" id="sale_codemkadd">
                                            <option value="">Please Select</option>
                                            <?php
                                            $strSQL6 = "SELECT sale_code,sale_name FROM tb_team_ss1 
                                            UNION SELECT sale_code,sale_name FROM tb_team_ss2
                                            UNION SELECT sale_code,sale_name FROM tb_team_ss3
                                            UNION SELECT sale_code,sale_name FROM tb_team_sm1 
                                            ORDER BY sale_code ASC;
                                            ";
                                            $objQuery6 = mysqli_query($conn, $strSQL6);
                                            while ($objResuut6 = mysqli_fetch_array($objQuery6)) {  
                                                echo '<option value="' . htmlspecialchars($objResuut6["sale_code"]) . '" ' . $selected . '>' . htmlspecialchars($objResuut6["sale_code"]) . ' - ' . htmlspecialchars($objResuut6["sale_name"]) . '</option>';
                                            }
                                            ?>
                                        </select>

                                            <label for="customer"><b>ค้นหาลูกค้า : </b></label> <br>
                                            <input style="width: 100%;" type="text" name="cus_keyword" id="cus_keyword" autocomplete="off" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['cus_keyword']) ? htmlspecialchars($_GET['cus_keyword']) : ''; ?>" >
                                            <div id="customerDropdown" class="customerDropdown" style="left:0px;">
                                                <div class="customerSelectNewView" style="background-color:#FCFCFC; position: relative; padding:2px; border-radius: 8px;"></div>
                                            </div>

                                        <br>
                                        <b>รายละเอียด</b> : <br> <textarea style="width: 100%;" name="description" id="description" rows="2"></textarea>
                                        <b>แนบไฟล์</b> 
                                        <span><input class="form-control" type="file" name="img_1" id="img_1" style="width: 100%;"></span>
                                        <span><input class="form-control" type="file" name="img_2" id="img_2" style="width: 100%;"></span>
                                        <span><input class="form-control" type="file" name="img_3" id="img_3" style="width: 100%;"></span>
                                        <span><input class="form-control" type="file" name="img_4" id="img_4" style="width: 100%;"></span>
                                        <span><input class="form-control" type="file" name="img_5" id="img_5" style="width: 100%;"></span>
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
            // var saleCode = "<?php // echo !empty($_GET['sale_code']) ? htmlspecialchars($_GET['sale_code']) : ''; ?>";
            var saleCode = "<?php echo !empty($sale_code) ? htmlspecialchars($sale_code, ENT_QUOTES, 'UTF-8') : ''; ?>";
            
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
                }
                <?php if($_SESSION['typelogin'] != 'Supervisor'){ ?>
                ,"initComplete": function() {
                    this.api().column(5).visible(false); // ซ่อนคอลัมน์ที่ 1
                }
                <?php } ?>
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



    <script>
        let customersData = [];
        fetch(`<?php echo $cumapi;?>`)
            .then(response => response.json())
            .then(data => {
                customersData = data;
            })
            .catch(error => console.error('Error:', error));

        const input = document.getElementById('cus_keyword');
        const dropdown = document.getElementById('customerDropdown');
        const view = dropdown.querySelector('.customerSelectNewView');

        input.addEventListener('input', function() {
            const value = this.value.trim().toLowerCase();
            if (value.length === 0) {
                dropdown.style.display = 'none';
                view.innerHTML = '';
                return;
            }
            const filtered = customersData.filter(c => c.customer_name.toLowerCase().includes(value));
            if (filtered.length === 0) {
                dropdown.style.display = 'none';
                view.innerHTML = '';
                return;
            }
            view.innerHTML = '';
            filtered.forEach(dataValue => {
                let div = document.createElement('div');
                div.textContent = dataValue.customer_name;
                div.onclick = function() {
                    input.value = dataValue.customer_name;
                    dropdown.style.display = 'none';
                };
                view.appendChild(div);
            });
            dropdown.style.display = 'block';
        });

        // Hide dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!input.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>