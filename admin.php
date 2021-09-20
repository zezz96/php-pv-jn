<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profesorski servis</title>
    <script src='jquery-3.5.1.js'></script>
    <script src='prof.js'></script>
    <link rel="stylesheet" href="style.css">
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
if(login() )
    prikaziPodatke();
else
{
    echo "Morate biti prijavljeni kao Administrator da biste videli ovu stranicu<br><a href='index.php'>Prijavite se</a>";
    exit();
}
?>
<h1>Neodobreni termini</h1>
<div>
<div class='opcija'>
    <h3>Dozvola/brisanje neodobrenih termina</h3>
 
<div class='opcija'>
    <h3>Logovi</h3>
    <select name="log" id="log">
        <option value="0">--izaberite log--</option>
        <option value="viser.txt">Viser</option>
        <option value="fajzer.txt">Fajzer</option>
        <option value="moderna.txt">Moderna</option>
        <option value="sinofarm.txt">Sinofarm</option>
        <option value="sputnjik.txt">Sputnjik</option>
        <option value="astrazeneka.txt">Astrazeneka</option>
    </select><br><br>
    <div id='divlogovi'></div>
</div>

</div>
</body>
</html>
