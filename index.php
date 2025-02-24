<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';
$urlParts = explode('/', $url);
$url = strtolower(end($urlParts));

// ตรวจหาไฟล์ว่ามีหรือไม่
$routes = [
    'actionplan' => 'src/views/actionplan.php',
    'dallyreport' => 'src/views/dallyreport.php',
    'report' => 'src/views/report.php',
    'list_receive_the_matter' => 'src/views/list_receive_the_matter.php',
    'user' => 'src/views/user.php',
    'home' => 'src/views/home.php'
];

// echo "URL: " . $url . "<br>";
// echo "Full URL: " . $_GET['url'] . "<br>";

if (array_key_exists($url, $routes) && file_exists($routes[$url])) {
    require_once __DIR__ . '/src/views/'.$url.'.php'; 
    ob_start();
    require_once $routes[$url];
    $content = ob_get_clean();
} else {
    http_response_code(404);
    require_once 'src/views/404.php';
}
?>