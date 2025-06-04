<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 

if (!empty($_GET['noti'])) { ?>
    <div style="position: fixed; top:30px; right: 20px;" class="alert alert-success alert-dismissible fade show" role="alert">
        <img src="assets/images/icon_system/lets-icons--check-fill.svg" style="width: 20px; height: 20px;"> 
        <?php if ($_GET['noti'] == 1) { 
            echo 'ลงทะเบียนข้อมูลลูกค้าสำเร็จแล้ว';
        } else { 
            echo 'แก้ไขข้อมูลลูกค้าสำเร็จแล้ว';
        } ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        setTimeout(function() {
            let alertEl = document.querySelector('.alert');
            if (alertEl) alertEl.style.display = 'none';
        }, 4000);
    </script>
<?php } ?>

<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ข้อมูลลูกค้า</b>
</div>

<section style="padding: 0px 20px;" class="font-custom-awl-14">
    <div style="display:flex; justify-content: space-between; align-items: center;">
        <form action="<?php echo $url; ?>" enctype="multipart/form-data" method="get">
            <div>
                <div style="display: flex;">
                    <label for="customer"><b>ค้นหา : </b></label> &nbsp;
                    <input style="width: 250px;" type="text" name="cus_keyword" id="cus_keyword" autocomplete="off" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['cus_keyword']) ? htmlspecialchars($_GET['cus_keyword']) : ''; ?>" >
                    <button class="btn-custom-awl">Search</button>
                </div>
                <div id="customerDropdown" class="customerDropdown">
                    <div class="customerSelectNewView" style="background-color:#FCFCFC; position: relative; padding:2px; border-radius: 8px;"></div>
                </div>
            </div>
        </form> 
        <div>
            <?php if($_SESSION["ext"] == 'IT2' OR  $_SESSION["ext"] == 'PRM') { ?>
            <!-- ลงทะเบียนข้อมูลลูกค้า Modal start -->
            <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                <img src="assets/images/add-plus.png" style="width: 30px; height: 30px;">
            </span>
            <?php include 'components/user_customer_from.php'; ?>
            <!-- ลงทะเบียนข้อมูลลูกค้า Modal end -->
            <?php } ?>
        </div>
    </div>
</section>

<hr style="margin: 20px 0px;">
<div class="table-responsive font-custom-awl-14 px-2">
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
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
                <?php if($_SESSION["ext"] == 'IT2' OR  $_SESSION["ext"] == 'PRM') { ?>
                <th data-orderable="false" style="width: 5%;">Edit</th>
                <?php } ?>
            </tr>
        </thead>
    </table>
    <?php include 'components/user_customer_edit.php'; ?>
    <div hidden>
        <script>
            $(document).ready(function() {
                var cus_keyword = "<?php echo !empty($_GET['cus_keyword']) ? htmlspecialchars($_GET['cus_keyword']) : ''; ?>";
                
                $('#unitTable').DataTable({
                    "lengthChange": false,
                    "searching": false, 
                    "processing": true,
                    "serverSide": true,
                    "pageLength": 50,
                    "order": [],
                    "ajax": {
                        "url": `<?=$usercustomer1_api;?>`,
                        "type": "POST",
                        "data": function(d) {
                            d.cus_keyword = cus_keyword; // ส่ง cus_keyword ไปยัง API
                        },
                        "dataSrc": "data"
                    },
                    "columns": [
                        { "data": "id_hospital" },
                        { "data": "title_name" },
                        { "data": "customer_name" },
                        { "data": "sale_area" },
                        { "data": "address_name" },
                        { "data": "province" },
                        { "data": "customer_tel" },
                        { "data": "customer_credit" },
                        <?php if($_SESSION["ext"] == 'IT2' OR  $_SESSION["ext"] == 'PRM') { ?>
                        { "data": "edit" }
                        <?php } ?>
                    ],
                    "language": {
                        "info": "พบทั้งหมด _TOTAL_ รายการ : จำนวน _PAGES_ หน้า : _PAGE_",
                        "infoFiltered": ""
                    }
                });
            });
        </script>
    </div>
</div>

<?php 
    $content = ob_get_clean();
    require_once __DIR__ . '/layouts/Main.php';
?>

<script>
    // fetch(`<?php // echo $cumapi_hos; ?>`)
    //     .then(response => response.json())
    //     .then(data => {
    //         var selectElement = document.getElementById('customerSelect');
    //         data.forEach(function(customer) {
    //             var option = document.createElement('option');
    //             option.value = customer.customer_name;
    //             option.textContent = customer.customer_name;
    //             selectElement.appendChild(option);
    //         });
    //     })
    //     .catch(error => console.error('Error:', error));
</script>







<script>
        let customersData = [];
        fetch(`<?php echo $cumapi_hos;?>`)
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