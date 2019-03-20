<?php require_once 'parts/header.php';

if (isset($_GET['product'])){
    $currentProduct = $_GET['product'];
    $product = $connect->query("select * from products WHERE title='$currentProduct'");
    $product = $product->fetch(PDO::FETCH_ASSOC);

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
    <form action="actions/add.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id']?>">
        <input type="submit" value="Добавить в корзину">
    </form>
</div>
