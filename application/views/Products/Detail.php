<?php $this->load->view("templates/Header") ?>

<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
  <div class="flex-w flex-sb">
    <div class="w-size13 p-t-30 respon5">
      <div class="wrap-slick3 flex-sb flex-w">
        <div class="wrap-slick3-dots"></div>

        <div class="slick3">
          <?php foreach ($images as $row) { ?>
          <div class="item-slick3" data-thumb="<?php echo base_url('uploads/files/'.$row->image_name); ?>">
            <div class="wrap-pic-w">
              <img src="<?php echo base_url('uploads/files/'.$row->image_name); ?>" alt="IMG-PRODUCT">
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="w-size14 p-t-30 respon5">
      <h4 class="product-detail-name m-text16 p-b-13">
        <?php echo $producto->producto; ?>
      </h4>

      <span class="m-text17">
        $<?php echo $producto->precio; ?>
      </span>

      <!--  -->
      <div class="p-t-33 p-b-60">

        <div class="flex-r-m flex-w p-t-10">
          <div class="w-size16 flex-m flex-w">
            <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
              <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
              </button>

              <input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

              <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
              </button>
            </div>

            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
              <!-- Button -->
              <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="p-b-45">
        <span class="s-text8 m-r-35">Codigo: <?php echo $producto->codigo; ?></span>
      </div>

      <!--  -->
      <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
        <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
          Descripción
          <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
          <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
        </h5>

        <div class="dropdown-content dis-none p-t-15 p-b-23">
          <p class="s-text8">
            <?php echo $producto->descripcion; ?>
          </p>
        </div>
      </div>

      <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
        <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
          Información Adicional
          <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
          <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
        </h5>

        <div class="dropdown-content dis-none p-t-15 p-b-23">
          <p class="s-text8">
            Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Relate Product -->
<section class="relateproduct bgwhite p-t-45 p-b-138">
  <div class="container">
    <div class="sec-title p-b-60">
      <h3 class="m-text5 t-center">
        Productos Relacionados
      </h3>
    </div>

    <!-- Slide2 -->
    <div class="wrap-slick2">
      <div class="slick2">
        <?php foreach ($rproducts as $row) { ?>
        <div class="item-slick2 p-l-15 p-r-15">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-img wrap-pic-w of-hidden pos-relative">
              <img src="<?php echo base_url('uploads/files/'.$row->imagen); ?>" alt="IMG-PRODUCT">

              <div class="block2-overlay trans-0-4">
                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                  <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                  <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                </a>

                <div class="block2-btn-addcart w-size1 trans-0-4">
                  <!-- Button -->
                  <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                    Add to Cart
                  </button>
                </div>
              </div>
            </div>

            <div class="block2-txt p-t-20">
              <a href="<?php echo base_url('Products/Detail/'.encryptId($row->id)); ?>" class="block2-name dis-block s-text3 p-b-5">
                <?php echo $row->producto; ?>
              </a>

              <span class="block2-price m-text6 p-r-5">
                $<?php echo $row->precio; ?>
              </span>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

  </div>
</section>
<?php $this->load->view("templates/Footer") ?>
