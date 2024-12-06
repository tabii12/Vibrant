<?php

if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    session_destroy(); 
}

header("Location: index.php?page=login");
exit();
