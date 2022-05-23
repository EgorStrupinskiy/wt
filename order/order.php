<?php
    //Запуск сессий;
    session_start();
    //если пользователь не авторизован

    echo $_SESSION['Name'];
    if (!(isset($_SESSION['Name'])))
    {
        //идем на страницу авторизации
        echo "fwefwef";
        header("Location: ../login/logic.php");
        exit;
    };

    $main_template = file_get_contents("order.html");
    $main_template = str_replace('{header}', file_get_contents("../Templates/header.html"), $main_template);
    $main_template = str_replace('{footer}', file_get_contents("../Templates/footer.html"), $main_template);
    echo $main_template;