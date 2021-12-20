<?php

// Muodosta tietokantayhteys
require_once('../db.php');
// Lue genre get-parametri muuttujaan
$genre = $_GET['genre'];
$dbcon = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden

$sql = "SELECT `primary_title`

    FROM `titles` INNER JOIN title_genres

    ON titles.title_id = title_genres.title_id

    WHERE genre LIKE '%$genre%'

    LIMIT 10;";

// Tarkistukset yms

// Aja kysely kantaan

$prepare = $dbcon->prepare($sql);

$prepare->execute();

// Tallenna vastaus muuttujaan

$rows = $prepare->fetchAll();

// Tulosta otsikko

$html = '<h1>' . $genre . '</h1>';

// Avaa ul-elementti

$html .= '<ul>';

// Looppaa tietokannasta saadut rivit läpi

foreach ($rows as $row) {

    // Tulosta jokaiselle riville li-elementti

    $html .= '<li>' . $row['primary_title'] . '</li>';
}

$html .= '</ul>';

echo $html;