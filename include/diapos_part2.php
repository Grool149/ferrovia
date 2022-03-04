</div>
<?php
    echo '<div id="Grandephoto" onclick="FermerGrandePhoto();">
     <p id="legende"></p> 
     <div id="Photo">
      <div id="prec-in" onmouseover="precOnmouveover();" onmouseout="precOnmouveout();">&lt;&lt;</div>
      <div id="suiv-in" onmouseover="suivOnmouveover();" onmouseout="suivOnmouveout();">&gt;&gt;</div>
     </div> 
    </div>
';

    //affichage de l'entête du tableau
    echo
    '<div class="gallerie">
    ';
    
    // Affichage des vignettes
    for ($j=0;$j<=$i-1;$j++)
    {
    $thumbnail = substr($tab_image[$j],0,-4).'_tb.jpg';
    $thumbnail_large = substr($tab_image[$j],0,-4).'_tbl.jpg';
    $diapo = '<img src="'.$thumbnail.'" alt="'.substr($tab_image[$j],0,-4).'" onmouseover="src=\''.$thumbnail_large.'\';" onmouseout="src=\''.$thumbnail.'\';"/>';

    echo
    '
    <div class="vignette" onclick="AfficherGrandePhoto('.$j.');"> 
    '.$diapo.' <br />'
//    '.substr($tab_image[$j],0,-4).' 
    .'</div>';
    }
    echo '</div>';
?>
</body>
</html>