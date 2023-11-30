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
        if (count($_GET['symbols']) === 3) {
            $valoriDisponibili = $symbols . $letters . $upLetters . $numbers;
        } elseif (in_array('letters', $_GET['symbols']) && in_array('num', $_GET['symbols'])) {
            $valoriDisponibili = $letters . $upLetters . $numbers;
        } elseif (in_array('sym', $_GET['symbols']) && in_array('num', $_GET['symbols'])) {
            $valoriDisponibili = $symbols . $numbers;
        } elseif (in_array('sym', $_GET['symbols']) && in_array('letters', $_GET['symbols'])) {
            $valoriDisponibili = $symbols . $letters . $upLetters;
        } elseif (in_array('letters', $_GET['symbols'])) {
            $valoriDisponibili = $letters . $upLetters;
        } elseif (in_array('num', $_GET['symbols'])) {
            $valoriDisponibili = $numbers;
        } elseif (in_array('sym', $_GET['symbols'])) {
            $valoriDisponibili = $symbols;
        }

        if (!$_GET['repeat']) {
            while (strlen($newPassword) < $passwordLength) {
                $newCharacter = $valoriDisponibili[rand(0, strlen($valoriDisponibili) - 1)];
                if (!strpos($newPassword, $newCharacter)) {
                    $newPassword .= $newCharacter;
                }
            }
        } else {
            while (strlen($newPassword) < $passwordLength) {
                $newCharacter = $valoriDisponibili[rand(0, strlen($valoriDisponibili) - 1)];

                $newPassword .= $newCharacter;
            }
        }


        //var_dump($newPassword);
        $_SESSION['password'] = $newPassword;
        header('Location: yourPW.php');
        die();
    } elseif (isset($_GET['passwordLength']) && ($_GET['passwordLength'] > 20 || $_GET['passwordLength'] < 6)) {
        return 'La lunghezza della password deve essere compresa tra 6 e 20 caratteri';
    }
    return false;
}
?>