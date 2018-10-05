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

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="m-text26 p-b-36" style="text-align: center;">
          PRODUCTO
        </h4>
      </div>
      <div class="col-md-6 p-b-30">
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtCodigo" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="txtCodigo" placeholder="Codigo del producto">
        </div>
        <div class="rs2-select2 bo4 size15 of-hidden m-r-10 m-b-20">
          <select class="selection-2" name="sorting">
            <option>Categoría</option>
            <option>$0.00 - $50.00</option>
            <option>$50.00 - $100.00</option>
            <option>$100.00 - $150.00</option>
            <option>$150.00 - $200.00</option>
            <option>$200.00+</option>
          </select>
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtCantidad" class="sizefull s-text7 p-l-22 p-r-22" min="1" type="number" name="txtCantidad" placeholder="Cantidad">
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtPrecio" class="sizefull s-text7 p-l-22 p-r-22" min="1" type="number" name="txtPrecio" placeholder="Precio">
        </div>
      </div>

      <div class="col-md-6">
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtNombre" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="txtNombre" placeholder="Nombre del producto">
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
          <input id="txtDescripcion" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="txtDescripcion" placeholder="Descripcion">
        </div>
        <div class="rs2-select2 bo4 size15 of-hidden m-b-20 m-r-10">
          <select class="selection-2" name="sorting">
            <option>Sucursal</option>
            <option>$0.00 - $50.00</option>
            <option>$50.00 - $100.00</option>
            <option>$100.00 - $150.00</option>
            <option>$150.00 - $200.00</option>
            <option>$200.00+</option>
          </select>
        </div>
        <div class="bo4 of-hidden size15 m-b-20">
            <input id="fuImagenes" class="sizefull s-text7 p-l-22 p-r-22" name="file" type="file" multiple name="fuImagenes" placeholder="Seleccione las imagenes">
        </div>
      </div>
      <div class="col-md-6 m-b-20" style="display: flex; justify-content: center; ">
        <div class="w-size25">
          <!-- Button -->
          <button class="flex-c-m size2 bg0 hov1 m-text3 trans-0-4">
            Cancelar
          </button>
        </div>
      </div>
      <div class="col-md-6 m-b-20" style="display: flex; justify-content: center; ">
        <div class="w-size25">
          <!-- Button -->
          <button class="flex-c-m size2 bg1 hov1 m-text3 trans-0-4">
            Guardar
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $this->load->view("templates/Footer") ?>
