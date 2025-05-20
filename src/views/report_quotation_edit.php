<?php 
    ob_start(); // เปิดใช้งานการเก็บข้อมูล content
    require_once __DIR__ . '/../controllers/report_quotation_controllers.php';
    $show = new ReportQuotation();
    $id_work = $_POST['id_work'];
    $id_customer = $_POST['id_customer'];
?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">รายงานประมาณการขาย [Forcast]</b>
</div>
    <section style="padding: 10px 10%;" class="font-custom-awl-14">
        <form action="" method="post">

            <input type="hidden" name="id_customer" id="id_customer" value="<?php echo $show->showReportQuotation1($id_customer,'id_customer');?>">
            <input type="hidden" name="id_work" id="id_work" value="<?php echo $show->showReportQuotation2($id_work,'id_work');?>">

            <div class="row" style="line-height: 2.5;">
                    <div class="col-6 d-flex justify-content-between">
                        โรงพยาบาล : <input type="text" name="hospital_name" id="hospital_name" value="<?php echo $show->showReportQuotation2($id_work,'hospital_name');?>" required>
                    </div>
                    <div class="col-6"><font style="font-size: 10px; color:#ff8080;">**กรุณาพิมพ์ข้อมูลบางส่วนเพื่อเลือกชื่อโรงพยาบาล หากไม่มีชื่อโรงพยาบาลที่ต้องการรบกวนแจ้ง Admin เพื่อเพิ่มรายชื่อค่ะ</font></div>
                    <div class="col-6 d-flex justify-content-between">
                        <label for="hospital_buiding">ตึก : </label><input class="border border-danger" type="text" name="hospital_buiding" id="hospital_buiding" value="<?php  echo $show->showReportQuotation1($id_customer,'hospital_buiding');?>" required>
                    </div>
                    <div class="col-6 d-flex justify-content-between">
                        <label for="hospital_class">ชั้น : </label><input class="border border-danger" type="text" name="hospital_class" id="hospital_class" value="<?php  echo $show->showReportQuotation1($id_customer,'hospital_class');?>" required>
                    </div>
                    <div class="col-6 d-flex justify-content-between">
                        <label for="hospital_ward_present">กลุ่ม Ward : </label><input class="border border-danger" type="text" name="hospital_ward_present" id="hospital_ward_present" value="<?php  echo $show->showReportQuotation1($id_customer,'hospital_ward_present');?>" required>
                    </div>
                    <div class="col-6 d-flex justify-content-between">
                        <label for="hospital_ward">Ward : </label><input class="border border-danger" type="text" name="hospital_ward" id="hospital_ward" value="<?php  echo $show->showReportQuotation1($id_customer,'hospital_ward');?>" required>
                    </div>
                    <div class="col-12">
                        <small style="font-size: 14px; color:#ff8080;">**หมายเหตุ : หากแก้ไขข้อมูลในช่องสีแดงจะ Save ทับข้อมูลของผู้ติดต่อในฐานด้วยค่ะ</small>
                        <hr>
                    </div>
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <div class="col-4">
                            ผู้ติดต่อ <?php echo $i; ?> : 
                            <input type="text" name="hospital_contact<?php echo $i; ?>" id="hospital_contact<?php echo $i; ?>" value="<?php echo $show->showReportQuotation1($id_customer,"hospital_contact$i");?>" >
                        </div>
                        <div class="col-4">
                            เบอร์โทร <?php echo $i; ?> : 
                            <input type="text" name="hospital_mobile<?php echo $i; ?>" id="hospital_mobile<?php echo $i; ?>" value="<?php echo $show->showReportQuotation1($id_customer,"hospital_mobile$i");?>" >
                        </div>
                        <div class="col-4">
                            email <?php echo $i; ?> : 
                            <input type="text" name="email_contact<?php echo $i; ?>" id="email_contact<?php echo $i; ?>" value="<?php echo $show->showReportQuotation1($id_customer,"email_contact$i");?>" >
                        </div>
                    <?php endfor; ?>
                    
                </div>
        </form>
    </section>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
