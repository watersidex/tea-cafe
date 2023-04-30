<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Have a delicious tea party!<3</title>
</head>

<body>
    <img class="logo" alt="logo" src="img/logo.png">
    <div class="wrapper">
        <?php
        session_start();
            if ($_SESSION["role"] == "drink") {
                echo "
                <p>Thank you for ordering</p>
                <h3>Here's your tea!</h3>
                ".$_SESSION["cupsCunt"]."
                ";
            } else {
                echo "
                    <p>Sorry, but u don't order tea</p>
                ";               
            }
        ?>
        <?php
        ?>
        <p>But we have a gift for you,
        this is such a small cake</p>
        <p>From our cafe <3</p>
        <?php
            if ($_SESSION["wallet"] == 'girls') {
                echo '
                    <img class="cake" alt="cupGirls" src="img/cakeGirls.png">
                ';
            } else {
                echo '
                    <img class="cake" alt="cupBoys" src="img/cakeBoys.png">
                ';
            }
            if (isset($_POST["pay"])) {
                $_SESSION["money"] -= $_SESSION["totalPrice"]; 
                echo $_SESSION["money"]; 
            } else if (isset($_SESSION["role"])) {
                $_SESSION["money"] += $_SESSION["earnMoney"];
                echo $_SESSION["money"];

            }
            if ($_SESSION["money"] < 0) {
                header("Location: noMoneyPage.php");
                exit;
            }
        ?>
        <p>Have a delicious tea party!</p>
        <form method="post" action="tea.php">
            <input type="submit" class="subTea" value="order more tea">
        </form>
        <form method="post" action="ad.php">
        <input type="submit" class="subTea" value="find work see ad">
        </form>
    </div>
</body>

</html>