<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tea Menu</title>
</head>

<body>
    <img class="logo" alt="logo" src="img/logo.png">
    <form action="tea.php" method="post">
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
        <div class="menuChange">
                <p>
                    <input type="radio" name="priceTea" checked value="10" id="greenTea" oninput="teaColor.value=this.id">
                    <label for="greenTea">Green tea - <b>10$</b></label>
                </p>
                <p>
                    <input type="radio" name="priceTea" value="15" id="blackTea" oninput="teaColor.value=this.id">
                    <label for="blackTea">Black tea - <b>15$</b></label>
                </p>
                <p>
                    <input type="radio" name="priceTea" value="20" id="herbTea" oninput="teaColor.value=this.id">
                    <label for="herbTea">Herb tea - <b>20$</b></label>
                </p>
                <p>
                    <input type="radio" name="priceTea" value="25" id="fruitTea" oninput="teaColor.value=this.id">
                    <label for="fruitTea">Fruit tea - <b>25$</b></label>
                </p>
                <p>
                    <input type="radio" name="priceTea" value="30" id="chamomileTea" oninput="teaColor.value=this.id">
                    <label for="chamomileTea">Chamomile tea - <b>30$</b></label>
                </p>
                <input type="hidden" name="teaColor" id="teaColor" value="greenTea">
                <input type="submit" class="subTea" value="confirm tea bag">
            </form>
        </div>
    </div>
</body>

</html>