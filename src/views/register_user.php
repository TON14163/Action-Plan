<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">ผู้ใช้งานระบบ</b>
</div>

    <table id="unitTable" class="table-thead-custom-awl table-bordered border-secondary w-100">
        <thead>
            <tr>
                <th style="width: 55%;">ชื่อ-นามสกุล</th>
                <th style="width: 15%;">กลุ่มเขตการขาย</th>
                <th style="width: 15%;">เขตการขาย</th>
                <th style="width: 15%;">Id</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sqlUsers = "SELECT * FROM tb_user WHERE em_code NOT IN ('41002','41001') ORDER BY head_area DESC ";
            $qsqlUsers = mysqli_query($conn,$sqlUsers);
            while($showUsers = mysqli_fetch_array($qsqlUsers)){ ?>
                <tr>
                    <td><?php echo $showUsers['name'].' '.$showUsers['surname'];?></td>
                    <td><?php echo $showUsers['head_area'];?></td>
                    <td><?php echo $showUsers['em_id'];?></td>
                    <td>
                        <span class="badge text-bg-secondary" style="cursor: pointer;" onclick="toggleUserInfo(this)">แสดง/ซ่อน</span>
                        <span style="display:none;">
                            <?php echo '<br>'.htmlspecialchars($showUsers['user_id']) . ' ' . htmlspecialchars($showUsers['pass']); ?>
                        </span>
                        <script>
                        function toggleUserInfo(btn) {
                            var span = btn.nextElementSibling;
                            if (span.style.display === "none" || span.style.display === "") {
                                span.style.display = "inline";
                            } else {
                                span.style.display = "none";
                            }
                        }
                        </script>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php 
$content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
require_once __DIR__ . '/layouts/Main.php';
?>
