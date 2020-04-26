<?php



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

    public static function updated($id,$data = array()){
        $data["id"]=$id;

        $result = DB::run("UPDATE newss SET name = :name, short_description = :short_description, pic = :pic, description = :description where id = :id",$data);
        return $result;



    }
}