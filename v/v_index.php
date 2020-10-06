<?php

?>

<?=nl2br($text)?>
<? if($can_edit): ?>
<hr/>
<a href="page/edit/<?=$id?>">Редактировать</a>
<hr/>
<? endif; ?>