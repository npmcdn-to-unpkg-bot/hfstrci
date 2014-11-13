<div class="box">

<p>
<h2>Districts of <?php echo ucwords(str_replace("-", " ", $country)); ?></h2></p><p>

<?php    foreach($results as $k){
            $dist = $k->district;
            $iso = $k->iso;

            $href = $this->config->base_url()."houses/$country/$iso.html";

            echo '<a href="'.$href.'" title="Homes in '.$dist.'">Houses in '.$dist.'</a>
                ';
        }

        echo '</p></div>';