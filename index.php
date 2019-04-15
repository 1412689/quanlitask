<?php
require_once("./controller/Home.php");
require_once("./controller/Task.php");
require_once("./model/Task.php");
require_once("./controller/Collection.php");
require_once("./model/Collection.php");
require_once("config/dbconnect.php"); 

$action = "";
if (isset($_REQUEST["action"]))
{    
    $action = $_REQUEST["action"];
}
 
switch ($action)
{
    case "list":      
        $controller = new TaskController();
        $controller->listAllTask();
        break;
    case "search":
        $controller = new TaskController();
        $keyword = $_REQUEST["keyword"];
        $controller->searchTask($keyword);
        break;
    case "add":
        $controller = new TaskController();
        $controller->addTask();
        break;
    case "show":
        $controller = new TaskController();
        $controller->showTask();
        break;
    case "delete":
        $controller = new TaskController();
        $controller->deleteTask();
        break;
    case "listcollection":
        $controller = new CollectionController();
        $controller->listAll();
        break;

    case "addcollection":
        $controller = new CollectionController();
        $controller->add();
        break;
    case "searchcollection":
        $controller = new CollectionController();
        $keyword = $_REQUEST["keyword"];
        $controller->search($keyword);
        break;
    case "showcollection":
        $controller = new CollectionController();
        $controller->show();
        break;
    case "deletecollection":
        $controller = new CollectionController();
        $controller->delete();
        break;
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}

?>
