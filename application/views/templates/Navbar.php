<!-- Header -->
<header class="header1">
  <!-- Header desktop -->
  <div class="container-menu-header">
    <div class="topbar">
      <div class="topbar-social">
        <a href="#" class="topbar-social-item fa fa-facebook"></a>
        <a href="#" class="topbar-social-item fa fa-instagram"></a>
        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
      </div>

      <span class="topbar-child1">
        Envío gratis, en compras a partir de $50
      </span>

      <div class="topbar-child2">
        <span class="topbar-email">
          <?php if ($this->session->userdata('ci') !== null){ ?>
            <a href="<?php echo base_url() ?>Users/Profile"><?php echo $this->session->userdata('correo') ?> </a>|
            <a href="<?php echo base_url() ?>Users/Logout"> Salir</a>
          <?php }else{ ?>
          <a href="<?php echo base_url() ?>Users/Login">Login </a>|
          <a href="<?php echo base_url() ?>Users/Signup"> Signup</a>
        <?php } ?>
        </span>
      </div>
    </div>

    <div class="wrap_header">
      <!-- Logo -->
      <a href="<?php echo base_url(); ?>" class="logo">
        <img src="<?php echo base_url(); ?>/assets/images/icons/logo.png" alt="IMG-LOGO">
      </a>

      <!-- Menu -->
      <div class="wrap_menu">
        <nav class="menu">
          <ul class="main_menu">
            <li>
              <a href="<?php echo base_url(); ?>">Inicio</a>
            </li>

            <li>
              <a href="<?php echo base_url('Products/Index') ?>">Categorías</a>
              <ul class="sub_menu">
                <?php foreach ($this->session->categories as $cat) { ?>
                  <li>
                    <a href="<?php echo base_url('Products/Categorie/'.encryptId($cat->id)); ?>">
                      <?php echo $cat->categoria; ?>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>Products">Productos</a>
              <?php if (($this->session->userdata('ci')!==null) && ($this->session->userdata('tipo_usuario') !== 'c')) { ?>
              <ul class="sub_menu">
                <li><a href="<?php echo base_url(); ?>Products/Product">Agregar Productos</a></li>
              </ul>
              <?php } ?>
            </li>

            <li>
              <a href="#">Servicios</a>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>Welcome/About">Quiénes Somos</a>
            </li>

            <li>
              <a href="<?php echo base_url() ?>Welcome/Contact">Contacto</a>
            </li>

            <?php if (($this->session->userdata('ci')!==null) && ($this->session->userdata('tipo_usuario') == 'a')) { ?>
              <li>
                <a href="<?php echo base_url() ?>Users/Role">Admin</a>
              </li>
            <?php } ?>
          </ul>
        </nav>
      </div>

      <!-- Header Icon -->
      <div class="header-icons">
        <a href="<?php echo ($this->session->userdata('ci')!==null)?base_url('Users/Profile'):base_url('Users/Login'); ?>" class="header-wrapicon1 dis-block">
          <img src="<?php echo base_url(); ?>/assets/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
        </a>

        <span class="linedivide1"></span>

        <div class="header-wrapicon2">
          <img src="<?php echo base_url(); ?>/assets/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
          <span class="header-icons-noti">0</span>

          <!-- Header cart noti -->
          <div class="header-cart header-dropdown">
            <ul class="header-cart-wrapitem">
              <li class="header-cart-item">
                <div class="header-cart-item-img">
                  <img src="<?php echo base_url(); ?>/assets/images/item-cart-01.jpg" alt="IMG">
                </div>

                <div class="header-cart-item-txt">
                  <a href="#" class="header-cart-item-name">
                    White Shirt With Pleat Detail Back
                  </a>

                  <span class="header-cart-item-info">
                    1 x $19.00
                  </span>
                </div>
              </li>

              <li class="header-cart-item">
                <div class="header-cart-item-img">
                  <img src="<?php echo base_url(); ?>/assets/images/item-cart-02.jpg" alt="IMG">
                </div>

                <div class="header-cart-item-txt">
                  <a href="#" class="header-cart-item-name">
                    Converse All Star Hi Black Canvas
                  </a>

                  <span class="header-cart-item-info">
                    1 x $39.00
                  </span>
                </div>
              </li>

              <li class="header-cart-item">
                <div class="header-cart-item-img">
                  <img src="<?php echo base_url(); ?>/assets/images/item-cart-03.jpg" alt="IMG">
                </div>

                <div class="header-cart-item-txt">
                  <a href="#" class="header-cart-item-name">
                    Nixon Porter Leather Watch In Tan
                  </a>

                  <span class="header-cart-item-info">
                    1 x $17.00
                  </span>
                </div>
              </li>
            </ul>

            <div class="header-cart-total">
              Total: $75.00
            </div>

            <div class="header-cart-buttons">
              <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                  View Cart
                </a>
              </div>

              <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                  Check Out
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header Mobile -->
  <div class="wrap_header_mobile">
    <!-- Logo moblie -->
    <a href="<?php echo base_url(); ?>" class="logo-mobile">
      <img src="<?php echo base_url(); ?>/assets/images/icons/logo.png" alt="IMG-LOGO">
    </a>

    <!-- Button show menu -->
    <div class="btn-show-menu">
      <!-- Header Icon mobile -->
      <div class="header-icons-mobile">
        <a href="<?php echo ($this->session->userdata('ci')!==null)?base_url('Users/Profile'):base_url('Users/Login'); ?>" class="header-wrapicon1 dis-block">
          <img src="<?php echo base_url(); ?>/assets/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
        </a>

        <span class="linedivide2"></span>

        <div class="header-wrapicon2">
          <img src="<?php echo base_url(); ?>/assets/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
          <span class="header-icons-noti">0</span>

          <!-- Header cart noti -->
          <div class="header-cart header-dropdown">
            <ul class="header-cart-wrapitem">
              <li class="header-cart-item">
                <div class="header-cart-item-img">
                  <img src="<?php echo base_url(); ?>/assets/images/item-cart-01.jpg" alt="IMG">
                </div>

                <div class="header-cart-item-txt">
                  <a href="#" class="header-cart-item-name">
                    White Shirt With Pleat Detail Back
                  </a>

                  <span class="header-cart-item-info">
                    1 x $19.00
                  </span>
                </div>
              </li>

              <li class="header-cart-item">
                <div class="header-cart-item-img">
                  <img src="<?php echo base_url(); ?>/assets/images/item-cart-02.jpg" alt="IMG">
                </div>

                <div class="header-cart-item-txt">
                  <a href="#" class="header-cart-item-name">
                    Converse All Star Hi Black Canvas
                  </a>

                  <span class="header-cart-item-info">
                    1 x $39.00
                  </span>
                </div>
              </li>

              <li class="header-cart-item">
                <div class="header-cart-item-img">
                  <img src="<?php echo base_url(); ?>/assets/images/item-cart-03.jpg" alt="IMG">
                </div>

                <div class="header-cart-item-txt">
                  <a href="#" class="header-cart-item-name">
                    Nixon Porter Leather Watch In Tan
                  </a>

                  <span class="header-cart-item-info">
                    1 x $17.00
                  </span>
                </div>
              </li>
            </ul>

            <div class="header-cart-total">
              Total: $75.00
            </div>

            <div class="header-cart-buttons">
              <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                  View Cart
                </a>
              </div>

              <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                  Check Out
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>
  </div>


  <!-- Menu Mobile -->
  <div class="wrap-side-menu" >
    <nav class="side-menu">
      <ul class="main-menu">
        <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
          <span class="topbar-child1">
            Envío gratis, en compras a partir de $50
          </span>
        </li>

        <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
          <div class="topbar-child2-mobile">
            <span class="topbar-email">
              <?php if ($this->session->userdata('ci') !== null){ ?>
                <a href="<?php echo base_url() ?>Users/Profile"><?php echo $this->session->userdata('correo') ?> </a>|
                <a href="<?php echo base_url() ?>Users/Logout"> Salir</a>
              <?php }else{ ?>
              <a href="<?php echo base_url() ?>Users/Login">Login </a>|
              <a href="<?php echo base_url() ?>Users/Signup"> Signup</a>
            <?php } ?>
            </span>
          </div>
        </li>

        <li class="item-topbar-mobile p-l-10">
          <div class="topbar-social-mobile">
            <a href="#" class="topbar-social-item fa fa-facebook"></a>
            <a href="#" class="topbar-social-item fa fa-instagram"></a>
            <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
            <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
            <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
          </div>
        </li>

        <li class="item-menu-mobile">
            <a href="<?php echo base_url(); ?>">Inicio</a>
        </li>

        <li class="item-menu-mobile">
          <a href="<?php echo base_url('Products/Index') ?>">Categorías</a>
          <ul class="sub-menu">
            <?php foreach ($categorias as $cat) { ?>
              <li>
                <a href="<?php echo base_url('Products/Categorie/'.encryptId($cat->id)); ?>">
                  <?php echo $cat->categoria; ?>
                </a>
              </li>
            <?php } ?>
          </ul>
          <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
        </li>

        <li class="item-menu-mobile">
          <a href="<?php echo base_url(); ?>Products">Productos</a>
          <?php if (($this->session->userdata('ci')!==null) && ($this->session->userdata('tipo_usuario') !== 'c')) { ?>
          <ul class="sub_menu">
            <li><a href="<?php echo base_url(); ?>Products/Product">Agregar Productos</a></li>
          </ul>
          <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
          <?php } ?>
        </li>

        <li class="item-menu-mobile">
          <a href="#">Servicios</a>
        </li>

        <li class="item-menu-mobile">
          <a href="<?php echo base_url(); ?>Welcome/About">Quiénes Somos</a>
        </li>

        <li class="item-menu-mobile">
          <a href="<?php echo base_url() ?>Welcome/Contact">Contacto</a>
        </li>

        <?php if (($this->session->userdata('ci')!==null) && ($this->session->userdata('tipo_usuario') == 'a')) { ?>
          <li class="item-menu-mobile">
            <a href="<?php echo base_url() ?>Users/Role">Admin</a>
          </li>
        <?php } ?>
      </ul>
    </nav>
  </div>
</header>
