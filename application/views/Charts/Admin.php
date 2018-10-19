<?php $this->load->view("templates/Header") ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/grouped-categories.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/exporting.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/export-data.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/highchart_set_data.js"></script>

<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url(); ?>assets/images/heading-pages-05.jpg);">
  <h2 class="l-text2 t-center">
    GRAFICOS DEL ADMINISTRADOR
  </h2>
</section>
<div class="container-fluid">
  <div class="row" style="padding: 10px;">
    <div class="col-md-2" style="padding: 5px;">
      <h4 class="m-text26 p-b-36" style="text-align: center;">
        Sucursales a mostrar
      </h4>
      <div class="form-group">
        <label for="lstAnio">Seleccione un Año</label>
        <select class="form-control" name="lstAnio" id="lstAnio">
          <option value="2018">2018</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
        </select>
      </div>
      <?php $json=json_decode($sucursales);foreach($json->all_data as $row){ ?>
        <div class="form-check" style="margin-left: 30px">
          <input class="form-check-input" checked type="checkbox" name="cbSucursal" id="<?php echo $row->id; ?>" value="<?php echo $row->id; ?>">
          <label class="form-check-label" for="<?php echo $row->id; ?>">
            <?php echo $row->sucursal; ?>
          </label>
        </div>
      <?php } ?>
    </div>
    <div class="col-md-5" style="padding: 5px;">
      <div id="container2" style="width: 100%; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="col-md-5" style="padding: 5px;">
      <div id="container3" style="width: 100%; height: 100%; margin: 0 auto"></div>
    </div>
  </div>
  <div class="row" style="padding: 10px;">
    <div class="col-md-4" style="padding: 5px;">
      <div id="container5" style="width: 100%; height: 100%; margin: 0 auto"></div>
    </div>
    <div class="col-md-4" style="padding: 5px;">
      <div id="container6" style="width: 100%; height: 100%; margin: 0 auto"></div>
    </div>
    <div class="col-md-4" style="padding: 5px;">
      <div id="container4" style="width: 100%; height: 100%; margin: 0 auto"></div>
    </div>
  </div>
</div>
<?php $this->load->view("templates/Footer") ?>
