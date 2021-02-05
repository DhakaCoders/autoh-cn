<?php 
  get_header();  
  $homebanner = get_field('homebanner', HOMEID);
  if($homebanner):
    $homebanner_src = !empty($homebanner)? cbv_get_image_src( $homebanner, 'full' ): '';
?>
<section class="banner-sec has-banner">
  <div class="banner-bg inline-bg clearfix" style="background-image: url(<?php echo $homebanner_src; ?>);"></div> 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        </div>
      </div>
    </div>   
</section>

<?php endif; ?>

<section class="company-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="company-sec-inr">
          <?php  the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  $email = get_field('email', 'options'); 
  $show_telephone_1 = get_field('telephone_1', 'options');
  $telephone_1  = phone_preg($show_telephone_1);
  $whatsapp = get_field('whatsapp', 'options'); 
?>
<section class="hm-contact-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-contact-cntlr">
          <div class="hm-contact-desc">
            <p><em><?php _e( 'Contact met jouw autobedrijf!', THEME_NAME ); ?></em></p>
          </div>
          <div class="hm-contact-items">
            <ul class="reset-list">
              <?php if( !empty($show_telephone_1 ) ): ?>
              <li>
                <div class="hm-contact-item bg-blue">
                  <a class="overlay-link" href="tel:<?php echo $telephone_1; ?>"></a>
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/cn-mbl-icon.png" alt=""></i>
                  <strong class="hm-contact-item-sub-title"><?php echo $show_telephone_1; ?></strong>
                  <h3 class="hm-contact-item-title"><?php _e( 'Bel ons', THEME_NAME ); ?></h3>
                </div>
              </li>
              <?php endif; ?>
              <?php if( !empty($email) ): ?>
               <li>
                <div class="hm-contact-item bg-sky">
                  <a class="overlay-link" href="mailto:<?php echo $email; ?>"></a>
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/cn-email-icon.png" alt=""></i>
                  <strong class="hm-contact-item-sub-title"><?php _e( 'verstuur een', THEME_NAME ); ?></strong>
                  <h3 class="hm-contact-item-title"><?php _e( 'E-mail', THEME_NAME ); ?></h3>
                </div>
              </li>
              <?php endif; ?>
              <?php if( !empty($whatsapp) ): ?>
               <li>
                <div class="hm-contact-item bg-green hm-contact-whapp-item">
                  <a class="overlay-link" href="<?php echo $whatsapp; ?>"></a>
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/cn-whatapps-icon.png" alt=""></i>
                  <strong class="hm-contact-item-sub-title"><?php _e( 'stuur ons een', THEME_NAME ); ?></strong>
                  <h3 class="hm-contact-item-title"><?php _e( 'Whatsapp', THEME_NAME ); ?></h3>
                </div>
              </li>
              <?php endif;?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  $workshop = get_field('workshopsec', HOMEID);
  if( $workshop ):
?>
<section class="workshop-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="Workshop-cntlr">
          <div class="workshop-desc">
            <?php 
              if( !empty($workshop['title']) ) printf('<h2 class="Workshop-title fl-h2">%s</h2>', $workshop['title']);
              if( !empty($workshop['description'])) echo wpautop($workshop['description']); 
            ?>
          </div>

          <?php 
            $quick_links = $workshop['quick_links'];
            if( $quick_links ):
          ?>
          <div class="Workshop-tags">
            <ul class="reset-list">
              <?php 
                foreach( $quick_links as $quick_link ):
                $qlink = $quick_link['link'];
                if( is_array( $qlink ) &&  !empty( $qlink['url'] ) ){
                  printf('<li><a href="%s" target="%s">%s</a></li>', $qlink['url'], $qlink['target'], $qlink['title']); 
                }
                endforeach; 
              ?>
            </ul>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<?php 
  $coffer = get_field('current_offer', HOMEID);
?>
<section class="ath-car-offer">
  <?php if( $coffer ): ?>
  <div class="ath-car-offer-enty-hdr">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="ath-car-offer-enty-hdr-ctlr">
            <div class="ath-car-offer-enty-hdr-inr">
              <?php 
                if( !empty($coffer['title']) ) printf('<h2 class="ath-coeh-title fl-h2">%s</h2>', $coffer['title']);
                if( !empty($coffer['description'])) echo wpautop($coffer['description']); 
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php 
    $offersIDS = $coffer['select_offer'];
    if( !empty($offersIDS) ){
      $count = count($offersIDS);
      $offerIDS = ( $count > 1 )? $offersIDS: $offersIDS;
      $offerQuery = new WP_Query(array(
        'post_type' => 'car_offers',
        'posts_per_page'=> $count,
        'post__in' => $offerIDS,
        'orderby' => 'date',
        'order'=> 'asc',

      ));
          
    }else{
      $offerQuery = new WP_Query(array(
        'post_type' => 'car_offers',
        'posts_per_page'=> 3,
        'orderby' => 'date',
        'order'=> 'desc',

      ));
    }
    

    if( $offerQuery->have_posts() ):
      $countQuery = new WP_Query(array('post_type' => 'car_offers'));
      $carofferCount = $countQuery->found_posts;
  ?>
  <div class="ath-car-grds">
    <ul class="reset-list">
      <?php 
        $total_current_offer = $offerQuery->found_posts;
        $i = 1;
        while ( $offerQuery->have_posts() ) : $offerQuery->the_post();
        $specs = get_field('car_specific', get_the_ID());  
        $imgID = get_post_thumbnail_id(get_the_ID());
        $imgsrc = !empty($imgID)? cbv_get_image_src($imgID, 'cargrid'): '';
        $imgtag = !empty($imgID)? cbv_get_image_tag($imgID, 'cargrid'): '';
      ?>
      <li>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="ath-car-grds-items-ctlr">
                <div class="ath-car-grds-items">
                  <div class="ath-car-grd-item">
                    <div class="ath-car-grd-item-img-ctlr">
                      <h4 class="ath-car-grd-item-des-title show-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <div class="ath-car-grd-item-img">
                        <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                        <div class="ath-car-grd-item-img-inr inline-bg" style="background: url('<?php echo $imgsrc; ?>');">
                            <?php echo $imgtag; ?>
                        </div>
                        
                        <div class="ath-car-grd-item-catagory show-sm">
                          <ul class="reset-list">
                            <?php if( !empty($specs['co_fuel']) ) printf('<li class="black"><span>%s</span></li>', $specs['co_fuel']); ?>
                            <?php if( !empty($specs['co_price']) ) printf('<li class="green"><span>%s ,-</span></li>', $specs['co_price']); ?>
                          </ul>
                        </div>
                        <div class="img-overlay">
                          <div class="ath-cgi-hover">
                            <div class="ath-cgi-hover-img">
                              <img src="<?php echo THEME_URI; ?>/assets/images/ftr-logo.png">
                            </div>
                            <div class="ath-cgi-hover-des">
                              <a href="<?php the_permalink(); ?>"><?php _e( 'Alle details bekijken', THEME_NAME ); ?> ></a>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="ath-car-grd-item-des hide-sm">
                      <h4 class="ath-car-grd-item-des-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <?php the_excerpt(); ?>
                      <div class="ath-car-grd-item-catagory">
                        <ul class="reset-list">
                          <?php if( !empty($specs['co_year']) ) printf('<li><span>%s</span></li>', $specs['co_year']); ?>
                          <?php if( !empty($specs['co_fuel']) ) printf('<li class="black"><span>%s</span></li>', $specs['co_fuel']); ?>
                          <?php if( !empty($specs['co_km']) ) printf('<li class="navyblue"><span>%s KM</span></li>', $specs['co_km']); ?>
                          <?php if( !empty($specs['co_price']) ) printf('<li class="green"><span>%s ,-</span></li>', $specs['co_price']); ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if( $total_current_offer != $i ) echo '<div class="border-btm"></div>'; ?>
      </li>
      <?php $i++; endwhile; ?>
    </ul>
  </div>

  <div class="ath-car-btn">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="ath-car-btn-ctlr">
            <div class="ath-car-btn-inr">
              <em><a href="<?php echo get_link_by_page_template( 'page-aanbod.php' );?>">Bekijk alle <?php echo $carofferCount; ?> occasions -></a></em>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; wp_reset_postdata(); ?>
</section>
<?php 
  $microcars = get_field('microcarssec', HOMEID);
  if( $microcars ):
?>
<section class="ath-microcar-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-6 order-2">
        <?php if( !empty($microcars['image']) ): ?>
        <div class="ath-microcar-img">
          <?php echo cbv_get_image_tag($microcars['image'], ''); ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="col-md-6 order-1">
        <div class="ath-microcar-des">
          <?php 
            if( !empty($microcars['title']) ) printf('<h2 class="ath-microcar-des-title">%s</h2>', $microcars['title']);
            if( !empty($microcars['description'])) echo wpautop($microcars['description']); 
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>