<?php
session_start();
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="display: flex;justify-content: space-between;">
    <a class="navbar-brand" href="/"><?php echo $title; ?></a>
    <div style="display: flex; align-content:center; color:white">
        <label style="margin-right:10px; margin-bottom: 0;"><?php echo $_SESSION['NombreCompleto'];  ?></label>
        <a style="color: white;cursor:pointer" href="/logout">Logout</a>
    </div>
</nav>