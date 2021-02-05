<?php get_header(); ?>
<?php get_template_part('templates/pagebanner'); ?>
<?php 
while( have_posts() ): the_post(); 
$specs = get_field('car_specific', get_the_ID());
$content = get_field('content', get_the_ID());
?>
<div class="car-ctlr">
  <section class="car-entry-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="car-entry-sec-inr">
            <h2 class="ath-coeh-title"><?php the_title(); ?></h2>
            <?php if( !empty($content) ) echo wpautop( $content ); ?>
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
  </section>
</div>
<?php 
  $imgID = get_post_thumbnail_id(get_the_ID());
  $imgsrc = !empty($imgID)? cbv_get_image_src($imgID): THEME_URI.'/assets/images/product-img.jpg';
  $thumimgsrc = !empty($imgID)? cbv_get_image_src($imgID, 'gallery'): THEME_URI.'/assets/images/product-img.jpg';
  $galleries = get_field('gallery', get_the_ID());
?>
<section class="car-product-gallery">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="car-product-gallery-inr clearfix">
          <div class="thumbnails-cntlr hide-md">
            <?php if( $galleries ): ?>
            <div class="thumbnails">
              <?php 
              $i = 1;
              foreach( $galleries as $gallery_id ): 
              $thum_imgfull = !empty($gallery_id)? cbv_get_image_src($gallery_id):'';
              $thum_imgsrc = !empty($gallery_id)? cbv_get_image_src($gallery_id, 'galleryThumb'):'';
              if( $i < 3 ){
              ?>
              <div class="woocommerce-product-gallery__image">
                <a class="woocommerce-main-image zoom fancybox" style="background: url(<?php echo $thum_imgfull; ?>);" data-fancybox="gallery" href="<?php echo $thum_imgsrc; ?>">
                </a>
              </div>
            <?php }elseif( $i == 3){ ?>
              <div class="woocommerce-product-gallery__image">
                  <a class="woocommerce-main-image zoom fancybox" data-fancybox="gallery" href="<?php echo $thum_imgfull; ?>">
                    <span>BEKIJK ALLES</span>
                  </a>
                </div>
            <?php }elseif($i > 3 ){ ?>
              <div class="woocommerce-product-gallery__image" style="display: none;">
                <a class="woocommerce-main-image zoom fancybox" style="background: url(<?php echo $thum_imgfull; ?>);" data-fancybox="gallery" href="<?php echo $thum_imgsrc; ?>">
                </a>
              </div>
            <?php } ?>
            <?php $i++; endforeach;  ?>
            </div>
           <?php endif; ?>
          </div>
          <div class="woocommerce-product-gallery">
            <div class="woocommerce-product-gallery__image">
              <a class="woocommerce-main-image fancybox" style="background: url(<?php echo $imgsrc; ?>);" data-fancybox="gallery" href="<?php echo $thumimgsrc; ?>">
              </a>
            </div>
          </div>
          <div class="thumbnails-cntlr show-md">
            <?php if( $galleries ): ?>
            <div class="thumbnails">
              <?php 
              $i = 1;
              foreach( $galleries as $gallery_id ): 
              $thum_imgfull = !empty($gallery_id)? cbv_get_image_src($gallery_id):'';
              $thum_imgsrc = !empty($gallery_id)? cbv_get_image_src($gallery_id, 'galleryThumb'):'';
              if( $i < 3 ){
              ?>
              <div class="woocommerce-product-gallery__image">
                <a class="woocommerce-main-image zoom fancybox" style="background: url(<?php echo $thum_imgfull; ?>);" data-fancybox="gallery" href="<?php echo $thum_imgsrc; ?>">
                </a>
              </div>
            <?php }elseif( $i == 3){ ?>
              <div class="woocommerce-product-gallery__image">
                  <a class="woocommerce-main-image zoom fancybox" data-fancybox="gallery" href="<?php echo $thum_imgfull; ?>">
                    <span>BEKIJK ALLES</span>
                  </a>
                </div>
            <?php }elseif($i > 3 ){ ?>
              <div class="woocommerce-product-gallery__image" style="display: none;">
                <a class="woocommerce-main-image zoom fancybox" style="background: url(<?php echo $thum_imgfull; ?>);" data-fancybox="gallery" href="<?php echo $thum_imgsrc; ?>">
                </a>
              </div>
            <?php } ?>
            <?php $i++; endforeach;  ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="long-description-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="long-description-inr">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>
<?php  get_footer();?>