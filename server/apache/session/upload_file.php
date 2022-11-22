<?php

// session_start();

// $session = $_SESSION;

$uploaddir = '/var/www/html/pdf/files/';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // $uploadfile = $_POST['file'];
    // if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    //     echo "Файл корректен и был успешно загружен.\n";
    // } else {
    //     echo "Возможная атака с помощью файловой загрузки!\n";
    // }
    // echo 'Паша привет';
    $filepath = $_FILES['file']['tmp_name'];
    $fileSize = filesize($filepath);
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $filepath);

    if ($fileSize === 0) {
        die("The file is empty.");
    }

    if ($fileSize > 31457280) { 
        die("The file is too large");
    }

    $filename = basename($filepath); 
    $targetDirectory = __DIR__ . "/uploads";

    $newFilepath = $targetDirectory . "/" . $filename . ".pdf";

    if (!copy($filepath, $newFilepath)) {
        die("Can't move file.");
    }
    unlink($filepath); // Delete the temp file

    echo "File uploaded successfully :)";
}
?>
<form action="/session/upload_file.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file" id="file">
	<input type="submit" value="Отправить">
</form>
<a href="files.php">К списку</a>
