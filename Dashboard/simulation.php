<?php
// dashboard/simulations.php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HireTX - Simulations</title>
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/simulation.css">
</head>
<body>
    <div class="main-container">
        
        <?php include '../includes/sidebar.php'; ?>

        <main class="content">
            <div class="simulations-filter-bar">
                <p class="filter-desc">Filter simulations by specialization and difficulty</p>
                <div class="filter-controls">
                    <select class="filter-select">
                        <option>All Specializations</option>
                        <option>Computer Science / IT</option>
                        <option>Human Resources</option>
                    </select>

                    <select class="filter-select">
                        <option>All Difficulties</option>
                        <option>Beginner</option>
                        <option>Intermediate</option>
                        <option>Advanced</option>
                        <option>Expert</option>
                    </select>

                    <input type="text" class="search-sim-input" placeholder="Search simulations...">
                </div>
            </div>

            <!-- 1. مستوى Beginner -->
            <div class="sim-category-section">
                <h3 class="category-title beginner-color">🌱 Beginner <span class="count-badge">(11)</span></h3>
                
                <div class="simulations-grid">
                    <!-- Card 1 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level beginner">Beginner</span>
                            <span class="badge-dept it">IT</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>IT Help Desk Fundamentals</h4>
                        <p>Handle common IT support tickets and apply troubleshooting methodology.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 30 min</span>
                            <span>🎯 Pass: 60%</span>
                            <span>🔄 Max 3 attempts</span>
                            <span>👥 2 completed</span>
                        </div>
                        <div class="sim-card-subinfo">Computer Science / IT • By Admin</div>
                        <a href="questions.php?sim_id=1" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>

                    <!-- Card 2 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level beginner">Beginner</span>
                            <span class="badge-dept it">IT</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>Network Basics & Connectivity Troubleshooting</h4>
                        <p>Apply foundational networking knowledge to resolve connectivity issues.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 30 min</span>
                            <span>🎯 Pass: 60%</span>
                            <span>🔄 Max 3 attempts</span>
                        </div>
                        <div class="sim-card-subinfo">Computer Science / IT • By Admin</div>
                        <a href="questions.php?sim_id=2" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>

                    <!-- Card 3 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level beginner">Beginner</span>
                            <span class="badge-dept it">IT</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>Cybersecurity Awareness & Basic Protection</h4>
                        <p>Apply basic cybersecurity practices to protect users and systems.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 30 min</span>
                            <span>🎯 Pass: 60%</span>
                            <span>🔄 Max 3 attempts</span>
                        </div>
                        <div class="sim-card-subinfo">Computer Science / IT • By Admin</div>
                        <a href="questions.php?sim_id=3" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>
                </div>
            </div>

            <!-- 2. مستوى Intermediate -->
            <div class="sim-category-section">
                <h3 class="category-title intermediate-color">⚡ Intermediate <span class="count-badge">(19)</span></h3>
                
                <div class="simulations-grid">
                    <!-- Card 1 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level intermediate">Intermediate</span>
                            <span class="badge-dept it">IT</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>Database Design & SQL Optimization</h4>
                        <p>Design relational database schemas and optimize SQL query performance.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 45 min</span>
                            <span>🎯 Pass: 65%</span>
                            <span>🔄 Max 3 attempts</span>
                        </div>
                        <div class="sim-card-subinfo">Computer Science / IT • By Admin</div>
                        <a href="questions.php?sim_id=4" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>

                    <!-- Card 2 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level intermediate">Intermediate</span>
                            <span class="badge-dept it">IT</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>REST API Design & Development</h4>
                        <p>Design and implement RESTful APIs following best practices.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 45 min</span>
                            <span>🎯 Pass: 65%</span>
                            <span>🔄 Max 3 attempts</span>
                        </div>
                        <div class="sim-card-subinfo">Computer Science / IT • By Admin</div>
                        <a href="questions.php?sim_id=5" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>

                    <!-- Card 3 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level intermediate">Intermediate</span>
                            <span class="badge-dept hr">HR</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>Recruitment and Selection Process</h4>
                        <p>Manage full-cycle recruitment from job posting to offer extension.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 45 min</span>
                            <span>🎯 Pass: 65%</span>
                            <span>🔄 Max 3 attempts</span>
                        </div>
                        <div class="sim-card-subinfo">Human Resources • By Admin</div>
                        <a href="questions.php?sim_id=6" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>
                </div>
            </div>

            <!-- 3. مستوى Advanced -->
            <div class="sim-category-section">
                <h3 class="category-title advanced-color">🔥 Advanced <span class="count-badge">(12)</span></h3>
                
                <div class="simulations-grid">
                    <!-- Card 1 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level advanced">Advanced</span>
                            <span class="badge-dept it">IT</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>Cybersecurity Incident Response & Forensics</h4>
                        <p>Lead a cybersecurity incident response for a critical infrastructure breach.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 60 min</span>
                            <span>🎯 Pass: 70%</span>
                            <span>🔄 Max 3 attempts</span>
                        </div>
                        <div class="sim-card-subinfo">Computer Science / IT • By Admin</div>
                        <a href="questions.php?sim_id=7" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>

                    <!-- Card 2 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level advanced">Advanced</span>
                            <span class="badge-dept it">IT</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>System Architecture & Microservices Design</h4>
                        <p>Design scalable microservices architecture for a complex enterprise system.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 60 min</span>
                            <span>🎯 Pass: 70%</span>
                            <span>🔄 Max 3 attempts</span>
                        </div>
                        <div class="sim-card-subinfo">Computer Science / IT • By Admin</div>
                        <a href="questions.php?sim_id=8" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>

                    <!-- Card 3 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level advanced">Advanced</span>
                            <span class="badge-dept hr">HR</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>Strategic Workforce Planning</h4>
                        <p>Develop a multi-year workforce plan aligned with business strategy.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 60 min</span>
                            <span>🎯 Pass: 70%</span>
                            <span>🔄 Max 3 attempts</span>
                        </div>
                        <div class="sim-card-subinfo">Human Resources • By Admin</div>
                        <a href="questions.php?sim_id=9" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>
                </div>
            </div>

            <!-- 4. مستوى Expert -->
            <div class="sim-category-section">
                <h3 class="category-title expert-color">👑 Expert <span class="count-badge">(10)</span></h3>
                
                <div class="simulations-grid">
                    <!-- Card 1 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level expert">Expert</span>
                            <span class="badge-dept it">IT</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>Enterprise Security Architecture & Zero Trust</h4>
                        <p>Design a Zero Trust security architecture for a large enterprise.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 75 min</span>
                            <span>🎯 Pass: 75%</span>
                            <span>🔄 Max 3 attempts</span>
                        </div>
                        <div class="sim-card-subinfo">Computer Science / IT • By Admin</div>
                        <a href="questions.php?sim_id=10" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>

                    <!-- Card 2 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level expert">Expert</span>
                            <span class="badge-dept it">IT</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>AI/ML System Design & Production Deployment</h4>
                        <p>Design and deploy production-grade machine learning systems.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 75 min</span>
                            <span>🎯 Pass: 75%</span>
                            <span>🔄 Max 3 attempts</span>
                        </div>
                        <div class="sim-card-subinfo">Computer Science / IT • By Admin</div>
                        <a href="questions.php?sim_id=11" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>

                    <!-- Card 3 -->
                    <div class="sim-card-box">
                        <div class="sim-card-header">
                            <span class="badge-level expert">Expert</span>
                            <span class="badge-dept hr">HR</span>
                            <span class="badge-active">Active</span>
                        </div>
                        <h4>Global HR Management & Expatriate Programs</h4>
                        <p>Manage international HR operations and cross-cultural workforce.</p>
                        <div class="sim-card-meta">
                            <span>⏱ 75 min</span>
                            <span>🎯 Pass: 75%</span>
                            <span>🔄 Max 3 attempts</span>
                        </div>
                        <div class="sim-card-subinfo">Human Resources • By Admin</div>
                        <a href="questions.php?sim_id=12" class="btn-begin-sim">▶ Begin Simulation</a>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>
</html>