<?php
require($_SERVER["DOCUMENT_ROOT"]."/db.php");
require($_SERVER["DOCUMENT_ROOT"]."/news.php");
$newsList=news::getList();
?>
<html>
    <head>
        <style>
            .table_blur {
                background: #f5ffff;
                border-collapse: collapse;
                text-align: left;
            }
            .table_blur th {
                border-top: 1px solid #777777;
                border-bottom: 1px solid #777777;
                box-shadow: inset 0 1px 0 #999999, inset 0 -1px 0 #999999;
                background: linear-gradient(#9595b6, #5a567f);
                color: white;
                padding: 10px 15px;
                position: relative;
            }
            .table_blur th:after {
                content: "";
                display: block;
                position: absolute;
                left: 0;
                top: 25%;
                height: 25%;
                width: 100%;
                background: linear-gradient(rgba(255, 255, 255, 0), rgba(255,255,255,.08));
            }
            .table_blur tr:nth-child(odd) {
                background: #ebf3f9;
            }
            .table_blur th:first-child {
                border-left: 1px solid #777777;
                border-bottom:  1px solid #777777;
                box-shadow: inset 1px 1px 0 #999999, inset 0 -1px 0 #999999;
            }
            .table_blur th:last-child {
                border-right: 1px solid #777777;
                border-bottom:  1px solid #777777;
                box-shadow: inset -1px 1px 0 #999999, inset 0 -1px 0 #999999;
            }
            .table_blur td {
                border: 1px solid #e3eef7;
                padding: 10px 15px;
                position: relative;
                transition: all 0.5s ease;
            }
            .table_blur tbody:hover td {
                color: transparent;
                text-shadow: 0 0 3px #a09f9d;
            }
            .table_blur tbody:hover tr:hover td {
                color: #444444;
                text-shadow: none;
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
    <table class="table_blur">
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
