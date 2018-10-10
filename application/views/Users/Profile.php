<?php $this->load->view("templates/Header") ?>
<section class="bgwhite p-t-66 p-b-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="m-text26 p-b-36" style="text-align: center;">
          USUARIO
        </h4>
      </div>
      <?php if (($this->session->userdata('ci') !== null) && ($this->session->userdata('tipo_usuario') !== 'c')) { ?>
        <div class="col-md-12" style="text-align: center;">
          <a href="<?php echo base_url() ?>Charts/Admin">Ver Reportes</a>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php $this->load->view("templates/Footer") ?>
