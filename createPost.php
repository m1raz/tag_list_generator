<form action="ajax/upload.php" class="dropzone"id="image-dropzone"></form>
<div id="image"></div>
<div class="form-group">
	 <label for="tags">Tags:</label>
	 <input type="text" class="form-control" id="tags">
</div>
<div id="result"></div>
<div id="tags_form"></div>
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
</script>