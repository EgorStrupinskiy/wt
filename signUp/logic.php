<?php
    $main_template = file_get_contents("signUp.html");
    $main_template = str_replace('{header}', file_get_contents("../Templates/header.html"), $main_template);
    $main_template = str_replace('{footer}', file_get_contents("../Templates/footer.html"), $main_template);
    echo $main_template;