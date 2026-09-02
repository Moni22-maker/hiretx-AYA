<?php
// includes/db.php - ملف الاتصال بقاعدة البيانات
$host = 'localhost';
$user = 'root';
$password = ''; // افتراضياً في XAMPP تكون كلمة المرور فارغة
$dbname = 'hiretx_db';

// إنشاء الاتصال باستخدام MySQLi
$conn = new mysqli($host, $user, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ضبط الترميز ليدعم اللغة العربية
$conn->set_charset("utf8");
?>