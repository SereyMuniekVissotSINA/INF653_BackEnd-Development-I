<div class="form-container">
    <h2>Add New Make</h2>
    <form method="post" class="admin-form">
        <div class="form-group">
            <label for="make_name">Make Name *</label>
            <input type="text" id="make_name" name="make_name" required placeholder="e.g., Toyota, Ford, BMW">
        </div>
        <div class="form-actions">
            <button type="submit" name="action" value="add" class="btn-primary">Add Make</button>
            <a href="makes.php" class="btn-secondary">Cancel</a>
        </div>
    </form>
</div>
