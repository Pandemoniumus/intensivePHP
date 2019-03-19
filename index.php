<?php

    require_once 'parts/header.php';

    $products = $connect->query("SELECT * FROM products");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);

/*
echo  "<pre>";
var_dump($products);
echo "</pre>"*/


?>

    <div class="main">


        <? foreach ($products as $product) { ?>

            <div class="card">
            <a href="product.php">
                <img src="img/<?= $product['img']?>" alt="<?= $product['title']?>">
            </a>
            <div class="label"><?= $product['rus_name']?> (<?= $product['price']?>)</div>
            <button type="submit">Добавить в корзину</button>
        </div>

       <? } ?>

    </div>

</body>
</html>

