<?php
function setHeader($color='black'){
    echo "<header style=\"border: 2px solid {$color}; height: 10vh;\"> HEADER </header>";
}
function setNav($color="black"){
    echo "<nav style=\"border: 2px solid {$color}; height: 5vh;\">NAV</nav> ";
}
function setDiv($color="black"){
    echo "<div style=\"display: flex; border: 2px solid $color; height: 75vh;  flex-grow: 8\">DIV</div>";
}
function setAside($color="black"){
    echo "<aside style=\"border: 2px solid $color; display: flex; height: 75vh; flex-grow: 2\">ASIDE</aside>";
}
function setFooter($color="black"){
    echo "<footer style=\"border: 2px solid $color; height: 10vh;\">FOOTER</footer>";
}