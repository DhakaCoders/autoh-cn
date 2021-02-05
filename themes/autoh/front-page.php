<?php 
  get_header(); 
  $thisID = get_the_ID();
?>


<?php 
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
            <p><em>Contact met jouw autobedrijf!</em></p>
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
  $ws_title = get_field('ws_title', $thisID);
  $ws_description = get_field('ws_description', $thisID);
?>
<section class="workshop-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="Workshop-cntlr">
          <div class="workshop-desc">
            <?php 
              if( !empty($ws_title) ) printf('<h2 class="Workshop-title fl-h2">%s</h2>', $ws_title);
              if( !empty($ws_description)) echo wpautop($ws_description); 
            ?>
          </div>

          <?php 
            $quick_links = get_field('quick_links', HOMEID);
                if( $quick_links ):
          ?>
          <div class="Workshop-tags">
            <ul class="reset-list">
              <?php foreach( $quick_links as $quick_link ): ?>
              <li>
                 <?php printf('<a href="%s">%s</a>', $quick_link['wsql_url'], $quick_link['link_text'] ); ?>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>



<?php 
  $co_title = get_field('co_title', $thisID);
  $co_description = get_field('co_description', $thisID);
?>
<section class="ath-car-offer">
  <div class="ath-car-offer-enty-hdr">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="ath-car-offer-enty-hdr-ctlr">
            <div class="ath-car-offer-enty-hdr-inr">
              <?php 
                if( !empty($co_title) ) printf('<h2 class="ath-coeh-title fl-h2">%s</h2>', $co_title);
                if( !empty($co_description)) echo wpautop($co_description); 
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ath-car-grds">
    <ul class="reset-list">
      <li>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="ath-car-grds-items-ctlr">
                <div class="ath-car-grds-items">
                  <div class="ath-car-grd-item">
                    <div class="ath-car-grd-item-img-ctlr">
                      <h4 class="ath-car-grd-item-des-title show-sm"><a href="#">Volkswagen Caddy 1,6 TDI</a></h4>
                      <div class="ath-car-grd-item-img">
                        <a href="#" class="overlay-link"></a>
                        <div class="ath-car-grd-item-img-inr inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/ath-car-grd-item-img-01.jpg');">
                            <img src="<?php echo THEME_URI; ?>/assets/images/ath-car-grd-item-img-01.jpg">
                        </div>
                        
                        <div class="ath-car-grd-item-catagory show-sm">
                          <ul class="reset-list">
                            <li class="black"><span>DIESEL</span></li>
                            <li class="green"><span>€ 10.099,-</span></li>
                          </ul>
                        </div>
                        <div class="img-overlay">
                          <div class="ath-cgi-hover">
                            <div class="ath-cgi-hover-img">
                              <img src="<?php echo THEME_URI; ?>/assets/images/ftr-logo.png">
                            </div>
                            <div class="ath-cgi-hover-des">
                              <a href="#">Alle details bekijken ></a>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="ath-car-grd-item-des hide-sm">
                      <h4 class="ath-car-grd-item-des-title"><a href="#">Volkswagen Caddy 1,6 TDI</a></h4>
                      <p>Nette Caddy afkomstig uit de lease. Zeer netjes van binnen en buiten.</p>
                      <p>Auto is voorzien van diverse optie’s waaronder airco, xenon, electrische ramen, vergr. op afstandsbediening, sortimo opbergsysteem en trekhaak.</p>
                      <div class="ath-car-grd-item-catagory">
                        <ul class="reset-list">
                          <li><span>2012</span></li>
                          <li class="black"><span>DIESEL</span></li>
                          <li class="navyblue"><span>139.000 KM </span></li>
                          <li class="green"><span>€ 10.099,-</span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="border-btm"></div>
      </li>
      <li>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="ath-car-grds-items-ctlr">
                <div class="ath-car-grds-items">
                  <div class="ath-car-grd-item">
                    <div class="ath-car-grd-item-img-ctlr">
                      <h4 class="ath-car-grd-item-des-title show-sm"><a href="#">Volkswagen Caddy 1,6 TDI</a></h4>
                      <div class="ath-car-grd-item-img">
                        <a href="#" class="overlay-link"></a>
                        <div class="ath-car-grd-item-img-inr inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/ath-car-grd-item-img-01.jpg');">
                            <img src="<?php echo THEME_URI; ?>/assets/images/ath-car-grd-item-img-01.jpg">
                        </div>
                        <div class="ath-car-grd-item-catagory show-sm">
                          <ul class="reset-list">
                            <li class="black"><span>DIESEL</span></li>
                            <li class="green"><span>€ 10.099,-</span></li>
                          </ul>
                        </div>
                        <div class="img-overlay">
                          <div class="ath-cgi-hover">
                            <div class="ath-cgi-hover-img">
                              <img src="<?php echo THEME_URI; ?>/assets/images/ftr-logo.png">
                            </div>
                            <div class="ath-cgi-hover-des">
                              <a href="#">Alle details bekijken ></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="ath-car-grd-item-des hide-sm">
                      <h4 class="ath-car-grd-item-des-title"><a href="#">Volkswagen Caddy 1,6 TDI</a></h4>
                      <p>Nette Caddy afkomstig uit de lease. Zeer netjes van binnen en buiten.</p>
                      <p>Auto is voorzien van diverse optie’s waaronder airco, xenon, electrische ramen, vergr. op afstandsbediening, sortimo opbergsysteem en trekhaak.</p>
                      <div class="ath-car-grd-item-catagory">
                        <ul class="reset-list">
                          <li><span>2012</span></li>
                          <li class="black"><span>DIESEL</span></li>
                          <li class="navyblue"><span>139.000 KM </span></li>
                          <li class="green"><span>€ 10.099,-</span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="border-btm"></div>
      </li>
      <li>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="ath-car-grds-items-ctlr">
                <div class="ath-car-grds-items">
                  <div class="ath-car-grd-item">
                    <div class="ath-car-grd-item-img-ctlr">
                      <h4 class="ath-car-grd-item-des-title show-sm"><a href="#">Volkswagen Caddy 1,6 TDI</a></h4>
                      <div class="ath-car-grd-item-img">
                        <a href="#" class="overlay-link"></a>
                        <div class="ath-car-grd-item-img-inr inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/ath-car-grd-item-img-01.jpg');">
                            <img src="<?php echo THEME_URI; ?>/assets/images/ath-car-grd-item-img-01.jpg">
                        </div>
                        <div class="ath-car-grd-item-catagory show-sm">
                          <ul class="reset-list">
                            <li class="black"><span>DIESEL</span></li>
                            <li class="green"><span>€ 10.099,-</span></li>
                          </ul>
                        </div>
                        <div class="img-overlay">
                          <div class="ath-cgi-hover">
                            <div class="ath-cgi-hover-img">
                              <img src="<?php echo THEME_URI; ?>/assets/images/ftr-logo.png">
                            </div>
                            <div class="ath-cgi-hover-des">
                              <a href="#">Alle details bekijken ></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="ath-car-grd-item-des hide-sm">
                      <h4 class="ath-car-grd-item-des-title"><a href="#">Volkswagen Caddy 1,6 TDI</a></h4>
                      <p>Nette Caddy afkomstig uit de lease. Zeer netjes van binnen en buiten.</p>
                      <p>Auto is voorzien van diverse optie’s waaronder airco, xenon, electrische ramen, vergr. op afstandsbediening, sortimo opbergsysteem en trekhaak.</p>
                      <div class="ath-car-grd-item-catagory">
                        <ul class="reset-list">
                          <li><span>2012</span></li>
                          <li class="black"><span>DIESEL</span></li>
                          <li class="navyblue"><span>139.000 KM </span></li>
                          <li class="green"><span>€ 10.099,-</span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div class="ath-car-btn">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="ath-car-btn-ctlr">
            <div class="ath-car-btn-inr">
              <em><a href="#">Bekijk alle 57 occasions -></a></em>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  $mc_title = get_field('mc_title', $thisID);
  $mc_description = get_field('mc_description', $thisID);
  $mc_image = get_field('mc_image', $thisID);
?>
<section class="ath-microcar-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-6 order-2">
        <?php if($mc_image): ?>
        <div class="ath-microcar-img">
          <?php echo cbv_get_image_tag($mc_image, ''); ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="col-md-6 order-1">
        <div class="ath-microcar-des">
          <?php 
            if( !empty($mc_title) ) printf('<h2 class="ath-microcar-des-title">%s</h2>', $mc_title);
            if( !empty($mc_description)) echo wpautop($mc_description); 
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>