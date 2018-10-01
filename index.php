<?php
	session_start();
?>

<html>
	<head>
		<title>Пони. Страничка админов. Цитадель. Экстремально тестовая версия v0.1a</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
        <link href="css/style.css" type="text/css" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="../css/dropzone.css" type="text/css" rel="stylesheet" />
        <script src="../js/dropzone.js"></script>
		<script src="js/dropzone.js"></script>
	</head>
	<body>
        <div class="content">

            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                    if(isset($_SESSION['key']))
                    {
                        include 'conf/db.php';
                        include 'functions.php';

                        $session_key = $_SESSION['key'];

                        $result = $conn->query(
                            "SELECT 
                                                  TIMESTAMPDIFF(SECOND, CURRENT_TIMESTAMP, l.end) as 'diff', 
                                                  u.name 'name', 
                                                  u.banned as 'banned',
                                                  u.level as 'level',
                                                  l.end,
                                                  l.start
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
                            $banned = $row['banned'];
                            $level = $row['level'];

                            if($banned !== '1')
                            {
                                if($diff > 0)
                                {
                                    if(!ctl($level, 'login'))
                                    {
                                        $conn->query("UPDATE `login` SET `end` = CURRENT_TIMESTAMP WHERE session_key = '$session_key'");
                                        $conn->close();
                                        echo '<div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>Ограничение!</strong> Уровень доступа вашего аккаунта не позволяет входить в систему. Что быактивировать ваш аккаунт свяжитесь с администрацией.
                                                  </div>';
                                        include 'view/login.php';
                                    }
                                    else
                                    {
                                        include 'view/create_post.php';
                                    }
                                }
                                else
                                {
                                    echo '<div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>Сессия закончилась.</strong> Время отведенное на сессию закончилось. Перезайдите.
                                              </div>';
                                    include 'view/login.php';
                                }
                            }
                            else
                            {
                                echo '    <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>Бан!</strong> Вашему аккаунту ограничен доступ к системе. Если это ошибка, свяжитесь с адинистрацией.
                                          </div>';
                                include 'view/login.php';
                            }
                        }
                        else
                        {
                            echo '    <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>Внимание!</strong> Ваш ключь сессии является подделкой. 
                                      </div>';
                        }
                    }
                    else
                    {
                        include 'view/login.php';
                    }
                    ?>
                </div>
            </div>

        </div>
	</body>

    <script>
        function logout()
        {
            $.post
            (
                "ajax/end_session.php",
                {},
                function ()
                {
                    location.reload();
                }
            )
        }
    </script>

</html>