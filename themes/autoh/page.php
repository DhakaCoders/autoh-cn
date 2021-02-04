<?php 
get_header(); 
while( have_posts() ): the_post();
?>
<section class="banner-sec">
  <div class="banner-cntlr inline-bg clearfix" style="background-image: url('assets/images/banner.jpg');"> </div> 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-desc clearfix">
            <h1 class="banner-title"><?php the_title(); ?></h1>
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
            <li><a href="#">auto aanbod</a></li>
            <li class="active"><a href="#">volkswagen caddy 1.6TDI</a></li>
          </ul>
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
<?php get_footer(); ?>