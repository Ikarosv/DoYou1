<?php

    session_start();

    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['id']);

    session_unset();

    session_destroy();

    header('location:../index.php');

