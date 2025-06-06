<?php
ob_start();
error_reporting(0);
?>
<center>
    <h5>รายงานการจัด Present / การออก Booth</h5>
</center>
<form name="frmSearch" method="GET" action="<?php echo $url; ?>">
                <center>
                    <div style="display: flex;">
                        วันที่ : <input name="start_date" type="date" id="start_date" value="<?php echo $_GET["start_date"]; ?>"> ถึง : <input name="end_date" type="date" id="end_date" value="<?php echo $_GET["end_date"]; ?>">
                        <label for="customer"><b>ค้นหาลูกค้า : </b></label> &nbsp;
                        <?php if (isset($_GET["dallyadd"])) { ?><input type='hidden' id="dallyadd" name="dallyadd" value="1"><?php } ?>
                        <input style="width: 250px;" type="text" name="customer_code" id="customer_code" autocomplete="off" placeholder="ระบุข้อมูล . . . " value="<?php echo !empty($_GET['customer_code']) ? htmlspecialchars($_GET['customer_code']) : ''; ?>">
                        <div id="customerDropdown" class="customerDropdown" style="left: 42vw;margin-top: 40px;">
                            <div class="customerSelectNewView" style="background-color:#FCFCFC; position: relative; padding:2px; border-radius: 8px;"></div>
                        </div>
                        sale :
                        <?php
                        if ($_SESSION['em_id'] == 'SS1') {
                        ?>
                            <select name="sale_code" id="sale_code">
                                <option value="">**Please Select**</option>
                                <?php

                                $strSQL5 = "SELECT * FROM tb_team_ss1 ORDER BY sale_code ASC";
                                $objQuery5 = mysqli_query($conn, $strSQL5);
                                while ($objResuut5 = mysqli_fetch_array($objQuery5)) {
                                    if ($_GET['sale_code'] == $objResuut5['sale_code']) {
                                        $sel = "selected";
                                    } else {
                                        $sel = "";
                                    }
                                ?>
                                    <option value="<?php echo $objResuut5["sale_code"]; ?>" <?php echo $sel; ?>><?php echo $objResuut5["sale_code"]; ?> - <?php echo $objResuut5["sale_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                        } else 	if ($_SESSION['em_id'] == 'SS2') {
                        ?>
                            <select name="sale_code" id="sale_code">
                                <option value="">**Please Select**</option>
                                <?php

                                $strSQL5 = "SELECT * FROM tb_team_ss2 ORDER BY sale_code ASC";
                                $objQuery5 = mysqli_query($conn, $strSQL5);
                                while ($objResuut5 = mysqli_fetch_array($objQuery5)) {
                                    if ($_GET['sale_code'] == $objResuut5['sale_code']) {
                                        $sel = "selected";
                                    } else {
                                        $sel = "";
                                    }
                                ?>
                                    <option value="<?php echo $objResuut5["sale_code"]; ?>" <?php echo $sel; ?>><?php echo $objResuut5["sale_code"]; ?> - <?php echo $objResuut5["sale_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                        } else 	if ($_SESSION['em_id'] == 'MK2') {
                        ?>
                            <select name="sale_code" id="sale_code">
                                <option value="">**Please Select**</option>
                                <?php

                                $strSQL5 = "SELECT * FROM tb_team_sm1 ORDER BY sale_code ASC";
                                $objQuery5 = mysqli_query($conn, $strSQL5);
                                while ($objResuut5 = mysqli_fetch_array($objQuery5)) {
                                    if ($_GET['sale_code'] == $objResuut5['sale_code']) {
                                        $sel = "selected";
                                    } else {
                                        $sel = "";
                                    }
                                ?>
                                    <option value="<?php echo $objResuut5["sale_code"]; ?>" <?php echo $sel; ?>><?php echo $objResuut5["sale_code"]; ?> - <?php echo $objResuut5["sale_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        <?php
                        } else 	if ($_SESSION['em_id'] == 'SS3') {
                        ?>
                            <select name="sale_code" id="sale_code">
                                <option value="">**Please Select**</option>
                                <?php

                                $strSQL5 = "SELECT * FROM tb_team_ss3 ORDER BY sale_code ASC";
                                $objQuery5 = mysqli_query($conn, $strSQL5);
                                while ($objResuut5 = mysqli_fetch_array($objQuery5)) {
                                    if ($_GET['sale_code'] == $objResuut5['sale_code']) {
                                        $sel = "selected";
                                    } else {
                                        $sel = "";
                                    }
                                ?>
                                    <option value="<?php echo $objResuut5["sale_code"]; ?>" <?php echo $sel; ?>><?php echo $objResuut5["sale_code"]; ?> - <?php echo $objResuut5["sale_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                        } else {
                        ?>
                            <select name="sale_code" id="sale_code">
                                <option value="">**Please Select**</option>
                                <?php
                                $strSQL5 = "SELECT * FROM tb_team_all ORDER BY sale_code ASC";
                                $objQuery5 = mysqli_query($conn, $strSQL5);
                                while ($objResuut5 = mysqli_fetch_array($objQuery5)) {
                                    if ($_GET['sale_code'] == $objResuut5['sale_code']) {
                                        $sel = "selected";
                                    } else {
                                        $sel = "";
                                    }
                                ?>
                                    <option value="<?php echo $objResuut5["sale_code"]; ?>" <?php echo $sel; ?>><?php echo $objResuut5["sale_code"]; ?> - <?php echo $objResuut5["sale_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                        }
                        ?>
                    </div>
                    
                    <br>
                    <p><input type="submit" value="Search"></p>
                </center>

                <?php
                $start_date = $_GET["start_date"];
                $emid = "$_SESSION[em_id]";
                $end_date = $_GET["end_date"];
                $sale_code = $_GET["sale_code"];
                ?>
</form>
<table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
    <tr>
        <td width="8%" align="center" bgcolor="#ebe4ed">วันที่</td>
        <td width="15%" align="center" bgcolor="#ebe4ed">โรงพยาบาล</td>
        <td width="15%" align="center" bgcolor="#ebe4ed">งาน</td>
        <td width="20%" align="center" bgcolor="#ebe4ed">มุมมอง "ลูกค้า" ต่อ "สินค้า & การแนะนำ & การซื้อ"</td>
        <td width="8%" align="center" bgcolor="#ebe4ed">เขตการขาย</td>
        <td width="5%" align="center" bgcolor="#ebe4ed">Edit</td>
    </tr>
    <?php
    $start_date = $_GET["start_date"];
    $emid = $_SESSION['em_id'];
    $end_date = $_GET["end_date"];
    $customer_code = $_GET["customer_code"];
    $sale_code = $_GET["sale_code"];
    $strSQL = "SELECT * FROM tb_present_booth WHERE  1 ";
    if ($start_date != "") { //แสดงว่ามีค่า start_date ส่งมา หรือมีการค้นหา ก็ใหเต่อ String query
        $strSQL .= ' AND work_date >= "' . $start_date . '"';
    }
    if ($end_date != "") { //แสดงว่ามีค่า end_date ส่งมา หรือมีการค้นหา ก็ใหเต่อ String query
        $strSQL .= ' AND work_date <= "' . $end_date . '"';
    }
    if ($customer_code != "") { //แสดงว่ามีค่า end_date ส่งมา หรือมีการค้นหา ก็ใหเต่อ String query
        $strSQL .= ' AND hospital_name  = "' . $customer_code . '"';
    }
    if ($sale_code != "") { //แสดงว่ามีค่า end_date ส่งมา หรือมีการค้นหา ก็ใหเต่อ String query
        $strSQL .= ' AND sale_area = "' . $sale_code . '"';
    } else {
        $strSQL .= ' AND sale_area = "null"';
    }
    $objQuery = mysqli_query($conn, $strSQL) or die("Error Query [" . $strSQL . "]");
    $Num_Rows = mysqli_num_rows($objQuery);
    $strSQL .= " order  by create_date  ASC ";
    $objQuery  = mysqli_query($conn, $strSQL);
    $i = 1;
    while ($objResult = mysqli_fetch_array($objQuery)) {
        if ($_SESSION['em_id'] == 'SS1') {
            if ($objResult["sale_area"] == 'S14' or $objResult["sale_area"] == 'S16' or $objResult["sale_area"] == 'S21' or $objResult["sale_area"] == 'S22' or $objResult["sale_area"] == 'S15') {
    ?>
                <tr>
                    <td><?php echo  $objResult["work_date"]; ?></td>
                    <td><?php echo $objResult["hospital_name"]; ?></td>
                    <td><?php echo $objResult["work_name"]; ?></td>
                    <td>
                        <?php if ($objResult["sum_workpro"] != '') {
                            echo "สินค้า :";
                            echo $objResult["sum_workpro"]; ?><br><?php } ?>
                        <?php if ($objResult["sum_wordpre"] != '') {
                            echo "การซื้อ / การแนะนำบอกต่อ :";
                            echo $objResult["sum_wordpre"]; ?><br><?php } ?>
                    </td>
                    <td><?php echo $objResult["sale_area"]; ?></td>
                    <td width="30" align="center"><a href="edit_booth.php?present_id=<?php echo $objResult["present_id"]; ?>"><img src="images/Copy of active.png" width="30" height="30" border="0" /></a></td>
                </tr>
            <?php
            }
        } else if ($_SESSION['em_id'] == 'SS2') {
            if ($objResult["sale_area"] == 'S11' or $objResult["sale_area"] == 'S12' or $objResult["sale_area"] == 'S13' or $objResult["sale_area"] == 'S24' or $objResult["sale_area"] == 'S23' or $objResult["sale_area"] == 'S17') {
            ?>
                <tr>
                    <td><?php echo $objResult["work_date"]; ?></td>
                    <td><?php echo $objResult["hospital_name"]; ?></td>
                    <td><?php echo $objResult["work_name"]; ?></td>
                    <td>
                        <?php if ($objResult["sum_workpro"] != '') {
                            echo "สินค้า :";
                            echo $objResult["sum_workpro"]; ?><br><?php } ?>
                        <?php if ($objResult["sum_wordpre"] != '') {
                            echo "การซื้อ / การแนะนำบอกต่อ :";
                            echo $objResult["sum_wordpre"]; ?><br><?php } ?>
                    </td>
                    <td><?php echo $objResult["sale_area"]; ?></td>
                    <td width="30" align="center"><a href="edit_booth.php?present_id=<?php echo $objResult["present_id"]; ?>"><img src="images/Copy of active.png" width="30" height="30" border="0" /></a></td>
                </tr>
            <?php
            }
        } else if ($_SESSION['em_id'] == 'SS3') {
            if ($objResult["sale_area"] == 'S31' or $objResult["sale_area"] == 'SM1' or $objResult["sale_area"] == 'MM1') {
            ?>
                <tr>
                    <td><?php echo $objResult["work_date"]; ?></td>
                    <td><?php echo $objResult["hospital_name"]; ?></td>
                    <td><?php echo $objResult["work_name"]; ?></td>
                    <td>
                        <?php if ($objResult["sum_workpro"] != '') {
                            echo "สินค้า :";
                            echo $objResult["sum_workpro"]; ?><br><?php } ?>
                        <?php if ($objResult["sum_wordpre"] != '') {
                            echo "การซื้อ / การแนะนำบอกต่อ :";
                            echo $objResult["sum_wordpre"]; ?><br><?php } ?>
                    </td>
                    <td><?php echo $objResult["sale_area"]; ?></td>
                    <td width="30" align="center"><a href="edit_booth.php?present_id=<?php echo $objResult["present_id"]; ?>"><img src="images/Copy of active.png" width="30" height="30" border="0" /></a></td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td><?php echo $objResult["work_date"]; ?></td>
                <td><?php echo $objResult["hospital_name"]; ?></td>
                <td><?php echo $objResult["work_name"]; ?></td>
                <td>
                    <?php if ($objResult["sum_workpro"] != '') {
                        echo "สินค้า :";
                        echo $objResult["sum_workpro"]; ?><br><?php } ?>
                    <?php if ($objResult["sum_wordpre"] != '') {
                        echo "การซื้อ / การแนะนำบอกต่อ :";
                        echo $objResult["sum_wordpre"]; ?><br><?php } ?>
                </td>
                <td><?php echo $objResult["sale_area"]; ?></td>
                <td width="30" align="center"><a href="edit_booth.php?present_id=<?php echo $objResult["present_id"]; ?>"><img src="images/Copy of active.png" width="30" height="30" border="0" /></a></td>
            </tr>
    <?php
        }
        $i++;
    }
    ?>
</table>

<?php
$content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
require_once __DIR__ . '/layouts/Main.php';
?>

<script>
    let customersData = [];
    fetch(`<?php echo $cumapi; ?>`)
        .then(response => response.json())
        .then(data => {
            customersData = data;
        })
        .catch(error => console.error('Error:', error));

    const input = document.getElementById('customer_code');
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