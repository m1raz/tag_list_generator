<html>
    <head>
        <link href="../css/dropzone.css" type="text/css" rel="stylesheet" />
        <script src="../js/dropzone.js"></script>
    </head>
    <body>
        <form action="../ajax/upload.php" class="dropzone" id="file-upload"></form>
        <script type="text/javascript">
            Dropzone.options.fileUpload =
                {
                    paramName: "f", // The name that will be used to transfer the file
                    maxFilesize: 2, // MB
                    maxFiles: 24,
                    success: function (file, response)
                    {
                        console.log(response);
                    }
                };
        </script>
    </body>
</html>