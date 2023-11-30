<?php

function generatePassword()
{
    $symbols = '!?&%$<>^+-\*/()[]{}@#\_=';
    $letters = 'qwertyuiopasdfghjklzxcvbnm';
    $upLetters = strtoupper($letters);
    $numbers = '0123456789';

    if (isset($_GET['passwordLength']) && $_GET['passwordLength'] <= 20 && $_GET['passwordLength'] >= 6) {
        if (!isset($_GET['symbols'])) {
            return 'Selezionare almeno un tipo di carattere';
        }
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
        header('Location: index.php');
        die();
    } elseif (isset($_GET['passwordLength']) && ($_GET['passwordLength'] > 20 || $_GET['passwordLength'] < 6)) {
        return 'La lunghezza della password deve essere compresa tra 6 e 20 caratteri';
    }
    return false;
}
?>