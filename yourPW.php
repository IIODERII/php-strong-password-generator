<?php
session_start();

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
        <h2>La tua Password è
            <?php echo $_SESSION['password']; ?>
        </h2>
    </main>
</body>

</html>