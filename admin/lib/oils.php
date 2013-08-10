<?php
require('simple_html_dom.php');

echo "Oils:";

$html = file_get_html("http://www.butterflyexpressions.org/Info/Singles.html");

echo "<br>";
echo "<ul>";


/* this works, it gets the names and the links to the oils info
foreach($html->find('table tbody tr') as $tr) {
    foreach($tr->find('table td a') as $td)
    {
        if ($td->plaintext != "") {
           echo '<li>' . $td . '</li>';
           //load the html of the new page
           //$link = file_get_html($td->href);

           //do somthing with it!

        }
    }
}
 */

/**
 * This will load the individual pages of each oils and get the info.
 **/

$link = file_get_html("http://www.butterflyexpressions.org/Singles/Ledum.html");

foreach ($link->find('p.HeadingNoSpace') as $key) {
   echo "<h1>" . $key->plaintext . "</h1>";
}

foreach ($link->find('p.LatinName') as $key) {
   echo "<h2>" . $key->plaintext . "</h2>";
}

foreach ($link->find('p.BodyOil') as $key) {
   echo $key->innertext ."<br><br>";
}



echo "</ul>";


?>
