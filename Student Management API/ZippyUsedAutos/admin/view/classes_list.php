<div class="admin-list">
    <div class="list-header">
        <h2>Classes</h2>
        <a href="classes.php?action=add" class="btn-add">+ Add New Class</a>
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
            <?php foreach ($classes as $class): ?>
            <tr>
                <td><?php echo $class['class_id']; ?></td>
                <td><?php echo $class['class_name']; ?></td>
                <td>
                    <form method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?php echo $class['class_id']; ?>">
                        <button type="submit" name="action" value="delete" class="btn-delete" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
