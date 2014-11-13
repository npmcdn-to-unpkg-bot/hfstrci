<div class="box">

<p>
<h2>Towns in <?php echo ucwords(str_replace("-", " ", $districtname)); ?></h2></p><p>

<?php    

foreach($results as $k){
            $dist = $k->district;
            $town = ucwords(strtolower($k->town));
            
            $href = $this->config->base_url()."houses/$country/$district/".str_replace(" ", "-",$town).".html";

            echo '<a href="'.$href.'" title="Homes in '.$town.', '.$dist.'">Houses in '.$town.'</a>
                ';
        }

        echo '</p></div>';