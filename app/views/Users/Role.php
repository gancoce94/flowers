<?php $this->load->view("templates/Header") ?>
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url(); ?>assets/images/heading-pages-02.jpg);">
  <h2 class="l-text2 t-center">
    GESTION DE VENDEDORES
  </h2>
  <p class="m-text13 t-center">
    Formulario para agregar o quitar Vendedores
  </p>
</section>

<?php echo form_open_multipart(base_url() . "Users/Asign/"); ?>
<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="m-text26 p-b-36" style="text-align: center;">
          Agregar Vendedor
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
      <div class="col-md-4" style="padding-top: 15px;">
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtCi" class="sizefull s-text7 p-l-22 p-r-22" maxlength="15" type="text" name="txtCi" placeholder="Número de CI" required>
        </div>
      </div>
      <div class="col-md-4" style="padding-top: 15px;">
        <div class="rs2-select2 bo4 size15 of-hidden m-b-20 m-r-10">
          <select id="lstSucursal" class="selection-2" name="lstSucursal">
            <option value="0" disabled selected>Seleccione una Sucursal</option>
            <?php
            foreach($sucursal as $row){
              echo '<option value="'.$row->id.'">'.$row->nombre.'</option>';
            }
            ?>
          </select>
        </div>
      </div>
      <div class="col-md-4" style="padding-top: 15px;">
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtContrato" class="sizefull s-text7 p-l-22 p-r-22" maxlength="50" type="text" name="txtContrato" placeholder="Número de Contrato" required>
        </div>
      </div>
      <div class="col-md-6 m-b-20" style="display: flex; justify-content: center; ">
        <div class="w-size25">
          <a href="<?php echo base_url() . "Users/Role"; ?>" class="flex-c-m size2 bg0 hov1 m-text3 trans-0-4">
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
