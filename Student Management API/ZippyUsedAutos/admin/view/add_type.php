<div class="form-container">
    <h2>Add New Type</h2>
    <form method="post" class="admin-form">
        <div class="form-group">
            <label for="type_name">Type Name *</label>
            <input type="text" id="type_name" name="type_name" required placeholder="e.g., Sedan, SUV, Truck">
        </div>
        <div class="form-actions">
            <button type="submit" name="action" value="add" class="btn-primary">Add Type</button>
            <a href="types.php" class="btn-secondary">Cancel</a>
        </div>
    </form>
</div>
