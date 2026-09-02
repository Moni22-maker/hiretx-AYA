<?php
// reports.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// استرجاع القيم من الجلسة أو وضع قيم افتراضية في حال لم يتم إجراء أي اختبار بعد
$score = isset($_SESSION['last_score']) ? $_SESSION['last_score'] : 10;
$hx_index = isset($_SESSION['last_hx_index']) ? $_SESSION['last_hx_index'] : '1.0';
$status_text = isset($_SESSION['last_status']) ? $_SESSION['last_status'] : "Needs Structured Development";

$technical_score = isset($_SESSION['tech_score']) ? $_SESSION['tech_score'] : 20.0;
$behavioral_score = isset($_SESSION['beh_score']) ? $_SESSION['beh_score'] : 0.0;
$cognitive_score = isset($_SESSION['cog_score']) ? $_SESSION['cog_score'] : 20.0;
$leadership_score = isset($_SESSION['lead_score']) ? $_SESSION['lead_score'] : 0.0;
$market_score = isset($_SESSION['mkt_score']) ? $_SESSION['mkt_score'] : 0.0;

$total_attempts = isset($_SESSION['total_attempts']) ? $_SESSION['total_attempts'] : 2;
$completed_sims = isset($_SESSION['completed_sims']) ? $_SESSION['completed_sims'] : 1;

// تحديد لون وحالة الـ Status Pill بناءً على النتيجة
$status_class = ($score >= 75) ? "status-pill-green" : (($score >= 50) ? "status-pill-yellow" : "status-pill-red");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HireTX - National Employability Readiness System</title>
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/reports.css">
</head>
<body>
    <div class="main-container">
        
        <?php include '../includes/sidebar.php'; ?>

        <main class="content">
            
            <header class="reports-header">
                <h1>Reports & Performance</h1>
                <div class="header-controls">
                    <span class="date"><?php echo date('D, M d, Y'); ?></span>
                    <div class="lang-switch">
                        <span class="lang-btn active">EN</span>
                        <span class="lang-btn">AR</span>
                    </div>
                </div>
            </header>

            <!-- 1. بطاقة الملف العلوي -->
            <div class="report-user-card">
                <div class="user-info-left">
                    <div class="user-avatar-hx">HX</div>
                    <div class="user-details">
                        <h2>@john_dela</h2>
                        <p>Computer Science</p>
                        <span class="verified-text">Verified account</span>
                    </div>
                </div>
                <a href="#" class="btn-export-pdf" onclick="window.print(); return false;">📄 Export PDF</a>
            </div>

            <!-- 2. قسم Readiness Snapshot و TBCLM Breakdown -->
            <div class="snapshot-breakdown-grid">
                
                <!-- Readiness Snapshot -->
                <div class="report-box">
                    <div class="box-header-row">
                        <span class="box-title">READINESS SNAPSHOT</span>
                        <span class="<?php echo $status_class; ?>"><?php echo htmlspecialchars($status_text); ?></span>
                    </div>
                    <div class="snapshot-content">
                        <div class="index-display-area">
                            <span class="big-index"><?php echo $hx_index; ?></span>
                            <span class="index-label-sub">HireTX Index</span>
                        </div>
                        <p class="snapshot-desc">
                            john_dela's current assessment results indicate an overall index of <?php echo $hx_index; ?>/10. Review the detailed breakdown below to target specific growth areas across technical and professional competencies.
                        </p>
                    </div>
                    <div class="snapshot-mini-stats">
                        <div class="mini-stat-box">
                            <span class="mini-label">TOTAL ATTEMPTS</span>
                            <span class="mini-val"><?php echo $total_attempts; ?></span>
                        </div>
                        <div class="mini-stat-box">
                            <span class="mini-label">ACTIVE SIMULATIONS</span>
                            <span class="mini-val"><?php echo $completed_sims; ?></span>
                        </div>
                    </div>
                </div>

                <!-- TBCLM Breakdown -->
                <div class="report-box">
                    <span class="box-title">TBCLM BREAKDOWN</span>
                    
                    <div class="tbclm-item">
                        <div class="tbclm-label-row">
                            <span>Technical Competency</span>
                            <span class="tbclm-score blue-num"><?php echo number_format($technical_score, 1); ?></span>
                        </div>
                        <div class="tbclm-track"><div class="tbclm-fill blue-fill" style="width: <?php echo $technical_score; ?>%;"></div></div>
                    </div>

                    <div class="tbclm-item">
                        <div class="tbclm-label-row">
                            <span>Behavioral Skills</span>
                            <span class="tbclm-score"><?php echo number_format($behavioral_score, 1); ?></span>
                        </div>
                        <div class="tbclm-track"><div class="tbclm-fill" style="width: <?php echo $behavioral_score; ?>%;"></div></div>
                    </div>

                    <div class="tbclm-item">
                        <div class="tbclm-label-row">
                            <span>Cognitive & Analytical</span>
                            <span class="tbclm-score purple-num"><?php echo number_format($cognitive_score, 1); ?></span>
                        </div>
                        <div class="tbclm-track"><div class="tbclm-fill purple-fill" style="width: <?php echo $cognitive_score; ?>%;"></div></div>
                    </div>

                    <div class="tbclm-item">
                        <div class="tbclm-label-row">
                            <span>Leadership & Professionalism</span>
                            <span class="tbclm-score"><?php echo number_format($leadership_score, 1); ?></span>
                        </div>
                        <div class="tbclm-track"><div class="tbclm-fill" style="width: <?php echo $leadership_score; ?>%;"></div></div>
                    </div>

                    <div class="tbclm-item" style="margin-bottom: 0;">
                        <div class="tbclm-label-row">
                            <span>Market Readiness</span>
                            <span class="tbclm-score"><?php echo number_format($market_score, 1); ?></span>
                        </div>
                        <div class="tbclm-track"><div class="tbclm-fill" style="width: <?php echo $market_score; ?>%;"></div></div>
                    </div>
                </div>

            </div>

            <!-- 3. أقسام Strengths, Weaknesses, Recommendations -->
            <div class="three-columns-grid">
                
                <!-- Strengths -->
                <div class="report-box">
                    <span class="box-title yellow-title">⭐ Strengths</span>
                    <ul class="report-list">
                        <li>
                            <span class="bullet-icon green-check">✔</span>
                            <span>Demonstrates foundational knowledge across simulation tasks</span>
                        </li>
                        <li>
                            <span class="bullet-icon green-check">✔</span>
                            <span>Shows willingness to engage with complex professional scenarios</span>
                        </li>
                    </ul>
                </div>

                <!-- Weaknesses -->
                <div class="report-box">
                    <span class="box-title orange-title">⚡ Weaknesses</span>
                    <ul class="report-list">
                        <li>
                            <span class="bullet-icon alert-icon">⚠</span>
                            <span>Behavioral skills require development (<?php echo number_format($behavioral_score, 1); ?>/100) — professional communication effectiveness below standard</span>
                        </li>
                        <li>
                            <span class="bullet-icon alert-icon">⚠</span>
                            <span>Leadership development needed (<?php echo number_format($leadership_score, 1); ?>/100) — strategic thinking and accountability to be strengthened</span>
                        </li>
                        <li>
                            <span class="bullet-icon alert-icon">⚠</span>
                            <span>Market awareness gap (<?php echo number_format($market_score, 1); ?>/100) — industry knowledge and trend awareness requires attention</span>
                        </li>
                        <li>
                            <span class="bullet-icon alert-icon">⚠</span>
                            <span>Technical competency needs strengthening (<?php echo number_format($technical_score, 1); ?>/100) — domain knowledge gaps identified</span>
                        </li>
                        <li>
                            <span class="bullet-icon alert-icon">⚠</span>
                            <span>Analytical depth needs improvement (<?php echo number_format($cognitive_score, 1); ?>/100) — structured problem-solving approach required</span>
                        </li>
                    </ul>
                </div>

                <!-- Recommendations -->
                <div class="report-box">
                    <span class="box-title teal-title">💡 Recommendations</span>
                    <ul class="report-list">
                        <li><span class="bullet-arrow">›</span><span>Pursue technical certifications (AWS, Azure, Google Cloud, or cybersecurity certifications)</span></li>
                        <li><span class="bullet-arrow">›</span><span>Build portfolio projects demonstrating system design and architecture skills</span></li>
                        <li><span class="bullet-arrow">›</span><span>Enroll in professional communication and interpersonal effectiveness workshops</span></li>
                        <li><span class="bullet-arrow">›</span><span>Practice structured communication frameworks (STAR, SCQA) in writing exercises</span></li>
                        <li><span class="bullet-arrow">›</span><span>Develop analytical skills through structured case study and problem-solving practice</span></li>
                        <li><span class="bullet-arrow">›</span><span>Study decision frameworks (Decision Matrix, MECE, First Principles Thinking)</span></li>
                        <li><span class="bullet-arrow">›</span><span>Seek leadership mentorship and executive shadowing opportunities</span></li>
                        <li><span class="bullet-arrow">›</span><span>Practice stakeholder management through cross-functional project involvement</span></li>
                        <li><span class="bullet-arrow">›</span><span>Engage regularly with industry publications, reports, and professional associations</span></li>
                        <li><span class="bullet-arrow">›</span><span>Attend industry conferences and networking events in your specialization field</span></li>
                    </ul>
                </div>

            </div>

            <!-- 4. Skill Gap Insights -->
            <div class="report-box" style="margin-bottom: 25px;">
                <span class="box-title red-title">🔍 Skill Gap Insights</span>
                <div class="skill-gaps-grid">
                    <div class="gap-card">
                        <span class="gap-letter">B</span>
                        <div class="gap-title">Behavioral Skills</div>
                        <div class="gap-sub">Score <?php echo number_format($behavioral_score, 1); ?> • high severity</div>
                    </div>
                    <div class="gap-card">
                        <span class="gap-letter">L</span>
                        <div class="gap-title">Leadership & Professionalism</div>
                        <div class="gap-sub">Score <?php echo number_format($leadership_score, 1); ?> • high severity</div>
                    </div>
                    <div class="gap-card">
                        <span class="gap-letter">M</span>
                        <div class="gap-title">Market Readiness</div>
                        <div class="gap-sub">Score <?php echo number_format($market_score, 1); ?> • high severity</div>
                    </div>
                    <div class="gap-card">
                        <span class="gap-letter">T</span>
                        <div class="gap-title">Technical Competency</div>
                        <div class="gap-sub">Score <?php echo number_format($technical_score, 1); ?> • high severity</div>
                    </div>
                    <div class="gap-card">
                        <span class="gap-letter">C</span>
                        <div class="gap-title">Cognitive & Analytical Ability</div>
                        <div class="gap-sub">Score <?php echo number_format($cognitive_score, 1); ?> • high severity</div>
                    </div>
                </div>
            </div>

            <!-- 5. Assessment History الجدول السفلي -->
            <div class="report-box" style="margin-bottom: 40px;">
                <span class="box-title yellow-title">🕒 Assessment History</span>
                <table class="assessment-table">
                    <thead>
                        <tr>
                            <th>SIMULATION</th>
                            <th>STATUS</th>
                            <th>HIRETX INDEX</th>
                            <th>READINESS</th>
                            <th style="text-align: right;">DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="sim-name">IT Help Desk Fundamentals</div>
                                <div class="sim-spec">Computer Science</div>
                            </td>
                            <td><span class="status-tag submitted">Submitted</span></td>
                            <td><span class="index-num-yellow"><?php echo $hx_index; ?></span></td>
                            <td><span class="red-text"><?php echo htmlspecialchars($status_text); ?></span></td>
                            <td style="text-align: right; color: #9ca3af;"><?php echo date('d/m/Y'); ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="sim-name">Cybersecurity Incident Response & Forensics</div>
                                <div class="sim-spec">Computer Science</div>
                            </td>
                            <td><span class="status-tag in-progress">In Progress</span></td>
                            <td style="color: #6b7280;">—</td>
                            <td style="color: #6b7280;">—</td>
                            <td style="text-align: right; color: #6b7280;">—</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</body>
</html>