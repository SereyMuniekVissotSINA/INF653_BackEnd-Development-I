<div class="admin-list">
    <div class="list-header">
        <h2>Makes</h2>
        <a href="makes.php?action=add" class="btn-add">+ Add New Make</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($makes as $make): ?>
            <tr>
                <td><?php echo $make['make_id']; ?></td>
                <td><?php echo $make['make_name']; ?></td>
                <td>
                    <form method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?php echo $make['make_id']; ?>">
                        <button type="submit" name="action" value="delete" class="btn-delete" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
