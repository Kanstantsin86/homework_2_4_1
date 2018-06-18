<?php
require_once __DIR__ . '/functions.php';

if (!isAuthorized()) {
	redirect('login');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Админка</title>
</head>
<body>
	<p>Добро пожаловать, <?= getAuthorizedUser()['username']; ?></p>
	<ul>
		<li><a href="list.php">Список тестов</a></li>
        <li><a href="admin.php">Загрузить тест</a></li>
		<?php if (isAuthorized()) { ?>
           <li><a href="deleating.php">Удалить тест</a></li>
        <?php } else { ?>
        <?php echo " ";?>
        <?php } ?>
		<li><a href="users.php">Список пользователей</a></li>
		<li><a href="logout.php">Выход</a></li>
	</ul>
</body>
</html>