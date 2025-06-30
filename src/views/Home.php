<?php
    ob_start();
?>
<head>
    <style>
        .section {
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
        .box {
            width: 300px;
            padding: 20px;
            margin: 20px;
            background-color: #f0f0f0;
            border-radius: 8px;
            text-align: center;
        }
    </style>
</head>
    <!-- ส่วนที่ 1 -->
    <div class="section">

    <!--  -->
<?php 
    if($_SESSION['name_show'] == 'นรินทิพย์' || $_SESSION['name_show'] == 'พรรณิภา' || $_SESSION['name_show'] == 'มาลินี' || $_SESSION['name_show']  =='ลักษณาวรรณ' || $_SESSION['name_show'] == 'รุจิรา'){ 
        // include "notify_supsale.php";
    } else if($_SESSION['typelogin'] == 'Sale'){ 
        // include "notify_salehos.php";
    }
?>
    <!--  -->

        <h1 data-aos="fade-up">Welcome to ERP Sale Report</h1>
        <p data-aos="fade-up" data-aos-delay="200">
            Allwell
        </p>
    </div>

<script>
    // // สร้าง container สำหรับ alerts
    // document.write('<div id="alertContainer"></div>');
    
    // // ฟังก์ชันสร้าง alerts
    // function createAlerts() {
    //     const container = document.getElementById('alertContainer');
    //     container.innerHTML = ''; // ล้างเนื้อหาเก่า
        
    //     for (let currentRow = 1; currentRow <= 2; currentRow++) {
    //         const alertDiv = document.createElement('div');
    //         alertDiv.style.position = 'fixed';
    //         alertDiv.style.bottom = `${0 + (currentRow * 70)}px`;
    //         alertDiv.style.right = '20px';
    //         alertDiv.style.transition = 'bottom 0.3s ease'; // เพิ่ม animation
            
    //         alertDiv.innerHTML = `
    //             <div class="alert alert-warning alert-dismissible fade show" role="alert" data-aos="fade-left" data-aos-delay="200">
    //                 <strong>#${currentRow} แจ้งเตือน</strong> เรื่องไรไม่รู้
    //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //             </div>
    //         `;
            
    //         container.appendChild(alertDiv);
    //     }
        
    //     // เพิ่ม event listener ให้ทุกปุ่ม close
    //     document.querySelectorAll('.btn-close').forEach(button => {
    //         button.addEventListener('click', function() {
    //             const alertDiv = this.closest('div[style*="position: fixed"]');
    //             alertDiv.remove(); // ลบ alert ที่ถูกปิด
    //             updatePositions(); // อัพเดตตำแหน่งใหม่
    //         });
    //     });
    // }
    
    // // ฟังก์ชันอัพเดตตำแหน่ง alerts ที่เหลือ
    // function updatePositions() {
    //     const remainingAlerts = document.querySelectorAll('#alertContainer > div');
    //     remainingAlerts.forEach((alert, index) => {
    //         alert.style.bottom = `${70 + ((index + 1) * 80)}px`;
    //     });
    // }
    
    // // เรียกใช้ครั้งแรก
    // createAlerts();
</script>

    

    <div style="position: fixed; bottom: 0; right: 20px;">
        <div class="alert alert-dismissible fade show" role="alert">
            <a href="https://www.allwellcenter.com/itsupport/" target="_blank" ><span class="badge text-bg-warning"><img src="assets/images/icon_system/support-regular-24.png" style="width: 14px; height: 14px;"> แจ้งปัญหาการใช้งาน</span></a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

<?php 
    $content = ob_get_clean();
    require_once __DIR__ . '/layouts/Main.php';
?>
