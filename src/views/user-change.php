<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<div style="background-color: #F1E1FF; height: 45px; display: flex; align-items: center; padding:0px 20px; margin: 0px 0px 20px 0px;">
    <b style="font-size: 20px;">เปลี่ยนรหัสผ่าน</b>
</div>

<form action="../../user-change-edit" enctype="multipart/form-data" method="post">
<section style="padding: 10px 0px; font-weight: bold;" class="font-custom-awl-14 row">
    <div class="col-4 m-2" style="line-height: 0.9;">
        <span style="background-color: #FAFAFA;">
            <p> Username : <?php echo $_SESSION['user_id_login'];?> </p>
            <p> ชื่อ-สกุล : <?php echo $_SESSION['name_show'].' '.$_SESSION['surname_show'];?> </p>
            <p> แผนก/ฝ่าย : <?php echo $_SESSION['position'];?> </p>
            <p> E-mail : <?php echo $_SESSION['mail_intra'];?> </p>
        </span>
    </div>
    <div class="col-4  m-2">
        <span style="background-color: #FAFAFA;">
                <div style="display:flex; align-items:center;">
                    <label for="passOld">รหัสเดิม<font color="red">*</font>&nbsp;</label>
                    <input type="password" name="passOld" id="passOld" placeholder="กรุณากรอกรหัสเดิม...">
                    <i class="fa fa-eye" id="togglePassOld" style="margin-left: -35px; cursor: pointer;"></i>
                </div>
                <br>
                <div style="display:flex; align-items:center;">
                    <label for="passNew">รหัสใหม่<font color="red">*</font>&nbsp;</label>
                    <input type="password" name="passNew" id="passNew" placeholder="กรุณากรอกรหัสใหม่...">
                    <i class="fa fa-eye" id="togglePassNew" style="margin-left: -35px; cursor: pointer;"></i>
                </div>
                <br>
                <div style="display:flex; align-items:center;">
                    <label for="passNewChk">ยืนยันรหัสใหม่<font color="red">*</font>&nbsp;</label>
                    <input type="password" name="passNewChk" id="passNewChk" placeholder="กรุณากรอกรหัสใหม่อีกครั้ง..."> 
                    <i class="fa fa-eye" id="togglePassNewChk" style="margin-left: -35px; cursor: pointer;"></i>
                </div>
        </span>
    </div>
    <div class="col-4  m-2"></div>
    <div class="col-12 text-center"><button class="btn-custom-awl" style="background-color: #19D700; color:#FAFAFA;">ยืนยัน</button></div>
</section>
</form>

<script>
    // Function to toggle password visibility
    function togglePasswordVisibility(inputId, toggleId) {
        const passwordInput = document.getElementById(inputId);
        const toggleIcon = document.getElementById(toggleId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }

    // Event listeners for each password field
    document.getElementById("togglePassOld").addEventListener("click", function() {
        togglePasswordVisibility("passOld", "togglePassOld");
    });

    document.getElementById("togglePassNew").addEventListener("click", function() {
        togglePasswordVisibility("passNew", "togglePassNew");
    });

    document.getElementById("togglePassNewChk").addEventListener("click", function() {
        togglePasswordVisibility("passNewChk", "togglePassNewChk");
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>
