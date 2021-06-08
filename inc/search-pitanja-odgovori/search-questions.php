<?php

// Create pitanja-odgovori.xml file

$xml = new DomDocument('1.0','UTF-8');

$pages = $xml->createElement("pages");
$pages = $xml->appendChild($pages);

$fields = get_field('pitanja_odgovori');
foreach ((array) $fields as $field) {

    $link = $xml->createElement('link');
    $link = $pages->appendChild($link);

    $title = $xml->createElement('title', $field['pitanje']);
    $title = $link->appendChild($title);

    $answer = $xml->createElement('answer', $field['odgovor']);
    $answer = $link->appendChild($answer);

    $url = $xml->createElement('url', get_permalink($page_id));
    $url = $link->appendChild($url);

}

$_SESSION['virtual_xml'] = $xml->saveXML();
//var_dump($_SESSION['virtual_xml']);
//$xml->save("xmlfile.xml");
//$str = preg_replace('/[^0-9]*/', '', $xml);
?>

<p>Postavite pitanje</p>


<form style="margin-top:24px; -webkit-box-shadow: 0 1px 3px 0 rgba(0,0,0,0.2); box-shadow: 0 1px 3px 0 rgba(0,0,0,0.2);">
<input is="myInput" type="text" size="30" onkeypress="disableEnter(event)" onkeyup="showResult(this.value)" placeholder="Upišite pojam za pretraživanje pitanja i odgovora" class="livesearch-form">
<div id="livesearch"></div>
</form>

<br>
<!--<p>Ako niste pronašli odgovor, postavite pitanje.</p>

<div style="margin-top:26px; background-color: rgb(247, 247, 247); padding-top: 5px; padding-left: 15px; padding-bottom: 1px; padding-right: 15px; -webkit-box-shadow: 0 1px 3px 0 rgba(0,0,0,0.2); box-shadow: 0 1px 3px 0 rgba(0,0,0,0.2); border: 1px solid #ababab38;"><?php echo do_shortcode('[gravityform id="1" title="true" description="true"]'); ?></div>

<br>
<p>Osobni podaci koje nam dostavite putem ovog sučelja prikupljaju se isključivo radi odgovora na Vaš upit, a u skladu s  važećim primjenjivim propisima iz područja zdravstva te Općom uredbom o zaštiti osobnih podataka. Isti se neće prenositi niti ustupati trećoj strani. Osobni podaci koje ste dostavili zaštićeni su od pristupa neovlaštenih osoba, pohranjeni na sigurno mjesto i čuvani u skladu s uvjetima i rokovima previđenim Pravilnikom o zaštiti i obradi arhivskog i registraturnog gradiva Hrvatskog zavoda za javno zdravstvo.</p>-->