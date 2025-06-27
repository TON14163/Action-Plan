<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';
function product_view($percent_id){
    $sqlproductView = "SELECT product_name FROM tb_product WHERE product_ID = '".$percent_id."' LIMIT 1";
    $qsqlproductView = mysqli_query($GLOBALS['conn'], $sqlproductView);
    $viewsqlproduct = mysqli_fetch_array($qsqlproductView);
    return $viewsqlproduct['product_name'];
}
?>

<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงาน Daily Report</b>
</div>

<p style="font-size: 14px;">
<form action="<?php echo $url;?>" enctype="multipart/form-data" method="get">
                <b>วันที่</b> <input type="date" name="date_start" id="date_start" value="<?php echo !empty($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>">
                <b>ถึง</b> <input type="date" name="date_end" id="date_end" value="<?php echo !empty($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>">
                <?php include 'set_area_select.php'; // แสดงในส่วนของ Select sale  ?>
                <b>ประเภทสินค้า</b>
                <select class='form-search-custom-awl'name='product_rival' id='product_rival'>
                    <?php if($_GET['product_rival'] != ''){ ?>
                        <option value='<?php echo $_GET['product_rival'];?>'><?php echo $_GET['product_rival'];?></option> 
                    <?php } ?>
                    <option value=''>Search</option> 
                    <?php
                    $sql2 = "SELECT id,prorival_name FROM tb_prorival";
                    $qsql2 = mysqli_query($conn,$sql2);
                    while($vsql2 = mysqli_fetch_array($qsql2)){ ?>
                    <option value="<?php echo $vsql2['prorival_name'];?>"><?php echo $vsql2['prorival_name'];?></option>
                    <?php } ?>
                </select>

                <br><br>
        <div style="display: flex;">
            <label for="customer"><b>โรงพยาบาล&nbsp;</b></label>
            <?php if(isset($_GET["dallyadd"])){?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
            <input style="width: 310px;" type="text" name="hospital_name" id="hospital_name" autocomplete="off" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['hospital_name']) ? htmlspecialchars($_GET['hospital_name']) : ''; ?>" >
            &nbsp;&nbsp;<b>หน่วยงาน</b>&nbsp;&nbsp;&nbsp; <input type="text" class="form-search-custom-awl" name="hospital_ward" id="hospital_ward" placeholder="ระบุข้อมูล . . . " value="<?php if(!empty($_GET['hospital_ward'])){} echo htmlspecialchars($_GET['hospital_ward']); ?>">
            <button class="btn-custom-awl">Search</button>
        </div>
        <div id="customerDropdown" class="customerDropdown">
            <div class="customerSelectNewView" style="background-color:#FCFCFC; position: relative; padding:2px; border-radius: 8px;"></div>
        </div>
</form>
</p>

<hr style="margin: 20px 0px;">
<p>
    <div style="display: flex; justify-content: space-between; align-items: center;" class="font-custom-awl-14">
        <div style="font-weight: bold;">
            <kbd style="background-color: #EBE4ED; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ plan ไว้เเล้ว
            <kbd style="background-color: #FFFF99; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ไม่ได้ plan ไว้
            <kbd style="background-color: #99FF33; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Sup เพิ่มให้
            <kbd style="background-color: #DDA0DD; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่สร้างจากประมาณการขาย
            <kbd style="background-color: #66FFFF; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Sup ไปแล้ว
            <kbd style="background-color: #FFCC99; width: 20px; height: 20px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ Copy งานเดิม
        </div>
        <div>
            <?php if($_SESSION['typelogin'] != 'Supervisor'){ ?>
                <a href="actionplan?dallyadd=1"><img src="assets/images/add-plus.png" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="งานที่ไม่ได้ plan ไว้"></a>
            <?php } 
            
            if($_GET['date_start'] != '' AND $_GET['sale_code'] != ''){ ?>
                <a href="report_daily_report_excel?date_start=<?php if(!empty($_GET['date_start'])){ echo htmlspecialchars($_GET['date_start']);}?>&date_end=<?php if(!empty($_GET['date_end'])){ echo htmlspecialchars($_GET['date_end']);}?>&hospital_ward=<?php if(!empty($_GET['hospital_ward'])){ echo htmlspecialchars($_GET['hospital_ward']);}?>&hospital_name=<?php if(!empty($_GET['hospital_name'])){ echo htmlspecialchars($_GET['hospital_name']);}?>&sale_code=<?php if(!empty($_GET['sale_code'])){ echo htmlspecialchars($_GET['sale_code']);}?>">
                    <img src="assets/images/icon_system/vscode-icons--file-type-excel.svg" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="Export File.csv">
                </a>
            <?php } else { ?>
                    <img src="assets/images/icon_system/vscode-icons--file-type-excel2.svg" style="width: 30px; height: 30px;" data-bs-toggle="tooltip" data-bs-title="ไม่สามารถ Export ได้ กรุณาระบุวันที่ และ เขต...">
            <?php } ?>
        </div>
    </div>
</p>
<div class="table-responsive">
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr style="font-size: 14px;">
                <th style="width: 10%;">วันที่</th>
                <th style="width: 17%;">โรงพยาบาล</th>
                <th style="width: 12%;">หน่วยงาน</th>
                <?php if($_SESSION['typelogin'] == 'Supervisor'){ ?>
                <th style="width: 44%;">รายละเอียด <img src="assets/images/icon_system/material-symbols--help.svg" style="width: 14px; height: 14px;" alt="" data-bs-toggle="tooltip" data-bs-title="UPDATE ประมาณการขาย ,สรุปใบเสนอราคา,สรุปการขาย,Demo ทดลองสินค้า,ข้อมูลคู่แข่ง,ออกบูธ (Group Presentation)"></th>
                <th style="width: 10%;">ผู้ติดต่อ</th>
                <th style="width: 7%;">เขตการขาย</th>
                <?php } else { ?>
                <th style="width: 51%;">รายละเอียด <img src="assets/images/icon_system/material-symbols--help.svg" style="width: 14px; height: 14px;" alt="" data-bs-toggle="tooltip" data-bs-title="UPDATE ประมาณการขาย ,สรุปใบเสนอราคา,สรุปการขาย,Demo ทดลองสินค้า,ข้อมูลคู่แข่ง,ออกบูธ (Group Presentation)"></th>
                <th style="width: 10%;">ผู้ติดต่อ</th>
                <?php } ?>
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
        $sql_total = "SELECT COUNT(*) as total FROM tb_register_data WHERE 1=1 ";
        if (!empty($_GET['date_start']) && !empty($_GET['date_end'])) {
            $sql_total .= "AND date_plan BETWEEN '" . mysqli_real_escape_string($conn, $_GET['date_start']) . "' AND '" . mysqli_real_escape_string($conn, $_GET['date_end']) . "' ";
        }
        if (!empty($_GET['hospital_ward'])) {
            $sql_total .= "AND hospital_ward LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_ward']) . "%' ";
        }
        if (!empty($_GET['hospital_name'])) {
            $sql_total .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_name']) . "%' ";
        }
        if (!empty($_GET['product_rival'])) {
            $sql_total .= "AND product_present LIKE '%" . mysqli_real_escape_string($conn, $_GET['product_rival']) . "%' ";
        }

        // if (!empty($sale_code)) {
        //     $sql_total .= " AND sale_area = '".$sale_code."'  AND head_area = '".$_SESSION['head_area']."' ";
        // } else {
        //     $sql_total .= " AND sale_area = '".$_SESSION['em_id']."'  AND head_area = '".$_SESSION['head_area']."' ";
        // }

        if ($_SESSION["typelogin"] == 'Supervisor') {
            if (empty($sale_code)) {
                $sql_total .= "AND sale_area " . $_SESSION['selectedFull'];
            } else {
                $sql_total .= "AND sale_area = '" . mysqli_real_escape_string($conn, $sale_code) . "' ";
            }
        } else {
            $sql_total .= "AND sale_area = '" .$_SESSION['em_id']. "' ";
        }

        if (!in_array($_SESSION["em_id"], ['VMD', 'MD1', 'IT2', 'PRM'])) {
            $sql_total .= "AND head_area = '" . mysqli_real_escape_string($conn, $_SESSION['head_area']) . "' ";
        }

        $result_total = mysqli_query($conn, $sql_total);
        $total_rows = mysqli_fetch_assoc($result_total)['total'];
        // คำนวณจำนวนหน้าทั้งหมด
        $total_pages = ceil($total_rows / $items_per_page);

        // ดึงข้อมูลสำหรับหน้าปัจจุบัน
        $sqlPlan = "SELECT * FROM tb_register_data WHERE 1=1 ";
        if (!empty($_GET['date_start']) && !empty($_GET['date_end'])) {
            $sqlPlan .= "AND date_plan BETWEEN '".$_GET['date_start']."' AND '".$_GET['date_end']."' ";
        }
        if (!empty($_GET['hospital_ward'])) {
            $sqlPlan .= "AND hospital_ward LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_ward']) . "%' ";
        }
        if (!empty($_GET['hospital_name'])) {
            $sqlPlan .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $_GET['hospital_name']) . "%' ";
        }
        if (!empty($_GET['product_rival'])) {
            $sqlPlan .= "AND product_present LIKE '%" . mysqli_real_escape_string($conn, $_GET['product_rival']) . "%' ";
        }

        // if (!empty($sale_code)) {
        //     $sqlPlan .= " AND sale_area = '".$sale_code."' AND head_area = '".$_SESSION['head_area']."' ";
        // } else {
        //     $sqlPlan .= " AND sale_area = '".$_SESSION['em_id']."' AND head_area = '".$_SESSION['head_area']."' ";
        // }

        if ($_SESSION["typelogin"] == 'Supervisor') {
            if (empty($sale_code)) {
                $sqlPlan .= "AND sale_area " . $_SESSION['selectedFull'];
            } else {
                $sqlPlan .= "AND sale_area = '" . mysqli_real_escape_string($conn, $sale_code) . "' ";
            }
        } else {
            $sqlPlan .= "AND sale_area = '" .$_SESSION['em_id']. "' ";
        }

        if (!in_array($_SESSION["em_id"], ['VMD', 'MD1', 'IT2', 'PRM'])) {
            $sqlPlan .= "AND head_area = '" . mysqli_real_escape_string($conn, $_SESSION['head_area']) . "' ";
        }

        $sqlPlan .= "ORDER BY date_plan DESC LIMIT $items_per_page OFFSET $offset";
        $queryPlan = mysqli_query($conn, $sqlPlan);
        $numPlan = mysqli_num_rows($queryPlan);
// echo $sqlPlan;
        if ($numPlan > 0) {
            while ($rowPlan = mysqli_fetch_array($queryPlan)) { 
            switch ($rowPlan['daily']) {
                case '0': $colorTable = 'background-color:#EBE4ED'; break;
                case '1': $colorTable = 'background-color:#FFFF99'; break;
                case '2': $colorTable = 'background-color:#99FF33'; break;
                case '3': $colorTable = 'background-color:#DDA0DD'; break;
                case '4': $colorTable = 'background-color:#66FFFF'; break;
                case '5': $colorTable = 'background-color:#FFCC99'; break;
                default:  $colorTable = 'background-color:#FFFFFF'; break;
            } 
            ?>
            <tr style="background-color: #FFFFFF; font-size: 14px;">
                <td style="<?php echo $colorTable;?>"><?php echo DateThai($rowPlan['date_plan']);?></td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['hospital_name'];?></td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['hospital_ward'];?></td>
                <td style="<?php echo $colorTable;?>" class="text-start px-2">
                    <?php if($rowPlan['description_focast'] != ''){ ?><div><b style="color:#0080c0;">UPDATE ประมาณการขาย : </b><br><?php echo $rowPlan['description_focast'];?></div><?php } ?>
                    <?php if($rowPlan['product_id1'] != '' AND $rowPlan['product_id1'] != '0'){ ?><div><b style="color:#0080c0;">สรุปใบเสนอราคา :</b><br><?php echo product_view($rowPlan['product_id1']);?> <?php echo $rowPlan['unit_product1'];?> <?php echo $rowPlan['unit_name1'];?></div><?php } ?>
                    <?php if($rowPlan['summary_order'] == '1'){ ?><div><b style="color:#0080c0;">สรุปการขาย :</b> &#10003; </div><?php } ?>
                    <?php if ($rowPlan["description_focastnew"]!='') { ?><div><b style="color:#0080c0;">ประมาณการขายใหม่ :  </b><br><?php echo $objResult["description_focastnew"]; ?></div><?php } ?>
                    <?php $sql = "SELECT cuspre_descript FROM tb_product_delivery WHERE ref_idwork = '".$rowPlan['id_work']."' "; $qsql = mysqli_query($conn,$sql); $vsql = mysqli_fetch_array($qsql); if($vsql['cuspre_descript'] != ''){ ?><div><b style="color:#0080c0;">Demo ทดลองสินค้า :</b><br> <?php echo $vsql['cuspre_descript'];?> </div><?php } ?>
                    <?php
                        $sql1 = "SELECT product_rival,company_rival,rival_brand,rival_model FROM tb_storyrival WHERE refid_work = '".$rowPlan['id_work']."' ";
                        $qsql1 = mysqli_query($conn,$sql1);
                        $nqsql1 = mysqli_num_rows($qsql1); 
                    ?>
                    <?php if($nqsql1 > 0){ ?>
                        <div>
                            <b style="color:#0080c0;">ข้อมูลคู่แข่ง :</b>
                            <?php
                            while($vsql1 = mysqli_fetch_array($qsql1)){
                                echo '<br>'.$vsql1['product_rival'].' '.$vsql1['company_rival'].' '.$vsql1['rival_brand'].' '.$vsql1['rival_model'];
                            }
                            ?>
                        </div>
                    <?php }  
                        $sql2 = "SELECT work_name,work_date,end_date,sum_wordpre FROM tb_present_booth WHERE ref_idwork = '".$rowPlan['id_work']."' AND work_name != '' ";
                        $qsql2 = mysqli_query($conn,$sql2); 
                        $nqsql2 = mysqli_num_rows($qsql2);
                    if($nqsql2 > 0){ ?>
                        <b style="color:#0080c0;">ออกบูธ (Group Presentation) :</b>
                        <?php
                        while($vsql2 = mysqli_fetch_array($qsql2)){
                            echo '<div>'.$vsql2['work_name'].' '.DateThai($vsql2['work_date']).' '.DateThai($vsql2['end_date']).' '.$vsql2['sum_wordpre'].'</div>';
                        }
                        ?>
                    <?php } ?>
                </td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['hospital_contact'];?></td>
                <?php if($_SESSION['typelogin'] == 'Supervisor'){ ?>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['sale_area'];?></td>
                <?php } ?>
            </tr>
        <?php } } else { echo '<td colspan="8" style="text-align: center;"">ไม่พบข้อมูล</td>'; } ?>
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
                    <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&hospital_name=<?php echo $_GET['hospital_name'];?>&hospital_ward=<?php echo $_GET['hospital_ward'];?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
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
                    <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&hospital_name=<?php echo $hospital_name;?>&hospital_ward=<?php echo $hospital_ward;?>&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a>
                </li>
            <?php } ?>

            <!-- ปุ่ม Next -->
            <li class="page-item <?php echo ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?sale_code=<?php echo $sale_code;?>&hospital_name=<?php echo $hospital_name;?>&hospital_ward=<?php echo $hospital_ward;?>&page=<?php echo $current_page + 1; ?>">Next</a>
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

<?php 
$content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
require_once __DIR__ . '/layouts/Main.php';
?>

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