<?php
require_once __DIR__ . '/functions.php';

if (!isAdmin()) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
    exit;
}
?>

<html>
<head>
    <title>Список пользователей</title>
</head>
<body>
    <table>
        <thead>
            <tr>
            <th>Имя</th>
            <th>Логин</th>
            <th>Является ли админом</th>
            </tr>	
        </thead>
        <tbody>
            <?php foreach (getUsers() as $user): ?>
            <tr>
            <td><?= htmlspecialchars($user['username']) ?></td>	
            <td><?= htmlspecialchars($user['login']) ?></td>	
            <td><?= $user['is_admin'] ? 'Да' : 'Нет'; ?></td>	
            </tr>
            <?php endforeach; ?>			
        </tbody>
    </table>
</body>
</html>