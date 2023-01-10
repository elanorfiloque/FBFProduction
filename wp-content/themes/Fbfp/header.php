<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FBFProduction</title>
    <?php wp_head(); ?>  
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>

</head>

<body>
    <div class="bar">

    <?php 
        wp_nav_menu();
     ?> 
    </div>
        <div id="nav" class="navres">
            <?php 
                    wp_nav_menu();
            ?> 
        </div>

    <a href="#" id="Btn">
        <span class="menu-burger-icon">
        <span></span>
        <span></span>
        <span></span>
        </span>
    </a>

<script>
    var opened = false;
console.log("hello"); 
var nav = document.getElementById("nav");
var Btn = document.getElementById("Btn");

    Btn.onclick = toggleNav;

function toggleNav() {
    nav.classList.toggle("active");
    opened = !opened;
    console.log(opened);

    if(opened) {
        document.documentElement.style.overflow = 'hidden';
    } else {
        document.documentElement.style.overflow = 'unset';
    }
}

</script>

