<div class="form-group">
    <label for="email">Логин\ email\ Номер телефона:</label>
    <input type="email" class="form-control" id="email">
</div>
<div class="form-group">
    <label for="pwd">Пароль:</label>
    <input type="password" class="form-control" id="pwd">
</div>
<div class="alert alert-success">
    <strong>Внимание!</strong> Не вводите свои личные данные от странички ВКонтакте. Они не подайдут для входа в систему. Для входа в систему вам выдаётся не связанный с ВКонтакте логин\пароль. Все данные передаются по незашифрованным каналам HTTP и могут быть перехвачены. Администрация не несёт ответсвенности за утечку ваших личных данных ВКонтакте.
</div>
<button type="submit" class="btn btn-primary btn-block" onclick="login();">Вход</button>
<script>
    function login()
    {
        $.post
        (
            "ajax/login.php" ,
            {
                email : $("#email").val(),
                pwd : $("#pwd").val()
            },
            function(  )
            {
                location.reload();
            }
        );
    }
</script>