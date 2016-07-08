<header>
        <h1><a href="<?php echo $this->config->base_url(); ?>" title="HOUSES for SALE & to RENT"><img src="<?php echo $this->config->base_url(); ?>images/houses-for-sale-to-rent.png" alt="HOUSES for SALE & to RENT" title="HOUSES for SALE & to RENT"/></a></h1>
    </header>

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
