<h2>
    Корзина
</h2>
<?php foreach ($basket as $item):?>
    <div class = "div-Basket" id="item_<?=$item['basket_id']?>">
        <a href="/product/card/?id=<?=$item["good_id"]?>">
            <?=$item['name']?> <br>
            <img width="50" src="/img/<?=$item["image"]?>"><br>
            <br>
            Цена: <?=$item['price']?>  <br>
        </a>
        <button class="delete" data-id="<?=$item['basket_id']?>">Удалить</button><hr>
    </div>
<?php endforeach;?>

<script>



</script>
