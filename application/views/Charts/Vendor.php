<?php $this->load->view("templates/Header") ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/exporting.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/export-data.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/dark-unica.js"></script>

<script type="text/javascript">
function vendors() {
  Highcharts.chart('container2', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Ventas por Vendedores'
    },
    subtitle: {
        text: 'Marque las sucursales para mostrar sus vendedores'
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
        title: {
            text: 'Ventas ($)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
  });
}

function sucursales(){
  Highcharts.chart('container3', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Ventas Mensuales por Sucursal'
        },
        subtitle: {
            text: 'Source: Propia'
        },
        xAxis: {
          categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
          crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Ventas ($)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>${point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        }
    });
}

function setDataVendors(data){
  var chart = $('#container2').highcharts();
  for ( var i = 0; i < data.all_data.length; i++) {
    var obj = data.all_data[i].data;
    var dat = '';
    for(var y =1; y<=12; y++){
      dat = dat + obj[y].toString();
      if(y<12){
        dat = dat + ', ';
      }
    };
    chart.addSeries({
      name: 'VEND'+data.all_data[i].id,
      data: JSON.parse('[' + dat + ']')
    });
  }
}

function setDataSucursal(data){
  var chart = $('#container3').highcharts();
  for ( var i = 0; i < data.all_data.length; i++) {
    var obj = data.all_data[i].data;
    var dat = '';
    for(var y =1; y<=12; y++){
      dat = dat + obj[y].toString();
      if(y<12){
        dat = dat + ', ';
      }
    };
    chart.addSeries({
      name: ''+data.all_data[i].sucursal,
      data: JSON.parse('[' + dat + ']')
    });
  }
}

$(document).ready(function() {
  var cbox = [];
  $.each($("input[name='cbSucursal']:checked"), function(){
    cbox.push($(this).val());
  });

  $.ajax({
    url: '<?php echo base_url('Charts/GetData'); ?>',
    data: {action: cbox},
    type: 'post',
    success: function(output) {
      var out=JSON.parse(output);
      vendors();
      setDataVendors(out);
    }
  });

  $.ajax({
    url: '<?php echo base_url('Charts/GetDataS'); ?>',
    data: {action: cbox},
    type: 'post',
    success: function(output) {
      var out=JSON.parse(output);
      sucursales();
      setDataSucursal(out);
    }
  });

  $('.form-check-input').click(function(){
    var cbox = [];
    $.each($("input[name='cbSucursal']:checked"), function(){
      cbox.push($(this).val());
    });

    $.ajax({
      url: '<?php echo base_url('Charts/GetData'); ?>',
      data: {action: cbox},
      type: 'post',
      success: function(output) {
        var out=JSON.parse(output);
        vendors();
        setDataVendors(out);
      }
    });

    $.ajax({
      url: '<?php echo base_url('Charts/GetDataS'); ?>',
      data: {action: cbox},
      type: 'post',
      success: function(output) {
        var out=JSON.parse(output);
        sucursales();
        setDataSucursal(out);
      }
    });
  });

  Highcharts.chart('container4', {
      chart: {
          type: 'bar'
      },
      title: {
          text: 'Top Productos Más Vendidos'
      },
      subtitle: {
          text: 'Fuente: <a href="#">Propia</a>'
      },
      xAxis: {
          categories: ['Productos'],
          title: {
              text: null
          }
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Ventas ($)',
              align: 'high'
          },
          labels: {
              overflow: 'justify'
          }
      },
      tooltip: {
          valueSuffix: ' dólares'
      },
      plotOptions: {
          bar: {
              dataLabels: {
                  enabled: true
              }
          }
      },
      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'top',
          x: -40,
          y: 80,
          floating: true,
          borderWidth: 1,
          backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
          shadow: true
      },
      credits: {
          enabled: false
      },
      series: [
        <?php foreach ($products as $row) { ?>
        {
          name: '<?php echo $row->producto; ?>',
          data: [<?php echo $row->total; ?>]
        },
        <?php } ?>
      ]
  });

  Highcharts.chart('container6', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Ventas Por Categorias'
      },
      subtitle: {
          text: 'Fuente: <a href="#">Propia</a>'
      },
      xAxis: {
          type: 'category',
          labels: {
              rotation: -45,
              style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
              }
          }
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Ventas ($)'
          }
      },
      legend: {
          enabled: false
      },
      tooltip: {
          pointFormat: 'Ventas de la categoría: <b>${point.y:.1f}</b>'
      },
      series: [{
          name: 'Ventas',
          data: [
            <?php foreach ($categories as $row) { ?>
              ['<?php echo $row->categoria; ?>', <?php echo $row->total; ?>],
            <?php } ?>
          ],
          dataLabels: {
              enabled: true,
              rotation: -90,
              color: '#FFFFFF',
              align: 'right',
              format: '{point.y:.1f}', // one decimal
              y: 10, // 10 pixels down from the top
              style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
              }
          }
      }]
  });

  Highcharts.chart('container5', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Porcentaje de Ventas por Cat.'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                  style: {
                      color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                  }
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [
            <?php foreach ($categories as $row) { ?>
            {
              name: '<?php echo $row->categoria; ?>',
              y: <?php echo (($row->total/$total)*100); ?>
            },
            <?php } ?>
          ]
      }]
  });
});
</script>
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url(); ?>assets/images/heading-pages-05.jpg);">
  <h2 class="l-text2 t-center">
    GRAFICOS DEL VENDEDOR
  </h2>
</section>
<div class="container-fluid">
  <div class="row" style="padding: 10px;">
    <div class="col-md-12">
      <h4 class="m-text26 p-b-36" style="text-align: center;">
        VENDEDORES Y SUCURSALES
      </h4>
    </div>
    <div class="col-md-2" style="padding: 5px;">
      <h4 class="m-text26 p-b-36" style="text-align: center;">
        Sucursales a mostrar
      </h4>
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
  <hr>
  <div class="row" style="padding: 10px;">
    <div class="col-md-12">
      <h4 class="m-text26 p-b-36" style="text-align: center;">
        CATEGORIAS Y PRODUCTOS
      </h4>
    </div>
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
