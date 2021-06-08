<?php
// For passing $_SESSION['virtual_xml'] from search-questions.php to livesearch.php
session_start(); 
?>

<?php

$xmlDoc=new DOMDocument();

$xmlDoc->loadXML($_SESSION['virtual_xml'], LIBXML_PARSEHUGE);

$x=$xmlDoc->getElementsByTagName('link');

// accordion counter
$ac = 1;

//get the q parameter from URL
$q=$_GET["q"];
/*var_dump($xmlDoc);*/
//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {

  // $hint - varijabla koja se puni kroz for petlju te se kasnije ispisuje
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $a=$x->item($i)->getElementsByTagName('answer');
    /*$z=$x->item($i)->getElementsByTagName('url');*/
    if ($y->item(0)->nodeType==1) {

      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          
          // Prvo pitanje
          $naziv = $y->item(0)->childNodes->item(0)->nodeValue;
          $naziv2 = str_ireplace($q, '<span style="color:#bf1a1f;">'.$q.'</span>', $naziv);
          $nazz=ucfirst($naziv2);
          $answer = $a->item(0)->childNodes->item(0)->nodeValue;
          /*
          $hint='<div class="qa-background"><a href="' . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          '" target="_blank" sytle="dropdown-question">' . 
          $nazz . '</a></div>';
          */
          $hint='<div class="qa-accord qa-accordion"><div class="q-left"><label for="question'.$ac.'">' . 
          $nazz . '</label></div><input type="checkbox" id="question'.$ac.'"></i><span class="qa-accord-span">'.$answer.'</span></div>';

        } else {

          // Ostala pitanja
          $naziv3 = $y->item(0)->childNodes->item(0)->nodeValue;
          $naziv4 = str_ireplace($q, '<span style="color:#bf1a1f;">'.$q.'</span>', $naziv3);
          $naz=ucfirst($naziv4);
          $answer2 = $a->item(0)->childNodes->item(0)->nodeValue;
          /*
          $hint=$hint . '<hr><div class="qa-background"><a href="' . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          '" target="_blank" sytle="dropdown-question">' . 
          $naz . '</a></div>';
          */
          $hint=$hint . '<hr><div class="qa-accord qa-accordion"><div class="q-left"><label for="question'.$ac.'">' . 
          $naz . '</label></div><input type="checkbox" id="question'.$ac.'"><span class="qa-accord-span">'.$answer2.'</span></div>';

        }
        $ac++;
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="Nema pitanja";
} else {
  $response=$hint;
}

//output the response
echo $response;

?>