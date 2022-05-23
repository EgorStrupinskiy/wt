<?
//Запуск сессий;
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
    $login = $_POST['login'];
    echo "login:".$login;
    $password = $_POST['password'];
    $user = get_user($link, $login);
    if ($user == null) {
        echo "Нет такого юзера";
    } else {
        //echo $password;
        echo $user[0]['password'];
        //echo $user['login'];
        if (($password == $user[0]['password'])) {
            echo ("логин совпадает и пароль верны");
            $_SESSION['Name'] = $login;
            // идем на страницу для авторизованного пользователя
            header("Location: ../order/order.php");
        } else {
            die('Такой логин с паролем не найдены в базе данных.');
        }
    }
    
} 
