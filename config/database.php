<?php
require_once __DIR__ . '/../vendor/autoload.php'; // โหลด Composer autoload

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..'); // ชี้ไปที่ root
$dotenv->load();

$host = $_ENV['DB_HOST'] ?? 'localhost';
$db   = $_ENV['DB_NAME'] ?? 'your_database';
$user = $_ENV['DB_USER'] ?? 'root';
$pass = $_ENV['DB_PASS'] ?? '';
$port = $_ENV['DB_PORT'] ?? 3306;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;port=$port", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}



// $conn = mysqli_connect("localhost","test","test","test");
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }
// mysqli_set_charset($conn,"utf8");

// $new = mysqli_connect("localhost","testt","testt","testt");
// if (mysqli_connect_errno()){
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }
// mysqli_set_charset($new,"utf8");
?>