<?php
session_start();

function is_logged_in() {
    return isset($_SESSION['id_user']);
}
?>
