<?php

session_start();

if (isset($_SESSION["error"])) {
    echo "Destruyendo la sesión error...";
    session_destroy();
}