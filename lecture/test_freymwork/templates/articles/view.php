<?php include __DIR__ . '/../header.php'; ?>
    <style>
        .comments{
            border: 1px solid black;
            padding-left: 0;
/*             text-align: center; */
        }
        .comments > li{
            border: 1px solid black;
            list-style-type: none;
            padding: 3px;
        }
        li{
            position: relative;
        }
        span{
            position:absolute;
            right: 1%;
            background-color: aqua;
        }
        form > textarea{
            width: 100%;
        }
        .flex{
            display: flex;
            justify-content: space-between;
        }
    </style>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <snap><?=$article->getAuthor()->getNickname()?></snap><br>
    <a href="<?= $article->getId() ?>/edit">Редактировать статью</a><br>
    <a href="<?= $article->getId() ?>/delete">Удалить статью</a>
    <br>
    <br>
    <br>
    <form method="POST" action="<?=$article->getId() ?>/comment/add">
        <textarea name="text" required placeholder="Напишите ваш комментарий...">

        </textarea>
        <button type="reset">Ресетнуть</button>
        <button type="submit">Опубликовать</button>
    </form>
    <ul class="comments">
        <?php foreach ($comments as $comment ): ?>
            <li>
                <span> <?= $comment->getAuthor()->getNickname() ?> </span> 
                <p><?= $comment->getText() ?></p>
                <div class="flex">
                    <a href="<?= $article->getId() ?>/comment/<?=$comment->getId()?>/edit">Редактировать комент</a>
                    <a href="<?= $article->getId() ?>/comment/<?=$comment->getId()?>/delete">удалить коммент</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <script src="js/script_view.js"></script>
<?php include __DIR__ . '/../footer.php'; ?>