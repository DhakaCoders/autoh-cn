<?php 
/*
  Template Name: Car offer 
*/
get_header();
$thisID = get_the_ID();
get_template_part('templates/pagebanner'); 
?>
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

                <?php 
                  $terms = get_terms( array(
                    'taxonomy' => 'offer_cat',
                    'hide_empty' => false,
                    'parent' => 0
                  ) );
                  
                ?>
                <?php if( $terms ): ?>
                <div class="ath-car-offer-link">
                  <span>Toon alleen:</span>
                  <ul class="reset-list">
                    <?php
                    foreach( $terms as $term ):
                    ?>
                    <li><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></li>
                    <?php endforeach; ?>

                  </ul>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php 

      $logoObj = get_field('ftlogo', 'options');
      if( is_array($logoObj) ){
        $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
      }else{
        $logo_tag = '';
      }
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(  
        'post_type' => 'car_offers',
        'posts_per_page' => 6,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => $paged,
      );
      $loop = new WP_Query( $args ); 

     ?>
    <div class="ath-car-grds">
      <?php if( $loop->have_posts() ): ?>
      <ul class="reset-list">
        <?php 
          while ( $loop->have_posts() ) : $loop->the_post();  
          $specs = get_field('car_specific', get_the_ID());
          $imgID = get_post_thumbnail_id(get_the_ID());
          $imgsrc = !empty($imgID)? cbv_get_image_src($imgID, 'cargrid'):'';
          $imgtag = !empty($imgID)? cbv_get_image_tag($imgID, 'cargrid'):'';
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
          <div class="border-btm"></div>
        </li>
        <?php endwhile; ?>
      </ul>
      <div class="post-pagi-ctlr">
        <?php 
          $big = 999999999; // need an unlikely integer
          echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $loop->max_num_pages,
            'type'  => 'list',
            'show_all' => false,
            'prev_text' => '<i class="fas fa-long-arrow-alt-left"></i>',
            'next_text' => '<i class="fas fa-long-arrow-alt-right"></i>',
            'type'      => 'list',
            'end_size'  => 3,
            'mid_size'  => 3,
          ) ); 
        ?>
      </div>
      <?php else: ?>
        <div class="no-results">No Results.</div>
      <?php endif; wp_reset_postdata();?>
    </div>
  </section>
</div>



<?php  get_footer();?>