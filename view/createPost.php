<?php include 'profile.php' ?>
<br>
<!-- <form action="../ajax/upload.php" class="dropzone" id="image-dropzone"></form>
<div id="image"></div>
<div id="drop_zone" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
    <p>Drag one or more files to this Drop Zone ...</p>
</div>-->
<div class="form-group">
    <button class="btn btn-default" data-toggle="collapse" data-target="#howto">Документация</button>

    <div id="howto" class="collapse">
        <button class="btn btn-default" data-toggle="collapse" data-target="#howto0">Что нового?</button>
        <button class="btn btn-default" data-toggle="collapse" data-target="#howto1">Как искать тэги?</button>
        <button class="btn btn-default" data-toggle="collapse" data-target="#howto2">Как прикрепить тэг к посту?</button>
        <button class="btn btn-default" data-toggle="collapse" data-target="#howto3">Как добавить тэг в Базу?</button>
        <button class="btn btn-default" data-toggle="collapse" data-target="#howto4">Что такое группы тэгов?</button>
        <button class="btn btn-default" data-toggle="collapse" data-target="#howto5">Как удалить тэг?</button>
        <div id="howto0" class="collapse">
            <strong>Версия v0.1a.</strong>
            <ul>
                <li>
                    Система пользователей
                    <ul>
                        <li>Вход по логину и паролю</li>
                        <li>Система уровней</li>
                    </ul>
                </li>
                <li>
                    Тэги
                    <ul>
                        <li>Удобный человеку понятный поиск тэгов</li>
                        <li>Быстрое прикрепление тэга к посту</li>
                        <li>Система групп тэгов</li>
                        <li>Добавление тэгов
                            <ul>
                                <li>Система сама предлогает добавить тэг которого нет в Базе Пони</li>
                                <li>Если тэг оформлен не по канонам сообщества, то система попробует его исправить и сделать клёвым</li>
                            </ul>
                        </li>
                        <li>Созданна База Пони. В ней сейчас около 1200 поней\единорогов\пегасов, 5 аликорнов, 1 дракон и 1 камень.</li>
                        <li>По мне клёвая кнопка для тех кто не может в инглиш. Кнопка "Загуглить!", гуглит для вас пони, которую вы не можете вспомнить.</li>
                    </ul>
                </li>
                <li>
                    Всякие технически мелочи, типа использование приятного и привычного глазу Bootstrap, поиск, покупка и настраивание подходящего сервера.
                </li>
            </ul>
            <strong>А как же...</strong>
            <ul>
                <li>Добавление картиночеГ</li>
                <li>Планировка поста</li>
                <li>и кнопкасделай за всё за меня красиво</li>
                Прямо из системы? Ну, я один и я ленив. Пока что пользуйте удобный гениратор тэгов. Как только, так сразу, выкачу апдейт с новыми <s>багами</s> фичами.
            </ul>
        </div>
        <div id="howto1" class="collapse">
            <strong>Поиск тэга.</strong> Для поиска тэга в поле "Тэги" нужно начать вводить название тэга без решотки (#). К примеру Вы хотите найдти "#Boulder". Для этого в поле достаточно ввести "<a class="addExample">Bou</a>". При наличии этой информации система найдет один единственный вариант тэга. Заметьте, что решотку (#) в начале тэго ставить не нужно. Это за вас сделает система.
        </div>
        <div id="howto2" class="collapse">
            <strong>Прикрепление тэга.</strong> Что бы прикрепить тэг, достаточно просто кликнуть по нему, когда вы его нашли. В случае, если нужно прикрепить все найденные тэги (например, он один), можно нажать ENTER. После быстрого прикрепления всех тэгов (нажатия ENTER) поле, логично, опустошиться и можно будет искать новый тэг не отрывая рук от клавиатуры.
        </div>
        <div id="howto3" class="collapse">
            <strong>Добавление тэга.</strong> Данная функция доступна пользователям системы с <span class="badge badge-info">Уровень 2</span> и выше. Система сама предлогает добавить тэг, если нечего похожего на запрос не найдено. Добавление происходит автоматически по нажатию кнопки "Добавить тэг". <br />
            Следует проверить (лишним не будет):
            <ul>
                <li>Вы ввели целиком тэг, который хотите добавить?</li>
                <li>Не производили ли вы поиск с использованием символа решотки(#)?</li>
                <li>Вы на 100% уверены, что имя пони вы ввели правильно. Попробуйте его загуглить?</li>
                <li>Ваш новый тэг оформлен по правилам сообщества?
                    <ul>
                        <li>Имя и Фамилия пони с большой буквы</li>
                        <li>Вместо пробелов нижнее подчёркивание (_)</li>
                    </ul>
                    Систем за вас исправит некоторые косяки, но она не сможет определить правильно ли вы ввели имя пони например. Просто будьте внимательны.
                </li>
            </ul>
        </div>
        <div id="howto4" class="collapse">
            <strong>Группы тэгов</strong> Группы тэгов это еще один инструмент экономии времени. Не редко требуется найти и прикрепить, к примеру, тэги все шестёрки. Для этого в поле поиска можно вбить "<a class="addExample">Main six</a>". Данная группа тэгов выведет на экран всех главных героев. Обычным поиском их пришлось бы вводить по отдельности.
        </div>
        <div id="howto5" class="collapse">
            <strong>Удаление тэгов</strong> Удаления тэгов не существует. Все копки утверждающие, что они могут удалить тэг врут и их клацание, к слову, говоря, не порвёт материю времени, а только убъет ваше время.
        </div>
    </div>
    <br />


    <label for="tags">Tags:</label> <a id="googleit">Загуглить!</a>
    <input type="text" class="form-control" id="tags">
</div>
<div id="tags_form"></div>
<div id="result"></div>
<script>
	Dropzone.options.imageDropzone = 
	{
		maxFiles : 1,
		thumbnailWidth : 1000,
		thumbnailHeight : 1000,
		thumbnailMethod : 'contain'
	}
	$("#tags").focus();
	let user_input;
	let tag_complition;
	$('#tags').bind
	(
		'input', 
		function() 
		{ 
			var jqxhr = $.post
			( 
				"ajax/find_tag.php" ,
				{ 
					tags : $("#tags").val() 
				},
				function( data ) 
				{
					tag_complition = data;
					let text = data;
					$("#result").html( text );
				}
			);
		}
	);
	$('#tags').on(
		'keypress',
		function (e)
		{
			if(e.which === 13 ) /// Enter key
			{
				$(this).attr("disabled", "disabled");
				addTag($("#result").text());
				$("#tags").val("");
				$("#result").text("");
				$(this).removeAttr("disabled");
				$("#tags").focus();
			}
		}
	);
	$('#tags').on(
		'keyup',
		function (e)
		{
			if (e.keyCode == 27) { /// ESC key
				$("#result").text($("#tags").val());
			}
		}
	);
	function addTag(tag)
	{
		$("#tags_form").append( " " + tag  + " ");
	}
	function createTag()
	{
		$.post( 
			"ajax/addtag.php" ,
			{ 
				tag : $("#tags").val() 
			},
			function( data ) 
			{
				tag_complition = data;
				let text = data;
				$("#result").html( text );
			}
		);
	}
    function dropHandler(ev) {
        console.log('File(s) dropped');

        // Prevent default behavior (Prevent file from being opened)
        ev.preventDefault();

        if (ev.dataTransfer.items) {
            // Use DataTransferItemList interface to access the file(s)
            for (var i = 0; i < ev.dataTransfer.items.length; i++) {
                // If dropped items aren't files, reject them
                if (ev.dataTransfer.items[i].kind === 'file') {
                    var file = ev.dataTransfer.items[i].getAsFile();
                    console.log(file);
                }
            }
        } else {
            // Use DataTransfer interface to access the file(s)
            for (var i = 0; i < ev.dataTransfer.files.length; i++) {
                console.log('... file[' + i + '].name = ' + ev.dataTransfer.files[i].name);
            }
        }

        // Pass event to removeDragData for cleanup
        removeDragData(ev)
    }

    function dragOverHandler(ev) {
        console.log('File(s) in drop zone');

        // Prevent default behavior (Prevent file from being opened)
        ev.preventDefault();
    }

    function removeDragData(ev) {
        console.log('Removing drag data')

        if (ev.dataTransfer.items) {
            // Use DataTransferItemList interface to remove the drag data
            ev.dataTransfer.items.clear();
        } else {
            // Use DataTransfer interface to remove the drag data
            ev.dataTransfer.clearData();
        }
    }
    $('.addExample').click(function(){
        $('#tags').val(this.innerText);
        var jqxhr = $.post
        (
            "ajax/find_tag.php" ,
            {
                tags : $("#tags").val()
            },
            function( data )
            {
                tag_complition = data;
                let text = data;
                $("#result").html( text );
            }
        );
    });

    $('#googleit').click(function(){

        let url = 'https://www.google.com/search?q=' + document.getElementById('tags').value;
        window.open(url,'_blank');
    });
</script>