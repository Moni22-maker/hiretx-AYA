<style>
/* ==========================================================================
   HireTX - Direct Sidebar & Layout Standardizer
   ========================================================================== */

/* إزاحة المحتوى الرئيسي لليمين ليترك مساحة للسايدبار */
body {
    margin: 0 !important;
    padding: 0 !important;
    background-color: #0b0f17 !important;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
}

/* افترضنا أن المحتوى الرئيسي يحتوي على كلاس main-content أو محاط بديف رئيسي */
main, .main-content, .dashboard-container, #content {
    margin-left: 260px !important;
    padding: 20px !important;
    box-sizing: border-box !important;
}

/* السايدبار الثابت */
.sidebar {
    width: 260px !important;
    height: 100vh !important;
    background-color: #0c0f17 !important;
    border-right: 1px solid #1a202c !important;
    display: flex !important;
    flex-direction: column !important;
    position: fixed !important;
    top: 0 !important;
    bottom: 0 !important;
    left: 0 !important;
    z-index: 9999 !important;
    padding: 24px 16px !important;
    box-sizing: border-box !important;
}

/* الهوية وشعار HX */
.sidebar-brand {
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
    margin-bottom: 36px !important;
    padding-left: 8px !important;
}

.hx-badge {
    background-color: #ffc107 !important;
    color: #000000 !important;
    font-weight: 900 !important;
    font-size: 15px !important;
    padding: 6px 10px !important;
    border-radius: 8px !important;
    line-height: 1 !important;
    box-shadow: 0 4px 12px rgba(255, 193, 7, 0.2) !important;
}

.brand-text h2 {
    font-size: 18px !important;
    font-weight: 800 !important;
    color: #ffffff !important;
    margin: 0 !important;
    line-height: 1.1 !important;
    letter-spacing: -0.3px !important;
}

.brand-text p {
    font-size: 9px !important;
    color: #64748b !important;
    margin: 3px 0 0 0 !important;
    letter-spacing: 1.2px !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
}

/* عنوان القسم */
.sidebar-nav-section {
    display: flex !important;
    flex-direction: column !important;
}

.nav-heading {
    font-size: 10px !important;
    font-weight: 700 !important;
    color: #64748b !important;
    letter-spacing: 1.2px !important;
    padding-left: 12px !important;
    margin-bottom: 12px !important;
    text-transform: uppercase !important;
}

/* قائمة الروابط */
.sidebar-menu {
    list-style: none !important;
    padding: 0 !important;
    margin: 0 !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 6px !important;
}

.sidebar-menu li {
    margin: 0 !important;
    padding: 0 !important;
}

.sidebar-menu li a {
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
    color: #94a3b8 !important;
    text-decoration: none !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    padding: 10px 14px !important;
    border-radius: 10px !important;
    transition: background-color 0.2s, color 0.2s !important;
}

.nav-icon {
    font-size: 15px !important;
    width: 20px !important;
    display: inline-block !important;
    text-align: center !important;
}

/* العنصر النشط (Active Link) */
.sidebar-menu li a.active,
.sidebar-menu li a:hover {
    background-color: #ffc107 !important;
    color: #000000 !important;
    font-weight: 700 !important;
}

.sidebar-menu li a.active .nav-icon,
.sidebar-menu li a:hover .nav-icon {
    color: #000000 !important;
}
</style>

<aside class="sidebar">
    <!-- الشعار -->
    <div class="sidebar-brand">
        <div class="hx-badge">HX</div>
        <div class="brand-text">
            <h2>HireTX</h2>
            <p>READINESS SYSTEM</p>
        </div>
    </div>

    <!-- قائمة التنقل -->
    <div class="sidebar-nav-section">
        <span class="nav-heading">NAVIGATION</span>
        <ul class="sidebar-menu">
            <li>
                <a href="dashboard.php" class="active">
                    <span class="nav-icon">⊞</span> Dashboard
                </a>
            </li>
            <li>
                <a href="simulation.php">
                    <span class="nav-icon">▶</span> Simulations
                </a>
            </li>
            <li>
                <a href="reports.php">
                    <span class="nav-icon">📈</span> My Reports
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <span class="nav-icon">👤</span> Profile
                </a>
            </li>
            <li>
              <a href="../logout.php">
    <span class="nav-icon">🚪</span> Sign Out
</a>
            </li>
        </ul>
    </div>
</aside>