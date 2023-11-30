<?php

function generatePassword()
{
    $symbols = '!?&%$<>^+-\*/()[]{}@#\_=';
    $letters = 'qwertyuiopasdfghjklzxcvbnm';
    $upLetters = strtoupper($letters);
    $numbers = '0123456789';

    if (isset($_GET['passwordLength'])) {
        $passwordLength = $_GET['passwordLength'];
        $newPassword = '';
        while (strlen($newPassword) < $passwordLength) {

            $valoriDisponibili = $symbols . $letters . $upLetters . $numbers;
            $newCharacter = $valoriDisponibili[rand(0, strlen($valoriDisponibili) - 1)];
            if (!strpos($newPassword, $newCharacter)) {
                $newPassword .= $newCharacter;
            }
        }
        //var_dump($newPassword);
        $_SESSION['password'] = $newPassword;
        //header('Location: index.php');
        die();
    }
    return false;
}
?>