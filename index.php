<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>form</title>
</head>
<body>
    <?php include './assets/php/form-validation.php' ?>
    <section class="formulaire">
        <div id="formulaire-ensemble">
            <div class="header-form">
            <img src="./assets/img/hackers-poulette-logo.png" alt="hackers-poulette-logo">
            <h1> Contact US</h1>
            </div>
            <div class="body-form">
                <?php include './assets/php/form.php' ?>
            </div>
        </div>
    </section>
    <script src="./assets/js/index.js"></script>
</body>
</html>