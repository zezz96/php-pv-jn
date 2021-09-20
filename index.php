<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korisnicki deo</title>
    <script src="jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
 
</head>
<body>
<?php
session_start();
require_once("funkcije.php");
require_once("klase/classBaza.php");
require_once("klase/classLog.php");
$db=new Baza();
if(!$db->connect())
{
    echo "Greška prilikom konekcije na bazu!!!<br>".$db->error();
    exit();
}

if(login() AND isset($_GET['odjava']))
{
    Log::upisiLog("logovi/logovanje.txt", "Odjava korisnika '{$_SESSION['ime']}'");
    odjaviKorisnika();
}
if(login())
prikaziPodatke();
else{


?>
<div class='podaciPrijava'>

<input type="text" name="korime" id="korime" placeholder="Unesite e-mail"/>
<input type="text" name="lozinka" id="lozinka" placeholder="Unesite lozinku" />
<button type="button" id="dugmeZaPrijavu">Prijavite se</button>
<div id="odgovor"></div>
</div>
<?php

}
?>

<h1> VISER - Vakcinacija</h1>

<?php

$upit="SELECT * FROM vakcine order by id ASC";
$rez=$db->query($upit);
if($db->num_rows($rez)>0){

    while($red=$db->fetch_object($rez))
    {
        
        echo "<div class='prikazVakcina'>";
        echo "<h2>$red->naziv</h2>";
        echo "$red->komentar";
        echo "</div>";
    }

}
else "Nema ni jedna vakcina u bazi";
?>
<hr>
<div class='prijava' >
<h4>Unesite vase podatke</h4>
<input type="text" id='ime1' name='ime1' placeholder="Unesite vase ime i prezime"/><br>
<div class='izbor'>
    <br>
 <select name="vakcina" id="vakcina">
     <option value="0"> -- Izaberite vakcinu -- </option>
     <option value="1"> VISER </option>
     <option value="2"> Biontek/Fajzerova </option>
     <option value="3"> Moderna </option>
     <option value="4"> Sinofarminovak </option>
     <br>

 </select> 
 
 
<br>
</div>
<input type="date" id="datum" name="datum"/><br>
<textarea name="tekst" id="tekst" cols="30" rows="10"></textarea><br>
<button type="button" id="snimanje">Snimanje</button><br>
</div>
<hr>
<h3>Rezervisani termini</h3>
</body>
</html>