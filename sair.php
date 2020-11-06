<?php
session_start();
unset($_SESSION['cLogin']);
header('location: ./');
?>