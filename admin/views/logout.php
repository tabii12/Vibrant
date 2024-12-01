<?php

if (isset($_SESSION['user'])) {
    unset($_SESSION['user']); // Xóa session 'user'
    session_destroy(); // Hủy toàn bộ session
}

header("Location: index.php?page=login");
exit();
