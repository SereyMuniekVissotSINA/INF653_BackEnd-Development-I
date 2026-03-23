<div class="filter-form">
    <form method="get">
        <div class="filter-section">
            <h3 class="filter-section-title">Filter Vehicles</h3>
            <p class="filter-section-subtitle">Select one filter category below (optional)</p>
            
            <div class="filter-options">
                <div class="filter-group">
                    <label for="make_id">By Make:</label>
                    <select name="make_id" id="make_id">
                        <option value="">All Makes</option>
                        <?php foreach ($makes as $make): ?>
                            <option value="<?php echo $make['make_id']; ?>" <?php if ($make_id == $make['make_id']) echo 'selected'; ?>>
                                <?php echo $make['make_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="type_id">By Type:</label>
                    <select name="type_id" id="type_id">
                        <option value="">All Types</option>
                        <?php foreach ($type as $t): ?>
                            <option value="<?php echo $t['type_id']; ?>" <?php if ($type_id == $t['type_id']) echo 'selected'; ?>>
                                <?php echo $t['type_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="class_id">By Class:</label>
                    <select name="class_id" id="class_id">
                        <option value="">All Classes</option>
                        <?php foreach ($classes as $class): ?>
                            <option value="<?php echo $class['class_id']; ?>" <?php if ($class_id == $class['class_id']) echo 'selected'; ?>>
                                <?php echo $class['class_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="sort-section">
            <h3 class="filter-section-title">Sort Order</h3>
            <div class="sort-controls">
                <div class="filter-group">
                    <label for="sort">Sort By:</label>
                    <select name="sort" id="sort">
                        <option value="price" <?php if ($sort == 'price') echo 'selected'; ?>>Price (High to Low)</option>
                        <option value="year" <?php if ($sort == 'year') echo 'selected'; ?>>Year (Newest First)</option>
                    </select>
                </div>
                <button type="submit" class="filter-button">Apply Filters</button>
            </div>
        </div>
    </form>
</div>
