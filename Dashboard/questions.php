<?php
// dashboard/questions.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_GET['sim_id']) || empty($_GET['sim_id'])) {
    die("Error: Simulation ID is missing. Please go back and select a simulation.");
}

$sim_id = intval($_GET['sim_id']);
$task_index = isset($_GET['task']) ? intval($_GET['task']) : 1;
if ($task_index < 1 || $task_index > 3) {
    $task_index = 1;
}

$current_page = 'simulations.php';

// قاعدة بيانات المهام لكل محاكاة (تحتوي على 3 مهام لكل sim_id)
$simulations_tasks = [
    1 => [
        "title" => "IT Help Desk Fundamentals",
        "attempt" => "Attempt #3 • 3 Tasks",
        "tasks" => [
            1 => [
                "badge" => "Technical (T)",
                "points" => 100,
                "heading" => "Password Reset Procedure",
                "subtext" => "Describe the secure procedure for resetting an employee's Windows domain password.",
                "scenario" => "You are a Level 1 Help Desk Technician. You receive multiple support tickets from employees requesting credential resets."
            ],
            2 => [
                "badge" => "Technical (T)",
                "points" => 100,
                "heading" => "Printer Spooler Troubleshooting",
                "subtext" => "Explain the step-by-step resolution when a shared network printer queue freezes.",
                "scenario" => "The accounting department reports that multiple print jobs are stuck in 'Spooling' status on the main office printer."
            ],
            3 => [
                "badge" => "Process (P)",
                "points" => 100,
                "heading" => "Escalation Protocol & Documentation",
                "subtext" => "Detail the essential information required when escalating an unresolved ticket to Tier 2 support.",
                "scenario" => "A complex software conflict has exceeded your Level 1 troubleshooting scope and requires escalation to senior engineers."
            ]
        ]
    ],
    2 => [
        "title" => "Network Basics & Connectivity Troubleshooting",
        "attempt" => "Attempt #1 • 3 Tasks",
        "tasks" => [
            1 => [
                "badge" => "Technical (T)",
                "points" => 100,
                "heading" => "Default Gateway Unreachable",
                "subtext" => "Explain the diagnostic steps when a workstation cannot ping its local gateway.",
                "scenario" => "A user reports intermittent connection drops and inability to access internal network resources."
            ],
            2 => [
                "badge" => "Technical (T)",
                "points" => 100,
                "heading" => "DNS Resolution Failure",
                "subtext" => "Describe how to troubleshoot and resolve a domain name resolution error on a client PC.",
                "scenario" => "Employees can access servers via IP address, but domain names fail to load in web browsers."
            ],
            3 => [
                "badge" => "Security (S)",
                "points" => 100,
                "heading" => "DHCP Scope Exhaustion",
                "subtext" => "Identify symptoms and corrective actions when the local DHCP server runs out of available IP addresses.",
                "scenario" => "New devices connecting to the office Wi-Fi network are assigned APIPA addresses (169.254.x.x)."
            ]
        ]
    ]
];

// جلب بيانات المحاكاة والمهام أو تعيين قيم افتراضية إذا لم تكن موجودة
$sim_data = isset($simulations_tasks[$sim_id]) ? $simulations_tasks[$sim_id] : [
    "title" => "General Professional Assessment",
    "attempt" => "Attempt #1 • 3 Tasks",
    "tasks" => [
        $task_index => [
            "badge" => "General",
            "points" => 100,
            "heading" => "Core Operational Challenge",
            "subtext" => "Provide a detailed structured response to the given workplace scenario.",
            "scenario" => "You are tasked with evaluating and resolving a standard corporate enterprise issue."
        ]
    ]
];

$current_task = $sim_data['tasks'][$task_index];
$progress_percent = ($task_index / 3) * 100;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HireTX - <?php echo htmlspecialchars($sim_data['title']); ?></title>
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    
    <link rel="stylesheet" href="../assets/css/questions.css">
</head>
<body>
    <div class="main-container">
        
        <?php include '../includes/sidebar.php'; ?>

        <main class="content">
            
            <!-- الهيدر العلوي للمحاكاة -->
            <header class="sim-top-header">
                <div class="sim-title-area">
                    <div class="hx-logo-box">HX</div>
                    <div>
                        <h2><?php echo htmlspecialchars($sim_data['title']); ?></h2>
                        <span class="attempt-info"><?php echo htmlspecialchars($sim_data['attempt']); ?></span>
                    </div>
                </div>
                
                <div class="sim-header-right">
                    <div class="timer-display">29:40</div>
                    <div class="lang-switcher">
                        <span class="lang-btn active">EN</span>
                        <span class="lang-btn">AR</span>
                    </div>
                </div>
            </header>

            <!-- شريط التقدم والمهام -->
            <div class="progress-section">
                <div class="task-counter-info">
                    <span>Task <?php echo $task_index; ?> of 3</span>
                    <span>0 answered</span>
                </div>
                <!-- خط التقدّم الأصفر -->
                <div class="progress-bar-track">
                    <div class="progress-bar-fill" style="width: <?php echo $progress_percent; ?>%;"></div>
                </div>
                <!-- دوائر التنقل بين المهام -->
                <div class="task-steps-circles">
                    <a href="questions.php?sim_id=<?php echo $sim_id; ?>&task=1" class="step-circle <?php echo ($task_index == 1) ? 'active' : ''; ?>">1</a>
                    <a href="questions.php?sim_id=<?php echo $sim_id; ?>&task=2" class="step-circle <?php echo ($task_index == 2) ? 'active' : ''; ?>">2</a>
                    <a href="questions.php?sim_id=<?php echo $sim_id; ?>&task=3" class="step-circle <?php echo ($task_index == 3) ? 'active' : ''; ?>">3</a>
                </div>
            </div>

            <!-- محتوى المهمة -->
            <div class="assessment-body">
                <form action="result.php" method="POST" class="task-form">
                    <input type="hidden" name="sim_id" value="<?php echo $sim_id; ?>">
                    <input type="hidden" name="task_index" value="<?php echo $task_index; ?>">

                    <div class="task-meta-row">
                        <span class="badge-tech"><?php echo htmlspecialchars($current_task['badge']); ?></span>
                        <div class="points-badge">
                            <span class="points-num"><?php echo $current_task['points']; ?></span>
                            <span class="points-label">points</span>
                        </div>
                    </div>

                    <h3 class="task-heading"><?php echo htmlspecialchars($current_task['heading']); ?></h3>
                    <p class="task-subtext"><?php echo htmlspecialchars($current_task['subtext']); ?></p>

                    <!-- صندوق سياق السيناريو -->
                    <div class="scenario-box">
                        <div class="scenario-title">
                            <span class="info-icon">ℹ</span> SCENARIO CONTEXT
                        </div>
                        <p class="scenario-desc"><?php echo htmlspecialchars($current_task['scenario']); ?></p>
                    </div>

                    <!-- مساحة الإجابة النصية -->
                    <div class="textarea-wrapper">
                        <label for="task_response" class="textarea-label">Write your detailed response here...</label>
                        <textarea id="task_response" name="task_response" rows="8" placeholder="• Be specific and use domain terminology&#10;• Structure your response clearly&#10;• Minimum 50 words recommended"></textarea>
                        
                        <div class="textarea-footer">
                            <span class="word-counter">0 words</span>
                            <span class="word-recommendation">Min. 50 words recommended for full scoring</span>
                        </div>
                    </div>

                    <!-- أزرار التنقل السفلية -->
                    <div class="sim-footer-actions">
                        <?php if ($task_index > 1): ?>
                            <a href="questions.php?sim_id=<?php echo $sim_id; ?>&task=<?php echo $task_index - 1; ?>" class="btn-nav-action prev-btn">
                                ← Previous Task
                            </a>
                        <?php else: ?>
                            <a href="simulation.php" class="btn-nav-action prev-btn">
                                ← Back to Simulations
                            </a>
                        <?php endif; ?>

                        <?php if ($task_index < 3): ?>
                            <a href="questions.php?sim_id=<?php echo $sim_id; ?>&task=<?php echo $task_index + 1; ?>" class="btn-nav-action next-btn">
                                Next Task →
                            </a>
                        <?php else: ?>
                            <button type="submit" class="btn-nav-action next-btn">
                                Submit Assessment →
                            </button>
                        <?php endif; ?>
                    </div>

                </form>
            </div>

        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>
</html>