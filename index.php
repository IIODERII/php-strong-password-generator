<?php
session_start();
include __DIR__ . '/functions/functions.php';
$error = generatePassword();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>PHP Strong Password Generator</title>
</head>

<body class="container w-100 vh-100 d-flex align-items-center justify-content-center" style="background-color: #001632">
    <main class=' w-75'>
        <div class="text-center py-4">
            <h1 class='text-secondary'>Strong Password Generator</h1>
            <h2 class='text-white'>Genera una password sicura</h2>
        </div>
        <?php if ($error) { ?>
            <div class="alert alert-danger">
                <?php echo $error ?>
            </div>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" class='p-5 bg-white rounded-3 fs-5'>
            <div class="d-flex justify-content-between align-items-center py-3">
                <label for="passwordLength">Lunghezza Password</label>
                <div class="w-50"><input type="number" min='6' max='20' name="passwordLength" class='form-control w-50'>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-start py-3">
                <span>Consenti ripetizioni di uno o più caratteri</span>
                <div class='w-50'>
                    <div>
                        <input type="radio" name="repeat" value='si' id='repeaty' checked>
                        <label for="repeaty">Sì</label>
                    </div>
                    <div>
                        <input type="radio" name="repeat" value='no' id='repeatn'>
                        <label for="repeatn">No</label>
                    </div>
                    <div class="py-3">
                        <div><input type="checkbox" name="symbols" id="letters">
                            <label for="letters">Lettere</label>
                        </div>
                        <div><input type="checkbox" name="symbols" id="num">
                            <label for="num">Numeri</label>
                        </div>
                        <div><input type="checkbox" name="symbols" id="sym">
                            <label for="sym">Simboli</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type='submit' class='btn btn-primary'>Genera</button>
            <button type='reset' class='btn btn-secondary'>Reset</button>
        </form>
    </main>
</body>

</html>