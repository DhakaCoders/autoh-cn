<?php 
get_header(); 
get_template_part('templates/pagebanner');
while( have_posts() ): the_post();
?>
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