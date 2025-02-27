<?php ob_start(); // เปิดใช้งานการเก็บข้อมูล content ?>
<center style="margin-top: 15vw;">
<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path fill="none" stroke="#cd72e9" stroke-linecap="round" stroke-width="2" d="M12 6.99998C9.1747 6.99987 6.99997 9.24998 7 12C7.00003 14.55 9.02119 17 12 17C14.7712 17 17 14.75 17 12"><animateTransform attributeName="transform" attributeType="XML" dur="560ms" from="0,12,12" repeatCount="indefinite" to="360,12,12" type="rotate"/></path></svg>
    <br> กำลังดำเนินการกรุณารอสักครู่
</center>
<?php 
    $content = ob_get_clean(); // เก็บลงที่ตัวแปร content และส่งไปยัง main.php
    require_once __DIR__ . '/layouts/Main.php';

	@session_start();
	session_destroy();
	print "Log Out Success<br />";
	print " .... ";
	print "<meta http-equiv=refresh content=1;URL=index.php>";

?>
