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
    <?php require_once __DIR__ . '/../partials/NavBar.php'; ?>

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