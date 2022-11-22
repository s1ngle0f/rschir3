<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $_SESSION['num'] = $_POST['num'];
    }
?>

<form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
	<input type="text" name="num">
	<input type="submit" value="Отправить">
</form>