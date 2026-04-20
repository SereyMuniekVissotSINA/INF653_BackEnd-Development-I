<h2>Classes</h2>
<form method="post">
    <input name="name">
    <button name="action" value="add">Add</button>
</form>
<?php foreach($classes as $c): ?>
    <p><?= $c['class_name'] ?>
        <form method="post" style="display: inline;">
            <input type="hidden" name="id" value="<?= $c['class_id'] ?>">
            <button name="action" value="delete">Delete</button>
        </form>
    </p>
<?php endforeach; ?>