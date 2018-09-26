
<?php
    $session_key = $_SESSION['key'];
    $result = $conn->query(
        "SELECT 
                          TIMESTAMPDIFF(SECOND, CURRENT_TIMESTAMP, l.end) as 'diff', 
                          u.name 'name', 
                          u.banned as 'banned' ,
                          u.level as 'level'
                    FROM login l
                    LEFT JOIN user u ON l.uid = u.id
                    WHERE session_key = '$session_key' 
                    LIMIT 0,1"
    );
    $row = '';
    $name = '';
    $diff = '';
    $level = '';
    if($result->num_rows > 0)
    {
        $row = $result->fetch_array();
        $name = $row['name'];
        $diff = $row['diff'];
        $level = $row['level'];
    }
?>
Привет, <b><?php echo $name ?></b> <span class="badge badge-info">Уровень <?php echo $level ?></span>
<button type="submit" class="btn btn-default" onclick="logout();">Покинуть</button>
<?php
if(ctl( $level, 'delete'))
{
    echo '<button type="submit" class="btn btn-danger">Удалять тэги</button>';
}
?>