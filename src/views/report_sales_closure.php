<?php
ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';
(!isset($_GET['sale_code'])) ? $sale_code = $_SESSION['em_id'] : $sale_code = $_GET['sale_code'];
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
    <form action="<?php echo $url; ?>" method="get">
        <div style="display:flex; justify-content: space-between; margin-bottom: 10px;">
            <div>
                <b>วันที่</b> <input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : '' ?>" >
                <b>ถึง</b> <input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : '' ?>" >
                <label for="customer"><b>โรงพยาบาล</b></label>
                <?php if(isset($_GET["dallyadd"])){?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
                <input type="search" style="width: 310px;" class="form-search-custom-awl" list="customerSelect" id="hospital_name" name="hospital_name" autocomplete="off" placeholder="ค้นหา รพ . . . " onkeyup="fetchData('customerSelect','<?php echo $cumapi;?>')" value="<?php echo !empty($_GET['hospital_name']) ? htmlspecialchars($_GET['hospital_name']) : ''; ?>" />
                <datalist id="customerSelect">
                    <option value="">-- เลือกลูกค้า --</option>
                </datalist>
                <b>Sale</b> 
                <?php include 'set_area_select.php'; // แสดงในส่วนของ Select sale  ?>
                <button class="btn-custom-awl">Search</button>
            </div>
            <div>
                <?php if($_SESSION['typelogin'] != 'Supervisor'){ ?>
                    <a href="actionplan?dallyadd=1"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="งานที่ไม่ได้ plan ไว้"></a>
                <?php } ?>
            </div>
        </div>
        <p style="display: flex; align-items: center;">
            <input type="checkbox" name="grade_a" id="grade_a" value='1' <?php echo !empty($_GET['grade_a']) ? 'checked' : ''; ?>>   <label for="grade_a">Project A+,A</label>
            <input style="margin-left: 15px;" type="checkbox" name="buy1" id="buy1" value="1" <?php echo ($_GET['buy1'] == 1) ? 'checked' : ''; ?>>   <label for="buy1">ซื้อ</label>
            <input style="margin-left: 15px;" type="checkbox" name="buy2" id="buy2" value="2" <?php echo ($_GET['buy2'] == 2) ? 'checked' : ''; ?>>   <label for="buy2">ไม่ซื้อ</label>
        </p>
    </form>
</section>

<hr style="margin: 25px 0px;">

<div style="text-align: right; margin-bottom: 20px; position: relative;">
    <a href="#" style="position: absolute; top: -15px; right: 10px; width: 30px; height: 30px;"><img src="assets/images/icon_system/vscode-icons--file-type-excel.svg" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="Export File.csv"></a>
</div>

<div class="table-responsive mt-3 px-2">
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th colspan="11" style="text-align: center; background-color: #00FF00; padding:2px; font-size:14px;">ยอดรวมทั้งหมด  <font id="sum"></font>  บาท</th>
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
                <!-- <th style="width: 5%;">เพิ่มเติม</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            $sum = array();
            $strSQL = "SELECT * FROM tb_register_data WHERE sale_area = '" . $sale_code . "' AND summary_order IN ('1','2') ";
            if (!empty($_GET['date_start']) && !empty($_GET['date_end'])) {
                $strSQL .= "AND date_plan BETWEEN '" . $_GET['date_start'] . "' AND '" . $_GET['date_end'] . "' ";
            } 
            if (isset($_GET['grade_a'])) {
                $strSQL .= "AND grade_a = '" . $_GET['grade_a'] . "' ";
            }
            if ($_GET['hospital_name'] != "") {
                $strSQL .= " AND hospital_name LIKE '%" . $_GET['hospital_name'] . "%' ";
            }
            if ($_GET['buy1'] == '1' && $_GET['buy2'] == '') {
                $strSQL .= "AND summary_order = '1' ";
            } else if ($_GET['buy1'] == '' && $_GET['buy2'] == '2') {
                $strSQL .= "AND summary_order = '2' ";
            }

            // Execute initial query to get total rows
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
            $Num_Rows = mysqli_num_rows($objQuery);

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
            $strSQL .= " ORDER BY date_plan DESC LIMIT $Page_Start, $Per_Page";
            $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");

            while ($objResult = mysqli_fetch_array($objQuery)) { ?>
                <tr>
                    <td><?php echo DateThai($objResult["date_plan"]); ?></td>
                    <td><?php echo $objResult["hospital_name"]; ?></td>
                    <td><?php echo $objResult["hospital_ward"]; ?></td>
                    <td style="text-align: left; padding:4px;"><?php echo $objResult["summary_product1"]; ?> <?php if ($objResult["unit_product1"] != '0') { echo $objResult["unit_product1"]; } ?> <?php echo $objResult["unit_name1"]; ?></td>
                    <td>
                        <?php 
                        $sum[] = $objResult["sum_price_product"]; 
                        echo number_format($objResult["sum_price_product"], 2);
                        ?>
                    </td>
                    <?php if ($objResult["percent_id"] == '1') { ?>
                        <td bgcolor="#00FF00"><?php echo $objResult["percent_name"]; ?></td>
                    <?php } else if ($objResult["percent_id"] == '2') { ?>
                        <td bgcolor="#CCFF99"><?php echo $objResult["percent_name"]; ?></td>
                    <?php } else if ($objResult["percent_id"] == '3') { ?>
                        <td bgcolor="#FFFF00"><?php echo $objResult["percent_name"]; ?></td>
                    <?php } else if ($objResult["percent_id"] == '4') { ?>
                        <td bgcolor="#FF6600"><?php echo $objResult["percent_name"]; ?></td>
                    <?php } else if ($objResult["percent_id"] == '5') { ?>
                        <td bgcolor="#FF0000"><?php echo $objResult["percent_name"]; ?></td>
                    <?php } else { ?>
                        <td><?php echo $objResult["percent_name"]; ?></td>
                    <?php } ?>
                    <td><?php echo $objResult["sale_area"]; ?></td>
                    <td>
                        <?php 
                        switch ($objResult["summary_order"]) {
                            case '1': echo 'ซื้อ'; break;
                            case '2': echo 'ไม่ซื้อ'; break;
                            default: echo 'N/A'; break;
                        }
                        ?>
                    </td>
                    <td style="text-align: left; padding:4px;"><?php echo $objResult["description_order"]; ?></td>
                    <td><?php echo DateThai($objResult["date_order"]); ?></td>
                    <?php 
                    // switch ($objResult["summary_order"]) {
                    //     case '1': echo '<td bgcolor="#ededed"></td>'; break;
                    //     case '2': echo '<td><a href="http://"><img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;"></a></td>'; break;
                    //     default: echo '<td bgcolor="#ededed"></td>'; break;
                    // }
                    ?>
                </tr>
            <?php } 
            if($Num_Rows < 1){
                echo '<td colspan="10" style="text-align: center;"">ไม่พบข้อมูล</td>';
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
                'hospital_name' => isset($_GET['hospital_name']) ? $_GET['hospital_name'] : '',
                'sale_code' => $sale_code,
                'grade_a' => isset($_GET['grade_a']) ? $_GET['grade_a'] : '',
                'buy1' => isset($_GET['buy1']) ? $_GET['buy1'] : '',
                'buy2' => isset($_GET['buy2']) ? $_GET['buy2'] : '',
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
                    if($Num_Rows > 0){
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
    </script>
</div>

<?php 
$content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
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