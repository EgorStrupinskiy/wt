<?php
    $main_template = file_get_contents("login.html");
    $main_template = str_replace('{header}', file_get_contents("../Templates/header.html"), $main_template);
    $main_template = str_replace('{footer}', file_get_contents("../Templates/footer.html"), $main_template);
    session_start();


require_once '../database/database.php';

function get_user($link, $user_name) {
    $sql = "SELECT * FROM `user` WHERE name = '${user_name}';";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, 1); 
    return $data;
}


if (isset($_POST['login']) && isset($_POST['password'])) {
    // получаем данные из формы с авторизацией
    echo "wefwefwefewf";
    $login = $_POST['login'];
    echo "login:".$login;
    $password = $_POST['password'];
    $user = get_user($link, $login);
    if ($user == null) {
        echo "Нет такого юзера";
    } else {
        if (($password == $user['password'])) {
            echo ("логин совпадает и пароль верны");
            $_SESSION['Name'] = $login;
            // идем на страницу для авторизованного пользователя
            //header("Location: ../order/order.php");
        } else {
            die('Такой логин с паролем не найдены в базе данных.');
        }
    }
    
} else {
    echo "хуйня";
}
    echo $main_template;