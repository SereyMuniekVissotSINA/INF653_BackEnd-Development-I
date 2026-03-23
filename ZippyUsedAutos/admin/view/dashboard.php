<div class="dashboard-container">
    <h2>Dashboard</h2>
    
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon vehicles-icon">🚗</div>
            <div class="stat-content">
                <h3>Total Vehicles</h3>
                <p class="stat-number"><?php echo $total_vehicles; ?></p>
            </div>
            <a href="vehicles.php" class="stat-link">View All</a>
        </div>

        <div class="stat-card">
            <div class="stat-icon makes-icon">🏭</div>
            <div class="stat-content">
                <h3>Makes</h3>
                <p class="stat-number"><?php echo $total_makes; ?></p>
            </div>
            <a href="makes.php" class="stat-link">Manage</a>
        </div>

        <div class="stat-card">
            <div class="stat-icon types-icon">📋</div>
            <div class="stat-content">
                <h3>Types</h3>
                <p class="stat-number"><?php echo $total_types; ?></p>
            </div>
            <a href="types.php" class="stat-link">Manage</a>
        </div>

        <div class="stat-card">
            <div class="stat-icon classes-icon">🏆</div>
            <div class="stat-content">
                <h3>Classes</h3>
                <p class="stat-number"><?php echo $total_classes; ?></p>
            </div>
            <a href="classes.php" class="stat-link">Manage</a>
        </div>
    </div>

    <div class="quick-actions">
        <h3>Quick Actions</h3>
        <div class="actions-grid">
            <button class="action-btn" onclick="window.location.href='vehicles.php'">
                📊 View Vehicles
            </button>
            <button class="action-btn" onclick="window.location.href='makes.php'">
                ✏️ Edit Makes
            </button>
            <button class="action-btn" onclick="window.location.href='types.php'">
                ✏️ Edit Types
            </button>
            <button class="action-btn" onclick="window.location.href='classes.php'">
                ✏️ Edit Classes
            </button>
        </div>
    </div>
</div>
