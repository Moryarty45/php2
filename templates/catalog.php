<h2>
    Каталог
</h2>

<?php foreach ($catalog as $good): ?>
    <div class="product">
        <a href="/product/card/?id=<?=$good["id"]?>">
            <b><?=$good['name']?></b><br>
            <img width="120" src="/img/<?=$good["image"]?>"><br>
            Цена: <?=$good['price']?><br>
        </a>
            <button class="buy" data-id="<?=$good['id']?>">Купить</button><hr>
    </div>
<?php endforeach; ?>

<a href="?page=<?=$page?>">Еще</a>

<script>


</script>