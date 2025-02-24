<!-- ใน navbar.php -->
<link rel="stylesheet" href="assets/css/NavBar.css">
<script src="assets/js/NavBar.js"></script>
<nav class="menu-nav0">
    <div class="menu-nav1">
        <a href="/Action-Plan/home" style="text-decoration: none;"><img src="assets/images/Awl-logo.png" style="width: 90px; height: auto;">&nbsp; ERP</a>
    </div>
    <!-- ถ้าเพิ่มเมนูต้องไปกำหนด routes ที่หน้า index ด้วย -->
    <ul class="menu-nav2">
        <li><a class="hover-nav-item" href="/Action-Plan/actionplan">Action Plan</a></li>
        <li><a class="hover-nav-item" href="/Action-Plan/dallyreport">Dally Report</a></li>
        <li>
            <span class="hover-nav-item arrow-top-down">
            Report
                <span class="arrow-drop-down">
                    <a href="/Action-Plan/report">รายงาน Action Plan</a>
                    <a href="/Action-Plan/report">รายงาน Daily Report</a>
                    <a href="/Action-Plan/report">รายงานสรุปเสนอราคา</a>
                    <a href="/Action-Plan/report">รายงานปิดการขาย </a>
                    <a href="/Action-Plan/report">รายงานสรุปการปรับปรุงการประมานการขายตามช่วงเวลา</a>
                    <a href="/Action-Plan/report">รายงานสรุปประมานการขายตามสินค้า</a>
                    <a href="/Action-Plan/report">รายงานคู่แข่ง</a>
                </span>
            </span>
        </li>
        <li><a class="hover-nav-item" href="/Action-Plan/list_receive_the_matter">รายการรับเรื่อง</a></li>
        <li>
            <span class="hover-nav-item arrow-top-down">
            <img src="assets/images/icon_system/lets-icons--user-cicrle-light.svg" style="width: 18px; height: auto;">&nbsp;User
                <span class="arrow-drop-down-right">
                    <a href="/Action-Plan/user-contact">ข้อมูลผู้ติดต่อ</a>
                    <a href="/Action-Plan/user-change">เปลี่ยนรหัสผ่าน</a>
                    <a href="/Action-Plan/user-logout">ออกจากระบบ</a>
                </span>
            </span>
        </li>
        <!-- <li><a class="hover-nav-item" href="/Action-Plan/nullfile">Icon User</a></li> -->
    </ul>
</nav>
