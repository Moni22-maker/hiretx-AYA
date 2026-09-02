<?php
// profile.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HireTX - National Employability Readiness System</title>
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
</head>
<body>
    <div class="main-container">
        
        <?php include '../includes/sidebar.php'; ?>

        <main class="content">
            
            <header class="profile-header">
                <h1>My Profile</h1>
                <div class="header-controls">
                    <span class="date">Fri, Jul 24, 2026</span>
                    <div class="lang-switch">
                        <span class="lang-btn active">EN</span>
                        <span class="lang-btn">AR</span>
                    </div>
                </div>
            </header>

            <div class="profile-wrapper">
                
                <!-- بطاقة تعديل الملف الشخصي -->
                <div class="profile-card">
                    <div class="profile-user-info">
                        <div class="profile-avatar">J</div>
                        <div class="profile-titles">
                            <h2>John Dela Cruz</h2>
                            <p>Candidate • Computer Science</p>
                        </div>
                    </div>

                    <form action="profile.php" method="POST">
                        <div class="form-group">
                            <label>FULL NAME</label>
                            <input type="text" name="fullname" value="John Dela Cruz">
                        </div>

                        <div class="form-group">
                            <label>EMAIL</label>
                            <input type="email" name="email" value="john@hiretx.gov">
                        </div>

                        <div class="form-group">
                            <label>USERNAME</label>
                            <input type="text" name="username" value="@john_dela">
                        </div>

                        <div class="form-group">
                            <label>SPECIALIZATION</label>
                            <select name="specialization">
                                <option selected>Computer Science / IT</option>
                                <option>Human Resources</option>
                            </select>
                        </div>

                        <button type="submit" class="btn-save">💾 Save Changes</button>
                    </form>
                </div>

                <!-- بطاقة معلومات الحساب (Account Information) -->
                <div class="profile-card" style="margin-top: 25px;">
                    <h3 class="section-heading">ACCOUNT INFORMATION</h3>
                    
                    <div class="info-row">
                        <span class="info-label">👤 Role</span>
                        <span class="info-value">Candidate</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">📅 Member Since</span>
                        <span class="info-value">April 30, 2026</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">✔ Verification</span>
                        <span class="info-value">Verified</span>
                    </div>
                    <div class="info-row" style="border-bottom: none;">
                        <span class="info-label">🕒 Last Login</span>
                        <span class="info-value">24/07/2026 15:05:52</span>
                    </div>
                </div>

            </div>

        </main>
    </div>
</body>
</html>