<?php
// подгружаем и активируем авто-загрузчик Twig-а
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  $dbh = new PDO('mysql:dbname=php2dz3;host=localhost', 'root', '');
} catch (PDOException $e) {
  echo "Error: Could not connect. " . $e->getMessage();
}

// установка error режима
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
  if(isset($_GET['limit'])){
    $limit = $_GET['limit'];
  } else {
    $limit = 5;
  }
  // формируем SELECT запрос
  // в результате каждая строка таблицы будет объектом
  $sql = "SELECT goods.id AS id, goods.name AS name, goods.src AS src, goods.srcBig AS srcBig, goods.descriptionFull AS description, goods.price AS price FROM goods limit $limit";
  $sth = $dbh->query($sql);
  while ($row = $sth->fetchObject()) {
    $data[] = $row;
  }

  print_r($_GET['a']);
  
  // закрываем соединение
  unset($dbh); 

  $loader = new Twig_Loader_Filesystem('templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('autos.tmpl');

  echo $template->render(array (
    'data' => $data,
    'count'=>count($data)
  ));

  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>

