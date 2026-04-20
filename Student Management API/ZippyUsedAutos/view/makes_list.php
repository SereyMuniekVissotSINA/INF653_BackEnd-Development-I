<h2>Makes</h2>
<form method="post">
    <input name="name">
    <button name="action" value="add">Add</button>
</form>
<?php foreach($makes as $m): ?>
    <p><?= $m['make_name'] ?>
        <form method="post" style="display: inline;">
            <input type="hidden" name="id" value="<?= $m['make_id'] ?>">
            <button name="action" value="delete">Delete</button>
        </form>
    </p>
<?php endforeach; ?>