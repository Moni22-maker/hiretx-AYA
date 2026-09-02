<?php
// dashboard/result.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$sim_id = isset($_POST['sim_id']) ? intval($_POST['sim_id']) : 1;
$task_response = isset($_POST['task_response']) ? trim($_POST['task_response']) : '';

// 1. حساب الكلمات والنتيجة بناءً على إجابة المستخدم
$word_count = $task_response === '' ? 0 : str_word_count($task_response);
$score = min(100, max(5, round($word_count * 1.5))); 
$hx_index = number_format(($score / 100) * 10, 1);
$status_text = ($score >= 75) ? "Ready for Placement" : (($score >= 50) ? "Moderate Readiness" : "Needs Structured Development");

// 2. توزيع درجات الـ TBCLM
$technical_score = min(100, $score + 10);
$behavioral_score = max(0, $score - 20);
$cognitive_score = max(0, $score - 15);
$leadership_score = max(0, $score - 30);
$market_score = max(0, $score - 25);

// 3. تخزين القيم في الجلسة لتظهر فوراً في الـ Dashboard
$_SESSION['last_score'] = $score;
$_SESSION['last_hx_index'] = $hx_index;
$_SESSION['last_status'] = $status_text;
$_SESSION['tech_score'] = $technical_score;
$_SESSION['beh_score'] = $behavioral_score;
$_SESSION['cog_score'] = $cognitive_score;
$_SESSION['lead_score'] = $leadership_score;
$_SESSION['mkt_score'] = $market_score;
$_SESSION['total_attempts'] = isset($_SESSION['total_attempts']) ? $_SESSION['total_attempts'] + 1 : 1;
$_SESSION['completed_sims'] = isset($_SESSION['completed_sims']) ? $_SESSION['completed_sims'] + 1 : 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HireTX - National Employability Readiness System</title>
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/global.css">
    <style>
        body {
            background-color: #0b0b0b;
            color: #f3f4f6;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        .report-container {
            max-width: 950px;
            margin: 40px auto;
            padding: 0 20px;
            text-align: center;
        }
        .hx-logo-box {
            background: #facc15;
            color: #000;
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border-radius: 12px;
            font-size: 22px;
        }
        h1 { font-size: 32px; margin-bottom: 5px; color: #fff; }
        .subtitle { color: #94a3b8; font-size: 15px; margin-bottom: 40px; }
        .card {
            background: #141414;
            border: 1px solid #222;
            border-radius: 16px;
            padding: 35px;
            margin-bottom: 30px;
            text-align: left;
        }
        .section-title {
            font-size: 13px;
            letter-spacing: 1.5px;
            color: #737373;
            margin-bottom: 25px;
            font-weight: bold;
            text-align: center;
        }
        .index-flex {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }
        .circle-gauge {
            width: 130px;
            height: 130px;
            border: 6px solid #262626;
            border-top-color: #ef4444;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .circle-gauge span:first-child { font-size: 34px; font-weight: bold; color: #fff; }
        .circle-gauge span:last-child { font-size: 12px; color: #737373; }
        .status-badge {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            padding: 8px 18px;
            border-radius: 30px;
            display: inline-block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 12px;
        }
        .tbclm-row { margin-bottom: 20px; }
        .tbclm-info { display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 8px; }
        .tbclm-track { background: #222; height: 6px; border-radius: 3px; overflow: hidden; }
        .tbclm-fill { height: 100%; border-radius: 3px; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        @media (max-width: 768px) { .grid-2 { grid-template-columns: 1fr; } }
        .strength-item, .growth-item { display: flex; align-items: flex-start; gap: 10px; font-size: 13px; color: #a3a3a3; margin-bottom: 12px; }
        .rec-item {
            background: #1a1a1a;
            border: 1px solid #262626;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
            color: #e5e5e5;
        }
        .rec-num {
            background: #facc15;
            color: #000;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 12px;
            flex-shrink: 0;
        }
        .footer-actions { display: flex; justify-content: center; gap: 15px; margin-top: 40px; margin-bottom: 50px; flex-wrap: wrap; }
        .btn-action { padding: 12px 28px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px; }
        .btn-yellow { background: #facc15; color: #000; }
        .btn-dark { background: #1a1a1a; color: #fff; border: 1px solid #333; }
    </style>
</head>
<body>

    <div class="report-container">
        <div class="hx-logo-box">HX</div>
        <h1>Assessment Complete</h1>
        <p class="subtitle">IT Help Desk Fundamentals</p>

        <div class="card">
            <div class="section-title">HIRETX INDEX™ RESULT</div>
            <div class="index-flex">
                <div class="circle-gauge">
                    <span><?php echo $hx_index; ?></span>
                    <span>/ 10</span>
                </div>
                <div>
                    <div class="status-badge"><?php echo htmlspecialchars($status_text); ?></div>
                    <p style="color: #888; font-size: 13px; margin: 0;">
                        Auto Score: <?php echo $score; ?>% • Evaluated based on your submitted response (<?php echo $word_count; ?> words)
                    </p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="section-title" style="text-align: left; margin-bottom: 25px;">TBCLM BREAKDOWN</div>
            
            <div class="tbclm-row">
                <div class="tbclm-info">
                    <span><strong style="color: #3b82f6;">T</strong> Technical Competency (30%)</span>
                    <span style="color: #3b82f6;"><?php echo number_format($technical_score, 1); ?></span>
                </div>
                <div class="tbclm-track"><div class="tbclm-fill" style="background: #3b82f6; width: <?php echo $technical_score; ?>%;"></div></div>
            </div>

            <div class="tbclm-row">
                <div class="tbclm-info">
                    <span><strong style="color: #10b981;">B</strong> Behavioral Skills (25%)</span>
                    <span style="color: #10b981;"><?php echo number_format($behavioral_score, 1); ?></span>
                </div>
                <div class="tbclm-track"><div class="tbclm-fill" style="background: #10b981; width: <?php echo $behavioral_score; ?>%;"></div></div>
            </div>

            <div class="tbclm-row">
                <div class="tbclm-info">
                    <span><strong style="color: #8b5cf6;">C</strong> Cognitive Ability (20%)</span>
                    <span style="color: #8b5cf6;"><?php echo number_format($cognitive_score, 1); ?></span>
                </div>
                <div class="tbclm-track"><div class="tbclm-fill" style="background: #8b5cf6; width: <?php echo $cognitive_score; ?>%;"></div></div>
            </div>

            <div class="tbclm-row">
                <div class="tbclm-info">
                    <span><strong style="color: #f59e0b;">L</strong> Leadership & Professionalism (15%)</span>
                    <span style="color: #f59e0b;"><?php echo number_format($leadership_score, 1); ?></span>
                </div>
                <div class="tbclm-track"><div class="tbclm-fill" style="background: #f59e0b; width: <?php echo $leadership_score; ?>%;"></div></div>
            </div>

            <div class="tbclm-row" style="margin-bottom: 0;">
                <div class="tbclm-info">
                    <span><strong style="color: #ef4444;">M</strong> Market Readiness (10%)</span>
                    <span style="color: #ef4444;"><?php echo number_format($market_score, 1); ?></span>
                </div>
                <div class="tbclm-track"><div class="tbclm-fill" style="background: #ef4444; width: <?php echo $market_score; ?>%;"></div></div>
            </div>
        </div>

        <div class="footer-actions">
            <a href="dashboard.php" class="btn-action btn-yellow">🏠 Back to Dashboard</a>
            <a href="simulations.php" class="btn-action btn-dark">🔄 Try Another Simulation</a>
        </div>
    </div>

</body>
</html>