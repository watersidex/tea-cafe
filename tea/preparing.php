<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preparing Tea</title>
</head>

<body class="cupCakes">
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
        if (!isset($_SESSION["priceTea"])) {
            $_SESSION["priceTea"] = 10;
        }
        if (!isset($_SESSION["size"])) {
            $_SESSION["size"] = 150;
        }
        echo '<p><b>the kettle boiled</b><p>';
        $cupsCunt = '';
        $honey = $_POST["honey"];
        $water = $_POST["water"];
        // 2 ложки меду / 200 мл = 0.01 ложка меду * 50 мл = 0.5 ложки меду на 50 мл;
        $saveHoney = $honey / $water * 50; //скільки меду йде на кожних 50 мл води;
        $cupHoney = 0;
        $background = '';
        if ($_SESSION["teaColor"] == 'greenTea') {
            $background = 'background-color: darkseagreen;';
        } else if ($_SESSION["teaColor"] == 'fruitTea') {
            $background = 'background-color: salmon;';
        } else if ($_SESSION["teaColor"] == 'chamomileTea') {
            $background = 'background-color: #F9E79F ;';
        } else if ($_SESSION["teaColor"] == 'herbTea') {
            $background = 'background-color: #196F3D;';
        } else if ($_SESSION["teaColor"] == 'blackTea') {
            $background = 'background-color: ##AF601A;';
        } else {
            $background = 'background-color: darkseagreen;';
        }
        $waterHeight = 90 / ($_SESSION["size"] / 50); // 90 висота повної кружки, ділимо на кількість наливань;
        $_SESSION["Pricelemon"] = 0;
        $_SESSION['priceHoney'] = $honey * 5;
        $_SESSION['priceWater'] = $water / 50 * 2;
        while ($water > 0) {
            for ($i = 50; $i <= $_SESSION["size"] && $water > 0; $i += 50, $water -= 50, $cupHoney += $saveHoney) {
                echo "<p>poured $i ml</p>";
                if ($water == 50 || $i == $_SESSION["size"]) {
                    $cupsCunt .= '
                        <div class="cup-wrap">
                    ';
                    if (isset($_POST["Pricelemon"])) {
                        $cupsCunt .= '
                            <img class="lemonade" alt="lemonade" src="img/lemons.png">      
                        ';
                    }
                    $cupsCunt .= '
                            <div class="cupp">
                                <div class="water" style="height: ' . ($waterHeight * $i / 50) . 'px;' . $background . '"></div>
                            </div>
                        </div>
                    ';
                    if ($water == 50) {
                        echo "<p><b>water ran out</b></p>";
                    } else if ($i == $_SESSION["size"]) {
                        echo "<p><b>cupp full</b></p>";
                    }
                }
            }

            echo "<p>added $cupHoney teaspoons of honey</p>";
            $cupHoney = 0;
            if (isset($_POST["Pricelemon"])) {
                echo "
                <p>added 1 slise of lemon</p>
                ";
                $_SESSION["Pricelemon"] = 5;
            }
        }
        $_SESSION["cupsCunt"] = $cupsCunt;
        echo $cupsCunt;
        ?>
        <form method="post" action="end.php">
            <input type="submit" class="subTea" value="continue">
        </form>
    </div>
</body>

</html>