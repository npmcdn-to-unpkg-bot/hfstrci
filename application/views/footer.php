<footer>
<div class="box">
    <p>
        <a href="<?php echo $this->config->base_url(); ?>houses/uk.html" alt="More than 200,000 houses for sale in the United Kingdom" title="More than 200,000 houses for sale in the United Kingdom">More than 200,000 houses for sale in the United Kingdom</a>
        <?php foreach($links as $link){
            
              echo ' <a href="'.$link->link.'">'.$link->title.'</a>';

        }    ?>
        </p>
</div>

    <div class="box">
        <span class="socialmedia">find us on:</span>
        <a href="#" title="Houses for sale to rent on Facebook.">
            <img src="<?php echo $this->config->base_url(); ?>images/fb.png" alt="Houses for sale to rent on Facebook." title="Houses for sale to rent on Facebook.">
        </a>
    </div>
</footer>
</body>
</html>
