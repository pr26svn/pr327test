<?php
class news
{
    
    Public static function getList(){
        $all = DB::run("SELECT id, name FROM news")->fetchAll();
        return $all;
    }
    
    Public static function getByID($id){
        $row = DB::run("SELECT * FROM news WHERE id=?", array($id))->fetch();
        return $row ;
    }
Public static function edit($id, $name, $theme)
    {
        DB::run("UPDATE news SET `name` = ?, `description` = ? WHERE `id` = ?", array($name, $theme, $id));
    }

}
?>