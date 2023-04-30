<!DOCTYPE html>
<html lang="en">
    
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barista zone</title>
</head>

<body class="walpers">
    <img class="logo" alt="logo" src="img/logo.png">
    <div class="wallets">
        <?php
        session_start();
        //var_dump($cupsCunt);
        if(isset($_POST["lemOn"])) {
            $previousLemonChoice = $_POST["lemOn"];
        } else {
            $previousLemonChoice = '';
        }
        if(isset($_POST["hOney"])) {
            $previousHoneyChoice = $_POST["hOney"];
        } else {
            $previousHoneyChoice = '';
        }

        if(isset($_POST["tEa"])) {
            $previousTeaChoice = $_POST["tEa"];
        } else {
            $previousTeaChoice = '';
        }

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
        <h2>Hi my name is Tamara!</h2>
        <p>I will teach u, to make tea</p>
        <p>First boil the kettle, then pour water into the cup</p>
        <p>For the second time, put a tea bag and mix</p>
        <p>Add lemon or honey according to the client's wishes</p>
        <p>U will have 15$ from 1 cup of tea</p>
        <p>But if it will be incorrect -10$ for each ingredient</p>
        <div class="barista">
            <form method="post" action="barista.php">
                <label for="teeaa" class="baristaNeeds teaBags">
                    <select name="teaSags" class="selectOptions" name="teaBaags" id="teeaa">
                        <option value="not set">not set</option>
                        <option value="green tea">green tea</option>
                        <option value="black tea">black tea</option>
                        <option value="herb tea">herb tea</option>
                        <option value="chamomile tea">chamomile tea</option>
                        <option value="fruit tea">fruit tea</option>
                    </select>
                </label>
                <input type="checkbox" class="disabled" id="lemon" name="lemoon" value="with lemon">
                <label for="lemon" class="lemonAdd baristaNeeds"></label>
                <input type="checkbox" class="disabled" id="honey" name="honeyy" value="with honey">
                <label for="honey" class="med miod baristaNeeds"></label>
                <input type="checkbox" id="kettleWater" name="ketttle" value="voda" class="checkKettle">
                <label for="kettleWater" class="kettle">
                    <img src="img/kettle.png" alt="kettle">
                </label>
                <div class="cup-wrap">
                    <div class="cupp">
                        <div class="water">
                            </div>
                        </div>
                    </div>
                    <?php
                        $clientTea = rand(0, 4);
                        if ($clientTea == 0) {
                            $clientTea = 'green tea';
                        }
                        if ($clientTea == 1) {
                            $clientTea = 'black tea';
                        }
                        if ($clientTea == 2) {
                            $clientTea = 'herb tea';
                        }
                        if ($clientTea == 3) {
                            $clientTea = 'fruit tea';
                        } else if ($clientTea == 4) {
                            $clientTea = 'chamomile tea';
                        }
                        
                        $clientHoney = rand(0, 1);
                        if ($clientHoney == 0) {
                            $clientHoney = 'without honey';
                        } else if ($clientHoney == 1) {
                            $clientHoney = 'with honey';
                        }
                        $clientLemon = rand(0, 1);
                        if ($clientLemon == 0) {
                            $clientLemon  = 'without lemon';
                        } else if ($clientLemon == 1) {
                            $clientLemon = 'with lemon';
                        }
                        $background = '';
                        
                        ?>
                        <input type="hidden" name="tEa" value="<?=$clientTea?>">
                        <input type="hidden" name="lemOn" value="<?=$clientLemon?>">
                        <input type="hidden" name="hOney" value="<?=$clientHoney?>">
                        <input type="hidden" name="vOda">
                        <input type="submit" class="sub" name="order" value="send order and check">
                    </form>
                    <img class="tamara" alt="tamara" src="img/tamara.png">
                    <img class="table" alt="table" src="img/baristaTaB.png">
                    <p class="orders"><?php
                    echo 'One cup of ' . $clientTea . ' ' . $clientHoney . ' and ' . $clientLemon;
            ?>
        </div>
        <?php
        //спочатку це виконується, і тільки у випадку нового замовлення
        //var_dump($_POST);
        //var_dump($_SESSION);
        if($_POST) {
            if(isset($_POST['lemoon'])) {
                $lemonWith = $_POST['lemoon'];
            } else {
                $lemonWith = 'without lemon';
            }
            if($lemonWith == $previousLemonChoice) {
                $_SESSION["earnMoney"] += 5;
            } else {
                $_SESSION["earnMoney"] -= 10;
                echo '
                <p style="color: red">What are you doing dude! The client wanted tea '.$previousLemonChoice.'!!!</p>
                ';
            }
    
            if(isset($_POST['honeyy'])) {
                $honeyWith = $_POST['honeyy'];
            } else {
                $honeyWith = 'without honey';
            }
            
            if($honeyWith == $previousHoneyChoice) {
                $_SESSION["earnMoney"] += 5;
            } else {
                $_SESSION["earnMoney"] -= 10;
                echo '
                <p style="color: red">What are you doing dude! The client wanted tea '.$previousHoneyChoice.'!!!</p>
                ';
            }
            
            if(!isset($_POST['vOda'])) {
                $_SESSION["earnMoney"] -= 10;
            }

            $teaBB = $_POST['teaSags'];

            if($teaBB == $previousTeaChoice) {
                $_SESSION["earnMoney"] += 5;
            } else {
                $_SESSION["earnMoney"] -= 10;
            }
        }
        
        echo ' 
        <p>You collected:' . $_SESSION["earnMoney"] . '$</p>
        ';
        ?>
        <form action="total.php" method="post">
            <input type="submit" class="subTea" value="finish working">
        </form>
    </div>
    <script>
        let water = document.querySelector(".water")
        teeaa.oninput = function(e) {
            if (teeaa.value == 'not set') {
                water.style.backgroundColor = '#B2EBF2'
            }
            if (teeaa.value == 'green tea') {
                water.style.backgroundColor = 'darkseagreen'
            }
            if (teeaa.value == 'fruit tea') {
                water.style.backgroundColor = 'salmon'
            }
            if (teeaa.value == 'herb tea') {
                water.style.backgroundColor = '#196F3D'
            }
            if (teeaa.value == 'chamomile tea') {
                water.style.backgroundColor = '#F9E79F'
            }
            if (teeaa.value == 'black tea') {
                water.style.backgroundColor = '#AF601A'
            }
        }
    </script>
</body>

</html>