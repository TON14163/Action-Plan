<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content 
$dayDF = date('Y-m-d');
function DateThaiM($strDate)
{
	$strYear = date("Y", strtotime($strDate)) + 543;
	$strMonth = date("n", strtotime($strDate));
	$strDay = date("j", strtotime($strDate));
	$strHour = date("H", strtotime($strDate));
	$strMinute = date("i", strtotime($strDate));
	$strSeconds = date("s", strtotime($strDate));
	$strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
	$strMonthThai = $strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear";
}
?>

<center>
	<h2>อนุมัติเปอร์เซ็นต์ประมาณการ</h2>
</center>
<form name="frmSearch" method="GET" action="<?php echo $url; ?>">
	<table class="table-thead-custom-awl table-bordered border-secondary w-100">
		<tr>
			<td bgcolor="#ebe4ed">วันที่</td>
			<td bgcolor="#ebe4ed">โรงพยาบาล <br>
				<font style="color:#004080;">หน่วยงาน</font> <br>
				<font style="color:#0080c0;">ผู้แนะนำ</font>
			</td>
			<td bgcolor="#ebe4ed">รายการ <br><font style="color:#004080;">จำนวน</font> <br><font style="color:#0080c0;">มูลค่า</font></td>
			<td bgcolor="#ebe4ed">เปอร์เซ็นเดิม <br><font style="color:#0080c0;">เปอร์เซ็นใหม่</font> </td>
			<td bgcolor="#ebe4ed">วันที่ส่งของ <br><font style="color:#0080c0;">วันที่จะได้รับ P/O</font></td>
			<th bgcolor="#ebe4ed">หมายเหตุที่ขอแก้ไข</th>
			<td bgcolor="#ebe4ed">ประเภท</td>
			<td bgcolor="#ebe4ed">เขตการขาย</td>
			<td bgcolor="#ebe4ed">ดูรายละเอียด</td>
		</tr>
		<?php
		$strSQL = "SELECT *  FROM tb_apppercent where  status_doc='Request' ";
		$objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
		$Num_Rows = mysqli_num_rows($objQuery);
		?>
		<?php
		$i = 1;
		while ($objResult1 = mysqli_fetch_array($objQuery)) {

			$strSQL1 = "SELECT *  FROM tb_register_data  where id_work  = '" . $objResult1["id_work"] . "'";
			$objQuery1 = mysqli_query($conn, $strSQL1) or die("Error Query [" . $strSQL1 . "]");
			$objResult = mysqli_fetch_array($objQuery1);


		?>
			<tr>

				<td><?php echo DatethaiM($objResult["date_plan"]);?></td>
				<td>
					<?php echo $objResult["hospital_name"];?> <br>
					<font style="color:#004080;"><?php echo $objResult["hospital_ward"];?></font> <br>
					<font style="color:#0080c0;"><?php echo $objResult["pre_name"];?></font>
				</td>
				<td>
					<?php echo $objResult["summary_quote"]; ?>
					<?php echo $objResult["summary_product1"]; ?>&nbsp;&nbsp; <?php echo $objResult["remark_pro1"]; ?>
					<br>
					<font style="color:#004080;">
						<?php if ($objResult["unit_product1"] != '0') {
							echo $objResult["unit_product1"];
						} ?>&nbsp;<?php echo $objResult["unit_name1"]; ?>
					</font>
					<br>
					<font style="color:#0080c0;">
						<?php 
							$sum_price_product = $objResult["sum_price_product"];
							echo number_format($sum_price_product, 0) . "";
						?>
					</font>
				</td>

				<?php if ($objResult["percent_id"] == '1') { ?>
				<td style="text-align:center;" bgcolor="#00FF00">
					<?php echo $objResult["percent_name"]; ?><br>
					<font style="color:#0080c0;"><?php echo $objResult1["percent_newname"]; ?></font>
				</td>
				<?php
				} else if ($objResult["percent_id"] == '2') {
				?>
				<td style="text-align:center;" bgcolor="#CCFF99">
					<?php echo $objResult["percent_name"]; ?><br>
					<font style="color:#0080c0;"><?php echo $objResult1["percent_newname"]; ?></font>
				</td>
				<?php
				} else if ($objResult["percent_id"] == '3') {
				?>
				<td style="text-align:center;" bgcolor="#FFFF00">
					<?php echo $objResult["percent_name"]; ?><br>
					<font style="color:#0080c0;"><?php echo $objResult1["percent_newname"]; ?></font>
				</td>
				<?php
				} else if ($objResult["percent_id"] == '4') {
				?>
				<td style="text-align:center;" bgcolor="#FF6600">
					<?php echo $objResult["percent_name"]; ?><br>
					<font style="color:#0080c0;"><?php echo $objResult1["percent_newname"]; ?></font>
				</td>
				<?php
				} else if ($objResult["percent_id"] == '5') {
				?>
				<td style="text-align:center;" bgcolor="#FF0000">
					<?php echo $objResult["percent_name"]; ?><br>
					<font style="color:#0080c0;"><?php echo $objResult1["percent_newname"]; ?></font>
				</td>
				<?php } else { ?>
					<td style="text-align:center;"></td>
				<?php } ?>

				<td>
					<?php echo DatethaiM($objResult["month_po"]);?>
					<br>
					<font style="color:#0080c0;">
					<?php 
						if ($objResult["date_request"] != '0000-00-00') {
							echo DatethaiM($objResult["date_request"]);
						} 
					?>
					</font>
				</td>
				<td>
					<?php echo $objResult1['description'];?>
				</td>
				<td>
					<?php
					$strSQLty = "SELECT type_code FROM tb_typecus WHERE id = '" . $objResult["type_cus"] . "' ";
					$objQueryty = mysqli_query($conn, $strSQLty) or die(mysqli_error());
					$objResultty = mysqli_fetch_array($objQueryty);
					echo $objResultty["type_code"]; ?>
				</td>
				<td width="15"><?php echo $objResult["sale_area"]; ?></td>
				<td align="center">
					<img src="assets/images/icon_system/edit.png" style="width: 20px; height: 20px;" onclick="mdChk('<?php echo $objResult['id_work'];?>','<?php echo $objResult1['id'];?>');">
				</td>
			</tr>
		<?php
			$i++;
		}
		?>
	</table>

	<?php
	$content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
	require_once __DIR__ . '/layouts/Main.php';
	?>

	
<script>
	function mdChk(id_work, id) {
    Swal.fire({
        title: "อนุมัติการแก้ไขวันที่ต้องการสินค้า",
        html: `
            <div class="text-left">
			กรุณาตรวจสอบข้อมูลและระบุเหตุผลก่อนดำเนินการ
			<br><br>
			<textarea id="approve_des" style="width:100%;" placeholder="กรุณาระบุเหตุผล..." required></textarea>
            </div>
        `,
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Approve",
        denyButtonText: "Rejected",
        preConfirm: () => {
            const approveDes = document.getElementById('approve_des').value.trim();
            if (!approveDes) {
                Swal.showValidationMessage('กรุณาระบุเหตุผล');
                return false;
            }
            return encodeURIComponent(approveDes);
        },
        preDeny: () => {
            const approveDes = document.getElementById('approve_des').value.trim();
            if (!approveDes) {
                Swal.showValidationMessage('กรุณาระบุเหตุผล');
                return false;
            }
            return encodeURIComponent(approveDes);
        }
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "ดำเนินการสำเร็จ",
                text: "อนุมัติการแก้ไขวันที่เรียบร้อย",
                icon: "success",
                timer: 1500,
                showConfirmButton: false
            });
            const approveDes = result.value;
            window.location.href = `status_approve?id_work=${encodeURIComponent(id_work)}&id=${encodeURIComponent(id)}&status=Approve&approve_des=${approveDes}`;
        } else if (result.isDenied) {
            Swal.fire({
                title: "ดำเนินการสำเร็จ",
                text: "ปฏิเสธการแก้ไขวันที่เรียบร้อย",
                icon: "info",
                timer: 1500,
                showConfirmButton: false
            });
            const approveDes = result.value;
            window.location.href = `status_approve?id_work=${encodeURIComponent(id_work)}&id=${encodeURIComponent(id)}&status=Rejected&approve_des=${approveDes}`;
        }
    }).catch((error) => {
        Swal.fire({
            title: "เกิดข้อผิดพลาด",
            text: "ไม่สามารถดำเนินการได้ กรุณาลองใหม่",
            icon: "error"
        });
    });
}
</script>

<?php
if (isset($_GET['id_work']) && isset($_GET['id'])) {
	$id_work = $_GET['id_work'];
	$id = $_GET['id'];
	$status = $_GET['status'];
	if ($status == 'Approve') {
		$strMd1 = "UPDATE tb_apppercent SET status_doc ='Approve' , approve_des = '".$approve_des."' WHERE id ='".$id."' ";
		$objQueryMd1 = mysqli_query($conn,$strMd1) or die(mysqli_error());
	} else if ($status == 'Reject') {
		$strMd2 = "UPDATE tb_apppercent SET status_doc ='Rejected' , approve_des = '".$approve_des."' WHERE id ='".$id."' ";
		$objQueryMd2 = mysqli_query($conn,$strMd2) or die(mysqli_error());
	}

	echo "<script>window.location.href='status_approve';</script>";
	exit();
}
?>