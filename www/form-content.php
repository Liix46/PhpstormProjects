<?php
function setHeader($color='black'){
    echo "<header style=\"border: 2px solid $color; height: 8vh;\"> HEADER </header>";
}
function setNav($color="black"){
    echo "
        <nav style=\"border: 2px solid $color; height: 7vh;\">
            <div class='navigateDiv'>
                <a href='main.php'><button >Home</button></a>
                <a href='about.php'><button >About</button></a>
                <a href='privacy.php'><button>Privacy</button></a>
            </div>
        </nav> ";
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