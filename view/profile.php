<?php
    $session_key = $_SESSION['key'];
    $result = $conn->query(
        "SELECT 
                          TIMESTAMPDIFF(SECOND, CURRENT_TIMESTAMP, l.end) as 'diff', 
                          u.name 'name', 
                          u.banned as 'banned' 
                    FROM login l
                    LEFT JOIN user u ON l.uid = u.id
                    WHERE session_key = '$session_key' 
                    LIMIT 0,1"
    );
    if($result->num_rows > 0)
    {
        $row = $result->fetch_array();
        $name = $row['name'];
        $diff = $row['diff'];

        echo "Hi, <b>" . $name . "</b> ( Session timeout after : " . intval($diff/60) . " min ) <button type=\"submit\" class=\"btn btn-default\" onclick=\"logout();\">Exit</button>";
    }
?>