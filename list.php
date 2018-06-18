<?php
require_once __DIR__ . '/functions.php';

if (!isAuthorized() and !isGuest()) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
        exit;
}

$files = array_slice(scandir('./DownloadFiles/'), 2);

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    header("Location: test.php?id=$id");
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список загруженных тестов</title>
</head>
<body>
    <h1>Список загруженных тестов</h1>
    <li><a href="logout.php">Выход</a></li>
<nav>
    <ul>
        <?php if (isAuthorized()) { ?>
            <li><a href="admin.php">Загрузить тест</a></li>
        <?php } else { ?>
        <?php echo " ";?>
        <?php } ?>
        <?php foreach ($files as $file) {
            for ($i = 0; $i < count($files); $i++) { 
            echo "<pre>";
            echo ($files[$i]); 
            echo "</pre>";
           } break;
        } ?>
        <form action="" method="post" enctype="multipart/form-data">
        <p><b>Введите номер теста:</b><br>
        <input type="text" size="10" name="id">
        </p>
        <button type="submit">Выбрать</button>
        </form>
    </ul>
</nav>