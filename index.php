<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulaire de hackers poulette, n'hésitez pas à nous contacter !">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>form</title>
</head>
<body>
    <?php include './assets/php/form-validation.php' ?>
    <section class="formulaire">
        <div id="formulaire-ensemble">
            <div class="header-form">
            <img src="./assets/img/hackers-poulette-logo.png" alt="hackers-poulette-logo" draggable="false">
            <h1> Contact US</h1>
            </div>
            <div class="body-form">
                <?php include './assets/php/form.php' ?>
            </div>
        </div>
    </section>
    <script src="./assets/js/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
    <script>
    console.log(screen.width);
    gsap.from(".message",{
        x:-1000,
        duration: 2,
        ease: "power4.out",
    })
    gsap.to(".message",{
        x:(screen.width/2) + 200,
        duration: 1,
        ease: "power4.out",
        delay:3,
        display:"none"
    })
    </script>
</body>
</html>