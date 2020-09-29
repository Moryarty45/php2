<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    <link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>
<body>
<h3>Галерея</h3>
<div class="gallery">
    {%for item in images%}
    <div class="gallery__item photo">
        <a rel='gallery' href='big.php?idx={{item.idx}}'><img src='img/small/{{item.address}}'></a>
    </div>
    {%endfor%}
</div>
</body>
</html>
