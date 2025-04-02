<?php
@session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = require_once __DIR__ . '/config/database.php';

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';
$urlParts = explode('/', $url);
$url = strtolower(end($urlParts));

$routes = [
    'check_login' => 'check_login.php',
    'index' => 'index.php',

    'actionplan' => 'src/views/actionplan.php',
    'dallyreport' => 'src/views/dallyreport.php',
    'daily_report_edit' => 'src/views/daily_report_edit.php',
    'report' => 'src/views/report.php',
    'list_receive_the_matter' => 'src/views/list_receive_the_matter.php',
    'user' => 'src/views/user.php',
    'home' => 'src/views/home.php',
    'report_actionplan' => 'src/views/report_actionplan.php',
    'report_daily_report' => 'src/views/report_daily_report.php',
    'report_quotation' => 'src/views/report_quotation.php',
    'report_sales_closure' => 'src/views/report_sales_closure.php',
    'report_forecast_time' => 'src/views/report_forecast_time.php',
    'report_forecast_product' => 'src/views/report_forecast_product.php',
    'report_competitor' => 'src/views/report_competitor.php',
    'user-change' => 'src/views/user-change.php',
    'user-contact' => 'src/views/user-contact.php',
    'user-customer' => 'src/views/user-customer.php',
    'user-logout' => 'src/views/user-logout.php',
    'user-contact-register' => 'src/views/user-contact-register.php',
    'test' => 'src/views/test.php',
    'actionplan_list' => 'src/views/actionplan_list.php',

    'dallyreport_fetch_api' => 'src/models/dallyreport_fetch_api.php',
    'list_receive_the_matter_fetch_api' => 'src/models/list_receive_the_matter_fetch_api.php',
    'user_contact_api' => 'src/models/user_contact_api.php',
    'user_customer_api' => 'src/models/user_customer_api.php',
    'actionplan_api' => 'src/models/actionplan_api.php',
    'user-change-edit' => 'src/models/user-change-edit.php',
    'Loading-page' => 'src/models/Loading-page.php',
    'customers_json' => 'src/models/customers_json.php',
    'product_json' => 'src/models/product_json.php',
    'daily_report_copy' => 'src/models/daily_report_copy.php',
    'daily_report_delete' => 'src/models/daily_report_delete.php',

];

if (array_key_exists($url, $routes) && file_exists($routes[$url])) {
    // ตรวจสอบว่าเป็น API จาก /models หรือไม่
    if (strpos($routes[$url], 'src/models/') === 0) {
        require_once $routes[$url]; // โหลด API โดยตรง ไม่ใช้ layout
    } else {
        require_once __DIR__ . '/src/views/'.$url.'.php'; 
        ob_start();
        require_once $routes[$url];
        $content = ob_get_clean();
    } 
} else {
    http_response_code(404);
    ob_start();
    require_once __DIR__ . '/src/views/404.php';
    $content = ob_get_clean();
    require_once __DIR__ . '/src/views/layouts/Main.php';
}
?>