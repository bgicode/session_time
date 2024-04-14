<?php
session_start();

if (!isset($_SESSION['time'])) {
    $_SESSION['time'] = time();
} 

$time = time() - $_SESSION['time'];

if ($_POST['reload']) {

    $_SESSION = [];

    unset($_COOKIE[session_name()]);

    session_destroy();

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>session</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="wrap">
        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
            <input class="input" type="submit" name="reload" value="сбросить сессию">
        <form>
        <div class="counterWrap">
            <span>текущая сессии работает: <?= $time ?> секунд</span>
        </div>
    </div>
</body>
</html>
