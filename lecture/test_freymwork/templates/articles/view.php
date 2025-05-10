<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <snap><?= $article->getAuthor() ?></snap>
<?php include __DIR__ . '/../footer.php'; ?>