<?php
require($_SERVER["DOCUMENT_ROOT"]."/db.php");
require($_SERVER["DOCUMENT_ROOT"]."/news.php");
$newsList=news::getList();
?>
<html>
    <head>
        <style>
            table {
                font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
                font-size: 14px;
                text-align: left;
                border-collapse: collapse;
                border-radius: 20px;
                box-shadow: 0 0 0 10px #F2906B;
                color: #452F21;
            }
            th {
                padding: 10px 8px;
                background: white;
            }
            table th:first-child {
                border-top-left-radius: 20px;
            }
            table th:last-child {
                border-top-right-radius: 20px;
            }
            td {
                border-top: 10px solid #F2906B;
                padding: 8px;
                background: white;
            }
            table td:first-child {
                border-bottom-left-radius: 20px;
            }
            table td:last-child {
                border-bottom-right-radius: 20px;
            }
        </style>
        <script>
            function onload () {
                for (let child of document.getElementsByClassName("news-description")) {
                    if(child.clientHeight < 80) {
                        child.parentNode.children[child.parentNode.children.length - 1].outerHTML = "";
                        child.style.marginBottom = "10px";
                    } else {

                        child.style.height = "5.5em"
                    }
                }
            }
            function switch_text(id, button) {
                let e = document.getElementById(id);
                if (e.style.height != "auto") {
                    e.style.height = "auto";
                    button.innerText = "Свернуть";
                } else {
                    e.style.height = "5.5em";
                    button.innerText = "Читать далее...";
                }
            }

        </script>
    </head>
    <body onload="onload()">
    <table>
        <tr><td>ID</td><td>Название новости</td><td>Действия</td></tr>
        <?php foreach($newsList as $arNews):?>
            <tr>
                <td><?=$arNews["id"];?></td>
                <td><?=$arNews["name"];?></td>
                <td><a href="/delete.php?id=<?=$arNews["id"];?>">
                        Удалить
                    </a><br/>
                </td>
            </tr>
        <?php endforeach;?>
    </table>

    </body>
</html>
