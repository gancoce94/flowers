<?php $this->load->view("templates/Header") ?>
<section class="bgwhite p-t-66 p-b-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="m-text26 p-b-36" style="text-align: center;">
          MIS DATOS
        </h4>
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-6 p-b-36" style="text-align: center;">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th scope="row">CI</th>
              <td><?php echo $this->session->userdata('ci') ?></td>
            </tr>
            <tr>
              <th scope="row">Nombres</th>
              <td><?php echo $this->session->userdata('nombres') ?></td>
            </tr>
            <tr>
              <th scope="row">Apellidos</th>
              <td><?php echo $this->session->userdata('apellidos') ?></td>
            </tr>
            <tr>
              <th scope="row">Dirección</th>
              <td><?php echo $this->session->userdata('direccion') ?></td>
            </tr>
            <tr>
              <th scope="row">Teléfono</th>
              <td><?php echo $this->session->userdata('telefono') ?></td>
            </tr>
            <tr>
              <th scope="row">Correo</th>
              <td><?php echo $this->session->userdata('correo') ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-3"></div>
      <?php
      if (($this->session->userdata('ci') !== null) && ($this->session->userdata('tipo_usuario') != 'c')) {
        if ($this->session->userdata('tipo_usuario') == 'a') {
      ?>
        <div class="col-md-12" style="text-align: center;">
          <div class="block2-btn-addcart w-size1 trans-0-4 p-b-20">
            <a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" href="<?php echo base_url() ?>Charts/Admin">Ver Reportes</a>
          </div>
        </div>
      <?php } ?>
      <?php } ?>
    </div>
  </div>
</section>
<?php $this->load->view("templates/Footer") ?>
