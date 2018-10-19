<?php $this->load->view("templates/Header") ?>
<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url(); ?>assets/images/heading-pages-03.jpg);">
  <h2 class="l-text2 t-center">
    Registro de Usuario
  </h2>
  <p class="m-text13 t-center">
    Formulario para registro de usuarios
  </p>
</section>

<?php echo form_open_multipart(base_url() . "Users/AddUser/"); ?>
<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="m-text26 p-b-36" style="text-align: center;">
          USUARIO
        </h4>
      </div>
      <!-- Mensajes de la app -->
      <div class="col-md-12"  style="color: red; text-align: center;">
        <strong>
          <?php echo validation_errors('<div style="color: red;">', '</div>'); ?>
          <?php echo $this->session->flashdata('error');?>
        </strong>
      </div>
      <div class="col-md-12" style="color: green; text-align:center;">
        <strong>
          <?php echo $this->session->flashdata('message');?>
        </strong>
      </div>
      <!-- ****************  -->
      <div class="col-md-6 p-b-30" style="padding-top: 15px;">
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtCi" class="sizefull s-text7 p-l-22 p-r-22" maxlength="15" type="text" name="txtCi" placeholder="Número de CI" required>
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtNombres" class="sizefull s-text7 p-l-22 p-r-22" type="text" maxlength="50" name="txtNombres" placeholder="Nombres Completos">
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtDireccion" class="sizefull s-text7 p-l-22 p-r-22" type="text" maxlength="100" name="txtDireccion" placeholder="Dirección">
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtCorreo" class="sizefull s-text7 p-l-22 p-r-22" type="email" maxlength="50" name="txtCorreo" placeholder="ejemplo@ejemplo.com" required>
        </div>
      </div>

      <div class="col-md-6" style="padding-top: 15px;">
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtFechaNac" class="form-control sizefull s-text7 p-l-22 p-r-22" type="text" data-date-format="yyyy-mm-dd" name="txtFechaNac" placeholder="Fecha de Nacimiento" required>
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtApellidos" class="sizefull s-text7 p-l-22 p-r-22" type="text" maxlength="50" name="txtApellidos" placeholder="Apellidos Completos" required>
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtTelefono" class="sizefull s-text7 p-l-22 p-r-22" type="phone" maxlength="15" name="txtTelefono" placeholder="Telefono">
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtClave" class="sizefull s-text7 p-l-22 p-r-22" pattern=".{0}|.{8,}" required title="Debe tener almenos 8 caracteres" type="password" name="txtClave" placeholder="Password" required>
        </div>
      </div>
      <div class="col-md-6 m-b-20" style="display: flex; justify-content: center; ">
        <div class="w-size25">
          <a href="<?php echo base_url() . "Users/Signup"; ?>" class="flex-c-m size2 bg0 hov1 m-text3 trans-0-4">
            Cancelar
          </a>
        </div>
      </div>
      <div class="col-md-6 m-b-20" style="display: flex; justify-content: center; ">
        <div class="w-size25">
          <input value="Guardar" name="fileSubmit" class="flex-c-m size2 bg1 hov1 m-text3 trans-0-4" type="submit"/>
        </div>
      </div>
    </div>
  </div>
</section>
<?php echo form_close(); ?>
<?php $this->load->view("templates/Footer") ?>
