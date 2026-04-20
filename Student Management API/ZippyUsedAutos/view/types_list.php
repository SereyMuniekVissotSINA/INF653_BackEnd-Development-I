<h2>Types</h2>
<form method="post">
    <input name="name">
    <button name="action" value="add">Add</button>
</form>
<?php foreach($types as $t): ?>
    <p><?= $t['type_name'] ?>
        <form method="post" style="display: inline;">
            <input type="hidden" name="id" value="<?= $t['type_id'] ?>">
            <button name="action" value="delete">Delete</button>
        </form>
    </p>
<?php endforeach; ?>