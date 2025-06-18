<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';
(!isset($_GET['sale_code'])) ? $sale_code = $_SESSION['em_id'] : $sale_code = $_GET['sale_code'] ;
?>

<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานคู่แข่ง</b>
</div>

<p style="padding: 0px 20px;" class="font-custom-awl-14">
<form action="<?php echo $url;?>" enctype="multipart/form-data" method="get">
    <div style="display:flex; justify-content: space-between; margin-bottom: 15px;">
        <div>
            <b>วันที่</b> <input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>">
            <b>ถึง</b> <input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>">
            <input type="checkbox" name="open_ckk" id="open_ckk" value="1" <?php if(!empty($_GET['open_ckk'])){ ?> checked <?php } ?>> <label for="open_ckk"> ผลการเปิดซอง</label>
        </div>
        <div>
            <?php // if($_SESSION['typelogin'] != 'Supervisor'){ ?>
                <!-- <a href="actionplan?dallyadd=1"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="งานที่ไม่ได้ plan ไว้"></a> -->
            <?php // } ?>
        </div>
    </div>

    <div>
        <div style="display: flex;">
            <label for="customer"><b>โรงพยาบาล</b></label> &nbsp;
            <?php if(isset($_GET["dallyadd"])){?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
            <input style="width: 250px;" type="text" name="hospital_name" id="hospital_name" autocomplete="off" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['hospital_name']) ? htmlspecialchars($_GET['hospital_name']) : ''; ?>" >
            <b>ประเภทสินค้า</b> &nbsp;<input type="text" class="form-search-custom-awl" name="product_rival" id="product_rival" value="<?php echo !empty($_GET['product_rival']) ? htmlspecialchars($_GET['product_rival']) : ''; ?>">
            <b>Sale</b> &nbsp; 
            <?php 
                if($_SESSION['typelogin'] == 'Marketing' ){ ?>
                    <select class="form-select-custom-awl" name="sale_code" id="sale_code">
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
                <?php } else { include 'set_area_select.php'; } // แสดงในส่วนของ Select sale ?>
            <button class="btn-custom-awl">Search</button>
        </div>
        <div id="customerDropdown" class="customerDropdown">
            <div class="customerSelectNewView" style="background-color:#FCFCFC; position: relative; padding:2px; border-radius: 8px;"></div>
        </div>
    </div>
</form>
</p>

<hr style="margin: 20px 0px;">

<div class="table-responsive font-custom-awl-14">
    <table class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th style="width:8.14%;">วันที่</th>
                <th style="width:10.71%;">โรงพยาบาล</th>
                <th style="width:10.71%;">ประเภทสินค้า</th>
                <th style="width:9.28%;">บริษัทคู่เเข่ง</th>
                <th style="width:7.14%;">ยี่ห้อ</th>
                <th style="width:7.14%;">รุ่น</th>
                <th style="width:7.14%;">ประเทศ</th>
                <th style="width:7.14%;">ราคา/หน่วย</th>
                <th style="width:7.14%;">จำนวนซื้อ</th>
                <th style="width:7.14%;">เงื่อนไขพิเศษ</th>
                <th style="width:7.14%;">เขตการขาย</th>
                <th style="width:7.14%;">วันที่เปิดซอง</th>
                <th style="width:4%;">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // กำหนดจำนวนรายการต่อหน้า
            $items_per_page = 25;
            // รับค่าหน้าปัจจุบันจาก URL ถ้าไม่มีให้ตั้งเป็นหน้า 1
            $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
            // คำนวณ OFFSET
            $offset = ($current_page - 1) * $items_per_page;
    
            // นับจำนวนข้อมูลทั้งหมด
            $sql_total = "SELECT COUNT(*) as total FROM tb_storyrival WHERE 1=1 ";
            if (!empty($sale_code)) {
                $sql_total .= " AND sale_area = '".$sale_code."'";
            } else {
                $sql_total .= " AND sale_area = '".$_SESSION['em_id']."' ";
            }
            if(!empty($_GET['date_start']) && !empty($_GET['date_end'])) { $sql_total .= "AND create_date BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date_start']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date_end']) . "' "; }
            if(!empty($_GET['hospital_name'])){ $sql_total .= "AND customer_name LIKE '%".$_GET['hospital_name']."%' "; } // โรงพยาบาล
            if($_GET['product_rival'] != ''){ $sql_total .= "AND product_rival LIKE '%".$_GET['product_rival']."%' "; } // ประเภทสินค้า
            if($_GET['open_ckk'] == '1'){ $sql_total .= "AND open_ckk = 1 "; } // ผลการเปิดซอง
            $result_total = mysqli_query($conn, $sql_total);
            $total_rows = mysqli_fetch_assoc($result_total)['total'];
            // คำนวณจำนวนหน้าทั้งหมด
            $total_pages = ceil($total_rows / $items_per_page);

                $strSQL = "SELECT * FROM tb_storyrival WHERE 1=1 ";
                if (!empty($sale_code)) {
                    $strSQL .= " AND sale_area = '".$sale_code."'";
                } else {
                    $strSQL .= " AND sale_area = '".$_SESSION['em_id']."' ";
                }
                if(!empty($_GET['date_start']) && !empty($_GET['date_end'])) { $strSQL .= "AND create_date BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date_start']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date_end']) . "' "; }
                if(!empty($_GET['hospital_name'])){ $strSQL .=  "AND customer_name LIKE '%".$_GET['hospital_name']."%' "; } // โรงพยาบาล
                if($_GET['product_rival'] != ''){ $strSQL .=  "AND product_rival LIKE '%".$_GET['product_rival']."%' "; } // ประเภทสินค้า
                if($_GET['open_ckk'] == '1'){ $strSQL .=  "AND open_ckk = 1 "; } // ผลการเปิดซอง
                $strSQL .= "ORDER BY create_date DESC LIMIT $items_per_page OFFSET $offset";
                $objQuery  = mysqli_query($conn,$strSQL);
                $numPlan = mysqli_num_rows($objQuery);
                while($objResult = mysqli_fetch_array($objQuery)){
            ?>
            <tr>
                <td><?php echo Datethai($objResult["create_date"]);?></td>
                <td><?php echo $objResult["customer_name"];?></td>
                <td><?php echo $objResult["product_rival"];?><?php if($objResult["product_rival"]=='อื่นๆ'){ ?><br> <?php echo $objResult["product_des"]; } ?> </td>
                <td><?php echo $objResult["company_rival"];?></td>
                <td><?php echo $objResult["rival_brand"];?></td>
                <td><?php echo $objResult["rival_model"];?></td>
                <td><?php echo $objResult["rival_country"];?></td>
                <td><?php echo number_format($objResult["price_to_unit"],0)."";?></td>
                <td><?php echo number_format($objResult["unit"],0)."";?></td>
                <td><?php echo $objResult["promotion"];?></td>
                <td><?php echo $objResult["sale_area"];?></td>
                <td><?php if($objResult["date_open"]!='0000-00-00'){ echo Datethai($objResult["date_open"]); } ?></td>		
                <td><a href="report_competitor_edit?id_story=<?php echo $objResult["id_story"];?>"><img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;"></a></td>
            </tr>
            <?php }
            if($numPlan < 1){
                echo '<td colspan="14" style="text-align: center;"">ไม่พบข้อมูล</td>';
            }
            ?>
        </tbody>
    </table>
    <br>
    <section style="display: flex; justify-content: space-between; align-items: center; ">

    <p>พบทั้งหมด <?php echo $total_rows; ?> รายการ : จำนวน <?php echo $total_pages; ?> หน้า : หน้าปัจจุบัน <?php echo $current_page; ?></p>

            <!-- Pagination -->
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <!-- ปุ่ม Previous -->
            <li class="page-item <?php echo ($current_page <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&page=<?php echo $current_page - 1; ?>">Previous</a>
            </li>
            <?php
            // จำกัดจำนวนหน้าที่แสดง (เช่น แสดงสูงสุด 5 หน้า)
            $max_visible_pages = 5;
            // คำนวณช่วงของหน้าที่จะแสดง
            $start_page = max(1, $current_page - floor($max_visible_pages / 2));
            $end_page = min($total_pages, $start_page + $max_visible_pages - 1);

            // ปรับ start_page หาก end_page ถึงหน้าสุดท้าย
            if ($end_page - $start_page + 1 < $max_visible_pages) {
                $start_page = max(1, $end_page - $max_visible_pages + 1);
            }

            // แสดงหน้าแรกถ้า start_page ไม่ใช่ 1
            if ($start_page > 1) {
            ?>
                <li class="page-item">
                    <a class="page-link" href="?sale_code=&page=1">1</a>
                </li>
                <?php if ($start_page > 2) { ?>
                    <li class="page-item disabled">
                        <span class="page-link">…</span>
                    </li>
                <?php } ?>
            <?php } ?>

            

            <!-- แสดงหน้าตามช่วง -->
            <?php for ($i = $start_page; $i <= $end_page; $i++) { ?>
                <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&hospital_name=<?php echo $_GET['hospital_name'];?>&hospital_buiding=<?php echo $_GET['hospital_buiding'];?>&hospital_ward=<?php echo $_GET['hospital_ward'];?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>

            <!-- แสดงหน้าสุดท้ายถ้า end_page ไม่ถึงหน้าสุดท้าย -->
            <?php if ($end_page < $total_pages) { ?>
                <?php if ($end_page < $total_pages - 1) { ?>
                    <li class="page-item disabled">
                        <span class="page-link">…</span>
                    </li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&hospital_name=<?php echo $hospital_name;?>&hospital_buiding=<?php echo $hospital_buiding;?>&hospital_ward=<?php echo $hospital_ward;?>&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a>
                </li>
            <?php } ?>

            <!-- ปุ่ม Next -->
            <li class="page-item <?php echo ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&hospital_name=<?php echo $hospital_name;?>&hospital_buiding=<?php echo $hospital_buiding;?>&hospital_ward=<?php echo $hospital_ward;?>&page=<?php echo $current_page + 1; ?>">Next</a>
            </li>
        </ul>
    </nav>
</section>

    <!-- Loading Animation -->
    <div class="loading-overlay" id="loadingOverlay">
            <div class="dots-flow">
                <span></span>
                <span></span>
                <span></span>
            </div>
    </div>

</div>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>

<script>
// JavaScript สำหรับควบคุม loading animation
document.addEventListener('DOMContentLoaded', function() {
    const paginationLinks = document.querySelectorAll('.pagination .page-link');
    const loadingOverlay = document.getElementById('loadingOverlay');

    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // แสดง loading animation
            loadingOverlay.style.display = 'flex';
        });
    });
});
</script>
<script>
        let customersData = [];
        fetch(`<?php echo $cumapi;?>`)
            .then(response => response.json())
            .then(data => {
                customersData = data;
            })
            .catch(error => console.error('Error:', error));

        const input = document.getElementById('hospital_name');
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