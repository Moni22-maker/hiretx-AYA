<?php
// logout.php - تسجيل الخروج وإعادة التوجيه الفوري إلى الصفحة الرئيسية
session_start();

// تدمير جميع متغيرات الجلسة
$_SESSION = array();

// حذف ملف تعريف ارتباط الجلسة (Session Cookie)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// تدمير الجلسة نهائياً
session_destroy();

// إعادة التوجيه الفوري إلى صفحة index.php
header("Location: index.php");
exit();
?>