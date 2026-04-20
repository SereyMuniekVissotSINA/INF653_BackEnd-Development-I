<div class="form-container">
    <h2>Add New Vehicle</h2>
    <form method="post" class="admin-form">
        <div class="form-row">
            <div class="form-group">
                <label for="model">Model *</label>
                <input type="text" id="model" name="model" required placeholder="e.g., Camry, F-150">
            </div>
            <div class="form-group">
                <label for="year">Year *</label>
                <input type="number" id="year" name="year" required min="1900" max="2099" placeholder="2024">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="price">Price *</label>
                <input type="number" id="price" name="price" required min="0" step="0.01" placeholder="25000.00">
            </div>
            <div class="form-group">
                <label for="make_id">Make *</label>
                <select id="make_id" name="make_id" required>
                    <option value="">Select a Make</option>
                    <?php foreach ($makes as $make): ?>
                    <option value="<?php echo $make['make_id']; ?>"><?php echo $make['make_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="type_id">Type *</label>
                <select id="type_id" name="type_id" required>
                    <option value="">Select a Type</option>
                    <?php foreach ($types as $type): ?>
                    <option value="<?php echo $type['type_id']; ?>"><?php echo $type['type_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="class_id">Class *</label>
                <select id="class_id" name="class_id" required>
                    <option value="">Select a Class</option>
                    <?php foreach ($classes as $class): ?>
                    <option value="<?php echo $class['class_id']; ?>"><?php echo $class['class_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" name="action" value="add" class="btn-primary">Add Vehicle</button>
            <a href="vehicles.php" class="btn-secondary">Cancel</a>
        </div>
    </form>
</div>
