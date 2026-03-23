<div class="admin-list">
    <div class="list-header">
        <h2>Vehicles</h2>
        <a href="vehicles.php?action=add" class="btn-add">+ Add New Vehicle</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $vehicle): ?>
            <tr>
                <td><?php echo isset($vehicle['vehicle_id']) ? $vehicle['vehicle_id'] : 'N/A'; ?></td>
                <td><?php echo isset($vehicle['model']) ? $vehicle['model'] : 'N/A'; ?></td>
                <td><?php echo isset($vehicle['year']) ? $vehicle['year'] : 'N/A'; ?></td>
                <td>$<?php echo isset($vehicle['price']) ? number_format($vehicle['price'], 2) : 'N/A'; ?></td>
                <td>
                    <form method="post" style="display: inline;">
                        <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>">
                        <button type="submit" name="action" value="delete" class="btn-delete" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
