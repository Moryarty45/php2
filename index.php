<?php
require_once('config/config.php');

$db = DataBase::get_instance();

$query = "SELECT * FROM `gallery` WHERE 1 ORDER BY `Popularity`DESC";

$images = $db->select($query);

$template = $twig->loadTemplate('gallery.tpl');
echo $template->render(['images' => $images]);