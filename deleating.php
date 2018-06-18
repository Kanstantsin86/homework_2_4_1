<?php
require_once __DIR__ . '/functions.php';

if (!isAuthorized() and !isGuest()) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
        exit;
}

$files = array_slice(scandir('./DownloadFiles/'), 2);

if (isset($_POST['id'])) {
    $fileForDeleating = "./DownloadFiles/test" . $_POST['id'] . ".json";
    if (file_exists($fileForDeleating)) {
        unlink($fileForDeleating);
        redirect('deleating');
    } die('Ошибка удаления файла.');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Список тестов</h1>
    <li><a href="list.php">Список тестов</a></li>
    <li><a href="admin.php">Загрузить тест</a></li>
    <li><a href="logout.php">Выход</a></li>
<nav>
    <ul>
        <?php foreach ($files as $file) {
            for ($i = 0; $i < count($files); $i++){ 
            echo "<pre>";
            echo ($files[$i]); 
            echo "</pre>";
            } break;
        } ?>
        <form action="" method="post" enctype="multipart/form-data">
        <p><b>Введите номер теста:</b><br>
        <input type="text" size="10" name="id">
        </p>
        <button type="submit">Удалить</button>
        </form>
    </ul>
</nav>