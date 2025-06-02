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
                if($_SESSION['typelogin'] == 'Supervisor'){
                    switch ($_SESSION["head_area"]) {
                        case 'SM1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_sm1 "; break;
                        case 'SS1': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 "; break;
                        case 'SS2': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss2 "; break;
                        case 'SS3': $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss3 "; break;
                        default:
                            $strSQL5 = "SELECT sale_code,sale_name FROM tb_team_ss1 
                            UNION SELECT sale_code,sale_name FROM tb_team_ss2
                            UNION SELECT sale_code,sale_name FROM tb_team_ss3
                            UNION SELECT sale_code,sale_name FROM tb_team_sm1 ";
                        break;
                    }
                    $objQuery5 = mysqli_query($conn, $strSQL5);
                    $allSale = array();
                    while ($objResuut5 = mysqli_fetch_array($objQuery5)) {  
                        $allSale[] = htmlspecialchars($objResuut5["sale_code"]);
                    }
                    $em_idFull = implode("','", $allSale);
                    $cuss = "SELECT * FROM tb_customer_contact WHERE sale_code IN ('".$em_idFull."') ";
                } else {
                    $em_idFull = $_SESSION['em_id'];
                    $cuss = "SELECT * FROM tb_customer_contact WHERE sale_code = '" . htmlspecialchars($em_idFull) . "'";
                }
                // Base SQL query
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
                        <td>
                            <?php 
                                switch ($customers["type_cus"]) {
                                    case '0': $cus_free_edit = 'Null0'; break;
                                    case '1': $cus_free_edit = 'Normal1'; break;
                                    case '2': $cus_free_edit = 'VIP2'; break;
                                    case '3': $cus_free_edit = 'VVIP3'; break;
                                    default: $cus_free_edit = 'Null0'; break;
                                }
                            ?>
                            <img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#edit"
                                onclick="
                                    document.getElementById('<?php echo $cus_free_edit;?>').checked = true;
                                    const fields = [
                                        'customer_name', 'hospital_buiding', 'hospital_class', 'hospital_ward','hospital_ward_present',
                                        'hospital_contact1', 'hospital_contact2', 'hospital_contact3', 'hospital_contact4', 'hospital_contact5',
                                        'hospital_contact6', 'hospital_contact7', 'hospital_contact8', 'hospital_contact9', 'hospital_contact10',
                                        'hospital_mobile1', 'hospital_mobile2', 'hospital_mobile3', 'hospital_mobile4', 'hospital_mobile5',
                                        'hospital_mobile6', 'hospital_mobile7', 'hospital_mobile8', 'hospital_mobile9', 'hospital_mobile10',
                                        'email_contact1', 'email_contact2', 'email_contact3', 'email_contact4', 'email_contact5',
                                        'email_contact6', 'email_contact7', 'email_contact8', 'email_contact9', 'email_contact10',
                                        'id_customer'
                                    ];
                                    const values = {
                                        customer_name: '<?php echo htmlspecialchars($customers['customer_name'], ENT_QUOTES);?>',
                                        hospital_buiding: '<?php echo htmlspecialchars($customers['hospital_buiding'], ENT_QUOTES);?>',
                                        hospital_class: '<?php echo htmlspecialchars($customers['hospital_class'], ENT_QUOTES);?>',
                                        hospital_ward: '<?php echo htmlspecialchars($customers['hospital_ward'], ENT_QUOTES);?>',
                                        hospital_ward_present: '<?php echo htmlspecialchars($customers['hospital_ward_present'], ENT_QUOTES);?>',
                                        hospital_contact1: '<?php echo htmlspecialchars($customers['hospital_contact1'], ENT_QUOTES);?>',
                                        hospital_contact2: '<?php echo htmlspecialchars($customers['hospital_contact2'], ENT_QUOTES);?>',
                                        hospital_contact3: '<?php echo htmlspecialchars($customers['hospital_contact3'], ENT_QUOTES);?>',
                                        hospital_contact4: '<?php echo htmlspecialchars($customers['hospital_contact4'], ENT_QUOTES);?>',
                                        hospital_contact5: '<?php echo htmlspecialchars($customers['hospital_contact5'], ENT_QUOTES);?>',
                                        hospital_contact6: '<?php echo htmlspecialchars($customers['hospital_contact6'], ENT_QUOTES);?>',
                                        hospital_contact7: '<?php echo htmlspecialchars($customers['hospital_contact7'], ENT_QUOTES);?>',
                                        hospital_contact8: '<?php echo htmlspecialchars($customers['hospital_contact8'], ENT_QUOTES);?>',
                                        hospital_contact9: '<?php echo htmlspecialchars($customers['hospital_contact9'], ENT_QUOTES);?>',
                                        hospital_contact10: '<?php echo htmlspecialchars($customers['hospital_contact10'], ENT_QUOTES);?>',
                                        hospital_mobile1: '<?php echo htmlspecialchars($customers['hospital_mobile1'], ENT_QUOTES);?>',
                                        hospital_mobile2: '<?php echo htmlspecialchars($customers['hospital_mobile2'], ENT_QUOTES);?>',
                                        hospital_mobile3: '<?php echo htmlspecialchars($customers['hospital_mobile3'], ENT_QUOTES);?>',
                                        hospital_mobile4: '<?php echo htmlspecialchars($customers['hospital_mobile4'], ENT_QUOTES);?>',
                                        hospital_mobile5: '<?php echo htmlspecialchars($customers['hospital_mobile5'], ENT_QUOTES);?>',
                                        hospital_mobile6: '<?php echo htmlspecialchars($customers['hospital_mobile6'], ENT_QUOTES);?>',
                                        hospital_mobile7: '<?php echo htmlspecialchars($customers['hospital_mobile7'], ENT_QUOTES);?>',
                                        hospital_mobile8: '<?php echo htmlspecialchars($customers['hospital_mobile8'], ENT_QUOTES);?>',
                                        hospital_mobile9: '<?php echo htmlspecialchars($customers['hospital_mobile9'], ENT_QUOTES);?>',
                                        hospital_mobile10: '<?php echo htmlspecialchars($customers['hospital_mobile10'], ENT_QUOTES);?>',
                                        email_contact1: '<?php echo htmlspecialchars($customers['email_contact1'], ENT_QUOTES);?>',
                                        email_contact2: '<?php echo htmlspecialchars($customers['email_contact2'], ENT_QUOTES);?>',
                                        email_contact3: '<?php echo htmlspecialchars($customers['email_contact3'], ENT_QUOTES);?>',
                                        email_contact4: '<?php echo htmlspecialchars($customers['email_contact4'], ENT_QUOTES);?>',
                                        email_contact5: '<?php echo htmlspecialchars($customers['email_contact5'], ENT_QUOTES);?>',
                                        email_contact6: '<?php echo htmlspecialchars($customers['email_contact6'], ENT_QUOTES);?>',
                                        email_contact7: '<?php echo htmlspecialchars($customers['email_contact7'], ENT_QUOTES);?>',
                                        email_contact8: '<?php echo htmlspecialchars($customers['email_contact8'], ENT_QUOTES);?>',
                                        email_contact9: '<?php echo htmlspecialchars($customers['email_contact9'], ENT_QUOTES);?>',
                                        email_contact10: '<?php echo htmlspecialchars($customers['email_contact10'], ENT_QUOTES);?>',
                                        id_customer: '<?php echo htmlspecialchars($customers['id_customer'], ENT_QUOTES);?>'
                                    };
                                    fields.forEach(field => { 
                                        if(document.getElementById(field)) document.getElementById(field).value = values[field];
                                    });
                                    
                                "
                            >
                        </td>
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

<?php include 'components/user_contact_edit.php'; // แก้ไข ข้อมูลผู้ติดต่อ ?>
<?php include 'components/user_contact_from.php'; // เพิ่ม  ข้อมูลผู้ติดต่อ ?>

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