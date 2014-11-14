<div class="box">

<p>
<h2>Areas in <?php echo ucwords($townspace).", ".$districtname; ?></h2></p><p>

<?php    

foreach($results as $k){
            $dist = $k->district;
            $ward = $k->ward;
            $town = ucwords(strtolower($k->town));
            
            $href = $this->config->base_url()."houses/$country/$district/$town/".$controller->doiturl($ward).".html";

            echo '<a href="'.$href.'" title="Homes in '.$ward.', '.$town.'">Houses in '.$ward.'</a>
                ';
        }

        echo '</p></div>';