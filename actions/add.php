<?php

session_start();
require_once '../db/db.php';

/*echo  "<pre>";
var_dump($_POST);
echo "</pre>";*/

if (isset($_POST['id'])){

   /* unset($_SESSION['totalQuantity']);
    unset($_SESSION['totalPrice']);
    unset($_SESSION['cart']);*/

    $id = $_POST['id'];
    $product = $connect->query("SELECT * FROM products WHERE id = '$id'");
    $product = $product->fetch(PDO::FETCH_ASSOC);

    /*echo  "<pre>";
    var_dump($product);
    echo "</pre>";*/

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$id] = [
            'title' => $product['title'],
            'price' => $product['price'],
            'rus_name' => $product['rus_name'],
            'img' => $product['img'],
            'quantity' => 1,
        ];
    }


    $_SESSION['totalQuantity'] = $_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] += 1 : 1;
    $_SESSION['totalPrice'] = $_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $product['price'] : $product['price'];

   /* echo  "<pre>";
    var_dump($_SESSION);
    echo "</pre>";*/
}

header('Location:' . $_SERVER['HTTP_REFERER']);
//header("Location: ../index.php");