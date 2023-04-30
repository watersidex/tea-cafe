<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet">
    <title>Welcome to the Tea-Cafe<3</title>
</head>

<body>
    <img class="logo" alt="logo" src="img/logo.png">
    <div class="wrapper">
        <h1>Tea-Cafe</h1>
        <p>Hi, It's online cafe, were u can order the different tipe of tea:)</p>
        <p>While you're still here, please choose your wallet</p>
        <form method="post" action="tea.php">
            <div class="girlsBoys">
                <input type="radio" name="myradio" value="girls" class="girls" id="girls">
                <label for="girls">
                </label>
                <input type="radio" name="myradio" value="boys" class="boys" id="boys">
                <label for="boys">
                </label>
            </div>
            <label for="work" class="work">
                <select id="work" name="work" class="work">
                    <option value="drink" selected>Drink tea</option>
                    <option value="washer">Be a washer</option>
                    <option value="barista">Be a barista</option>
                </select>
            </label>
            <p>if you want to make an order, click on this button ↓</p>
            <input type="submit" class="subTea" value="make order">
        </form>
        <?php
        session_start();
        //від цілої сумми ($money) - $_SESSION["totalPrice"] = скільки грошей залишилось;
        //якщо $money = 0, то header("Location: noMoneyPage.php");
        $_SESSION["role"] = 'unknown';
        $_SESSION["earnMoney"] = 0;
        $_SESSION["money"] = 200;
        ?>
    </div>
</body>

</html>