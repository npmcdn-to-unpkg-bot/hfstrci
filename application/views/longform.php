<header>
        <h1><a href="<?php echo $this->config->base_url(); ?>" title="HOUSES for SALE & to RENT"><img src="<?php echo $this->config->base_url(); ?>images/houses-for-sale-to-rent.png" alt="HOUSES for SALE & to RENT" title="HOUSES for SALE & to RENT"/></a></h1>
    </header>

<?php /*    <center>
<script type='text/javascript'>
<!--//<![CDATA[
   if (!window.AdButler){(function(){var s = document.createElement("script"); s.async = true; s.type = "text/javascript";s.src = 'http://ab168091.adbutler-tachyon.com/app.js';var n = document.getElementsByTagName("script")[0]; n.parentNode.insertBefore(s, n);}());}
    var AdButler = AdButler || {}; AdButler.ads = AdButler.ads || [];
    var abkw = window.abkw || '';
    var plc206595 = window.plc206595 || 0;
    document.write('<'+'div id="placement_206595_'+plc206595+'"></'+'div>');
    AdButler.ads.push({handler: function(opt){ AdButler.register(168091, 206595, [728,90], 'placement_206595_'+opt.place, opt); }, opt: { place: plc206595++, keywords: abkw, domain: 'ab168091.adbutler-tachyon.com', click:'CLICK_MACRO_PLACEHOLDER' }});
//]]>-->
</script></center> */ ?>

    <?php if(isset($message))
                echo '<div class="warning">'.$message.'</div>';

    ?>

   <form name="searchHouses" action="<?php echo $this->config->base_url();?>houses/for-sale/index.html" method="get" id="sale" class="search">

      <fieldset>
      <h2 class="head_text">FIND PROPERTIES FOR SALE AND TO RENT IN THE UK</h2>
          <input type="search" name="search" class="input_search" id="search1" placeholder="Search for address, town or area..." form="sale" />
            <input type="submit" value="For Sale" name="action" id="forsale" class="button-submit for_sale" form="sale" />
            <input type="submit" value="To Rent" name="action" id="torent" class="button-submit for_rent" form="rent" />
      </fieldset>
       </form>
    <form name="searchrentHouses" style="display:none;" action="<?php echo $this->config->base_url();?>houses/to-rent/index.html" method="get" id="rent" class="search">
        <input type="hidden" name="search" form="rent" id="rentsearch" />
    </form>
