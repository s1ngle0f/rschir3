<?php
session_start();
echo $_SESSION['num'];
if(!empty($_SESSION['theme']))
{if($_SESSION['theme'] == 'dark'){
    echo '<body style="background-color:black">';
}else if($_SESSION['theme'] == 'light'){
    echo '<body style="background-color:white">';
}}
?>