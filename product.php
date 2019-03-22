<?php require_once 'db/db.php';

if (isset($_GET['product'])){
    $currentProduct = $_GET['product'];
    $product = $connect->query("select * from products WHERE title='$currentProduct'");
    $product = $product->fetch(PDO::FETCH_ASSOC);

    if (!$product){
        header("location: index.php");
    }

    require_once 'parts/header.php';
/*
    echo  "<pre>";
    var_dump($product);
    echo "</pre>";
*/

}

?>

<div class="product-card">
    <a href="index.php">Вернуться на главную</a>

    <h2><?= $product['rus_name']?> (<?= $product['price']?> рублей)</h2>
    <div class="descr"><?= $product['descr']?></div>
    <img width="300" src="img/<?= $product['img']?>" alt="Фото">
    <!--<button type="submit">Добавить в корзину</button>-->
    <?php require ('parts/add-form.php'); ?>
</div>
