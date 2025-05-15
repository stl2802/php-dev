<?php include __DIR__ . '/../header.php'; ?>
<form method="POST">
    <input type="text" name="ArticleName" value="<?= htmlspecialchars($article->getName()) ?>"><br>
    <textarea name="ArticleText"><?= htmlspecialchars($article->getText()) ?></textarea>
    <button type="submit">Сохранить</button>
</form>
<?php include __DIR__ . '/../footer.php'; ?>