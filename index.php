<?php
    require_once('utilities.php');
// Hakukriteerit
$html = "<h2>Choose Genre</h2>";
$html .= '<form action="GET">';

// Genre-pudotusvalikko
$html .= createGenreDropDown();

// Looppaa läpi tiedostot datasets-hakemistosta
$path = 'datasets';
if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
        if ('.' === $file) continue;
        if ('..' === $file) continue;

        $html .= '<div><input type="submit" value="' . basename($file, ".php") . '" formaction="' . $path . "/" . $file . '"></div>';
    }

    closedir($handle);
}
$html .= '</form>';

// Luo painike, joka lähettää lomakkeen käsiteltävänä olevalle tiedostolle
echo $html;

require_once('utilities.php');
// Hakukriteerit
$html = "<h2>Choose Region</h2>";
$html .= '<form name_="GET">';

// Region-pudotusvalikko
$html .= createRegionDropDown();

// Looppaa läpi tiedostot datasets-hakemistosta
$path = 'maa';
if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
        if ('.' === $file) continue;
        if ('..' === $file) continue;

        $html .= '<div><input type="submit" value="' . basename($file, ".php") . '" formaction="' . $path . "/" . $file . '"></div>';
    }

    closedir($handle);
}
$html .= '</form>';

// Luo painike, joka lähettää lomakkeen käsiteltävänä olevalle tiedostolle
echo $html;

require_once('utilities.php');
// Hakukriteerit
$html = "<h2>Choose Actor</h2>";
$html .= '<form name_="GET">';

// Actor-pudotusvalikko
$html .= createActorDropDown();

// Looppaa läpi tiedostot datasets-hakemistosta
$path = 'roles';
if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
        if ('.' === $file) continue;
        if ('..' === $file) continue;

        $html .= '<div><input type="submit" value="' . basename($file, ".php") . '" formaction="' . $path . "/" . $file . '"></div>';
    }

    closedir($handle);
}
$html .= '</form>';

// Luo painike, joka lähettää lomakkeen käsiteltävänä olevalle tiedostolle
echo $html;

require_once('utilities.php');
// Hakukriteerit
$html = "<h2>Choose actor</h2>";
$html .= '<form original_title="GET">';

// Actor-pudotusvalikko
$html .= createActorsDropDown();

// Looppaa läpi tiedostot datasets-hakemistosta
$path = 'lisaarooleja';
if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
        if ('.' === $file) continue;
        if ('..' === $file) continue;

        $html .= '<div><input type="submit" value="' . basename($file, ".php") . '" formaction="' . $path . "/" . $file . '"></div>';
    }

    closedir($handle);
}
$html .= '</form>';

// Luo painike, joka lähettää lomakkeen käsiteltävänä olevalle tiedostolle
echo $html;
