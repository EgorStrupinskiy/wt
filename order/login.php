<?
//Запуск сессий;
session_start();

if (isset($_POST['login']) || isset($_POST['password'])) {
    // получаем данные из формы с авторизацией
    $login = mysql_real_escape_string($_POST['login']);
    $password = $_POST['password'];
    //проверка пароля и логина
    if (($login == 'a123') && ($password == '123')) {
        echo ("логин совпадает и пароль верны");
        $_SESSION['Name'] = $login;
        // идем на страницу для авторизованного пользователя
        header("Location: /author/sekret.php");
    } else {
        die('Такой логин с паролем не найдены в базе данных.');
    }
}
