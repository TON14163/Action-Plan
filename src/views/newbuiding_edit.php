<?php
ob_start(); // เปิดใช้งานการเก็บข้อมูล content
error_reporting(0);
?>
<style>
    input,
    textarea {
        width: 100%;
    }
</style>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ข้อมูลลูกค้า (แก้ไขรายละเอียดการสร้างตึกใหม่)</b>
</div>

<script type="text/javascript">
    function ck_frm() {
        var ck = document.getElementById('ckk');
        if (ck.checked == true) {
            document.getElementById('frm_txt').style.display = "";
        } else {
            document.getElementById('frm_txt').style.display = "none";
        }

    }
</script>

<form name="frmSearch" method="POST" action="newbuiding_edit1">
    <?php
    $strSQL = "SELECT * FROM tb_customer_hos WHERE customer_code = '" . $_GET["customer_code"] . "' ";
    $objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error());
    $objResult = mysqli_fetch_array($objQuery);

    $strSQLne = "SELECT *  FROM tb_newbuiding where id = '" . $_GET["id"] . "'";
    $objQueryne  = mysqli_query($conn, $strSQLne);
    $objResultne = mysqli_fetch_array($objQueryne);
    ?>

    <div class="row">
        <div class="col-3">
            รหัสลูกค้า :
            <input name="customer_code" type='text' id="customer_code" value="<?php echo $objResult["customer_code"]; ?>" readonly>
            <input name="id_work" type='hidden' id="id_work" value="<?php echo $_GET["id_work"]; ?>" readonly>
            <input name="id" type='hidden' id="id" value="<?php echo $_GET["id"]; ?>" readonly>
        </div>
        <div class="col-3">คำนำหน้า : <input type="text" name="title_name" id="title_name" autocomplete="off" value="<?php echo $objResult["title_name"]; ?>" placeholder="Search title name..." readonly></div>
        <div class="col-3">ชื่อลูกค้า : <input name="customer_name" type='text' id="customer_name" value="<?php echo $objResult["customer_name"]; ?>" readonly></div>
        <div class="col-3"></div>
        <div class="col-3">วันที่พบเรื่อง : <input name="start_date" type="date" id="start_date" value="<?php echo $objResultne["start_date"]; ?>" /></div>
        <div class="col-3">วันที่สิ้นสุดโครงการ : <input name="end_date" type="date" id="end_date" value="<?php echo $objResultne["end_date"]; ?>" /></div>
        <div class="col-6"></div>

        <div class="col-3">ชื่อตึก/โครงการ : <input name="project_name" type="text" id="project_name" value="<?php echo $objResultne["project_name"]; ?>" /></div>
        <div class="col-3">จำนวนชั้น : <input name="layers_no" type="text" id="layers_no" value="<?php echo $objResultne["layers_no"]; ?>" /></div>
        <div class="col-3">หน่วยงาน : <input name="agency" type='text' id="agency" value="<?php echo $objResultne["agency"]; ?>" /></div>
        <div class="col-3">ราคางบรวมทั้งโครงการ : <input name="sum_price" type='text' id="sum_price" style="text-align:right;padding-right:2px;" value="<?php echo number_format($objResultne["sum_price"], 2) . ""; ?>" /></div>

        <div class="col-12">
            <hr style="border: 1px dashed #202020;">
        </div>

        <div class="col-4">ผู้มีอำนาจตัดสินใจ1 : <input name="approve_name1" type="text" id="approve_name1" value="<?php echo $objResultne["approve_name1"]; ?>" /></div>
        <div class="col-4">เบอร์โทร 1 :<input name="approve_tel1" type="text" id="approve_tel1" value="<?php echo $objResultne["approve_tel1"]; ?>" /></div>
        <div class="col-4">email1 :<input name="approve_email1" type='text' id="approve_email1" value="<?php echo $objResultne["approve_email1"]; ?>" /></div>

        <div class="col-4">ผู้มีอำนาจตัดสินใจ2 :<input name="approve_name2" type="text" id="approve_name2" value="<?php echo $objResultne["approve_name2"]; ?>" /></div>
        <div class="col-4">เบอร์โทร 2 :<input name="approve_tel2" type="text" id="approve_tel2" value="<?php echo $objResultne["approve_tel2"]; ?>" /></div>
        <div class="col-4">email2 :<input name="approve_email2" type='text' id="approve_email2" value="<?php echo $objResultne["approve_email2"]; ?>" /></div>

        <div class="col-4">ผู้มีอำนาจตัดสินใจ3 :<input name="approve_name3" type="text" id="approve_name3" value="<?php echo $objResultne["approve_name3"]; ?>" /></div>
        <div class="col-4">เบอร์โทร 3 :<input name="approve_tel3" type="text" id="approve_tel3" value="<?php echo $objResultne["approve_tel3"]; ?>" /></div>
        <div class="col-4">email3 :<input name="approve_email3" type='text' value="<?php echo $objResultne["approve_email3"]; ?>" id="approve_email3" /></div>

        <div class="col-4">ผลิตภัณฑ์ที่เสนอ :<input name="product_present1" type="text" id="product_present1" size="15" value="<?php echo $objResultne["product_present1"]; ?>" /></div>
        <div class="col-2">จำนวน :<input name="unit1" type="text" id="unit1" value="<?php echo $objResultne["unit1"]; ?>" size="8" style="text-align:right;padding-right:2px;" /></div>
        <div class="col-2">ราคางบ :<input name="price1" type='text' id="price1" style="text-align:right;padding-right:2px;" value="<?php echo number_format($objResultne["price1"], 2) . ""; ?>" size="8" /></div>
        <div class="col-2">วันที่ส่งของ :<input name="date_delivery1" value="<?php echo $objResultne["date_delivery1"]; ?>" type='date' id="date_delivery1" /></div>
        <div class="col-2">คู่แข่ง :<input name="rival1" value="<?php echo $objResultne["rival1"]; ?>" type='text' id="rival1" size="15" /></div>

        <div class="col-4">ผลิตภัณฑ์ที่เสนอ :<input name="product_present2" type="text" id="product_present2" size="15" value="<?php echo $objResultne["product_present2"]; ?>" /></div>
        <div class="col-2">จำนวน :<input name="unit2" type="text" id="unit2" value="<?php echo $objResultne["unit2"]; ?>" size="8" style="text-align:right;padding-right:2px;" /></div>
        <div class="col-2">ราคางบ :<input name="price2" type='text' id="price2" style="text-align:right;padding-right:2px;" value="<?php echo number_format($objResultne["price2"], 2) . ""; ?>" size="8" /></div>
        <div class="col-2">วันที่ส่งของ :<input name="date_delivery2" value="<?php echo $objResultne["date_delivery2"]; ?>" type='date' id="date_delivery2" /></div>
        <div class="col-2">คู่แข่ง :<input name="rival2" value="<?php echo $objResultne["rival2"]; ?>" type='text' id="rival2" size="15" /></div>

        <div class="col-4">ผลิตภัณฑ์ที่เสนอ :<input name="product_present3" type="text" id="product_present3" size="15" value="<?php echo $objResultne["product_present3"]; ?>" /></div>
        <div class="col-2">จำนวน :<input name="unit3" type="text" id="unit3" value="<?php echo $objResultne["unit3"]; ?>" size="8" style="text-align:right;padding-right:2px;" /></div>
        <div class="col-2">ราคางบ :<input name="price3" type='text' id="price3" style="text-align:right;padding-right:2px;" value="<?php echo number_format($objResultne["price3"], 2) . ""; ?>" size="8" /></div>
        <div class="col-2">วันที่ส่งของ :<input name="date_delivery3" value="<?php echo $objResultne["date_delivery3"]; ?>" type='date' id="date_delivery3" /></div>
        <div class="col-2">คู่แข่ง : <input name="rival3" value="<?php echo $objResultne["rival3"]; ?>" type='text' id="rival3" size="15" /></div>
    </div>

    <hr style="border: 1px dashed #202020;">
    
    <table border="1" width="100%">
        <tr>
            <td width="10%" align="center" bgcolor="#ebe4ed">วันที่ Update</td>
            <td width="90%" align="center" bgcolor="#ebe4ed">หมายเหตุ</td>
        </tr>
        <?php if ($objResultne["descript"] != '') { ?>
            <tr>
                <td></td>
                <td><?php echo $objResultne["descript"]; ?></td>
            </tr>
        <?php
        }
        $strSQLst = "SELECT *  FROM tb_des_newbui where ref_newbui = '" . $_GET["id"] . "'";
        $strSQLst .= " order  by date_save  ASC ";
        $objQueryst  = mysqli_query($conn, $strSQLst);
        while ($objResultst = mysqli_fetch_array($objQueryst)) { ?>
            <tr>
                <td>
                    <?php
                    $date = explode('-', $objResultst["date_save"]);
                    $xdate = $date[2] . '-' . $date[1] . '-' . $date[0];
                    echo $xdate; ?>
                </td>
                <td><?php echo $objResultst["description"]; ?></td>
            </tr>
        <?php } ?>
    </table>
    หมายเหตุ : <textarea name="descript" id="descript" cols="53" rows="2"></textarea>
    <br>
    <?php if ($_SESSION["typelogin"] == 'Supervisor') {  ?>
        สถานะ :
        <?php if ($objResultne["status_newbui"] == '1') { ?>
            <input type="radio" name="status_newbui" id="status_newbui" checked='checked' value='1'> รอดำเนินการ
            <input type="radio" name="status_newbui" id="status_newbui" value='3'> กำลังดำเนินการ
            <input type="radio" name="status_newbui" id="status_newbui" value='2'> ตึกเปิดแล้ว
        <?php } else if ($objResultne["status_newbui"] == '2') { ?>
            <input type="radio" name="status_newbui" id="status_newbui" value='1'> รอดำเนินการ
            <input type="radio" name="status_newbui" id="status_newbui" value='3'> กำลังดำเนินการ
            <input type="radio" name="status_newbui" id="status_newbui" checked='checked' value='2'> ตึกเปิดแล้ว
        <?php } else if ($objResultne["status_newbui"] == '3') { ?>
            <input type="radio" name="status_newbui" id="status_newbui" value='1'> รอดำเนินการ
            <input type="radio" name="status_newbui" id="status_newbui" checked='checked' value='3'> กำลังดำเนินการ
            <input type="radio" name="status_newbui" id="status_newbui" value='2'> ตึกเปิดแล้ว
    <?php }
    }
    ?>
    <center><input style="width: 100px;" class="btn btn-primary mt-5" type="submit" name="Submit" value="บันทึก"></center>
</form>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/layouts/Main.php';
?>