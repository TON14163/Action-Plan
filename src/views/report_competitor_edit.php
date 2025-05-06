<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
error_reporting(0);
$id_story = $_GET['id_story'];
require_once __DIR__ . '/../controllers/MainControllersAll.php';

require_once __DIR__ . '/../controllers/reportcompetitor_controllers.php'; // ข้อมูล
$show = new ReportCompetitor(); // ข้อมูล
?>
<style>
    .dangerMain{
        background-color:rgb(255, 223, 223);
    }
    input[type="text"]{
        width: 100%;
    }
    textarea {
        width: 100%;
    }
</style>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">แก้ไขข้อมูลคู่แข่ง</b>
</div>

<div style="color: #ff8080;">**กรุณากรอกข้อมูลในกรอบสีแดงให้ครบถ้วน</div>

<form action="report_competitor_save" method="post" enctype="multipart/form-data" class="p-5 pt-0">
<input type="hidden" name="id_story" id="id_story" value="<?php echo $id_story;?>">
<section class="pt-3">
    <div class="row">
        <div class="col-4 d-flex justify-content-between"><span><input type="checkbox" name="open_ckk" id="open_ckk" value="1" <?php if($show->showDetails($id_story,'open_ckk') == 1){?> checked <?php }?>> : <label for="open_ckk">ผลเปิดซอง</label> </span><span>วันที่ : <input class="dangerMain" type="date" name="date_open" id="date_open" value="<?php echo $show->showDetails($id_story,'date_open');?>"></span></div>
        <div class="col-4">&nbsp;</div>
        <div class="col-4"></div>
    </div>

    <div class="row my-3 mt-2">
        <div class="col-4">สินค้า : <input class="dangerMain" type="text" name="product_rival" id="product_rival" value="<?php echo $show->showDetails($id_story,'product_rival');?>" required></div>
        <div class="col-4">ยี่ห้อ : <input class="dangerMain" type="text" name="rival_brand" id="rival_brand" value="<?php echo $show->showDetails($id_story,'rival_brand');?>" required></div>
        <div class="col-4">รุ่น : <input class="dangerMain" type="text" name="rival_model" id="rival_model" value="<?php echo $show->showDetails($id_story,'rival_model');?>" required></div>
    </div>

    <div class="row my-3">
        <div class="col-4">ราคาต่อหน่วย : <input class="dangerMain" type="text" name="price_to_unit" id="price_to_unit" value="<?php echo $show->showDetails($id_story,'price_to_unit');?>" required></div>
        <div class="col-4">จำนวนซื้อ : <input class="dangerMain" type="text" name="unit" id="unit" value="<?php echo $show->showDetails($id_story,'unit');?>" required></div>
        <div class="col-4">รับประกัน : <input type="text" name="waranty" id="waranty" value="<?php echo $show->showDetails($id_story,'waranty');?>"></div>
    </div>

    <div class="row my-3">
        <div class="col-4">บริษัท : <input class="dangerMain" type="text" name="company_rival" id="company_rival" value="<?php echo $show->showDetails($id_story,'company_rival');?>" required></div>
        <div class="col-4">ประเทศ : <input type="text" name="rival_country" id="rival_country" value="<?php echo $show->showDetails($id_story,'rival_country');?>"></div>
        <div class="col-4"></div>
    </div>
</section>

<section>
    <div class="row"> 
        <div class="col-4"> รายละเอียดสินค้า : <textarea name="product_des" id="product_des" cols="30" placeholder=". . ."><?php echo $show->showDetails($id_story,'product_des');?></textarea> </div>
        <div class="col-4">
            ของแถม / Promotion <textarea class="dangerMain" name="promotion" id="promotion" cols="30" placeholder=". . ." required><?php echo $show->showDetails($id_story,'promotion');?></textarea>
        </div>
        <div class="col-4">
            การบริการหลังการขาย <textarea name="service" id="service" cols="30" placeholder=". . ."><?php echo $show->showDetails($id_story,'service');?></textarea>
        </div>
        <div class="col-4">
            ลูกค้าชอบ <textarea class="dangerMain" name="cus_like" id="cus_like" cols="30" placeholder=". . ." required><?php echo $show->showDetails($id_story,'cus_like');?></textarea>
        </div>
        <div class="col-4">
            ลูกค้าไม่ชอบ <textarea class="dangerMain" name="cus_dislike" id="cus_dislike" cols="30" placeholder=". . ." required><?php echo $show->showDetails($id_story,'cus_dislike');?></textarea>
        </div>
        <div class="col-4">
            ข้อมูลเพิ่มเติม <textarea name="description" id="description" cols="30" placeholder=". . ."><?php echo $show->showDetails($id_story,'description');?></textarea>
        </div>
    </div>
</section>

<section class="mt-3">
    <b>เพิ่มไฟล์แนบ</b>
    <font class="badge rounded-pill text-bg-success ml-4" style="cursor: pointer;" onclick="addAttachment()">+ เพิ่มไฟล์แนบ</font>
    <font class="badge rounded-pill text-bg-danger ml-4" style="cursor: pointer;" onclick="removeAttachment()">- ลบไฟล์แนบ</font>
    <?php if($show->showDetails($id_story,"file_nap1") != ''){ ?>
        <textarea style="display: none;" name="file_all" id="file_all" ><?php echo $show->showDetails($id_story,"file_nap1");?></textarea>
        <div class="my-2">
            ไฟล์ที่พบ
            <?php echo '<script> let file_naps = '.$show->showDetails($id_story,"file_nap1").'</script>';?>
            <script>
                file_naps.map(file_nap => {
                    document.write(`<a href="<?php echo $_SESSION['thisDomain'];?>uploads/${file_nap.file}" target="_blank" rel="noopener noreferrer"><span class="badge text-bg-secondary">คลิกเพื่อดูไฟล์แนบ</span></a>&nbsp;`)
                })
            </script>
        </div>
    <?php } ?>

    <div id="attachment-container" class="mt-2">
        <input type="file" name="attachments[]" class="attachment-input">
    </div>

    <script>
        function addAttachment() {
            const container = document.getElementById('attachment-container');
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'attachments[]';
            input.className = 'attachment-input mt-2';
            container.appendChild(input);
        }

        function removeAttachment() {
            const container = document.getElementById('attachment-container');
            const inputs = container.getElementsByClassName('attachment-input');
            if (inputs.length > 1) {
                container.removeChild(inputs[inputs.length - 1]);
            }
        }
    </script>
</section>

<label for="proceed1" class="badge rounded-pill mt-5" style="background-color: #19D700; color:#FFFFFF; padding-left: 15px; padding-right: 15px; margin-right: 10px; cursor: pointer;"  >
    <img src="assets/images/icon_system/icon-park--save-one.png" style="width:15px; height:15px; color:#FFFFFF;" > &nbsp; บันทึก
</label>
<input type="submit" value="save" id="proceed1" name="proceed1" style="display: none;">
</form>


<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>