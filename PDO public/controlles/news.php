<?php

if(isset($_GET['function'])=='deleted' )
{
    if(($id = $_GET['id']) != 0)
        news::deleted($id);

}

class news
{
    public static function getList(){
        $all = DB::run('SELECT id, name FROM newss')->fetchAll();
        return $all;
    }
    public static function getByID($id){
                $row = DB::run("SELECT * FROM newss WHERE id=?", array($id))->fetch();
                return $row ;
    }      
    
	public static function deleted($id){
        DB::run("DELETE FROM newss WHERE id=?",array($id));
    }
	
}