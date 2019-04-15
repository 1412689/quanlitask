<?php

class CollectionController
{
    public function listAll()
    {
        $data = CollectionModel::listAll();        
        $VIEW = "./view/Collection.phtml";
        require("./template/template.phtml");
    }
    
    public function search()
    {
        $keyword = $_REQUEST["keyword"];
        $data = CollectionModel::find($keyword);
        $VIEW = "./view/Collection.phtml";
        require("./template/template.phtml");
    }

    public function add()
    {
        $data = "";
        if (isset($_REQUEST["id"]))
        {
            $collection = new CollectionModel();
            $collection->id = $_REQUEST["id"];
            $collection->collectionName = $_REQUEST["collectionName"];
            $result = CollectionModel::add($collection);
            if ($result == 1)
                $data = "Thêm thành công";
            else
                $data = "Thêm bị lỗi";                
        }
        
        $VIEW = "./view/ThemCollection.phtml";
        require("./template/template.phtml");
    }

    public function show()
    {
        $id = $_REQUEST["id"];
        $data = CollectionModel::get($id);
        $VIEW = "./view/ThongTinCollection.phtml";
        require("./template/template.phtml");
    }

    public function delete()
    {
        $id = $_REQUEST["id"];
        $result = CollectionModel::delete($id);        
        $data = CollectionModel::listAll();        
        $VIEW = "./view/Collection.phtml";
        require("./template/template.phtml");
    }
}
?>
