<?php 
ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
(!isset($_GET['sale_code'])) ? $sale_code = $_SESSION['em_id'] : $sale_code = $_GET['sale_code']; // กำหนด sale_code ตามที่ส่งมาใน URL หรือจาก session
?>

<style>
/* CSS สำหรับ dots-flow loading animation */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.dots-flow {
    display: flex;
    gap: 10px;
}

.dots-flow span {
    width: 12px;
    height: 12px;
    background: #ffffff;
    border-radius: 50%;
    animation: dots-flow 0.8s infinite;
}

.dots-flow span:nth-child(2) {
    animation-delay: 0.2s;
}

.dots-flow span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes dots-flow {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
}
</style>

<div id="mymain">
    <div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ข้อมูลผู้ติดต่อ</b>
</div>

<section class="font-custom-awl-14">
<form action="<?php echo $url;?>" enctype="multipart/form-data" method="get">
<div style="padding: 0px 15px;" class="d-flex justify-content-between align-items-center">
    <div >
        <label for="customer"><b>ค้นหา</b></label>
        <?php if(isset($_GET["dallyadd"])){?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
        <input type="search" class="form-search-custom-awl" list="customerSelect" id="cus_keyword" name="cus_keyword" autocomplete="off" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['cus_keyword']) ? htmlspecialchars($_GET['cus_keyword']) : ''; ?>"  />
        <datalist id="customerSelect">
            <option value="">-- เลือกลูกค้า --</option>
        </datalist>
        <button class="btn-custom-awl">Search</button>
    </div>
    <div data-bs-toggle="tooltip" data-bs-title="เพิ่มข้อมูลผู้ติดต่อ. . .">
        <img src="assets/images/add-plus.png" style="width: 30px; height: 30px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#add_plus"  >
    </div>
</div>
</form> 
</section>


<hr class="my-4">
<div class="table-responsive px-2">
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th style="width: 20%;">โรงพยาบาล</th>
                <th style="width: 20%;">ตึก</th>
                <th style="width: 10%;">ชั้น</th>
                <th style="width: 20%;">หน่วยงาน</th>
                <th style="width: 20%;">ผู้ติดต่อ</th>
                <th style="width: 10%;">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Base SQL query
                $cuss = "SELECT customer_name, hospital_buiding, hospital_class, hospital_ward, hospital_contact1 
                         FROM tb_customer_contact 
                         WHERE sale_code = '" . htmlspecialchars($sale_code) . "'";

                // Add customer keyword filter if provided
                if (!empty($_GET['cus_keyword'])) {
                    $cuss .= " AND customer_name LIKE '%" . htmlspecialchars($_GET['cus_keyword']) . "%'";
                }

                // Execute initial query to get total rows
                $qcus = mysqli_query($conn, $cuss) or die("Error Query [" . $cuss . "]");
                $Num_Rows = mysqli_num_rows($qcus);

                // Pagination Logic
                $Per_Page = 10; // Records per page
                $Page = isset($_GET["Page"]) ? (int)$_GET["Page"] : 1;
                if (!$Page) {
                    $Page = 1;
                }

                $Prev_Page = $Page - 1;
                $Next_Page = $Page + 1;

                $Page_Start = (($Per_Page * $Page) - $Per_Page);
                if ($Num_Rows <= $Per_Page) {
                    $Num_Pages = 1;
                } else if (($Num_Rows % $Per_Page) == 0) {
                    $Num_Pages = ($Num_Rows / $Per_Page);
                } else {
                    $Num_Pages = (int)(($Num_Rows / $Per_Page) + 1);
                }

                // Append LIMIT to the query
                $cuss .= " ORDER BY customer_name DESC LIMIT $Page_Start, $Per_Page";
                $qcus = mysqli_query($conn, $cuss) or die("Error Query [" . $cuss . "]");

                while ($customers = mysqli_fetch_array($qcus, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($customers['customer_name']); ?></td>
                        <td><?php echo htmlspecialchars($customers['hospital_buiding']); ?></td>
                        <td><?php echo htmlspecialchars($customers['hospital_class']); ?></td>
                        <td><?php echo htmlspecialchars($customers['hospital_ward']); ?></td>
                        <td><?php echo htmlspecialchars($customers['hospital_contact1']); ?></td>
                        <td><img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;"></td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
    <br>
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div style="font-size: 14px;">
            พบทั้งหมด <?= $Num_Rows; ?> รายการ : จำนวน <?= $Num_Pages; ?> หน้า : หน้าปัจจุบัน <?php echo $Page; ?>
        </div>

        <nav aria-label="...">
            <ul class="pagination">
                <?php
                // Build query string for pagination links
                $queryString = http_build_query([
                    'cus_keyword' => isset($_GET['cus_keyword']) ? $_GET['cus_keyword'] : '',
                ]);

                if ($Prev_Page) {
                    echo "<li class='page-item loaddingchk'><a href='$url?Page=$Prev_Page&$queryString' class='page-link'>Previous</a></li>";
                }

                // Limit pagination links to a maximum of 5
                $Max_Pages_Display = 5;
                $half = floor($Max_Pages_Display / 2);
                $startPage = max(1, $Page - $half);
                $endPage = min($Num_Pages, $startPage + $Max_Pages_Display - 1);

                // Adjust startPage if near the end
                if ($endPage - $startPage + 1 < $Max_Pages_Display) {
                    $startPage = max(1, $endPage - $Max_Pages_Display + 1);
                }

                for ($i = $startPage; $i <= $endPage; $i++) {
                    if ($i != $Page) {
                        echo "<li class='page-item loaddingchk'><a href='$url?Page=$i&$queryString' class='page-link'>$i</a></li>";
                    } else {
                        if ($Num_Rows > 0) {
                            echo "<li class='page-item active'><b class='page-link' aria-current='page'> $i </b></li>";
                        }
                    }
                }

                if ($Page != $Num_Pages) {
                    echo "<li class='page-item loaddingchk'><a href='$url?Page=$Next_Page&$queryString' class='page-link'>Next</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>

    <!-- Loading Animation -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="dots-flow">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- End Loading Animation -->
</div>
</div>

<?php include 'components/user_contact_from.php'; // เพิ่มข้อมูลข้อมูลผู้ติดต่อ ?>

<?php 
$content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
require_once __DIR__ . '/layouts/Main.php';
?>

<script>
// JavaScript สำหรับควบคุม loading animation
document.addEventListener('DOMContentLoaded', function() {
    const paginationLinks = document.querySelectorAll('.pagination .loaddingchk');
    const loadingOverlay = document.getElementById('loadingOverlay');

    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // แสดง loading animation
            loadingOverlay.style.display = 'flex';
        });
    });
});

// ใช้ fetch API เพื่อดึงข้อมูลจาก API
fetch(`<?php echo $cumapi;?>`)
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