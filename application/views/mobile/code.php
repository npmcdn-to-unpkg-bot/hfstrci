<div class="box">

<p>
<h2>

<?php    
$co = 1;
foreach($results as $k){
           //$tw = ucwords(strtolower($k["TOWN"]));
            //$ward = ucwords(strtolower($k["WARD"]));


            $p = $k->price;
            $d = $k->date;
            //$type = $k->proptype"];
            $paon = $k->PAON;

            $s = ucwords(strtolower($k->street));
            $l = ucwords(strtolower($k->locality));
            $town = ucwords(strtolower($k->town));

            $county = ucwords(strtolower($k->county));
            if($co === 1){
                echo 'Road: '.$s.', '.$areaspace.', '.$town.', '.$county.' - '.$codespace.'</h2></p><table>';$co++;
            }
            $datef = new DateTime($d);
            $datef = $datef->format('d/m/Y');
            echo '<tr><td>'.$paon.', '.$s.', '.$areaspace.', '.$town.', '.$districtname.'</td><td>'.$codespace;
            echo '</td><td>sold in '.$datef.'</td><td>  £'.$p.'</td></tr>';

        }

        echo '</table></p></div>';