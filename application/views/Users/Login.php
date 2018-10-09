<?php $this->load->view("templates/Header") ?>
<!-- Title Page -->
<?php echo form_open_multipart(base_url() . "Users/Login/"); ?>
<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="m-text26 p-b-36" style="text-align: center;">
          LOGIN
        </h4>
      </div>
      <!-- Mensajes de la app -->
      <div class="col-md-12"  style="color: red; text-align: center;">
        <strong>
          <?php echo validation_errors('<div style="color: red;">', '</div>'); ?>
          <?php echo $this->session->flashdata('error');?>
        </strong>
      </div>
      <!-- ****************  -->
      <div class="col-sm-12 col-md-4"></div>
      <div class="col-sm-12 col-md-4 p-b-30" style="padding-top: 15px;">
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtCorreo" class="sizefull s-text7 p-l-22 p-r-22" type="email" maxlength="50" name="txtCorreo" placeholder="ejemplo@ejemplo.com" required>
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtClave" class="sizefull s-text7 p-l-22 p-r-22" pattern=".{0}|.{8,}" required title="Debe tener almenos 8 caracteres" type="password" name="txtClave" placeholder="Password" required>
        </div>
        <div class="of-hidden size15 m-b-20" style="display: flex; justify-content: center; ">
          <div class="w-size25">
            <input value="Ingresar" class="flex-c-m size2 bg1 hov1 m-text3 trans-0-4" type="submit"/>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4"></div>
    </div>
  </div>
</section>
<?php echo form_close(); ?>
<?php $this->load->view("templates/Footer") ?>
