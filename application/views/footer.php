<footer>
<div class="box">
    <br>
    <p>
        <a href="<?php echo $this->config->base_url(); ?>houses/uk.html" alt="More than 200,000 houses for sale in the United Kingdom" title="Houses for sale in the United Kingdom"><strong>More than 200,000 houses for sale in the United Kingdom</strong></a>
        <?php foreach($links as $link){
            
              echo ' <a href="'.$link->link.'" alt="'.$link->title.'">'.$link->title.'</a>';

        }    ?>
        </p>
</div><center>
<div id="contentad156278"></div>
<script type="text/javascript">
    (function(d) {
        var params =
        {
            id: "ceb803c4-5110-4605-8eed-258ff6c95049",
            d:  "aG91c2VzZm9yc2FsZXRvcmVudC5jby51aw==",
            wid: "156278",
            cb: (new Date()).getTime()
        };

        var qs=[];
        for(var key in params) qs.push(key+'='+encodeURIComponent(params[key]));
        var s = d.createElement('script');s.type='text/javascript';s.async=true;
        var p = 'https:' == document.location.protocol ? 'https' : 'http';
        s.src = p + "://api.content.ad/Scripts/widget2.aspx?" + qs.join('&');
        d.getElementById("contentad156278").appendChild(s);
    })(document);
</script>
</center>

    <div class="box">
        <span class="socialmedia">find us on:</span>
        <a href="#" title="Houses for sale to rent on Facebook.">
            <img src="<?php echo $this->config->base_url(); ?>images/fb.png" alt="Houses for sale to rent on Facebook." title="Houses for sale to rent on Facebook.">
        </a>
    </div>
    <div><a href="<?php echo $this->config->base_url(); ?>termsandconditions" style="color:#333;text-decoration:none;padding:5px;">Terms of Use & Privacy Policy </a></div>
</footer>
</body>
</html>
