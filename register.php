<?php
// register.php - صفحة تسجيل حساب جديد لمنصة HireTX
session_start();
require_once 'includes/db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($name) && !empty($email) && !empty($password)) {
        // التحقق مما إذا كان البريد الإلكتروني مسجلاً مسبقاً
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $error = "This email is already registered. Please sign in.";
        } else {
            // تشفير كلمة المرور بأمان تام
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // إدخال المستخدم الجديد في قاعدة البيانات
            $insertStmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $insertStmt->bind_param("sss", $name, $email, $hashedPassword);

            if ($insertStmt->execute()) {
                $success = "Account created successfully! You can now sign in.";
            } else {
                $error = "Something went wrong. Please try again.";
            }
            $insertStmt->close();
        }
        $checkStmt->close();
    } else {
        $error = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HireTX - Create Account</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body class="auth-body">

    <div class="auth-container">
        <!-- شعار المنصة العلوي -->
        <div class="auth-brand">
            <span class="hx-badge">HX</span>
            <h2>HireTX</h2>
            <p>National Employability Readiness System</p>
        </div>

        <!-- صندوق نموذج التسجيل -->
        <div class="auth-card">
            <h3>Create your account</h3>

            <?php if (!empty($error)): ?>
                <div class="alert-error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div class="alert-success" style="background-color: #0c2c10; color: #22c55e; padding: 10px; border-radius: 6px; font-size: 12px; margin-bottom: 15px; text-align: center;">
                    <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>

            <form action="register.php" method="POST">
                <div class="form-group">
                    <label>FULL NAME</label>
                    <input type="text" name="name" placeholder="John Doe" required>
                </div>

                <div class="form-group">
                    <label>EMAIL ADDRESS</label>
                    <input type="email" name="email" placeholder="john@hiretx.gov" required>
                </div>

                <div class="form-group">
                    <label>PASSWORD</label>
                    <div class="password-wrapper">
                        <input type="password" name="password" id="passwordInput" placeholder="••••••••••••" required>
                        <span class="toggle-password" id="togglePassword">👁️</span>
                    </div>
                </div>

                <button type="submit" class="btn-auth-submit">🚀 Create Account</button>
            </form>

            <div class="auth-footer-link">
                Already have an account? <a href="login.php">Sign in</a>
            </div>
        </div>

        <div class="back-home">
            <a href="index.php">← Back to Home</a>
        </div>
    </div>

    <!-- سكريبت إظهار وإخفاء كلمة المرور -->
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('passwordInput');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
            });
        }
    </script>
</body>
</html>