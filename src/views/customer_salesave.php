<?php
ob_start(); // เปิดใช้งานการเก็บข้อมูล content
error_reporting(0);
?>
<style>
    input,textarea{
        width: 100%;
    }
</style>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">แก้ไขข้อมูลลูกค้า</b>
</div>
<form name="frmSearch" method="POST" action="customer_salesave1">
    <?php
    $strSQLcustomer = "SELECT id_customer FROM tb_register_data WHERE id_work = '".$_GET["id_work"]."' ";
    $objQuerycustomer = mysqli_query($conn,$strSQLcustomer) or die(mysqli_error());
    $objResultcustomer = mysqli_fetch_array($objQuerycustomer);
    // echo $objResultcustomer["id_customer"];
    $strSQLcus2 = "SELECT customer_code FROM tb_customer_contact WHERE id_customer = '".$objResultcustomer["id_customer"]."' ";
    $objQuerycus2 = mysqli_query($conn,$strSQLcus2) or die(mysqli_error());
    $objResultcus2 = mysqli_fetch_array($objQuerycus2);
    // echo $objResultcus2["customer_code"];
    $strSQL = "SELECT * FROM tb_customer_hos WHERE customer_code = '" . $objResultcus2["customer_code"] . "' ";
    $objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error());
    $objResult = mysqli_fetch_array($objQuery);
    ?>
    <div class="row customerBox">
        <div class="col-3">
            รหัสลูกค้า : <input style="background-color: #e0e0e0;" name="customer_code" type='text' id="customer_code" value="<?php echo $objResult["customer_code"]; ?>" readonly>
            <input name="id_work" type='hidden' id="id_work" value="<?php echo $_GET["id_work"]; ?>"  readonly>
        </div>
        <div class="col-3">
            ชื่อลูกค้า : <input style="background-color: #e0e0e0;" name="customer_name" type='text' id="customer_name" value="<?php echo $objResult["customer_name"]; ?>"  readonly>
        </div>
        <div class="col-3">
            เบอร์โทรศัพท์ : <input name="customer_tel" type='text' id="customer_tel" value="<?php echo $objResult["customer_tel"]; ?>" >
        </div>
        <div class="col-3">
            FAX : <input name="fax" type='text' id="fax" value="<?php echo $objResult["fax"]; ?>" >
        </div>
        <div class="col-3">
            <div>
                <label for="">คำนำหน้า</label>
                <select style="width: 100%;" name="title_name" id="title_name" required>
                    <option value="">**Please Select**</option>
                    <?php 
                    $sqlTitle = "SELECT * FROM tb_title ";
                    $qsqlTitle = mysqli_query($conn,$sqlTitle);
                    while($VsqlTitle = mysqli_fetch_array($qsqlTitle)){ ?>
                        <option value="<?php echo $VsqlTitle['title_name'];?>" <?php if($objResult['title_name'] == $VsqlTitle['title_name']){?> selected <?php } ?>><?php echo $VsqlTitle['title_name'];?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div>
                <label for="">จังหวัด</label>
                <select name="province_name" id="province_name" style="width: 100%;" required>
                    <option value="">**Please Select**</option>
                </select>
                <script>
                    fetch('<?php echo $_SESSION['thisDomain'];?>province.json')
                        .then(response => response.json())
                        .then(datas => {
                            datas.forEach(data => {
                                const isSelected = "<?php echo $objResult['province']; ?>" === data.name_th ? 'selected' : '';
                                document.getElementById('province_name').innerHTML += `<option value="${data.name_th}" ${isSelected}>${data.name_th}</option>`;
                            });
                        })
                        .catch(error => console.error(error));
                </script>
            </div>
        </div>
        <div class="col-3">
            รหัสไปรษณีย์ : <input name="zip_code" type='text' id="zip_code" value="<?php echo $objResult["zip_code"]; ?>" >
        </div>
        <div class="col-3">
            credit : <input name="customer_credit" type="text" id="customer_credit" value="<?php echo $objResult["customer_credit"]; ?>" >
        </div>
        <div class="col-3">
            เขตการขาย :<input name="sale_area" type="text" id="sale_area" value="<?php echo $objResult["sale_area"]; ?>"  readonly>
        </div>
        <div class="col-9">
            ที่อยู่ : <textarea name="address_name" id="address_name" rows="1"><?php echo $objResult["address_name"]; ?></textarea>
        </div>
        
    </div>
    <hr style="border: 1px dashed #202020;">
    <div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
        <b style="font-size: 20px;">รายการ : การสร้างตึกใหม่</b>
    </div>
    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
        <tr>
            <td>วันที่พบเรื่อง</td>
            <td>ชื่อตึก/โครงการ</td>
            <td>หน่วยงาน</td>
            <td>ผู้มีอำนาจตัดสินใจ</td>
            <td>ผลิตภัณฑ์ที่เสนอ</td>
            <td>สถานะ</td>
            <td>Edit</td>
        </tr>
        <?php
        $strSQLne = "SELECT *  FROM tb_newbuiding where customer_id = '" . $objResultcus2["customer_code"] . "' ";
        $strSQLne .= " order  by start_date  ASC ";
        $objQueryne  = mysqli_query($conn, $strSQLne);
        while ($objResultne = mysqli_fetch_array($objQueryne)) {
        ?>
            <tr>
                <td>
                    <?php
                    $date = explode('-', $objResultne["start_date"]);
                    $xdate = $date[2] . '-' . $date[1] . '-' . $date[0];
                    echo $xdate;
                    ?>
                </td>
                <td><?php echo $objResultne["project_name"]; ?></td>
                <td><?php echo $objResultne["agency"]; ?></td>
                <td><?php echo $objResultne["approve_name1"]; ?></td>
                <td>
                    <?php if ($objResultne["product_present1"] != '') {
                        echo $objResultne["product_present1"]; ?><br><?php } ?>
                    <?php if ($objResultne["product_present2"] != '') {
                        echo $objResultne["product_present2"]; ?><br><?php } ?>
                    <?php if ($objResultne["product_present3"] != '') {
                        echo $objResultne["product_present3"];
                    } ?>
                </td>

                <?php if ($objResultne["status_newbui"] == '1') { ?>
                    <td bgcolor="#FF3030">รอดำเนินการ</td>
                <?php } else if ($objResultne["status_newbui"] == '2') { ?>
                    <td bgcolor="#00FF00">ตึกเปิดแล้ว</td>
                <?php } else if ($objResultne["status_newbui"] == '3') { ?>
                    <td bgcolor="#FFFF00">กำลังดำเนินการ</td>
                <?php } ?>
                <td align="center">
                    <a href="newbuiding_edit?id_work=<?php echo $_GET["id_work"]; ?>&id=<?php echo $objResultne["id"]; ?>&customer_code=<?php echo $objResultcus2["customer_code"]; ?>">
                        <img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;">
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <div style="padding:10px;">
        <input type="checkbox" name="ckk" id="ckk" onClick="ck_frm();" value="1" />
        <label for="ckk" style="color: #FF0000;">เพิ่มรายละเอียดการสร้างตึกใหม่</label>
    </div>

    <div id="frm_txt" style="display:none; background-color: #e0e0e0; border-radius: 8px; padding:16px 8px;">
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-6">วันที่พบเรื่อง :<input name="start_date" type="date" id="start_date" /></div>
                    <div class="col-6">วันที่สิ้นสุดโครงการ :<input name="end_date" type="date" id="end_date" /></div>
                    <div class="col-6">ชื่อตึก/โครงการ :<input name="project_name" type="text" id="project_name"  /></div>
                    <div class="col-6">จำนวนชั้น :<input name="layers_no" type="text" id="layers_no"  /></div>
                    <div class="col-6">หน่วยงาน :<input name="agency" type='text' id="agency"  /></div>
                    <div class="col-6">ราคางบรวมทั้งโครงการ:<input name="sum_price" type='text' id="sum_price" style="text-align:right;padding-right:2px;"  /></div>
                </div>
                หมายเหตุ :<textarea name="descript" id="descript" cols="53" rows="4"></textarea>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-4">
                        ผู้มีอำนาจตัดสินใจ1 :<input name="approve_name1" type="text" id="approve_name1"  />
                        ผู้มีอำนาจตัดสินใจ2 :<input name="approve_name2" type="text" id="approve_name2"  />
                        ผู้มีอำนาจตัดสินใจ3 :<input name="approve_name3" type="text" id="approve_name3"  />
                    </div>
                    <div class="col-4">
                        เบอร์โทร 1 :<input name="approve_tel1" type="text" id="approve_tel1"  />
                        เบอร์โทร 2 :<input name="approve_tel2" type="text" id="approve_tel2"  />
                        เบอร์โทร 3 :<input name="approve_tel3" type="text" id="approve_tel3"  />
                    </div>
                    <div class="col-4">
                        email1 :<input name="approve_email1" type='text' id="approve_email1"  />
                        email2 :<input name="approve_email2" type='text' id="approve_email2"  />
                        email3 :<input name="approve_email3" type='text' id="approve_email3"  />
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        ผลิตภัณฑ์ที่เสนอ 1 :<input name="product_present1" type="text" id="product_present1" size="15" />
                        ผลิตภัณฑ์ที่เสนอ 2 :<input name="product_present2" type="text" id="product_present2" size="15" />
                        ผลิตภัณฑ์ที่เสนอ 3 :<input name="product_present3" type="text" id="product_present3" size="15" />
                    </div>
                    <div class="col-2">
                        จำนวน :<input name="unit1" type="text" id="unit1" size="8" style="text-align:right;padding-right:2px;" />
                        จำนวน :<input name="unit2" type="text" id="unit2" size="8" style="text-align:right;padding-right:2px;" />
                        จำนวน :<input name="unit3" type="text" id="unit3" size="8" style="text-align:right;padding-right:2px;" />
                    </div>
                    <div class="col-2">
                        ราคางบ :<input name="price1" type='text' id="price1" style="text-align:right;padding-right:2px;" size="8" />
                        ราคางบ :<input name="price2" type='text' id="price2" style="text-align:right;padding-right:2px;" size="8" />
                        ราคางบ :<input name="price3" type='text' id="price3" style="text-align:right;padding-right:2px;" size="8" />
                    </div>
                    <div class="col-2">
                        วันที่ส่งของ :<input name="date_delivery1" type='date' id="date_delivery1" />
                        วันที่ส่งของ :<input name="date_delivery2" type='date' id="date_delivery2" />
                        วันที่ส่งของ :<input name="date_delivery3" type='date' id="date_delivery3" />
                    </div>
                    <div class="col-3">
                        คู่แข่ง :<input name="rival1" type='text' id="rival1" size="15" />
                        คู่แข่ง :<input name="rival2" type='text' id="rival2" size="15" />
                        คู่แข่ง :<input name="rival3" type='text' id="rival3" size="15" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center><input style="width: 100px;" class="btn btn-primary mt-5" type="submit" name="Submit" value="บันทึก"></center>
</form>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/layouts/Main.php';
?>

<script type="text/javascript">
    function ck_frm(){
        var ck = document.getElementById('ckk');
        if(ck.checked == true){
        document.getElementById('frm_txt').style.display = "";
        } else {
        document.getElementById('frm_txt').style.display = "none";
        }
    }
</script>