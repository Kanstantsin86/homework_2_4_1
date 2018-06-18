<?php

require_once __DIR__ . '/functions.php';
if (isAuthorized()) {
    redirect('index');
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (login($login, $password)) {
        redirect('index');
    } else {
        $errors[] = 'Логин или пароль неверные';
    }    

}
/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['guest-name'];
    if (guest()) {
        redirect('list');
    }
}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Авторизация</title>
</head>
<body>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-wrap">
                    <h1>Авторизация</h1>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                           <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <form method="POST" id="login-form" action="">
                        <div class="form-group">
                            <label for="lg" class="sr-only">Логин</label>
                            <input type="text" placeholder="Логин" name="login" id="lg" class="form-control">
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="key" class="sr-only">Пароль</label>
                            <input type="password"  placeholder="Пароль" name="password" id="key" class="form-control">
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Войти">
                    
                    <h1>Войти как гость:</h1>
                    <form method="POST"  id="guest-form">
                        <div class="form-group">
                            <label for="lg" class="sr-only">Введите имя</label>
                            <input type="text" placeholder="Имя" name="guest-name" id="lg" class="form-control" >
                        </div>
                        <br/>
                    <input type="submit" id="btn_login" class="btn btn-custom btn-lg btn-block" value="Отправить" name="submit">
                    </form>

                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
</body>
</html>