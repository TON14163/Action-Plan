<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
if(!empty($_REQUEST['id_work'])){
    
    $id_work = $_REQUEST['id_work'];
    require_once __DIR__ . '/../controllers/DateThai.php'; // date thai

    if(!empty(($_REQUEST['dc']))){
        $dc = $_REQUEST['dc'];
        if($dc == '1'){
            $text = 'กำลังดำเนินการ COPY Plan กรุณารอสักครู่...';
            require_once __DIR__ . '/../views/Loading_page.php';
            require_once __DIR__ . '/../models/daily_report_copy.php';
            echo "<meta http-equiv=refresh content=3;URL=".$_SESSION['thisDomain']."dallyreport>"; 
            mysqli_close($conn);
            exit;
        } else if($dc == '2'){
            $text = 'กำลังดำเนินการ Delete Plan กรุณารอสักครู่...';
            require_once __DIR__ . '/../views/Loading_page.php';
            require_once __DIR__ . '/../models/daily_report_delete.php';
            echo "<meta http-equiv=refresh content=3;URL=".$_SESSION['thisDomain']."dallyreport>"; 
            mysqli_close($conn);
            exit;
        } else if($dc == '3'){
            if(!empty(($_REQUEST['id_story']))){
                $id_story = $_REQUEST['id_story'];
            }
            $text = 'กำลังดำเนินการ Delete ข้อมูลคู่แข่ง กรุณารอสักครู่...';
            require_once __DIR__ . '/../views/Loading_page.php';
            require_once __DIR__ . '/../models/daily_report_deletelist.php';
            echo "<meta http-equiv=refresh content=3;URL=".$_SESSION['thisDomain']."daily_report_edit?id_work=".$id_work."&id_story=".$id_story.">"; 
            mysqli_close($conn);
            exit;
        }
    }

    require_once __DIR__ . '/../controllers/daily_report_edit_controllers.php'; // ข้อมูลทั้งหมดจะอยู่ในส่วนนี้
    $show = new DailyReportEdit(); // เรียกใช้งาน class DailyReportEdit นี้ที่มีข้อมูลอยู่มาแสดง

} else {

    $text = 'ไม่พบเลขที่อ้างอิงกรุณาดำเนินการใหม่อีกครั้ง';
    require_once __DIR__ . '/../views/Loading_page.php';
    print "<meta http-equiv=refresh content=3;URL='../Action-Plan/dallyreport'>"; 
    mysqli_close($conn);
    exit;

}

if (!empty($_GET['planLink'])) { ?>
    <div style="position: fixed; top:30px; right: 20px; " class="alert alert-success alert-dismissible fade show" role="alert"><img src="assets/images/icon_system/swap-horizontal.png" style="width: 20px; height: 20px;"> สลับ Plan แล้ว<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    <script>
        setTimeout(function() {
            let alertEl = document.querySelector('.alert');
            if (alertEl) alertEl.style.display = 'none';
        }, 2500);
    </script>
<?php } 
if (!empty($_GET['addPlanPurple'])) { 
    if($_GET['addPlanPurple'] == '1'){ ?>
        <div style="position: fixed; top:30px; right: 20px; " class="alert alert-success alert-dismissible fade show" role="alert">
            <img src="assets/images/icon_system/check.png" style="width: 20px; height: 20px;"> 
            เพิ่มประมาณการขายใหม่ Status <kbd style="background-color: #EBE4ED; width: 10px; max-height: 10px; border-radius: 0px; border:1px solid #202020;">&nbsp;</kbd> งานที่ plan ไว้แล้ว
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else { ?>
        <div style="position: fixed; top:30px; right: 20px; " class="alert alert-danger alert-dismissible fade show" role="alert">
            <img src="assets/images/icon_system/x-regular-24 (1).png" style="width: 20px; height: 20px;"> 
            เพิ่มประมาณการขายใหม่ <ins>ไม่สำเร็จ</ins>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <script>
        setTimeout(function() {
            let alertEl = document.querySelector('.alert');
            if (alertEl) alertEl.style.display = 'none';
        }, 2500);
    </script>
<?php } ?>

<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; justify-content: space-between; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ลงทะเบียน Daily Report</b>
    <span>
        <?php
        $dateUpdate = $show->showDetails($id_work, 'date_update');
        if (!empty($dateUpdate)) {
            echo 'วันที่แก้ไขล่าสุด : ' . DateThai($dateUpdate);
        }
        ?>
    </span>
</div>
<style>
    label{
        cursor: pointer;
    }
</style>

<form action="daily_report_save" method="post" enctype="multipart/form-data">
    <?php require_once __DIR__ . '/../views/components/dallyreport_register_details1.php';?>
    <?php require_once __DIR__ . '/../views/components/dallyreport_register_details2.php';?>
<section class="accordion font-custom-awl-14" style="font-weight:bold;" id="accordionPanelsStayOpenExample">
    <?php include 'components/dallyreport_register_list1.php'; // ประมาณการขาย ?>
    <?php include 'components/dallyreport_register_list2.php'; // Demo ทดลองสินค้า ?>
    <?php include 'components/dallyreport_register_list3.php'; // ออกบูธ (Group Presentation) ?>
    <?php include 'components/dallyreport_register_list4.php'; // ข้อมูลคู่เเข่ง ?>
</section>
<div style="display: flex; justify-content: space-between; align-items: center; margin-top: 16px;" class="mt-4">
    <span></span>
    <span>
        <label for="proceed1" class="badge rounded-pill" style="background-color: #19D700; color:#FFFFFF; padding-left: 15px; padding-right: 15px; margin-right: 10px; display: flex; align-items: center; cursor: pointer;"  ><img src="assets/images/icon_system/icon-park--save-one.png" style="width:15px; height:15px; color:#FFFFFF;" > &nbsp; บันทึก</label>
        <input type="submit" value="บันทึก" id="proceed1" name="proceed1" style="display: none;">
    </span>
    <?php if ($_SESSION['typelogin'] == 'Supervisor') { ?>
    <span class="badge rounded-pill" style="background-color: #FF0004; color:#FFFFFF; padding-left: 15px; padding-right: 15px; display: flex; align-items: center; cursor: pointer;" onclick="deletePlan(<?php if(isset($id_work)){ echo $id_work; } ?>);"  data-bs-toggle="tooltip" data-bs-title="ลบแผลนงาน"><img src="assets/images/icon_system/trash-alt-solid-24.png" style="width:15px; height:15px;"> &nbsp; Delete</span>
    <?php } else { ?>
    <span></span>
    <?php } ?>
</div>
</form>
<p style="font-size: 12px; color:#FF0004; margin-top: 5px;">
*หมายเหตุ ห้ามใส่เครื่องหมาย , หรือ " หรือ ' เพราะจะทำให้บันทึกข้อมูลไม่ได้ค่ะ
</p>

<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>

<script>

function copyPlan(idCopy) {
    Swal.fire({
        title: "<font color='#FFCC99'>งานที่ Copy งานเดิม !!</font>",
        text: "คุณแน่ใจว่าต้องการ Copy Plan?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes!",
        cancelButtonText: "Cancel"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "COPY!",
                text: "กำลังทำการคัดลอกแผน...",
                icon: "success",
                timer: 1000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = `daily_report_edit?id_work=${idCopy}&dc=1`;
            });
        }
    });
}

function deletePlan(idDelete){

    Swal.fire({
    title: `<font color='#d33' >ลบงานที่ Plan นี้ !!</font>`,
    text: "คุณแน่ใจว่าต้องการ Delete Plan ?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes!"
    }).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
            title: "Delete!",
            icon: "success",
            timer: 1000,
            showConfirmButton: false
        }).then(() => {
            window.location.href = `daily_report_edit?id_work=${idDelete}&dc=2`;
        });
    }
    });
}

function deleteList4(id_work,id_story){

    Swal.fire({
    title: `<font color='#d33' >ลบข้อมูลคู่แข่ง นี้ !!</font>`,
    text: "คุณแน่ใจว่าต้องการ Delete ข้อมูลคู่แข่ง ?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes!"
    }).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
            title: "Delete!",
            icon: "success",
            timer: 1000,
            showConfirmButton: false
        }).then(() => {
            window.location.href = `daily_report_edit?id_work=${id_work}&id_story=${id_story}&dc=3`;
        });
    }
    });
}

// รายการสินค้า START
function addProductRow(rowNum, fieldName, searchTerm, txtHint, product_twolist) {
    if (!searchTerm.trim() || searchTerm.length == 0) {
        document.getElementById(`${txtHint}`).innerHTML = "";
        document.getElementById(`${txtHint}`).style.display = "none";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById(`${txtHint}`).innerHTML = this.responseText;
            document.getElementById(`${txtHint}`).style.display = "block";
        }
    };
    
    xhr.open("GET", "./src/controllers/product_list_controllers.php?q=" + encodeURIComponent(searchTerm) + "&rowNum=" + rowNum + "&fieldName=" + encodeURIComponent(fieldName) + "&txtHint=" + encodeURIComponent(txtHint) + "&product_twolist=" + encodeURIComponent(product_twolist), true);
    xhr.send();
}
// รายการสินค้า END
</script>
