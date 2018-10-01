<?php
    include '../conf/db.php';
    include '../functions.php';

    $post_prepared = false;
    $uid = getUserID();
    $result = $conn->query
    ("
                SELECT count(post_id) as 'value' FROM post_img i 
                LEFT JOIN post p ON i.post_id = p.id
                LEFT JOIN user u ON u.id = p.user_id
                WHERE u.id = $uid
    ");

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            if($row['value'] >= 24) /// 24 arts for day
            {
                $post_prepared = true;
            }
        }
    }

    if(!$post_prepared)
        include('add_pics.php');
    else
        include('add_tags.php');

?>