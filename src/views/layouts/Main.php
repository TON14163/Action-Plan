<!DOCTYPE html>
<html>
<head>
    <title>ERP Sale Report</title>
    <link rel= "icon" href ="assets/images/Awl-logo1.png" type = "image/x-icon">
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css">  <!-- Bootstrap CSS -->
    <script type="module" src="node_modules\datalist-css\dist\datalist-css.min.js"></script>  <!-- datalist-css -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- sweetalert2 -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!-- ลิงก์ไปยัง CSS ของ AOS จาก CDN -->
    <!-- dataTables start -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
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
    date_default_timezone_set("Asia/Bangkok");
    if ($_SESSION['em_id'] == '') {
        print "<meta http-equiv=refresh content=1;URL=index.php>"; 
        session_destroy();
        error_reporting(0); 
        exit; 
    } 
    ?>

    <!-- เนื้อหาจะถูกแทรกที่นี่ -->
    <?php 
    echo '<div style="background-color: #FFFFFF; margin:20px 0px; min-height: 50vw; padding:40px; min-height: 1400px;">';
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


<!-- ((datalist-css)) Start -->
    <script type="module">
    (() => {

    // stop form submission and output field names/values to console
    const form = document.getElementById('autoform');

    form.addEventListener('submit', e => {

        e.preventDefault();
        console.log('Submit disabled. Data:');

        const data = new FormData(form);
        for (let nv of data.entries()) {
        console.log(`  ${ nv[0] }: ${ nv[1] }`);
        }

    });

    })();
    </script>
    <!-- Code injected by live-server -->
    <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function () {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function (msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        }
        else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
<!-- ((datalist-css)) End -->

</body>
</html>

<script>
// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>