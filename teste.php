<?php
session_start();
while(isset($_SESSION['email'])){
    echo $_SESSION['email'];
}

?>