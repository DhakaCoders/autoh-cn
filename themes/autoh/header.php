<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?>

  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->	
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
  $logoObj = get_field('hdlogo', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }

  $email = get_field('email', 'options'); 

  /*$spacialArry = array(".", "/", "+", "-", " ");$replaceArray = '';*/
  $show_telephone_1 = get_field('telephone_1', 'options');
 /* $telephone_1  = trim(str_replace($spacialArry, $replaceArray, $show_telephone_1 ));*/
  $telephone_1  = phone_preg($show_telephone_1);
?>

<header class="header">
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hdr-top-inr">

            <?php if( !empty( $logo_tag ) ) :?>
            <div class="hdr-logo">
              <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo $logo_tag; ?>
              </a>
            </div>
            <?php endif; ?>

            <ul class="reset-list">
              <?php if( !empty($email) ): ?>
              <li>
                <a href="mailto:<?php echo $email; ?>">
                  <span> <?php echo $email; ?></span>
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/mail-icon.png" alt=""></i>
                </a>
              </li>
              <?php endif; if( !empty($show_telephone_1 ) ): ?>
              <li class="hdr-tel"><a href="tel:<?php echo $telephone_1; ?>">
                <span><?php echo $show_telephone_1; ?></span>
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/tell-icon.png" alt=""></i>
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-menu">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hdr-btm-inr">
            <nav class="main-nav">
              <?php 
                  $mmenuOptions = array( 
                      'theme_location' => 'cbv_main_menu', 
                      'menu_class' => 'clearfix reset-list',
                      'container' => 'mnav',
                      'container_class' => 'mnav'
                    );
                  wp_nav_menu( $mmenuOptions ); 
                ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="xs-header-menu-cntlr">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="xs-header-menu">
            <?php if( !empty($show_telephone_1) ): ?>
            <div class="xs-hdr-menu-tell xs-hdr-menu-contact">
              <a href="tel:<?php echo $telephone_1; ?>"><i><img src="<?php echo THEME_URI; ?>/assets/images/xs-hdr-tell-icon.png" alt=""></i></a>
            </div>
            <?php endif; if( !empty($email) ): ?>
            <div class="xs-hdr-menu-email xs-hdr-menu-contact">
              <a href="mailto:<?php echo $email; ?>"><i><img src="<?php echo THEME_URI; ?>/assets/images/xs-hdr-mail-icon.png" alt=""></i></a>
            </div>
            <?php endif; ?>
            <div class="xs-hdr-nav">
              <div class="xs-hdr-nav-humberger">
                <div class="humberger-icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
                <strong class="humberger-icon-title">MENU</strong>
                <strong class="humberger-cross-title">MENU SLUITEN</strong>
              </div>
              <nav class="main-nav">
                <?php 
                  $mmenuOptions = array( 
                      'theme_location' => 'cbv_main_menu', 
                      'menu_class' => 'clearfix reset-list',
                      'container' => 'mnav',
                      'container_class' => 'mnav'
                    );
                  wp_nav_menu( $mmenuOptions ); 
                ?>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
