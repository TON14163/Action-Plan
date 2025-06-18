<?php
ob_start();
error_reporting(0);
require_once __DIR__ . '/../controllers/MainControllersAll.php';

// Get and sanitize input parameters
$sale_code = isset($_GET['sale_code']) ? mysqli_real_escape_string($conn, $_GET['sale_code']) : $_SESSION['em_id'];
$date_start = isset($_GET['date_start']) ? mysqli_real_escape_string($conn, $_GET['date_start']) : '';
$date_end = isset($_GET['date_end']) ? mysqli_real_escape_string($conn, $_GET['date_end']) : '';
$hospital_buiding = isset($_GET['hospital_buiding']) ? mysqli_real_escape_string($conn, $_GET['hospital_buiding']) : '';
$hospital_ward = isset($_GET['hospital_ward']) ? mysqli_real_escape_string($conn, $_GET['hospital_ward']) : '';
$hospital_name = isset($_GET['hospital_name']) ? mysqli_real_escape_string($conn, $_GET['hospital_name']) : '';

// Check if all required parameters are present for auto-export
$auto_export = !empty($date_start) && !empty($date_end) && !empty($sale_code);

if ($auto_export) {
    // Set headers for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="Action_Plan_Report_' . date('Ymd_His') . '.csv"');

    // Add UTF-8 BOM for Thai character support in Excel
    echo "\xEF\xBB\xBF";

    // Create output stream
    $output = fopen('php://output', 'w');

    // Write CSV headers
    fputcsv($output, [
        'วันที่',
        'โรงพยาบาล',
        'หน่วยงาน',
        'รายละเอียด',
        'ผู้ติดต่อ',
        'เขตการขาย'
    ], ',', '"');

    // Build SQL query for export
    $sqlPlan = "SELECT * FROM tb_register_data WHERE 1=1 ";
    if (!empty($date_start) && !empty($date_end)) {
        $sqlPlan .= "AND date_plan BETWEEN '$date_start' AND '$date_end' ";
    }
    if (!empty($hospital_buiding)) {
        $sqlPlan .= "AND hospital_buiding LIKE '%" . mysqli_real_escape_string($conn, $hospital_buiding) . "%' ";
    }
    if (!empty($hospital_ward)) {
        $sqlPlan .= "AND hospital_ward LIKE '%" . mysqli_real_escape_string($conn, $hospital_ward) . "%' ";
    }
    if (!empty($hospital_name)) {
        $sqlPlan .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $hospital_name) . "%' ";
    }
    $sqlPlan .= "AND sale_area = '$sale_code' AND head_area = '".$_SESSION['head_area']."'  ";
    $sqlPlan .= "ORDER BY id_work DESC";

    $queryPlan = mysqli_query($conn, $sqlPlan) or die("Query failed: " . mysqli_error($conn));

    // Write data rows
    while ($rowPlan = mysqli_fetch_array($queryPlan)) {
        // Fetch product types
        $product_rivals = '';
        $sqltypeproduct = "SELECT product_rival FROM tb_storyrival WHERE refid_work = '" . mysqli_real_escape_string($conn, $rowPlan['id_work']) . "' ORDER BY id_story DESC LIMIT 20";
        $querytypeproduct = mysqli_query($conn, $sqltypeproduct) or die("Query failed: " . mysqli_error($conn));
        while ($rowtypeproduct = mysqli_fetch_array($querytypeproduct)) {
            $product_rivals .= $rowtypeproduct['product_rival'] . "\n";
        }

    // รายละเอียด START
        $description = '';
        if($rowPlan['description_focastnew'] != ''){ $description .= "UPDATE ประมาณการขาย :".$rowPlan['description_focastnew']; } 
        if($rowPlan['product_id'] != ''){ $description .= 'สรุปใบเสนอราคา :'.product_view($rowPlan['product_id']).$rowPlan['unit_product1'].$rowPlan['unit_name1']; }
        if($rowPlan['summary_order'] == '1'){ $description .= 'สรุปการขาย :&#10003;'; }

        $sql = "SELECT cuspre_descript FROM tb_product_delivery WHERE ref_idwork = '".$rowPlan['id_work']."' "; 
        $qsql = mysqli_query($conn,$sql); 
        $vsql = mysqli_fetch_array($qsql); 
        if($vsql['cuspre_descript'] != ''){ $description .= 'Demo ทดลองสินค้า :'.$vsql['cuspre_descript']; }

        $sql1 = "SELECT product_rival,company_rival,rival_brand,rival_model FROM tb_storyrival WHERE refid_work = '".$rowPlan['id_work']."' "; 
        $qsql1 = mysqli_query($conn,$sql1); 
        $nqsql1 = mysqli_num_rows($qsql1); 
        if($nqsql1 > 0){ $description .= 'ข้อมูลคู่แข่ง :';
            while($vsql1 = mysqli_fetch_array($qsql1)){
                $description .= $vsql1['product_rival'].' '.$vsql1['company_rival'].' '.$vsql1['rival_brand'].' '.$vsql1['rival_model'];
            }
        }

        $sql2 = "SELECT work_name,work_date,end_date,sum_wordpre FROM tb_present_booth WHERE ref_idwork = '".$rowPlan['id_work']."' AND work_name != '' "; 
        $qsql2 = mysqli_query($conn,$sql2); 
        $nqsql2 = mysqli_num_rows($qsql2);
        if($nqsql2 > 0){  
            $description .= 'ออกบูธ (Group Presentation) :';
            while($vsql2 = mysqli_fetch_array($qsql2)){
                $description .= $vsql2['work_name'].' '.DateThai($vsql2['work_date']).' '.DateThai($vsql2['end_date']).' '.$vsql2['sum_wordpre'];
            }
        } 
    // รายละเอียด END

        fputcsv($output, [
            DateThai($rowPlan['date_plan']),
            $rowPlan['hospital_name'],
            $rowPlan['hospital_ward'],
            $description,
            $rowPlan['hospital_contact'],
            $rowPlan['sale_area']
        ], ',', '"');
    }

    fclose($output);
    exit();
} else { ?>
<script> history.back(); </script>
<?php 
echo "<center style='margin-top:20vw;'><h1>ไม่มีข้อมูลที่ระบุ . . .</h1></center>";
exit;
}
?>

<div class="table-responsive">
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th style="width: 10%;">วันที่</th>
                <th style="width: 15%;">โรงพยาบาล</th>
                <th style="width: 15%;">หน่วยงาน</th>
                <th style="width: 37%;">รายละเอียด</th>
                <th style="width: 10%;">ผู้ติดต่อ</th>
                <th style="width: 7%;">เขตการขาย</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Pagination logic
        $items_per_page = 25;
        $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($current_page - 1) * $items_per_page;

        // Count total rows
        $sql_total = "SELECT COUNT(*) as total FROM tb_register_data WHERE 1=1 ";
        if (!empty($date_start) && !empty($date_end)) {
            $sql_total .= "AND date_plan BETWEEN '$date_start' AND '$date_end' ";
        }
        if (!empty($hospital_buiding)) {
            $sql_total .= "AND hospital_buiding LIKE '%" . mysqli_real_escape_string($conn, $hospital_buiding) . "%' ";
        }
        if (!empty($hospital_ward)) {
            $sql_total .= "AND hospital_ward LIKE '%" . mysqli_real_escape_string($conn, $hospital_ward) . "%' ";
        }
        if (!empty($hospital_name)) {
            $sql_total .= "AND hospital_name LIKE '%" . mysqli_real_escape_string($conn, $hospital_name) . "%' ";
        }
        if ($_SESSION['typelogin'] == 'Supervisor') {
            $sql_total .= "AND (sale_area = '" . mysqli_real_escape_string($conn, $_SESSION['em_id']) . "' OR sale_area = '$sale_code') ";
        } else {
            $sql_total .= "AND sale_area = '" . mysqli_real_escape_string($conn, $_SESSION['em_id']) . "' ";
        }
        $result_total = mysqli_query($conn, $sql_total) or die("Query failed: " . mysqli_error($conn));
        $total_rows = mysqli_fetch_assoc($result_total)['total'];
        $total_pages = ceil($total_rows / $items_per_page);

        // Fetch data for current page
        $sqlPlan = "SELECT * FROM tb_register_data WHERE 1=1 ";
        if (!empty($date_start) && !empty($date_end)) {
            $sqlPlan .= "AND date_plan BETWEEN '$date_start' AND '$date_end' ";
        }
        if ($_SESSION['typelogin'] == 'Supervisor') {
            $sqlPlan .= "AND sale_area = '" . ($sale_code ?: $_SESSION['em_id']) . "' ";
        } else {
            $sqlPlan .= "AND sale_area = '" . $_SESSION['em_id'] . "' ";
        }
        $sqlPlan .= "ORDER BY id_work DESC LIMIT $items_per_page OFFSET $offset";
        $queryPlan = mysqli_query($conn, $sqlPlan) or die("Query failed: " . mysqli_error($conn));
        $numPlan = mysqli_num_rows($queryPlan);

        if ($numPlan > 0) {
            while ($rowPlan = mysqli_fetch_array($queryPlan)) {
                $colorTable = '';
                if ($rowPlan['daily'] == '3') {
                    $colorTable = 'background-color: #DDA0DD;';
                } else if ($rowPlan['daily'] == '4') {
                    $colorTable = 'background-color: #66FFFF;';
                }
        ?>
            <tr style="background-color: #FFFFFF;">
                <td style="<?php echo $colorTable;?>"><?php echo DateThai($rowPlan['date_plan']);?></td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['hospital_name'];?></td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['hospital_ward'];?></td>
                <td style="<?php echo $colorTable;?>" class="text-start px-2">
                    <?php if($rowPlan['description_focastnew'] != ''){ ?><div><b style="color:#0080c0;">UPDATE ประมาณการขาย : </b><br><?php echo $rowPlan['description_focastnew'];?></div><?php } ?>
                    <?php if($rowPlan['product_id'] != ''){ ?><div><b style="color:#0080c0;">สรุปใบเสนอราคา :</b><br><?php echo product_view($rowPlan['product_id']);?> <?php echo $rowPlan['unit_product1'];?> <?php echo $rowPlan['unit_name1'];?></div><?php } ?>
                    <?php if($rowPlan['summary_order'] == '1'){ ?><div><b style="color:#0080c0;">สรุปการขาย :</b> &#10003; </div><?php } ?>
                    <?php $sql = "SELECT cuspre_descript FROM tb_product_delivery WHERE ref_idwork = '".$rowPlan['id_work']."' "; $qsql = mysqli_query($conn,$sql); $vsql = mysqli_fetch_array($qsql); if($vsql['cuspre_descript'] != ''){ ?><br><b style="color:#0080c0;">Demo ทดลองสินค้า :</b><br> <?php echo $vsql['cuspre_descript'];?> </div><?php } ?>
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
                        <br><b style="color:#0080c0;">ออกบูธ (Group Presentation) :</b>
                        <?php
                        while($vsql2 = mysqli_fetch_array($qsql2)){
                            echo '<br>'.$vsql2['work_name'].' '.DateThai($vsql2['work_date']).' '.DateThai($vsql2['end_date']).' '.$vsql2['sum_wordpre'];
                        }
                        ?>
                    <?php } ?>
                </td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['hospital_contact'];?></td>
                <td style="<?php echo $colorTable;?>"><?php echo $rowPlan['sale_area'];?></td>
            </tr>
        <?php } } ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/layouts/Main.php';
?>