<?php

class CollectionModel
{
    public $id;
    public $collectionName;
    
    function __construct() {
        $this->id = "";
        $this->collectionName = "";
    }
    
    public static function listAll() {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM COLLECTION";
        $result = $mysqli->query($query);
        $dscollection = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $collection = new CollectionModel();
                $collection->collectionName = $row["collectionName"];
                $collection->id = $row["id"];     
                $dscollection[] = $collection; //add an item into array
            }
        }
        $mysqli->close();
        return $dscollection;
    }
    public static function find($keyword) {
        require_once("config/dbconnect.php");
        
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM COLLECTION WHERE collectionName LIKE '%$keyword%'";
        $result = $mysqli->query($query);
        $dscollection = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $collection = new CollectionModel();
                $collection->collectionName = $row["collectionName"];
                $collection->id = $row["id"];     
                $dscollection[] = $collection; //add an item into array
            }
        }
        $mysqli->close();
        return $dscollection;
    }

    public static function add($collection)
    {
        $mysqli = connect();
        
        $mysqli->query("SET NAMES utf8");

        $macollection = $collection->id;
        $collectionname = $collection->collectionName;


        $query = "INSERT INTO COLLECTION values ($macollection, '$collectionname')";
        
        if ($mysqli->query($query))        
            return 1;        
        return 0;
    }

    public static function get($macollection) {
        $mysqli = connect();
        
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM COLLECTION WHERE id='$macollection'";
        $result = $mysqli->query($query);
       
        if  ($row = $result->fetch_object() ) {
            $collection = new CollectionModel();
            $collection->collectionName = $row->TenCollection;
            $collection->id = $row->id;     
        }

        $mysqli->close();
        return $collection;
    }

    public static function delete($collection)
    {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "DELETE FROM COLLECTION WHERE id=$collection";
        $r = 0;
        if ($mysqli->query($query))       
            $r = 1;
        $mysqli->close();
        return $r;
        
    }
}
?>
