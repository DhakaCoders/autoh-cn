<section class="banner-sec">
  <div class="banner-cntlr clearfix"> </div> 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-desc clearfix">
            <h1 class="banner-title">
            <?php 
              if( get_post_type() == 'car_offers' ){
                $page_details = get_pages( array(
                 'post_type' => 'page',
                 'meta_key' => '_wp_page_template',
                 'hierarchical' => 0,
                 'meta_value' => 'page-aanbod.php'
                ));
                foreach($page_details as $page_detail){
                  echo $page_detail->post_title;
                }
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
