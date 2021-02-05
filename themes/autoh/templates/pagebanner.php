<section class="banner-sec">
  <div class="banner-cntlr clearfix"> </div> 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-desc clearfix">
            <h1 class="banner-title">
            <?php 
              if( get_post_type() == 'car_offers' ){
                echo get_title_by_page_template( 'page-aanbod.php' );
              }else{
                the_title();
              }
            ?> 
            </h1>
          </div>
        </div>
      </div>
    </div>   
</section>

<section class="breadcrumbs-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-cntlr">
          <?php cbv_breadcrumbs(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
