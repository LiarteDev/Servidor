<?php

session_start();
if (isset($_SESSION["error"])) {
    $_SESSION["error"] = "Error: Existe un error";
}

echo $_SESSION["error"];