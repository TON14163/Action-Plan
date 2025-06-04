<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <?php if(isset($_GET["dallyadd"])){ ?>
        <b style="font-size: 20px;">Daily Report Add</b>
    <?php } else { ?>
        <b style="font-size: 20px;">สร้าง Action Plan</b>
    <?php } ?>
</div>
<form action="<?php echo $url;?>" enctype="multipart/form-data" method="get">
<p style="padding: 0px 20px;">
    <div>
        <div style="display: flex;">
            <label for="customer"><b>ค้นหาลูกค้า : </b></label> &nbsp;
            <?php if(isset($_GET["dallyadd"])){?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
            <input style="width: 250px;" type="text" name="cus_keyword" id="cus_keyword" autocomplete="off" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['cus_keyword']) ? htmlspecialchars($_GET['cus_keyword']) : ''; ?>" >
            <button class="btn-custom-awl">Search</button>
        </div>
        <div id="customerDropdown" class="customerDropdown">
            <div class="customerSelectNewView" style="background-color:#FCFCFC; position: relative; padding:2px; border-radius: 8px;"></div>
        </div>
    </div>
</p>
</form> 
<hr style="margin: 20px 0px;">
<form action="actionplan_list" enctype="multipart/form-data" method="POST">
<?php if(isset($_GET["id"])){?><input type='hidden' id="id_ref" name="id_ref" value="<?php echo $_GET["id"]; ?>"><?php } ?>
<?php if(isset($_GET["dallyadd"])){?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
<p style="padding: 0px 20px;">
    <b>วันที่</b>
    <input type="date" name="date_keyword" id="date_keyword">
    <button class="btn-custom-awl" style="background-color: #16BE00;">ส่งข้อมูล</button>
</p>
<div class="table-responsive px-2">
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th data-orderable="false" style="width: 5%;">Visit</th>
                <th data-orderable="false" style="width: 20%;">โรงพยาบาล</th>
                <th data-orderable="false" style="width: 20%;">ตึก</th>
                <th data-orderable="false" style="width: 5%;">ชั้น</th>
                <th data-orderable="false" style="width: 20%;">หน่วยงาน</th>
                <th data-orderable="false" style="width: 15%;">ผู้ติดต่อ</th>
                <th data-orderable="false" style="width: 15%;">วัตถุประสงค์</th>
            </tr>
        </thead>
    </table>
</div>
    <script>
    $(document).ready(function() {
        var cus_Keyword = "<?php echo !empty($_GET['cus_keyword']) ? htmlspecialchars($_GET['cus_keyword']) : ''; ?>";
        $('#unitTable').DataTable({
            "lengthChange": false,
            "searching": false, 
            "processing": true,
            "serverSide": true,
            "pageLength": 50,
            "order": [],
            "ajax": {
                "url": `<?php echo $actionplan_api;?>`,
                "type": "POST",
                "data": function(d) {
                    d.cus_keyword = cus_Keyword;
                },
                "dataSrc": "data"
            },
            "columns": [
                { "data": "col0", "orderable": false },
                { "data": "col1", "orderable": false },
                { "data": "col2" },
                { "data": "col3" },
                { "data": "col4" },
                { "data": "col5" },
                { "data": "col6" }
            ],
            "language": {
                "info": "พบทั้งหมด _TOTAL_ รายการ : จำนวน _PAGES_ หน้า : _PAGE_",
                "infoFiltered": ""
            }
        });
    });
    </script>
</form> 
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
<!-- 
<script>
    // ใช้ fetch API เพื่อดึงข้อมูลจาก API
    fetch(`<?php // echo $cumapi;?>`)
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
</script> -->


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