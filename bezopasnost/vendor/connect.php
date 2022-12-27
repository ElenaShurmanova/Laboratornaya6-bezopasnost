<?php

    $connect = mysqli_connect('localhost', 'root', 'root', 'lw_2_bez');

    if (!$connect) {
        die('Error connect to DataBase');
    }