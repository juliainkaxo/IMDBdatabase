<?php

// Muodosta tietokantayhteys
require_once('../db.php');

// Lue name_ get-parametri muuttujaan
$name_ = $_GET['name_'];
$dbcon = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden

// Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
$sql = "SELECT role_
    FROM getrolesbyactor
    WHERE name_ LIKE '%$name_%'
    LIMIT 1;";

// Tarkistukset yms
// Aja kysely kantaan
$prepare = $dbcon->prepare($sql);
$prepare->execute();

// Tallenna vastaus muuttujaan
$rows = $prepare->fetchAll();

// Tulosta otsikko
$html = '<h1>Role from ' . $name_ . '</h1>';

// Avaa ul-elementti
$html .= '<ul>';

// Looppaa tietokannasta saadut rivit läpi
foreach ($rows as $row) {

    // Tulosta jokaiselle riville li-elementti
    $html .= '<li>' . $row['role_'] . '</li>';
}

$html .= '</ul>';

echo $html;
