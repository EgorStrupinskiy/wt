<?
//Запуск сессий;
session_start();
require_once '../database/database.php';
echo "lefwefwefw";
function get_user($link, $user_name) {
    $sql = "SELECT * FROM `user` WHERE name = '${user_name}';";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, 1); 
    return $data;
}

function save_user($link, $user_name, $user_email, $user_password) {
    $sql = "INSERT INTO user (name, password, email)
        VALUES ('$user_name', '$user_password', '$user_email')";

    if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
}

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email'])) {
    // получаем данные из формы с авторизацией
    $login = $_POST['login'];
    echo "login:".$login;
    $password = $_POST['password'];
    $email = $_POST['email'];
    $user = get_user($link, $login);
    if ($user == null) {
        save_user($link, $login, $email, $password);
        header("Location: ../order/order.php");
    } else {
        echo "Такой юзер уже есть";
    }
    
} 