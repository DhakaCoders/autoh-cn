<?php 

  $logoObj = get_field('ftlogo', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }

  $address = get_field('address', 'options');

  $spacialArry = array(".", "/", "+", "-", " ");$replaceArray = '';
  $show_telephone_2 = get_field('telephone_2', 'options');
  $telephone_2  = trim(str_replace($spacialArry, $replaceArray, $show_telephone_2 ));

  $copyright_text = get_field('copyright_text', 'options');


?>

<footer class="footer-wrp">
  <div class="ftr-top">
    <div class="ftr-top-rgt-gray-bg"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="ftr-top-inr clearfix">
            <div class="ftr-top-rgt">
              <?php if( !empty( $logo_tag ) ) :?>
              <div class="ftr-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php echo $logo_tag; ?>
                </a>
              </div>
              <?php endif; ?>
              
              <div class="ftr-top-rgt-menu">
                <ul class="reset-list">
                  <?php 
                    if( !empty($address) ) printf('<li><a target="_blank" href="%s">%s</a></li>', $address, $address);
                    if( !empty($show_telephone_2) ) printf('<li><a href="tel:%s">%s</a></li>', $telephone_2, $show_telephone_2);
                   ?>
                </ul>
              </div>

            </div>
            <div class="ftr-top-lft clearfix">
              <div class="ftr-top-lft-menu col-menu-1">
                <h5 class="ftr-menu-title">Werkplaats</h5>

                <?php 
                  $mmenuOptions = array( 
                      'theme_location' => 'cbv_footer_menu_1', 
                      'menu_class' => 'clearfix reset-list',
                      'container' => false,
                    );
                  wp_nav_menu( $mmenuOptions ); 
                ?>
                <!-- ul class="reset-list">
                  <li><a href="#">Apk Keuring</a></li>
                  <li><a href="#">Onderhoud</a></li>
                  <li><a href="#">Diagnose</a></li>
                  <li><a href="#">Onderdelen</a></li>
                  <li><a href="#">Banden</a></li>
                </ul> -->
              </div>
              <div class="ftr-top-lft-menu col-menu-2">
                <h5 class="ftr-menu-title">Bedrijfsinformatie</h5>
                <?php 
                  $mmenuOptions = array( 
                      'theme_location' => 'cbv_footer_menu_2', 
                      'menu_class' => 'clearfix reset-list',
                      'container' => false,
                    );
                  wp_nav_menu( $mmenuOptions ); 
                ?>
                <!-- <ul class="reset-list">
                  <li><a href="#">Over ons</a></li>
                  <li><a href="#">Klantervaringen</a></li>
                  <li><a href="#">Certificaten</a></li>
                </ul> -->
              </div>
              <div class="ftr-top-lft-menu col-menu-3">
                <h5 class="ftr-menu-title">Contact</h5>
                <?php 
                  $mmenuOptions = array( 
                      'theme_location' => 'cbv_footer_menu_3', 
                      'menu_class' => 'clearfix reset-list',
                      'container' => false,
                    );
                  wp_nav_menu( $mmenuOptions ); 
                ?>
                <!-- <ul class="reset-list">
                  <li><a href="#">Contact opnemen</a></li>
                  <li><a href="#">Openingstijden</a></li>
                  <li><a href="#">Contactgegevens</a></li>
                </ul> -->
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div> 
  <div class="ftr-btm">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="ftr-btm-inr clearfix">
            <div class="ftr-btn-menu">
              <?php 
                  $mmenuOptions = array( 
                      'theme_location' => 'cbv_copyright_menu', 
                      'menu_class' => 'clearfix reset-list',
                      'container' => false,
                    );
                  wp_nav_menu( $mmenuOptions ); 
                ?>
            </div>

            <?php if( !empty($copyright_text) ) printf('<div class="ftr-copywrite"><p>%s</p></div>', $copyright_text); ?>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>