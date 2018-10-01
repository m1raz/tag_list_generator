<?php
$ds = DIRECTORY_SEPARATOR;
$storeFolder = '../upload';
if (!empty($_FILES))
{
    $tempFile = $_FILES['f']['tmp_name'];
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
    $targetFile =  $targetPath. generateFileName(2).'.jpg';
    $filesize = filesize($_FILES["f"]["tmp_name"]);
    if($filesize < 2000000)//2MB
	{
		if(getimagesize($tempFile))
		{
            move_uploaded_file($tempFile,$targetFile);
            include '../conf/db.php';
		}
	}
}
function generateFileName($len = 2) ///1 - 62 unique variations, 2 - 3844, 3 - 238328, 4 - 14776336, 5 - 916132832
{
    return substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzQWERTYUIOPASDFGHJKLZXCVBNM_", $len)), 0, $len);
}
?>