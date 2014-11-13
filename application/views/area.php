<div class="box">

<p>
<h2><?php echo $areaspace.', '.$townspace.", ".$districtname.' Roads'; ?></h2></p><p>

<?php    

foreach($results as $k){

             $tw = ucwords(strtolower($k->TOWN));
            //$ward = ucwords(strtolower($k->WARD));
           $d = $k->DISTRICT;
           $p = $k->POSTCODE;
           $s = ucwords(strtolower($k->STREET));
           $href = $this->config->base_url()."houses/$country/$district/$town/$area/".str_replace(" ", "-",$p).".html";

            echo '<a href="'.$href.'" alt="Houses in '.$s.' - '.$p.'" title="Homes in '.$s.' - '.$p.'">Houses in '.$s.' - '.$p.'</a>
                ';

        }

        echo '</p></div>';