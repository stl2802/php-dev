<?php include __DIR__ . '/../header.php'; ?>
<form method="POST">
    <textarea name="Text"><?= htmlspecialchars($comment->getText()) ?></textarea><br>
    <button type="submit">Сохранить</button>
</form>
<?php include __DIR__ . '/../footer.php'; ?>