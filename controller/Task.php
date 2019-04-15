<?php

class TaskController
{
    public function listAllTask()
    {
        $data = TaskModel::listAllTask();        
        $VIEW = "./view/Task.phtml";
        require("./template/template.phtml");
    }
    
    public function searchTask()
    {
        $keyword = $_REQUEST["keyword"];
        $data = TaskModel::find($keyword);
        $VIEW = "./view/Task.phtml";
        require("./template/template.phtml");
    }

    public function addTask()
    {
        $data = "";
        if (isset($_REQUEST["id"]))
        {
            $task = new TaskModel();
            $task->id = $_REQUEST["id"];
            $task->TASKNAME = $_REQUEST["taskName"];
            $task->DESCRIPTION = $_REQUEST["description"];
            $task->STARTDATE = $_REQUEST["startDate"];
            $task->DUEDATE = $_REQUEST["dueDate"];
            $task->CREATEDATE = $_REQUEST["createDate"];
            $task->COLLECTIONID = $_REQUEST["collectionId"];
            $task->STATUS = $_REQUEST["status"];
            $result = TaskModel::addTask($task);
            if ($result == 1)
                $data = "Thêm thành công";
            else
                $data = "Thêm bị lỗi";                
        }
        
        $VIEW = "./view/ThemTask.phtml";
        require("./template/template.phtml");
    }

    public function showTask()
    {
        $id = $_REQUEST["id"];
        $data = TaskModel::get($id);
        $VIEW = "./view/ThongTinTask.phtml";
        require("./template/template.phtml");
    }

    public function deleteTask()
    {
        $id = $_REQUEST["id"];
        $result = TaskModel::deleteTask($id);        
        $data = TaskModel::listAllTask();        
        $VIEW = "./view/Task.phtml";
        require("./template/template.phtml");
    }
}
?>
