<?php
    $client = file_get_contents("http://ipinfo.io/{$_SERVER['REMOTE_ADDR']}/json");
    $client = json_decode($client, 1);
    if (!isset($_COOKIE['perm']) || $client['country'] !== "AM") {	
        header("Location: \ ");
        exit();
    }