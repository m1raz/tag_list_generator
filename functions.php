<?php
    function ctl( $level, $action ) //check trust level
    {
        include 'conf/db.php';
        $result = $conn->query("SELECT * FROM level_action WHERE level = $level AND action = '$action'");
        if($result != false)
        {
            if($result->num_rows > 0)
            {
                return true;
            }
        }
        return false;
    }
    function getUserID()
    {
        include 'conf/db.php';
        session_start();
        $key = $_SESSION['key'];
        $result = $conn->query("SELECT uid FROM login WHERE session_key = '$key'");
        if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                return $row['uid'];
            }
        }
    }