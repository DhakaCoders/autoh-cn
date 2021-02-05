<?php 

/*
  Template Name: Car offer 
*/
get_header();
$thisID = get_the_ID();
?>


<section class="banner-sec">
  <div class="banner-cntlr inline-bg clearfix" style="background-image: url('<?php echo THEME_URI;?>/assets/images/banner.jpg');"> </div> 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-desc clearfix">
            <h1 class="banner-title">Auto Aanbod</h1>
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
          <ul class="reset-list">
            <li><a href="#">home</a></li>
            <li class="active"><a href="#">auto aanbod</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>




<div class="aanbod-ctlr">
  <section class="ath-car-offer">
    <div class="ath-car-offer-enty-hdr">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <?php 
              $co_title = get_field('co_title', $thisID);
              $co_description = get_field('co_description', $thisID);
            ?>
            <div class="ath-car-offer-enty-hdr-ctlr">
              <div class="ath-car-offer-enty-hdr-inr">
                <?php 
                  if( !empty($co_title) ) printf('<h2 class="ath-coeh-title">%s</h2>', $co_title);
                  if( !empty($co_description)) echo wpautop($co_description); 
                ?>

                <div class="ath-car-offer-link">
                  <span>Toon alleen:</span>
                  <ul class="reset-list">
                    <li><a href="#">Personenauto’s</a></li>
                    <li><a href="#">Bedrijfswagens</a></li>
                    <li><a href="#">Brommobielen</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php 

        $args = array(  
          'post_type' => 'car_offers',
          'posts_per_page' => -1,
          'post_status' => 'publish',
          'posts_per_page' => 6, 
          /*'orderby’ => 'title', 
          'order’ => 'ASC', */
        );
        $loop = new WP_Query( $args ); 

     ?>
    <div class="ath-car-grds">
      <ul class="reset-list">
        <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
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
                          <?php if ( has_post_thumbnail() ): ?>
                          <div class="ath-car-grd-item-img-inr inline-bg" style="background: url('<?php the_post_thumbnail();?>');">
                              <img src="<?php echo THEME_URI;?>/assets/images/ath-car-grd-item-img-01.jpg">
                          </div>
                          <?php endif; ?>
                          <div class="ath-car-grd-item-catagory show-sm">
                            <ul class="reset-list">
                              <li class="black"><span>DIESEL</span></li>
                              <li class="green"><span>€ 10.099,-</span></li>
                            </ul>
                          </div>
                          <div class="img-overlay">
                            <div class="ath-cgi-hover">
                              <div class="ath-cgi-hover-img">
                                <img src="<?php echo THEME_URI;?>/assets/images/ftr-logo.png">
                              </div>
                              <div class="ath-cgi-hover-des">
                                <a href="#">Alle details bekijken ></a>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="ath-car-grd-item-des hide-sm">
                        <h4 class="ath-car-grd-item-des-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <?php the_excerpt(); ?>
                        <div class="ath-car-grd-item-catagory">
                          <?php 
                            $year = get_sub_field('link');
                          ?>
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
        <?php endwhile; wp_reset_postdata();?>
        <!-- <li>
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
                          <div class="ath-car-grd-item-img-inr inline-bg" style="background: url('<?php echo THEME_URI;?>/assets/images/ath-car-grd-item-img-01.jpg');">
                              <img src="<?php echo THEME_URI;?>/assets/images/ath-car-grd-item-img-01.jpg">
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
                                <img src="<?php echo THEME_URI;?>/assets/images/ftr-logo.png">
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
                          <div class="ath-car-grd-item-img-inr inline-bg" style="background: url('<?php echo THEME_URI;?>/assets/images/ath-car-grd-item-img-01.jpg');">
                              <img src="<?php echo THEME_URI;?>/assets/images/ath-car-grd-item-img-01.jpg">
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
                                <img src="<?php echo THEME_URI;?>/assets/images/ftr-logo.png">
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
                          <div class="ath-car-grd-item-img-inr inline-bg" style="background: url('<?php echo THEME_URI;?>/assets/images/ath-car-grd-item-img-01.jpg');">
                              <img src="<?php echo THEME_URI;?>/assets/images/ath-car-grd-item-img-01.jpg">
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
                                <img src="<?php echo THEME_URI;?>/assets/images/ftr-logo.png">
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
                          <div class="ath-car-grd-item-img-inr inline-bg" style="background: url('<?php echo THEME_URI;?>/assets/images/ath-car-grd-item-img-01.jpg');">
                              <img src="<?php echo THEME_URI;?>/assets/images/ath-car-grd-item-img-01.jpg">
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
                                <img src="<?php echo THEME_URI;?>/assets/images/ftr-logo.png">
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
                          <div class="ath-car-grd-item-img-inr inline-bg" style="background: url('<?php echo THEME_URI;?>/assets/images/ath-car-grd-item-img-01.jpg');">
                              <img src="<?php echo THEME_URI;?>/assets/images/ath-car-grd-item-img-01.jpg">
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
                                <img src="<?php echo THEME_URI;?>/assets/images/ftr-logo.png">
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
        </li> -->
      </ul>
    </div>
  </section>
</div>



<?php  get_footer();?>