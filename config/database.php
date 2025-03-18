<?php
require_once __DIR__ . '/../vendor/autoload.php'; // โหลด Composer autoload

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..'); // ชี้ไปที่ root
$dotenv->load();

// ส่วนของ DB START
    $host = $_ENV['DB_HOST'] ?? 'localhost-N/A';
    $dbSale = $_ENV['DB_NAME1'] ?? 'your_database-N/A';
    $dbSol = $_ENV['DB_NAME2'] ?? 'your_database-N/A';
    $user = $_ENV['DB_USER'] ?? 'root-N/A';
    $pass = $_ENV['DB_PASS'] ?? 'N/A';
    $port = $_ENV['DB_PORT'] ?? 3306;
// ส่วนของ DB START

// ส่วนของ API START
    $dallyreport1_api = $_ENV['DALLYREPORT1_API'] ?? 'N/A';
    $listreceivethematter1_api = $_ENV['LISTRECEIVETHEMATTER1_API'] ?? 'N/A';
    $usercustomer1_api = $_ENV['USERCUSTOMER1_API'] ?? 'N/A';
    
// ส่วนของ API END

$conn = mysqli_connect($host, $user, $pass, $dbSale);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset($conn,"utf8");

$sol = mysqli_connect($host, $user, $pass, $dbSol);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset($sol,"utf8");

// $strSQL = "SELECT * FROM tb_register_data LIMIT 10 ";
// $objQuery = mysqli_query($conn,$strSQL);
// if (!$objQuery) {
//     die("เกิดข้อผิดพลาด: " . mysqli_error($conn));
// }
// while($objResult = mysqli_fetch_array($objQuery)) {
//     echo $objResult['id_work'].'<br>';
// }

?>