<?php
    session_start();
    require_once 'db/db.php';

    $cats = $connect->query("SELECT * FROM cats");
    $cats = $cats->fetchAll(PDO::FETCH_ASSOC);


   /* echo  "<pre>";
    var_dump($cats);
    echo "</pre>"*/


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Главная</a></li>
        <? foreach ($cats as $cat) {?>
        <li><a href="index.php?cat=<? echo $cat['name']?>"><? echo $cat['rus_name']; ?></a></li>
        <? } ?>
        <li><?php
            if ($_SESSION['totalQuantity']){ ?>
                <a href="cart.php">Корзина <span style="font-weight: 300">(Товаров: <?= $_SESSION['totalQuantity']?> на сумму <?= $_SESSION['totalPrice']?> руб)</span></a>
            <?php } else { ?>
            <a href="#">Ваша корзина пуста :(</a>
            <?php } ?>

        </li>
    </ul>
</nav>
<hr>