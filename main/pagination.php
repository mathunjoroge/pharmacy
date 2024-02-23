<?php
$start = 0;
$limit = 100;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $start = ($id - 1) * $limit;
} else {
    $id = 1;
}

$result = $db->prepare("SELECT COUNT(*) as count FROM products RIGHT OUTER JOIN batch ON batch.product_id=products.product_id");
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
$rowcount123 = $row['count'];

$total = ceil($rowcount123 / $limit);
?>

<ul class="pagination">
    <?php if ($id > 1): ?>
        <li class="page-item">
            <a class="page-link" href="?id=<?= ($id - 1) ?>" class="button">Previous</a>
        </li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total; $i++): ?>
        <li class="page-item <?= ($id == $i) ? 'active' : '' ?>">
            <a class="page-link" href="?id=<?= $i ?>" class="button"><?= $i ?></a>
        </li>
    <?php endfor; ?>

    <?php if ($id != $total): ?>
        <li class="page-item">
            <a class="page-link" href="?id=<?= ($id + 1) ?>" class="button">Next</a>
        </li>
    <?php endif; ?>
</ul>