<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
        <div style="text-align: center; margin-top: 15vw;">
            <h1> Error 404 File Not found <br> ข้อผิดพลาด 404 ไม่พบไฟล์ </h1>
            <br>
            <p>ขออภัย หน้าเว็บที่คุณกำลังมองหาไม่มีอยู่หรือถูกลบไปแล้ว</p>
            <a href="/Action-Plan/home">กลับไปหน้าแรก</a>
        </div>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';
?>