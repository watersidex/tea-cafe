<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay whith card</title>
</head>

<body>
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
    <div class="wrapper">
        <?php
        if (isset($_POST["card"]) || isset($_POST["blik"])) {
            $_SESSION["totalPrice"] = $_SESSION["priceTea"] + $_SESSION["size"] +$_SESSION["Pricelemon"] + $_SESSION['priceWater'] + $_SESSION['priceHoney'];
            
            echo '
                <p>From you '.$_SESSION["totalPrice"].'$</p>
                ';
                if (isset($_POST["card"])) {
                    echo '
                    <p>Please,put your card on the terminal</p>
                    <img class="card terminal" alt="terminal" src="img/verifone.png">
                ';
            } else {
                echo '
                <p>Please,put your phone on the terminal</p>
                    <img class="blik terminal" alt="terminal" src="img/verifone.png">
                    ';
                }
                echo '
                <form method="post" action="total.php">
                    <input type="submit" class="subTea" name="pay" value="pay">
                </form>
            ';
        }
        if (isset($_POST["noMoney"])) {
            $_SESSION["totalPrice"] = $_SESSION["priceTea"] + $_SESSION["size"] +$_SESSION["Pricelemon"] + $_SESSION['priceWater'] + $_SESSION['priceHoney'];
            echo '
                <h2>Oh my god this is terrible!!!</h2> 
                <p>You must work the amount below!</p>
                <p>From you '.$_SESSION["totalPrice"].'$</p>
                <p>But if u want to earn some money</p> 
                <p>u too must go to this page and work</p>
                <p>Press the button below and wash the dishes 🠗</p>
                <form method="post" action="washingMugs.php">
                    <input type="hidden" name="newDirtyCup" value="newDirtyCup">
                    <input type="submit" class="subTea" value="wash the dishes">
                </form>
                '; 
            }
            ?>
    </div>
</body>

</html>