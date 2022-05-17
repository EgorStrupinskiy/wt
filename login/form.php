<?php
$regexp1 = "/^(0?[1-9]|[12][0-9]|3[01])[.](0?[1-9]|1[012])[.](\d{2}?(\d{2})?)$/";
$regexp2 = "/^(0?[1-9]|1[012])[\/](0?[1-9]|[12][0-9]|3[01])[\/](\d{2}?(\d{2})?)$/";

$separator = " ";

$temp = "";
$word = "";
$canAdd = true;

$words = explode($separator, $_POST['comments']);

for ($i = 0; $i < count($words); $i++) {
    if (preg_match($regexp1, $words[$i], $match)) {
        $tmp = $match[0];
        $trash = explode('.', $tmp);
        $value = intval($trash[2]);
        $value++;
        $tmp = $trash[0] . "." . $trash[1] . "." . $value;

        echo '<span style="color: red">' . $tmp . '</span>';
    } elseif (preg_match($regexp2, $words[$i], $match)) {
        $tmp = str_replace('/', '.', $match[0]);
        $trash = explode('.', $tmp);
        $value = intval($trash[2]);
        $value++;
        $tmp = $trash[1] . "." . $trash[0] . "." . $value;
        echo '<span style="color: red">' . $tmp . '</span>';
    } else {
        if (strlen($words[$i]) == 0) {
            echo ' ';
        } else
            echo $words[$i];
    }
    echo ' ';
}