<?php
    session_start();
    session_destroy();
    header("Location:index?r=You have logged out");
?>