<?php

    require_once 'parts/header.php';

    if (isset($_GET['cat'])){
        $currentCat = $_GET['cat'];

        $products = $connect->query("SELECT * FROM products 
                                     JOIN cats ON cat_id=cats.id AND name='$currentCat'");
        $products = $products->fetchAll(PDO::FETCH_ASSOC);
        if (!$products){
            die("Такой категории не найдено");
        }

    } else {
        $products = $connect->query("SELECT * FROM products");
        $products = $products->fetchAll(PDO::FETCH_ASSOC);
    }



/*
echo  "<pre>";
var_dump($products);
echo "</pre>";
*/


?>

    <div class="main">

        <?
        if ($products){
            foreach ($products as $product) { ?>

                <div class="card">
                    <a href="product.php?product=<?=$product['title'] ?>">
                        <img src="img/<?= $product['img']?>" alt="<?= $product['title']?>">
                    </a>
                    <div class="label"><?= $product['rus_name']?> (<?= $product['price']?> рублей)</div>
                    <!--<button type="submit">Добавить в корзину</button>-->
                    <?php require ('parts/add-form.php'); ?>

                </div>

            <? };
        } else {
            echo  "<h1 style='text-align: center'>";
            echo 'Данной категории товаров не существует!<br> Выберите другую категорию в меню.';
            echo "</h1>";
        };
        ?>


    </div>

</body>
</html>

