<?php include 'profile.php' ?>
<br>
<!-- <form action="../ajax/upload.php" class="dropzone" id="image-dropzone"></form>
<div id="image"></div> -->
<div id="drop_zone" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
    <p>Drag one or more files to this Drop Zone ...</p>
</div>
<div class="form-group">
	 <label for="tags">Tags:</label>
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
</script>