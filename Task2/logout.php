<?php
function return_back($message)
{
    header("Location: login.php?message=$message");
}
session_start();
if (isset($_GET['id'])) {
    session_unset();
    session_destroy();
    return_back("Logged out successfully!");
}
