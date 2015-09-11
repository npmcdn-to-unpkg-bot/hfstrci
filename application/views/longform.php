<header>
        <h1><a href="<?php echo $this->config->base_url(); ?>" title="HOUSES for SALE & to RENT"><img src="<?php echo $this->config->base_url(); ?>images/houses-for-sale-to-rent.png" alt="HOUSES for SALE & to RENT" title="HOUSES for SALE & to RENT"/></a></h1>
    </header>
   <form name="searchHouses" action="<?php echo $this->config->base_url();?>houses/for-sale/index.html" method="get" id="sale" class="search">
           
     
      <fieldset>
          <h2>Find houses and properties for sale or to rent in the United Kingdom.</h2>
          <input type="search" name="search" id="search1" placeholder="Search for address, town or area..." form="sale" />
          <input type="submit" value="For Sale" name="action" id="forsale" class="button-submit" form="sale" />
          <input type="submit" value="To Rent" name="action" id="torent" class="button-submit" form="rent" />
      </fieldset>
       </form>
    <form name="searchrentHouses" style="display:none;" action="<?php echo $this->config->base_url();?>houses/to-rent/index.html" method="get" id="rent" class="search">
        <input type="hidden" name="search" form="rent" id="rentsearch" />
    </form>
