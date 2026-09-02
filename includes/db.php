<?php
// includes/db.php - ملف الاتصال بقاعدة البيانات
$host = 'localhost';
$user = 'root';
$password = ''; // افتراضياً في XAMPP تكون كلمة المرور فارغة
$dbname = 'hiretx_db';
if (file_exists(__DIR__ . '/db.local.php')) {
    require_once __DIR__ . '/db.local.php';
}

$host = defined('HIRETX_DB_HOST') ? HIRETX_DB_HOST : (getenv('HIRETX_DB_HOST') ?: 'localhost');
$user = defined('HIRETX_DB_USER') ? HIRETX_DB_USER : (getenv('HIRETX_DB_USER') ?: 'root');
$password = defined('HIRETX_DB_PASSWORD') ? HIRETX_DB_PASSWORD : (getenv('HIRETX_DB_PASSWORD') ?: '');
$dbname = defined('HIRETX_DB_NAME') ? HIRETX_DB_NAME : (getenv('HIRETX_DB_NAME') ?: 'hiretx_db');

// إنشاء الاتصال باستخدام MySQLi
$conn = new mysqli($host, $user, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ضبط الترميز ليدعم اللغة العربية
$conn->set_charset("utf8");
?>