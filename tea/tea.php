<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet">
    <title>Yummy Tea</title>
</head>

<body class="green">
    <img class="logo" alt="logo" src="img/logo.png">
    <div class="wallets">
        <?php
        session_start();
        if (isset($_POST["myradio"])) {
            $_SESSION["wallet"] = $_POST['myradio'];
        }
        echo '
            <p>' . $_SESSION["money"] . '$</p>
            ';
        if ($_SESSION["wallet"] == 'girls') {
            echo '
            <img alt="pink" src="img/walletPink.png">
                ';
        } else {
            echo '
            <img alt="black" src="img/guesss.png">
        ';
        }
        ?>
    </div>
    <form action="menu.php" method="post">
        <input type="submit" value="" class="menu">
    </form>
    <form action="cup.php" method="post">
        <input type="submit" value="" class="menu cup">
    </form>
    <div class="wrapper">
        <?php
        if (isset($_POST['work'])) {
            if ($_POST['work'] == "washer") {
                $_SESSION["role"] = "washer";
                header("Location: noMoneyPage.php");
                exit;
            }  else if ($_POST['work'] == "drink") {
                $_SESSION["role"] = "drink";
            } else if ($_POST['work'] == "barista") {
                $_SESSION['role'] = "barista";
                header("Location: barista.php");
            }
        } 
        if (isset($_POST["priceTea"])) {
            $_SESSION["priceTea"] = $_POST["priceTea"];
            $_SESSION["teaColor"] = $_POST["teaColor"];
        }
        if (isset($_POST["size"])) {
            $_SESSION["size"] = $_POST["size"];
        }

        ?>
        <form action="preparing.php" method="post">
            <h1>Please choose the options of tea</h1>
            <p>water
                <input type="range" name="water" value="50" min="50" max="1000" step="50" class="slider" oninput="this.nextElementSibling.value=this.value">
                <output>50</output>
            </p>
            <p>honey
                <input type="range" name="honey" value="0" min="0" max="12" step="1" class="slider" oninput="this.nextElementSibling.value=this.value">
                <output>0</output>
            </p>
            <input type="checkbox" name="Pricelemon" value="5" id="lemon">
            <label for="lemon">Lemon - <b>+5$</b></label>
            <input type="submit" class="subTea" value="confirm the choice">
        </form>
        <div class="priceTea">
            <p>Each 50 ml of water cost - 2$;</p>
            <p>Each 1 teaspoon of honey cost - 5$;</p>
        </div>
    </div>
</body>

</html>