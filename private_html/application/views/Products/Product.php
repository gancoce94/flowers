<?php $this->load->view("templates/Header") ?>
<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url(); ?>assets/images/heading-pages-02.jpg);">
  <h2 class="l-text2 t-center">
    Registro de Producto
  </h2>
  <p class="m-text13 t-center">
    Formulario para registro de producto
  </p>
</section>

<?php echo form_open_multipart(base_url() . "Products/AddProduct/"); ?>
<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="m-text26 p-b-36" style="text-align: center;">
          PRODUCTO
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
          <input id="txtCodigo" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="txtCodigo" placeholder="Codigo del producto">
        </div>
        <div class="rs2-select2 bo4 size15 of-hidden m-r-10 m-b-20">
          <select id="lstCategoria" class="selection-2" name="lstCategoria">
            <option value="0" disabled selected>Seleccione una Categoría</option>
            <?php
            foreach($categorias as $row){
              echo '<option value="'.$row->id.'">'.$row->categoria.'</option>';
            }
            ?>
          </select>
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtCantidad" class="sizefull s-text7 p-l-22 p-r-22" min="1" max="500" type="number" name="txtCantidad" placeholder="Cantidad">
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtPrecio" class="sizefull s-text7 p-l-22 p-r-22" min="1" min="1" max="1000000.00" step="any" type="number" name="txtPrecio" placeholder="Precio">
        </div>
      </div>

      <div class="col-md-6" style="padding-top: 15px;">
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtNombre" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="txtNombre" placeholder="Nombre del producto">
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtDescripcion" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="txtDescripcion" placeholder="Descripcion">
        </div>
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
        <div class="bo4 of-hidden size15 m-b-20">
            <input id="fuImagenes" class="sizefull s-text7 p-l-22 p-r-22" name="files[]" type="file" multiple placeholder="Seleccione las imagenes">
        </div>
      </div>
      <div class="col-md-6 m-b-20" style="display: flex; justify-content: center; ">
        <div class="w-size25">
          <a href="<?php echo base_url() . "Products/Product"; ?>" class="flex-c-m size2 bg0 hov1 m-text3 trans-0-4">
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
