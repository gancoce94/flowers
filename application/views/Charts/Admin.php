<?php $this->load->view("templates/Header") ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/exporting.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/export-data.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/highcharts/dark-unica.js"></script>

<script type="text/javascript">
$(function () {
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
    series: [{
        name: 'Tokyo',
        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
    }, {
        name: 'London',
        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    }]
  });

  Highcharts.chart('container3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});
Highcharts.chart('container4', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Historic World Population by Region'
    },
    subtitle: {
        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    },
    xAxis: {
        categories: ['Africa'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
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
    series: [{
        name: 'Year 1800',
        data: [107]
    }, {
        name: 'Year 1900',
        data: [133]
    }, {
        name: 'Year 2000',
        data: [814]
    }, {
        name: 'Year 2016',
        data: [1216]
    }]
});
});
</script>
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url(); ?>assets/images/heading-pages-02.jpg);">
  <h2 class="l-text2 t-center">
    GRAFICOS DEL ADMINISTRADOR
  </h2>
</section>
<div class="container">
  <div class="row" style="padding: 10px;">
    <div class="col-md-3">
      <h4 class="m-text26 p-b-36" style="text-align: center;">
        Sucursales a mostrar
      </h4>
      <?php foreach($sucursal as $row){ ?>
        <div class="form-check">
          <input class="form-check-input" checked type="checkbox" name="cbSucursal" id="<?php echo $row->id; ?>" value="<?php echo $row->id; ?>">
          <label class="form-check-label" for="<?php echo $row->id; ?>">
            <?php echo $row->nombre; ?>
          </label>
        </div>
      <?php } ?>
    </div>
    <div class="col-md-9">
      <div id="container2" style="width: 100%; height: 400px; margin: 0 auto"></div>
    </div>
  </div>
  <hr>
  <div class="row" style="padding: 10px;">
    <div class="col-md-3">

    </div>
    <div class="col-md-9">
      <div id="container3" style="width: 100%; height: 100%; margin: 0 auto"></div>
    </div>
  </div>
  <hr>
  <div class="row" style="padding: 10px;">
    <div class="col-md-3">

    </div>
    <div class="col-md-9">
      <div id="container4" style="width: 100%; height: 100%; margin: 0 auto"></div>
    </div>
  </div>
</div>
<?php $this->load->view("templates/Footer") ?>
