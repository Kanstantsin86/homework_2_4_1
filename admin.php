<?php
ini_set('upload_max_filesize', '3M');
if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
	if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK && $_FILES['userfile']['type'] == 'application/json') {
		$destination_dir = dirname(__FILE__) . '/DownloadFiles/' . $_FILES['userfile']['name']; 
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $destination_dir)) { 
			header('Location: list.php');
            exit;
		} else {
			echo 'Файл не загружен!';
		}
	} else {
		switch ($_FILES['userfile']['error']) {
			case UPLOAD_ERR_FORM_SIZE:
			case UPLOAD_ERR_INI_SIZE:
				echo 'Слишком большой размер файла!';
			break;
			case UPLOAD_ERR_NO_FILE:
				echo 'Файл не выбран!';
			break;
			default:
				echo 'Что-то не так...';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Загрузка тестов</title>
</head>
<body>
	<form method="post" action="admin.php" enctype="multipart/form-data">
	<label for="inputfile">Загрузить тест:</label>
	<input name="userfile" type="file">
	<input type="submit" value="Нажмите, чтобы загрузить">
	</form>
	<nav>
    <ul>
        <li><a href="list.php">Список загруженных тестов</a></li>
    </ul>
	</nav>
</body>
</html>