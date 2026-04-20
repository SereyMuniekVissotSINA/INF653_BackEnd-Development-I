<div class="admin-list">
    <div class="list-header">
        <h2>Types</h2>
        <a href="types.php?action=add" class="btn-add">+ Add New Type</a>
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
            <?php foreach ($types as $type): ?>
            <tr>
                <td><?php echo $type['type_id']; ?></td>
                <td><?php echo $type['type_name']; ?></td>
                <td>
                    <form method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?php echo $type['type_id']; ?>">
                        <button type="submit" name="action" value="delete" class="btn-delete" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
