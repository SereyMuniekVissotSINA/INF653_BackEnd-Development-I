    <?php foreach($vehicles as $v): ?>
    <div class="card">
        <strong><?= $v['year'] ?> <?= $v['model'] ?></strong><br>
        Price: $<?= $v['price'] ?>
    </div>
    <?php endforeach; ?>