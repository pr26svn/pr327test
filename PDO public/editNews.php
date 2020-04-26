<?php

require($_SERVER["DOCUMENT_ROOT"] . "/models/DB.php");
require($_SERVER["DOCUMENT_ROOT"] . "/controlles/news.php");
if(isset($_POST["id"]))
{
    $news=news::updated ($_POST["id"], $_POST);
}
$new=news::getByID ($_GET["id"]);
?>

<html>
<head>
    <meta charset="utf-8">
    <title>
        Редактирование новости
    </title>
</head>
<body>
<form method="post">
    <input type="hidden" name="id" value="<?=$_GET["id"]?>">
    <p>Название</p>
    <textarea style="width: 500px;" name="name"><?=$new['name']?></textarea><br>
    <p>Краткое описание</p>
    <textarea style="width: 500px;height: 50px;"name="short_description" ><?=$new['short_description']?></textarea><br>
    <p>Картинка</p>
    <img src="<?=$new['pic']?>" width="500px" height="500px"/><br>
    <textarea style="width: 500px;height: 50px;"name="pic"><?=$new['pic']?></textarea><br>
    <p>Описание</p>
    <textarea style="width: 500px;height: 250px;"name="description"><?=$new['description']?></textarea><br>
    <a href="/news.php">Назад</a>
    <input type="submit" value="Применить">

</form>
</body>
</html>
