<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet">
    <title>Size of cup</title>
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
        <form method="post" action="tea.php">
            <h2>Please choose the size of cup</h2>
            <p>
                <input type="radio" name="size" value="150" checked id="cupS">
                <label for="cupS">Littel cup - 5$</label>

                <input type="radio" name="size" value="250" id="cupM">
                <label for="cupM">Middel cup - 10$</label>

                <input type="radio" name="size" value="350" id="cupB">
                <label for="cupB">Big cup - 15$</label>
            </p>
            <input type="submit" class="subTea" value="continue">
        </form>
    </div>
</body>

</html>