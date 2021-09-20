<?php
function login(){
    if(isset($_SESSION['id']) AND isset($_SESSION['ime'])  AND isset($_SESSION['lozinka']))
        return true;
    else
        return false;
}
function odjaviKorisnika(){

session_unset();
session_destroy();

}


function prikaziPodatke(){
    echo "<div class='podaciPrijava'>";
    echo "Prijavljeni ste kao  {$_SESSION['ime']} ({$_SESSION['lozinka']})<br>";
    echo "<a href='index.php'>Pocetna</a> |";
    echo "<a href='admin.php'>Administrativna stranica</a> | ";
    echo "<a href='index.php?odjava'>Odjavite se</a>";
    echo "</div>";
}



?>