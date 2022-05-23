<?
//Запуск сессий;
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

require_once '../database/database.php';


// Переменные, которые отправляет пользователь

// Формирование самого письма
$title = "Заголовок письма";
$body = "
<h2>Новое письмо</h2>
<b>Имя:</b> wefwef<br>
<b>Почта:</b> wefwef<br><br>
<b>Сообщение:</b> wefwef<br>
";

// Настройки PHPMailer

function get_user($link, $user_name)
{
    $sql = "SELECT * FROM `user` WHERE name = '${user_name}';";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, 1);
    return $data;
}

function save_user($link, $user_name, $user_email, $user_password)
{
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
    echo "login:" . $login;
    $password = $_POST['password'];
    $email = $_POST['email'];
    $user = get_user($link, $login);
    if ($user == null) {
        save_user($link, $login, $email, $password);


        $mail = new PHPMailer();
        
            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth   = true;
            //Настройки вашей почты

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
            $mail->Username   = 'rebenok12323e23'; // Логин на почте
            $mail->Password   = 'rcgmldcyfngopuhd'; // Пароль на почте
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
            $mail->setFrom('rebenok12323e23@yandex.ru', 'Yura'); // Адрес самой почты и имя отправителя
            
            // Получатель письма

            // Прикрипление файлов к письму   

            // Проверяем отравленность сообщения
            $mail->addAddress('voitovich200233@gmail.com');
            // Отправка сообщения
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = "<i>Mail body in HTML</i>";;
            try {
                if ($mail->send()) {
                    echo "заебись";
                } else {
                    echo 'Ошибка: ' . $mail->ErrorInfo;
                }
            
                print_r(error_get_last());
            } catch (Exception $e) {
                echo "error";
                echo "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
            }

        //header("Location: ../order/order.php");
    } else {
        echo "Такой юзер уже есть";
    }
}
