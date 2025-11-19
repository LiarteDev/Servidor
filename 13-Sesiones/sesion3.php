<?php

session_start();

if (isset($_SESSION["error"])) {
    echo $_SESSION["error"];
} else {
    echo "No existe la variable sesión Error.";
}