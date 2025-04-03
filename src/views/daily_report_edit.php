<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
if(!empty($_REQUEST['id_work'])){
    
    $id_work = $_REQUEST['id_work'];

    if(!empty(($_REQUEST['dc']))){
        $dc = $_REQUEST['dc'];
        if($dc == '1'){
            $text = 'กำลังดำเนินการ COPY ข้อมูล กรุณารอสักครู่...';
            require_once __DIR__ . '/../views/Loading_page.php';
            require_once __DIR__ . '/../models/daily_report_copy.php';
            print "<meta http-equiv=refresh content=3;URL='../Action-Plan/dallyreport'>"; 
            mysqli_close($conn);
            exit;
        } else if($dc == '2'){
            $text = 'กำลังดำเนินการ Delete ข้อมูล กรุณารอสักครู่...';
            require_once __DIR__ . '/../views/Loading_page.php';
            require_once __DIR__ . '/../models/daily_report_delete.php';
            print "<meta http-equiv=refresh content=3;URL='../Action-Plan/dallyreport'>"; 
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
?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ลงทะเบียน Daily Report</b>
</div>

<?php require_once __DIR__ . '/../views/components/dallyreport_register_details1.php';?>
<?php require_once __DIR__ . '/../views/components/dallyreport_register_details2.php';?>

<section class="accordion font-custom-awl-14" style="font-weight:bold;" id="accordionPanelsStayOpenExample">
    <?php include 'components/dallyreport_register_list1.php'; // ประมาณการขาย ?>
    <?php include 'components/dallyreport_register_list2.php'; // Demo ทดลองสินค้า ?>
    <?php include 'components/dallyreport_register_list3.php'; // ออกบูธ (Group Presentation) ?>
    <?php include 'components/dallyreport_register_list4.php'; // ข้อมูลคู่เเข่ง ?>
</section>

<a href="https://allwellcenter.com/voc/" target="_blank"><span class="badge rounded-pill" style="background-color: #F1E1FF; color:#525252; padding-left: 10px; padding-right: 15px;"><img src="assets/images/icon_system/link-alt-regular-24.png" style="width:15px; height:15px; color:#FFFFFF;"> แบบฟอร์มข้อร้องเรียน</span></a>

<div style="display: flex; justify-content: space-between; align-items: center; margin-top: 16px;" class="mt-4">
    <span class="badge rounded-pill" style="background-color: #19D700; color:#FFFFFF; padding-left: 15px; padding-right: 15px; margin-right: 10px; display: flex; align-items: center;"  >
        <img src="assets/images/icon_system/icon-park--save-one.png" style="width:15px; height:15px; color:#FFFFFF;" > &nbsp; บันทึก
    </span>
    <span class="badge rounded-pill" style="background-color: #FF0004; color:#FFFFFF; padding-left: 15px; padding-right: 15px; display: flex; align-items: center; cursor: pointer;" onclick="deletePlan(<?php if(isset($id_work)){ echo $id_work; } ?>);">
        <img src="assets/images/icon_system/trash-alt-solid-24.png" style="width:15px; height:15px;"> &nbsp; Delete
    </span>
</div>

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

</script>