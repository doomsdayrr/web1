<?php
require_once 'NewsDB.class.php';

$news = new NewsDB();
$errMsg = "";

// Удаление новости
if (isset($_GET['del'])) {
    include 'delete_news.inc.php';
}

// Обработка формы добавления новости
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'save_news.inc.php';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Новостная лента</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Последние новости</h1>
    <?php if ($errMsg != ""): ?>
        <div style="color: red;"><?php echo $errMsg; ?></div>
    <?php endif; ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>Заголовок новости:<br />
            <input type="text" name="title" /></label>
        </p>
        <p>
            <label>Категория:<br />
            <select name="category">
                <?php foreach ($news as $id => $name): ?>
                    <option value="<?= htmlspecialchars($id) ?>"><?= htmlspecialchars($name) ?></option>
                <?php endforeach; ?>
            </select></label>
        </p>
        <p>
            <label>Описание:<br />
            <textarea name="description" cols="50" rows="5"></textarea></label>
        </p>
        <p>
            <label>Источник:<br />
            <input type="text" name="source" /></label>
        </p>
        <p>
            <input type="submit" value="Добавить новость" />
        </p>
    </form>
    <hr>
    <?php include 'get_news.inc.php'; ?>
</body>
</html>