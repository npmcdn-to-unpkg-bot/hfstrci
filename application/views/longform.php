<header>
        <h1><a href="<?php echo $this->config->base_url(); ?>" title="HOUSES for SALE & to RENT"><img src="<?php echo $this->config->base_url(); ?>images/houses-for-sale-to-rent.png" alt="HOUSES for SALE & to RENT" title="HOUSES for SALE & to RENT"/></a></h1>
    </header>
    <center>
<script type='text/javascript'>

if (!detectmob()) {
<!--//<![CDATA[
   document.MAX_ct0 ='';
   var m3_u = (location.protocol=='https:'?'https://cas.criteo.com/delivery/ajs.php?':'http://cas.criteo.com/delivery/ajs.php?');
   var m3_r = Math.floor(Math.random()*99999999999);
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("zoneid=412377");document.write("&amp;nodis=1");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location).substring(0,1600));
   if (document.context) document.write ("&context=" + escape(document.context));
   if ((typeof(document.MAX_ct0) != 'undefined') && (document.MAX_ct0.substring(0,4) == 'http')) {
       document.write ("&amp;ct0=" + escape(document.MAX_ct0));
   }
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   
   document.write ("'></scr"+"ipt>");
//]]>-->
  } else {
    <!--//<![CDATA[
   document.MAX_ct0 ='';
   var m3_u = (location.protocol=='https:'?'https://cas.criteo.com/delivery/ajs.php?':'http://cas.criteo.com/delivery/ajs.php?');
   var m3_r = Math.floor(Math.random()*99999999999);
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("zoneid=434917");document.write("&amp;nodis=1");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location).substring(0,1600));
   if (document.context) document.write ("&context=" + escape(document.context));
   if ((typeof(document.MAX_ct0) != 'undefined') && (document.MAX_ct0.substring(0,4) == 'http')) {
       document.write ("&amp;ct0=" + escape(document.MAX_ct0));
   }
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   
   document.write ("'></scr"+"ipt>");
//]]>-->
  }
</script></center>


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

    <script type="text/javascript">
        $("#torent").click(function(){
            localStorage.setItem("search",$("#search1").val());
            localStorage.setItem("salerent","rent");
        });

        $("#forsale").click(function(){
            localStorage.setItem("search",$("#search1").val());
            localStorage.setItem("salerent","sale");
        });
    </script>
