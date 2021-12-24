<html lang="es">
<<<<<<< HEAD
<style>
    *{margin: 0;padding: 0;}
    .navigateDiv{
        width: 100%;
        height: 100%;
        background: #ccccee;
        display: flex;
        align-items: center;
    }
    .navigateDiv > a > button{
        border: 1px solid whitesmoke;
        height: 80%;
        padding: 0 10px 0 10px;
        width: 100px;
        font-size: 14pt;
        margin-left: 5px;
        border-radius: 5px;
    }
</style>
<?php
    include_once 'form-content.php';
    setHeader("red");
    setNav();
?>
<div style="display: flex; flex-direction: row; flex-wrap: nowrap;">
<?php
    setDiv("orange");
    setAside();
?>
</div>
<?php
    setFooter("green");
?>
</html>

