<?php
// dashboard.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// جلب النتائج الحقيقية من الجلسة أو وضع القيم الافتراضية إذا لم يقم بأي اختبار بعد
$hx_index = isset($_SESSION['last_hx_index']) ? $_SESSION['last_hx_index'] : '10.0';
$status_text = isset($_SESSION['last_status']) ? $_SESSION['last_status'] : "Needs Structured Development";
$total_attempts = isset($_SESSION['total_attempts']) ? $_SESSION['total_attempts'] : 2;
$completed_sims = isset($_SESSION['completed_sims']) ? $_SESSION['completed_sims'] : 0;
$active_sims = max(0, $total_attempts - $completed_sims);

// نسب الـ TBCLM الفعلية للمستخدم لتحديث الأشرطة والبيانات
$technical_score = isset($_SESSION['tech_score']) ? $_SESSION['tech_score'] : 20;
$behavioral_score = isset($_SESSION['beh_score']) ? $_SESSION['beh_score'] : 0;
$cognitive_score = isset($_SESSION['cog_score']) ? $_SESSION['cog_score'] : 20;
$leadership_score = isset($_SESSION['lead_score']) ? $_SESSION['lead_score'] : 0;
$market_score = isset($_SESSION['mkt_score']) ? $_SESSION['mkt_score'] : 0;

// استخراج الكلمة الأولى من حالة الجاهزية لعرضها في البطاقة الخامسة إذا لزم الأمر
$readiness_short = explode(" ", $status_text)[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HireTX - National Employability Readiness System</title>
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <div class="main-container">
        
        <?php include '../includes/sidebar.php'; ?>

        <main class="content">
            
            <header class="dashboard-header">
                <h1>Dashboard</h1>
                <div class="header-controls">
                    <span class="date"><?php echo date('D, M d, Y'); ?></span>
                    <div class="lang-switch">
                        <span class="lang-btn active">EN</span>
                        <span class="lang-btn">AR</span>
                    </div>
                </div>
            </header>

            <!-- الصف العلوي: 6 بطاقات إحصائية -->
            <div class="stats-grid">
                <!-- بطاقة 1 -->
                <div class="stat-card">
                    <div class="stat-icon yellow">🏆</div>
                    <div class="stat-number"><?php echo $hx_index; ?></div>
                    <div class="stat-label">HireTX Index</div>
                    <div class="stat-sub red-text"><?php echo htmlspecialchars($status_text); ?></div>
                </div>

                <!-- بطاقة 2 -->
                <div class="stat-card">
                    <div class="stat-icon blue">▶</div>
                    <div class="stat-number"><?php echo $total_attempts; ?></div>
                    <div class="stat-label">Total Attempts</div>
                    <div class="stat-sub">simulations taken</div>
                </div>

                <!-- بطاقة 3 -->
                <div class="stat-card">
                    <div class="stat-icon orange">⏱</div>
                    <div class="stat-number"><?php echo $active_sims; ?></div>
                    <div class="stat-label">Active Simulations</div>
                    <div class="stat-sub">current sessions</div>
                </div>

                <!-- بطاقة 4 -->
                <div class="stat-card">
                    <div class="stat-icon green">✔</div>
                    <div class="stat-number"><?php echo $completed_sims; ?></div>
                    <div class="stat-label">Completed</div>
                    <div class="stat-sub">fully scored</div>
                </div>

                <!-- بطاقة 5 -->
                <div class="stat-card">
                    <div class="stat-icon teal">📊</div>
                    <div class="stat-number"><?php echo htmlspecialchars($readiness_short); ?></div>
                    <div class="stat-label">Readiness Level</div>
                    <div class="stat-sub red-text"><?php echo htmlspecialchars($status_text); ?></div>
                </div>

                <!-- بطاقة 6 -->
                <div class="stat-card">
                    <div class="stat-icon purple">🎓</div>
                    <div class="stat-number" style="font-size: 1.5rem; margin-top: 5px;">Computer Science</div>
                    <div class="stat-label">Specialization</div>
                    <div class="stat-sub">Computer Science / IT</div>
                </div>
            </div>

            <!-- الصف السفلي: قسم العداد والملف التحليلي -->
            <div class="dashboard-lower-grid">
                
                <!-- القسم الأيسر: العداد الدائري -->
                <div class="dash-box index-box">
                    <div class="box-title">HIRETX INDEX</div>
                    <div class="circular-progress-wrapper">
                        <div class="circular-chart">
                            <div class="circle-inner">
                                <span class="index-val"><?php echo $hx_index; ?></span>
                                <span class="index-max">/ 10</span>
                            </div>
                        </div>
                    </div>
                    <div class="status-badge-red"><?php echo htmlspecialchars($status_text); ?></div>
                    <div class="box-footer-note">Based on best performance</div>
                </div>

                <!-- القسم الأيمن: مخطط الرادار والبيانات -->
                <div class="dash-box profile-box">
                    <div class="profile-header-row">
                        <span class="box-title" style="margin:0;">TBCLM PROFILE</span>
                        <span class="classification-text">Classification: <span class="red-text"><?php echo htmlspecialchars($status_text); ?></span></span>
                    </div>

                    <div class="radar-container">
                        <div class="radar-chart-mock">
                            <span class="radar-label technical">Technical</span>
                            <span class="radar-label behavioral">Behavioral</span>
                            <span class="radar-label cognitive">Cognitive</span>
                            <span class="radar-label leadership">Leadership</span>
                            <span class="radar-label market">Market</span>
                            <div class="radar-dot" style="top: 45%; left: 52%;"></div>
                            <div class="radar-dot" style="top: 58%; left: 53%;"></div>
                            <div class="radar-dot" style="top: 64%; left: 55%;"></div>
                        </div>
                    </div>

                    <!-- أشرطة التقدم السفلية المرتبطة بالقيم الديناميكية -->
                    <div class="progress-bars-section">
                        <div class="progress-row">
                            <span class="p-letter blue-text">T</span>
                            <div class="p-track"><div class="p-fill blue-fill" style="width: <?php echo $technical_score; ?>%;"></div></div>
                            <span class="p-val"><?php echo intval($technical_score); ?> <span class="badge-letter green-badge">B</span></span>
                            <span class="p-end-val"><?php echo intval($behavioral_score); ?></span>
                        </div>
                        <div class="progress-row">
                            <span class="p-letter purple-text">C</span>
                            <div class="p-track"><div class="p-fill purple-fill" style="width: <?php echo $cognitive_score; ?>%;"></div></div>
                            <span class="p-val"><?php echo intval($cognitive_score); ?> <span class="badge-letter yellow-badge">L</span></span>
                            <span class="p-end-val"><?php echo intval($leadership_score); ?></span>
                        </div>
                        <div class="progress-row">
                            <span class="p-letter red-text">M</span>
                            <div class="p-track"><div class="p-fill" style="width: <?php echo $market_score; ?>%;"></div></div>
                            <span class="p-val"><?php echo intval($market_score); ?></span>
                            <span class="p-end-val"></span>
                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>
</body>
</html>