<html>
	<head>
		<title>Bootstrap Example</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/dropzone.js"></script>
		<style>
			.dropzone .dz-preview .dz-image {
				width: 80vw;
				height: 80vh;
			}
		</style>
	</head>
	<body>
		<form action="ajax/upload.php" class="dropzone"id="image-dropzone"></form>
		<div id="image"></div>
		<div class="form-group">
			 <label for="tags">Tags:</label>
			 <input type="text" class="form-control" id="tags">
		</div>
		<div id="result"></div>
		<div id="tags_form"></div>
	</body>
	<script>
		let send;
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
		$('#tags').bind('input', function()
		{
			var jqxhr = $.post(
				"ajax/find_tag.php" ,
				{
					tags : $("#tags").val()
				},
				function( data )
				{
					user_input = $("#tags").val();
					tag_complition = data;
					let text = $("#tags").val() + data;
					$("#result").html( text );
				}
			);
		});

		$('#tags').on('keypress', function (e)
		{
			if(e.which === 13)
			{
				//Disable textbox to prevent multiple submit
				$(this).attr("disabled", "disabled");
				$("#tags_form").append( " #" + $("#result").text() );
				$("#tags").val("");
				$("#result").text("");
				//Enable the textbox again if needed.
				$(this).removeAttr("disabled");
				$("#tags").focus();
			}
		});
	</script>
</html>