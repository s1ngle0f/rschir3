<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(!empty($_POST['num'])){
            $_SESSION['num'] = $_POST['num'];
        }
        if(!empty($_POST['theme'])){
            $_SESSION['theme'] = $_POST['theme'];
        }
        if(!empty($_POST['lang'])){
            if($_SESSION['lang'] == 'ru'){
                $_SESSION['lang'] = 'en';
                // echo 'change to ' . 'en';
            }
            else if($_SESSION['lang'] == 'en'){
                $_SESSION['lang'] = 'ru';
                // echo 'change to ' . 'ru';
            }else{
                $_SESSION['lang'] = 'ru';
            }
            // echo $_SESSION['lang'];
        }
    }
    if(!empty($_SESSION['theme']))
    {if($_SESSION['theme'] == 'dark'){
        echo '<body style="background-color:black">';
    }else if($_SESSION['theme'] == 'light'){
        echo '<body style="background-color:white">';
    }}
    if(!empty($_SESSION['lang']))
    {if($_SESSION['lang'] == 'ru'){
        echo 
    '<form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="num">
        <input type="submit" value="Отправить">
    </form>
    
    <form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="theme" value="dark">
        <input type="submit" value="Темный">
    </form>
    
    <form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="theme" value="light">
        <input type="submit" value="Светлый">
    </form>
    
    <form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="lang" value="en">
        <input type="submit" value="Сменить язык">
    </form>';
    }else if($_SESSION['lang'] == 'en'){
        echo 
    '<form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="num">
        <input type="submit" value="Send">
    </form>
    
    <form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="theme" value="dark">
        <input type="submit" value="Dark">
    </form>
    
    <form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="theme" value="light">
        <input type="submit" value="Light">
    </form>
    
    <form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="lang" value="ru">
        <input type="submit" value="Change language">
    </form>';
    }}else{
        echo 
    '<form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="num">
        <input type="submit" value="Отправить">
    </form>
    
    <form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="theme" value="dark">
        <input type="submit" value="Темный">
    </form>
    
    <form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="theme" value="light">
        <input type="submit" value="Светлый">
    </form>
    
    <form action="/session/change_session.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="lang" value="en">
        <input type="submit" value="Сменить язык">
    </form>';
    }
?>

