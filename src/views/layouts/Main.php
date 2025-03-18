<!DOCTYPE html>
<html>
<head>
    <title>ERP Sale Report</title>
    <link rel= "icon" href ="assets/images/Awl-logo1.png" type = "image/x-icon">
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ลิงก์ไปยัง CSS ของ AOS จาก CDN -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- dataTables start -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <!-- dataTables end -->
</head>
<style>
@font-face {
    font-family: 'Prompt-awl';
    src: url('assets/fonts/prompt/Prompt-Light.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

* {
    font-family: 'Prompt-awl';
}
</style>
<body>
    <?php 
    require_once __DIR__ . '/../partials/NavBar.php';
    require_once __DIR__ . '/../../controllers/DateThai.php';
    if ($_SESSION['em_id'] == '') {
        print "<meta http-equiv=refresh content=1;URL=index.php>"; 
        session_destroy();
        error_reporting(0); 
        exit; 
    } 
    ?>

    <!-- เนื้อหาจะถูกแทรกที่นี่ -->
    <?php 
    echo '<div style="background-color: #FFFFFF; margin:20px 0px; min-height: 50vw; padding:40px;">';
    echo $content; 
    echo '</div>';
    ?>

    <?php require_once __DIR__ . '/../partials/FooTer.php'; ?>
    <!-- Bootstrap JS -->
    <script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
    
    <!-- ลิงก์ไปยัง JavaScript ของ AOS จาก CDN -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // เริ่มต้น AOS
        AOS.init({
            duration: 600, // ระยะเวลาของ animation (มิลลิวินาที)
            easing: 'ease-in-out', // รูปแบบการเคลื่อนไหว
            once: false // ทำ animation ซ้ำเมื่อ scroll กลับมาหรือไม่
        });
    </script>
</body>
</html>