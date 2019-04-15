<?php

class TaskModel
{
    public $id;
    public $TASKNAME;
    
    function __construct() {
        $this->id = "";
        $this->TASKNAME = "";
        $this->DESCRIPTION = "";
        $this->STARTDATE = "";
        $this->DUEDATE = "";
        $this->CREATEDATE= "";
        $this->COLLECTIONID= "";
        $this->STATUS= "";
    }
    
    public static function listAllTask() {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM TASK";
        $result = $mysqli->query($query);
        $dstask = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $task = new TaskModel();
                $task->TASKNAME = $row["taskName"];
                $task->id = $row["id"];     
                $dstask[] = $task; //add an item into array
            }
        }
        $mysqli->close();
        return $dstask;
    }
    public static function find($keyword) {
        require_once("config/dbconnect.php");
        
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM TASK WHERE taskName LIKE '%$keyword%'";
        $result = $mysqli->query($query);
        $dstask = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $task = new TaskModel();
                $task->TASKNAME = $row["taskName"];
                $task->id = $row["id"];     
                $dstask[] = $task; //add an item into array
            }
        }
        $mysqli->close();
        return $dstask;
    }

    public static function addTask($task)
    {
        $mysqli = connect();
        
        $mysqli->query("SET NAMES utf8");

        $matask = $task->id;
        $taskname = $task->TASKNAME;
        $mota = $task->DESCRIPTION;
        $ngaybd = $task->STARTDATE;
        $ngaykt = $task->DUEDATE;
        $ngaytao = $task->CREATEDATE;
        $mabst = $task->COLLECTIONID;
        $trangthai = $task->STATUS;

        $query = "INSERT INTO TASK values ($matask, '$taskname', '$mota', '$ngaybd', '$ngaykt', '$ngaytao', '$mabst', '$trangthai')";
        
        if ($mysqli->query($query))        
            return 1;        
        return 0;
    }

    public static function get($matask) {
        $mysqli = connect();
        
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM TASK WHERE id='$matask'";
        $result = $mysqli->query($query);
       
        if  ($row = $result->fetch_object() ) {
            $task = new TaskModel();
            $task->TASKNAME = $row->taskName;
            $task->id = $row->id;     
            $task->DESCRIPTION = $row->description;
            $task->STARTDATE = $row->startDate;   
            $task->DUEDATE = $row->NgayKetThuc;   
            $task->CREATEDATE = $row->createDate;   
            $task->COLLECTIONID = $row->collectionId;   
            $task->STATUS = $row->status;  

        }

        $mysqli->close();
        return $task;
    }

    public static function deleteTask($matask)
    {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "DELETE FROM TASK WHERE id=$matask";
        $r = 0;
        if ($mysqli->query($query))       
            $r = 1;
        $mysqli->close();
        return $r;
        
    }
}
?>
