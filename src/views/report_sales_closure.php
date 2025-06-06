<?php
ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0); // Enable error reporting except for notices
require_once __DIR__ . '/../controllers/MainControllersAll.php';

// Securely handle sale_code
$sale_code = isset($_GET['sale_code']) ? mysqli_real_escape_string($conn, $_GET['sale_code']) : $_SESSION['em_id'];
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
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานปรับปรุงการขาย และ รายงานขายสมบูรณ์</b>
</div>

<section style="padding: 10px 20px 0px 20px;" class="font-custom-awl-14">
    <form action="<?php echo htmlspecialchars($url); ?>" method="get">
        <div style="display:flex; justify-content: space-between; margin-bottom: 10px;">
            <div>
                <b>วันที่สรุป</b> <input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : '' ?>" required>
                <b>ถึง</b> <input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : '' ?>" required>
                <b>วันที่ออกบิล</b> <input type="date" name="date_order" id="date_order" value="<?php echo !empty($_GET['date_order']) ? htmlspecialchars($_GET['date_order']) : '' ?>" >
                <br><br>
                <div>
                    <div style="display: flex;">
                        <label for="customer"><b>โรงพยาบาล</b></label> &nbsp;
                        <?php if(isset($_GET["dallyadd"])){?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
                        <input style="width: 250px;" type="text" name="hospital_name" id="hospital_name" autocomplete="off" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['hospital_name']) ? htmlspecialchars($_GET['hospital_name']) : ''; ?>" >
                        <b>Sale</b> &nbsp;
                        <?php include 'set_area_select.php'; // แสดงในส่วนของ Select sale ?>
                        <button class="btn-custom-awl">Search</button>
                    </div>
                    <div id="customerDropdown" class="customerDropdown">
                        <div class="customerSelectNewView" style="background-color:#FCFCFC; position: relative; padding:2px; border-radius: 8px;"></div>
                    </div>
                </div>
            </div>
            <div>
                <?php if($_SESSION['typelogin'] != 'Supervisor'){ ?>
                    <a href="actionplan?dallyadd=1"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="งานที่ไม่ได้ plan ไว้"></a>
                <?php } ?>
            </div>
        </div>
        <p style="display: flex; align-items: center;">
            <input type="checkbox" name="grade_a" id="grade_a" value='1' <?php echo !empty($_GET['grade_a']) ? 'checked' : ''; ?>> &nbsp; <label for="grade_a">Project A+,A</label>
            <input style="margin-left: 15px;" type="checkbox" name="buy1" id="buy1" value="1" <?php echo !empty($_GET['buy1']) ? 'checked' : ''; ?>> &nbsp; <label for="buy1">ซื้อ</label>
            <input style="margin-left: 15px;" type="checkbox" name="buy2" id="buy2" value="2" <?php echo !empty($_GET['buy2']) ? 'checked' : ''; ?>> &nbsp; <label for="buy2">ไม่ซื้อ</label>
        </p>
    </form>
</section>

<hr style="margin: 25px 0px;">

<div style="text-align: right; margin-bottom: 20px; position: relative;">
    <?php 
    // Build query string for export link
    $exportParams = http_build_query([
        'sale_code' => $sale_code,
        'date_start' => isset($_GET['date_start']) ? $_GET['date_start'] : '',
        'date_end' => isset($_GET['date_end']) ? $_GET['date_end'] : '',
        'date_order' => isset($_GET['date_order']) ? $_GET['date_order'] : '',
        'hospital_name' => isset($_GET['hospital_name']) ? $_GET['hospital_name'] : '',
        'grade_a' => isset($_GET['grade_a']) ? $_GET['grade_a'] : '',
        'buy1' => isset($_GET['buy1']) ? $_GET['buy1'] : '',
        'buy2' => isset($_GET['buy2']) ? $_GET['buy2'] : ''
    ]);
    if (!empty($_GET['date_start']) && !empty($_GET['sale_code'])) { ?>
        <a href="report_sales_closure_excel?<?php echo $exportParams; ?>" style="position: absolute; top: -15px; right: 10px; width: 30px; height: 30px; z-index: 990;"><img src="assets/images/icon_system/vscode-icons--file-type-excel.svg" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="Export File.csv"></a>
    <?php } else { ?>
        <img style="position: absolute; top: -15px; right: 10px; width: 30px; height: 30px; z-index: 990;" src="assets/images/icon_system/vscode-icons--file-type-excel2.svg" data-bs-toggle="tooltip" data-bs-title="ไม่สามารถ Export ได้ กรุณาระบุวันที่ และ เขต...">
    <?php } ?>
</div>

<div class="table-responsive mt-3 px-2">
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th colspan="10" style="text-align: center; background-color: #00FF00; padding:2px; font-size:14px;">ยอดรวมทั้งหมด&nbsp;&nbsp;<font id="sum"></font>&nbsp;&nbsp;บาท</th>
            </tr>
            <tr>
                <th style="width: 8%;">วันที่</th>
                <th style="width: 10%;">โรงพยาบาล</th>
                <th style="width: 10%;">หน่วยงาน</th>
                <th style="width: 21%;">รายการ</th>
                <th style="width: 8%;">มูลค่า</th>
                <th style="width: 8%;">เปอร์เซ็น</th>
                <th style="width: 5%;">เขต</th>
                <th style="width: 8%;">ซื้อ/ไม่ซื้อ</th>
                <th style="width: 14%;">เหตุผล</th>
                <th style="width: 8%;">วันที่ออกบิล</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sum = [];
            $strSQL = "SELECT * FROM tb_register_data WHERE sale_area = '" . mysqli_real_escape_string($conn, $sale_code) . "' AND head_area = '" . mysqli_real_escape_string($conn, $_SESSION['head_area']) . "' AND summary_order IN ('1','2') ";
            if (!empty($_GET['date_start']) && !empty($_GET['date_end'])) {
                $strSQL .= "AND date_update BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date_start']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date_end']) . "' ";
            } 
            if (!empty($_GET['grade_a'])) {
                $strSQL .= "AND grade_a = '" . mysqli_real_escape_string($conn, $_GET['grade_a']) . "' ";
            }
            if (!empty($_GET['date_order'])) {
                $strSQL .= "AND date_order = '" . mysqli_real_escape_string($conn, $_GET['date_order']) . "' ";
            }
            if (!empty($_GET['hospital_name'])) {
                $strSQL .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_name']) . "%' ";
            }
            if (!empty($_GET['buy1']) && empty($_GET['buy2'])) {
                $strSQL .= "AND summary_order = '1' ";
            } elseif (empty($_GET['buy1']) && !empty($_GET['buy2'])) {
                $strSQL .= "AND summary_order = '2' ";
            }

            // Execute initial query to get total rows
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);

            // Pagination Logic
            $Per_Page = 10; // Records per page
            $Page = isset($_GET["Page"]) ? (int)$_GET["Page"] : 1;
            if ($Page < 1) {
                $Page = 1;
            }

            $Prev_Page = $Page - 1;
            $Next_Page = $Page + 1;

            $Page_Start = (($Per_Page * $Page) - $Per_Page);
            $Num_Pages = ($Num_Rows > 0) ? ceil($Num_Rows / $Per_Page) : 1;

            // Append LIMIT to the query
            $strSQL .= " ORDER BY date_plan DESC LIMIT $Page_Start, $Per_Page";
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            while ($objResult = mysqli_fetch_array($objQuery)) { ?>
                <tr>
                    <td><?php echo DateThai($objResult["date_plan"]); ?></td>
                    <td><?php echo htmlspecialchars($objResult["hospital_name"]); ?></td>
                    <td><?php echo htmlspecialchars($objResult["hospital_ward"]); ?></td>
                    <td style="text-align: left; padding:4px;"><?php echo htmlspecialchars($objResult["summary_product1"]); ?> <?php if ($objResult["unit_product1"] != '0') { echo htmlspecialchars($objResult["unit_product1"]) . " " . htmlspecialchars($objResult["unit_name1"]); } ?></td>
                    <td><?php 
                        $sum[] = floatval($objResult["sum_price_product"]); 
                        echo number_format($objResult["sum_price_product"], 2);
                    ?></td>
                    <?php 
                    $percent_colors = [
                        '1' => '#00FF00',
                        '2' => '#CCFF99',
                        '3' => '#FFFF00',
                        '4' => '#FF6600',
                        '5' => '#FF0000'
                    ];
                    $bg_color = isset($percent_colors[$objResult["percent_id"]]) ? $percent_colors[$objResult["percent_id"]] : '';
                    ?>
                    <td <?php echo $bg_color ? "bgcolor='$bg_color'" : ''; ?>><?php echo htmlspecialchars($objResult["percent_name"]); ?></td>
                    <td><?php echo htmlspecialchars($objResult["sale_area"]); ?></td>
                    <td><?php 
                        switch ($objResult["summary_order"]) {
                            case '1': echo 'ซื้อ'; break;
                            case '2': echo 'ไม่ซื้อ'; break;
                            default: echo 'N/A'; break;
                        }
                    ?></td>
                    <td style="text-align: left; padding:4px;"><?php echo htmlspecialchars($objResult["description_order"]); ?></td>
                    <td><?php echo DateThai($objResult["date_order"]); ?></td>
                </tr>
            <?php } 
            if ($Num_Rows < 1) {
                echo '<tr><td colspan="10" style="text-align: center;">ไม่พบข้อมูล</td></tr>';
            }
            ?>
        </tbody>
    </table>
    <script>
        const sumArr = "<?php echo number_format(array_sum($sum), 2); ?>";
        document.getElementById("sum").innerHTML = sumArr;
    </script>
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
                    'date_start' => isset($_GET['date_start']) ? $_GET['date_start'] : '',
                    'date_end' => isset($_GET['date_end']) ? $_GET['date_end'] : '',
                    'date_order' => isset($_GET['date_order']) ? $_GET['date_order'] : '',
                    'hospital_name' => isset($_GET['hospital_name']) ? $_GET['hospital_name'] : '',
                    'sale_code' => $sale_code,
                    'grade_a' => isset($_GET['grade_a']) ? $_GET['grade_a'] : '',
                    'buy1' => isset($_GET['buy1']) ? $_GET['buy1'] : '',
                    'buy2' => isset($_GET['buy2']) ? $_GET['buy2'] : ''
                ]);

                if ($Prev_Page > 0) {
                    echo "<li class='page-item loaddingchk'><a href='" . htmlspecialchars("$url?Page=$Prev_Page&$queryString") . "' class='page-link'>Previous</a></li>";
                }

                // Limit pagination links to a maximum of 5
                $Max_Pages_Display = 5;
                $half = floor($Max_Pages_Display / 2);
                $startPage = max(1, $Page - $half);
                $endPage = min($Num_Pages, $startPage + $Max_Pages_Display - 1);

                if ($endPage - $startPage + 1 < $Max_Pages_Display) {
                    $startPage = max(1, $endPage - $Max_Pages_Display + 1);
                }

                for ($i = $startPage; $i <= $endPage; $i++) {
                    if ($i != $Page) {
                        echo "<li class='page-item loaddingchk'><a href='" . htmlspecialchars("$url?Page=$i&$queryString") . "' class='page-link'>$i</a></li>";
                    } else {
                        if ($Num_Rows > 0) {
                            echo "<li class='page-item active'><span class='page-link' aria-current='page'>$i</span></li>";
                        }
                    }
                }

                if ($Page < $Num_Pages) {
                    echo "<li class='page-item loaddingchk'><a href='" . htmlspecialchars("$url?Page=$Next_Page&$queryString") . "' class='page-link'>Next</a></li>";
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
    <script>
    // JavaScript สำหรับควบคุม loading animation
    document.addEventListener('DOMContentLoaded', function() {
        const paginationLinks = document.querySelectorAll('.pagination .loaddingchk');
        const loadingOverlay = document.getElementById('loadingOverlay');

        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                loadingOverlay.style.display = 'flex';
            });
        });
    });
    </script>
</div>

<?php 
$content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
require_once __DIR__ . '/layouts/Main.php';
?>
    <script>
        let customersData = [];
        fetch(`<?php echo htmlspecialchars($cumapi); ?>`)
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

        document.addEventListener('click', function(e) {
            if (!input.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>