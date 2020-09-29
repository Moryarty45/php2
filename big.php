<?php
require_once('config/config.php');
$idx = $_GET["idx"];
$db = DataBase::get_instance();

$query = "SELECT `Popularity` FROM `gallery` WHERE `idx` = {$idx}";
$query1 = "SELECT `address` FROM `gallery` WHERE `idx` = {$idx}";

$rep = $db->selectCell($query);
$src = $db->selectCell($query1);
++$rep;

$query = "UPDATE `gallery` SET `Popularity` = {$rep} WHERE `gallery`.`idx` = {$idx}";
$result = $db->query($query);

$template = $twig->loadTemplate('big.tpl');

echo $template->render(['reputation' => $rep, 'number' => $idx, 'src' => $src]);