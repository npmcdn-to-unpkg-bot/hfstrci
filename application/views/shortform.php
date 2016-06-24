<header>
    <form name="searchHouses" action="#" method="get" id="sea" class="search">
      <fieldset>
          <h1><a href="<?php echo $this->config->base_url(); ?>" title="HOUSES for SALE &amp; to RENT"><img src="<?php echo $this->config->base_url(); ?>images/houses-for-sale-to-rent.png" alt="HOUSES for SALE &amp; to RENT" title="HOUSES for SALE &amp; to RENT"/></a></h1>
          <!-- <h2>Find houses and properties for sale or to rent in the United Kingdom.</h2> -->
          <input type="search" name="houses" id="search1" value="" />
          <spam class="forsale-torent-spam">
          <input type="submit" value="For Sale" name="action" id="forsale" class="button-submit" />
          <input type="submit" value="To Rent" name="action"  id="torent" class="button-submit" /></spam>
      </fieldset>
    </form>
</header>