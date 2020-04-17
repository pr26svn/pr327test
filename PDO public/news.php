<?php

require($_SERVER["DOCUMENT_ROOT"]."/models/db.php");
require($_SERVER["DOCUMENT_ROOT"]."/controlles/news.php");


$newsList=NEWS::getList();

?>
<table>
<tr><td>ID</td><td>Название новости</td><td>Действия</td></tr>
<?php foreach($newsList as $arNews):?>
		</tr>
<td><?=$arNews["id"];?></td>
<td><?=$arNews["name"];?></td>
<td><a href="/news.php?function=deleted&id=<?=$arNews["id"];?>">
Удалить
</a><br/>
<a href="/editNews.php?id=<?=$arNews["id"];?>">
Изменить</a>
</td>
</tr>
<?php endforeach; ?>
</table>