<?php ## Пример работы с сессиями
session_start();

if (!isset($_SESSION['time'])) $_SESSION['time'] = time();
// Увеличиваем счетчик в сессии
$time = time() - $_SESSION['time'];
echo $time;
if ($_POST['reload']) {
    $_SESSION = [];
    // Удалить cookie, соответствующую SID
    unset($_COOKIE[session_name()]);
    // Уничтожить хранилище сессии
    session_destroy();
    header('Location: index.php');
}
?>
<form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
<input class="input" type="submit" name="reload" value="сбросить">
<form>
<h2>Счетчик</h2>
В текущей сессии работает
<?= $time ?> секунд <br />
Закройте браузер, чтобы обнулить счетчик.<br />
<a href="<?= $_SERVER['SCRIPT_NAME'] ?>" target="_blank">Открыть дочернее окно
браузера</a>