}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">-0
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wash the dishes!</title>
</head>

<body class="office">
    <img class="logo" alt="logo" src="img/logo.png">
    <div class="wrapper">
        <?php
        session_start();
        if (!isset($_SESSION["earnMoney"])) {
            $_SESSION["earnMoney"] = 0;
        }
        if ($_SESSION["role"] == "washer") {
            echo "
                <h2>Hi I'm Anna, and I can help u with dishes!</h2>
                <p>I'm an administrator in this cafe</p>
                <p>U can earn some money, and help our cafe</p>
                <p>U will have 1$ for 1 cup</p>
                <p class='p'>one cup - 1$</p>
            ";
            if (isset($_POST['clean']))  {
                $_SESSION["earnMoney"] += 1;
            }
            if (($_SESSION["earnMoney"] % 20) == 0 && $_SESSION["earnMoney"] != 0) {
                echo '
                <p>CONGRATULATIONS YOU RECEIVED BONUS +$3</p>
                <p>KEEP WORKING AND EARN MORE</p>
                ';
                $_SESSION["earnMoney"] += 3;
            }
        } else {
            echo "
                <h2>Hi I'm Anna, and I can help u with dishes!</h2>
                <p>I'm an administrator in this cafe</p>
                <p>It's very bad that you did this, but this can be fixed</p>
                <p>I always say that, that's my thing</p>
                <p>U will have 0.5$ for 1 cup</p>
                <p class='p'>one cup - 0.5$</p>
            ";
            if (isset($_POST['clean']))  {
                $_SESSION["earnMoney"] += 0.5;
            }
            if ($_SESSION["earnMoney"] >= ($_SESSION["totalPrice"] - $_SESSION["money"])) {
                echo "
                        <p>HOORAY YOU FINISH WASHING THE DISHES!!!</p>
                        <p>You can go and drink you're tea now</p>
                        <p>Have a nice day!</p>
                        <form method='post' action='total.php'>
                        <input type='submit' class='subTea' name='washer' value='go and drink ru tea'>
                        </form>
                    ";
            }
        }
        ?>
        <hr>
        <div class="dishWrapper">
            <img class="dish" alt="dish" src="img/dishwasher.jpg">
            <?php
            if (isset($_POST['newDirtyCup']) || !$_POST) {
                $dirtyAray = [
                    '<button type="submit" name="dirty" value="dirty" class="subGlass"></button>',
                    '<button type="submit" name="dirty" value="dirty" class="subGlass"></button>',
                    '<button type="submit" name="dirty" value="dirty" class="subGlass"></button>',
                    '<button type="submit" name="dirty" value="dirty" class="subGlass"></button>',
                    '<button type="submit" name="dirty" value="dirty" class="subGlass"></button>',
                    '<button type="submit" name="dirty" value="dirty" class="subGlass"></button>',

                ];
                $firstAray = [];
                $secondAray = [];
                $cleanAray = [];
            } else {
                $dirtyAray = json_decode($_POST["dirtyAray"]);
                $firstAray = json_decode($_POST["firstAray"]);
                $secondAray = json_decode($_POST["secondAray"]);
                $cleanAray = json_decode($_POST["cleanAray"]);
            }

            if (isset($_POST['dirty'])) {
                array_pop($dirtyAray);
                array_push($firstAray, '<button type="submit" name="first" value="first" class="subGlass"></button>');
            }

            if (isset($_POST['first'])) {
                array_pop($firstAray);
                array_push($secondAray, '<button type="submit" name="second" value="second" class="subGlass"></button>');
            }

            if (isset($_POST['second'])) {
                array_pop($secondAray);
                array_push($cleanAray, '<button type="submit" name="clean" value="clean" class="subGlass"></button>');
            }

            if (isset($_POST['clean'])) {
                array_pop($cleanAray);
                array_push($dirtyAray, '<button type="submit" name="dirty" value="dirty" class="subGlass"></button>');
            }

            echo '
            <form method="post" action="noMoneyPage.php">
                <input type="hidden" name="dirtyAray" value=\'' . json_encode($dirtyAray) . '\'>
                <input type="hidden" name="firstAray" value=\'' . json_encode($firstAray) . '\'>
                <input type="hidden" name="secondAray" value=\'' . json_encode($secondAray) . '\'>
                <input type="hidden" name="cleanAray" value=\'' . json_encode($cleanAray) . '\'>
                <div class="dirty fix">
                ';
            for ($i = 0; $i < count($dirtyAray); $i++) {
                echo $dirtyAray[$i];
            }
            echo '
                </div>
                <div class="first fix">
                ';
            for ($i = 0; $i < count($firstAray); $i++) {
                echo $firstAray[$i];
            }
            echo '
                </div>
                <div class="second fix">
            ';
            for ($i = 0; $i < count($secondAray); $i++) {
                echo $secondAray[$i];
            }
            echo '
                </div>
                <div class="clean fix">
            ';
            for ($i = 0; $i < count($cleanAray); $i++) {
                echo $cleanAray[$i];
            }
            echo '
                </div>
            </form>
            ';
            ?>
        </div>
        <hr>
        <?php
        echo ' 
        <p>You collected:' . $_SESSION["earnMoney"] . '$</p>
        ';
        ?>
            <form action="total.php" method="post">
            <?php
            if ($_SESSION["role"] == "washer") {
                echo '
                <input type="submit" class="subTea" value="finish washing mags">
                ';
            }
            ?>
            </form>
        <form action="results.php" method="post">
            <input type="submit" class="subTea" value="show you're results">
        </form>
    </div>
    <img class="anna" alt="anna" src="img/anna.png">
</body>

</html>