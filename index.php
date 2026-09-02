<?php
// index.php - الصفحة الرئيسية التعريفية للموقع (Landing Page)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HireTX - National Employability Platform</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/landing.css">
</head>
<body class="landing-body">

    <!-- شريط التنقل العلوي -->
    <header class="landing-header">
        <div class="nav-container">
            <div class="logo-box">
                <span class="hx-badge">HX</span>
                <div class="logo-text">
                    <h2>HireTX</h2>
                    <p>Career Readiness Intelligence Platform</p>
                </div>
            </div>
            
            <nav class="nav-links">
                <a href="#start">Start</a>
                <a href="#how-it-works">How It Works</a>
                <a href="#framework">Framework</a>
                <a href="#tracks">Tracks</a>
                <a href="#why-hiretx">Why HireTX</a>
            </nav>

            <div class="nav-actions">
                <a href="login.php" class="btn-sign-in">Sign In</a>
                <a href="register.php" class="btn-start-free">Start Free</a>
                <div class="lang-toggle-landing">
                    <span class="active">EN</span>
                    <span>AR</span>
                </div>
            </div>
        </div>
    </header>

    <!-- قسم الهيرو (Hero Section) -->
    <section class="hero-section" id="start">
        <div class="hero-container">
            <div class="hero-content">
                <div class="tags-row">
                    <span class="outline-tag">Applied Assessment Design</span>
                    <span class="outline-tag">Workforce Readiness</span>
                    <span class="outline-tag">Instant Feedback</span>
                </div>
                <h1>Prove Your <span>Real Readiness</span> For Today's Jobs</h1>
                <p>HireTX is a premium readiness platform that evaluates candidates through realistic job simulation, weighted scoring, and sharp development insight so the result feels credible, modern, and employer-relevant.</p>
                
                <div class="hero-buttons">
                    <a href="register.php" class="btn-primary-glow">Start Your Assessment →</a>
                    <a href="#how-it-works" class="btn-secondary-outline">Explore the Platform</a>
                </div>

                <div class="hero-stats">
                    <div>
                        <h2>8,420</h2>
                        <p>completed sessions</p>
                    </div>
                    <div>
                        <h2>127</h2>
                        <p>job simulation scenarios</p>
                    </div>
                    <div>
                        <h2>91%</h2>
                        <p>initial pass rate</p>
                    </div>
                </div>
            </div>

            <!-- بطاقة معاينة مؤشر الجاهزية -->
            <div class="hero-preview-card">
                <span class="card-top-label">Candidate Readiness</span>
                <h4>Professional Readiness Index</h4>
                <div class="gauge-chart-placeholder">
                    <div class="gauge-arc"></div>
                    <div class="gauge-value">
                        <h2>84</h2>
                        <p>Ready for Work</p>
                    </div>
                </div>
                <div class="preview-bars">
                    <div class="bar-row"><span>84%</span><div class="progress-line"><div class="fill" style="width: 84%;"></div></div><span class="label">Ready for Work</span></div>
                    <div class="bar-row"><span>90%</span><div class="progress-line"><div class="fill" style="width: 90%;"></div></div><span class="label">T</span></div>
                    <div class="bar-row"><span>82%</span><div class="progress-line"><div class="fill" style="width: 82%;"></div></div><span class="label">B</span></div>
                    <div class="bar-row"><span>76%</span><div class="progress-line"><div class="fill" style="width: 76%;"></div></div><span class="label">C</span></div>
                    <div class="bar-row"><span>71%</span><div class="progress-line"><div class="fill" style="width: 71%;"></div></div><span class="label">L</span></div>
                    <div class="bar-row"><span>88%</span><div class="progress-line"><div class="fill" style="width: 88%;"></div></div><span class="label">M</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- كيف يعمل الموقع (How It Works) -->
    <section class="how-section" id="how-it-works">
        <span class="section-badge">Simple Journey</span>
        <h2>How <span class="brand-highlight">HireTX</span></h2>
        <p class="section-sub">A professional assessment flow designed to feel clear, rigorous, and efficient from sign-up to final reporting.</p>
        
        <div class="steps-container">
            <div class="step-item">
                <div class="step-number">1</div>
                <h4>Create Your Account</h4>
                <p>Register and choose the professional path that matches your field.</p>
            </div>
            <div class="step-item">
                <div class="step-number">2</div>
                <h4>Select a Track</h4>
                <p>Launch the HR or IT simulation designed for your role family.</p>
            </div>
            <div class="step-item">
                <div class="step-number">3</div>
                <h4>Complete Real Tasks</h4>
                <p>Respond to workplace scenarios that measure practical readiness.</p>
            </div>
            <div class="step-item">
                <div class="step-number">4</div>
                <h4>Review Your Profile</h4>
                <p>See your performance across all five TBCLM dimensions.</p>
            </div>
            <div class="step-item">
                <div class="step-number">5</div>
                <h4>Share Your Report</h4>
                <p>Download a polished report with actionable development guidance.</p>
            </div>
        </div>
    </section>

    <!-- نموذج التقييم TBCLM (Assessment Framework) -->
    <section class="framework-section" id="framework">
        <span class="section-badge">Assessment Framework</span>
        <h2>The <span class="tag-box">TBCLM</span> Readiness Model</h2>
        <p class="section-sub">A weighted model that blends technical, behavioral, analytical, leadership, and market-readiness signals into a clearer view of employability.</p>

        <div class="framework-grid">
            <div class="framework-card">
                <div class="card-icon">⚙️</div>
                <span class="dim-code">T</span>
                <h4>Technical Capability</h4>
                <p>Applied domain knowledge and practical execution</p>
                <h3 class="dim-val">30%</h3>
            </div>
            <div class="framework-card">
                <div class="card-icon">🧠</div>
                <span class="dim-code">B</span>
                <h4>Professional Behavior</h4>
                <p>Communication, ownership, and adaptability</p>
                <h3 class="dim-val">25%</h3>
            </div>
            <div class="framework-card">
                <div class="card-icon">🔨</div>
                <span class="dim-code">C</span>
                <h4>Analysis & Judgment</h4>
                <p>Reasoning and decision-making under pressure</p>
                <h3 class="dim-val">20%</h3>
            </div>
            <div class="framework-card">
                <div class="card-icon">🎯</div>
                <span class="dim-code">L</span>
                <h4>Leadership & Influence</h4>
                <p>Initiative, structure, and accountability</p>
                <h3 class="dim-val">15%</h3>
            </div>
            <div class="framework-card">
                <div class="card-icon">📊</div>
                <span class="dim-code">M</span>
                <h4>Market Readiness</h4>
                <p>Career awareness and workplace adaptability</p>
                <h3 class="dim-val">10%</h3>
            </div>
        </div>
    </section>

    <!-- مسارات المهنة (Career Tracks) -->
    <section class="tracks-section" id="tracks">
        <span class="section-badge">Professional Tracks</span>
        <h2>Choose Your <span class="brand-highlight">Career Track</span></h2>
        <p class="section-sub">Begin in the path closest to your specialization and get evaluated through realistic role-based scenarios.</p>

        <div class="tracks-grid">
            <div class="track-box">
                <span class="track-meta">20 scenarios - Human Resources</span>
                <span class="badge-hr">HR</span>
                <h3>Human Resources Operations</h3>
                <p>A realistic simulation covering hiring, employee relations, compliance, and performance management inside a modern workplace.</p>
                <div class="track-tags">
                    <span>Hiring</span><span>Performance</span><span>Interviews</span><span>Policy</span>
                </div>
                <a href="register.php" class="btn-track">Start This Track →</a>
            </div>

            <div class="track-box">
                <span class="track-meta">18 scenarios - Information Technology</span>
                <span class="badge-it">IT</span>
                <h3>IT Operations & Support</h3>
                <p>Hands-on tasks across support, systems operations, troubleshooting, and stakeholder communication.</p>
                <div class="track-tags">
                    <span>Support</span><span>Networks</span><span>Systems</span><span>Analysis</span>
                </div>
                <a href="register.php" class="btn-track">Start This Track →</a>
            </div>
        </div>
    </section>

    <!-- لماذا HireTX (Why HireTX) -->
    <section class="why-section" id="why-hiretx">
        <span class="section-badge">Why HireTX Outperforms Traditional Screening</span>
        <h2>Why HireTX</h2>

        <div class="comparison-table-wrapper">
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Traditional</th>
                        <th>HireTX</th>
                        <th>Capability</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cross">❌</td>
                        <td class="check">✔</td>
                        <td>Realistic work simulation</td>
                    </tr>
                    <tr>
                        <td class="cross">❌</td>
                        <td class="check">✔</td>
                        <td>Multi-dimensional readiness evaluation</td>
                    </tr>
                    <tr>
                        <td class="cross">❌</td>
                        <td class="check">✔</td>
                        <td>Weighted TBCLM scoring</td>
                    </tr>
                    <tr>
                        <td class="cross">❌</td>
                        <td class="check">✔</td>
                        <td>Personal development reporting</td>
                    </tr>
                    <tr>
                        <td class="cross">❌</td>
                        <td class="check">✔</td>
                        <td>Shareable, decision-ready outcome</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- دعوة للانضمام تذييل الصفحة -->
    <section class="cta-section">
        <h3>Ready To Prove What You Can Do?</h3>
        <p>Create your account and begin your first hands-on HireTX assessment to unlock a clearer score, sharper insight, and a more credible readiness story.</p>
        <a href="register.php" class="btn-primary-glow">Start With HireTX</a>
    </section>

    <!-- الفوتر (Footer) -->
    <footer class="landing-footer">
        <div class="footer-grid">
            <div>
                <h4>HireTX</h4>
                <p>A modern readiness platform that blends realistic job simulation with weighted assessment to surface real employability signals.</p>
            </div>
            <div>
                <h4>Platform</h4>
                <a href="#how-it-works">How It Works</a>
                <a href="#framework">TBCLM Framework</a>
                <a href="#tracks">Career Tracks</a>
            </div>
            <div>
                <h4>Access</h4>
                <a href="login.php">Sign In</a>
                <a href="register.php">Create Account</a>
            </div>
            <div>
                <h4>Outputs</h4>
                <a href="#">Readiness Reports</a>
                <a href="#">Shareable Results</a>
                <a href="#">Professional Insights</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2026 HireTX. All rights reserved.</p>
            <p>x2TBCLM v1</p>
        </div>
    </footer>

</body>
</html>