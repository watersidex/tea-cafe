<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <div class="wrapper">
        <?php
        session_start();
        if (isset($_POST["pay"])) {
            echo ' 
                <p>You need to collect:'.($_SESSION["totalPrice"] - $_SESSION["money"] ).'$</p>
                <p>You collected:'.$_SESSION["earnMoney"].'$</p> 
                '; 
        } else {
            echo '
                <p>You collected:'.$_SESSION["earnMoney"].'$</p> 
                ';
        }
        ?>
        <hr>
        <form action="noMoneyPage.php" method="post">
            <input type="hidden" name="newDirtyCup">
            <input type="submit" class="subTea" value="get back to collecting money">
        </form>
    </div>
</body>
</html>