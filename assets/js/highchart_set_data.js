function draw() {
  Highcharts.chart('container2', {
    chart: {
      type: 'line'
    },
    title: {
      text: 'Ventas Mensuales por Vendedores'
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

  Highcharts.chart('container5', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Ventas por Categorías'
    },
    tooltip: {
      pointFormat: '<b>{point.y:.1f}% </b><br><b>${point.x:.1f}</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} % ',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
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

function setDataCategories(data){
  var chart = $('#container5').highcharts();
  var total = 0;
  var n_data =data.all_data[0];
  for ( var i = 0; i < n_data.length; i++) {
    var val = parseFloat(n_data[i].total);
    total = total + val;
  }
  var json_strin = '[';
  for ( var i = 0; i < n_data.length; i++) {
    var val = parseFloat(n_data[i].total);
    json_strin = json_strin + '{'+
    '"name" : "'+n_data[i].categoria+'",'+
    '"y"  : '+((parseFloat(n_data[i].total)/total)*100)+','+
    '"x" : '+n_data[i].total+''+
    '},';
  }
  json_strin = json_strin.slice(0, -1);
  json_strin = json_strin + ']';
  var json = JSON.parse(json_strin);
  chart.addSeries({
    name: 'Brands',
    colorByPoint: true,
    data: json
  });
}

function setDataProducts(data) {
  var n_data =data.all_data[0];
  var cats=new Array(), str = '';
  for ( var i = 0; i < n_data.length; i++) {
    cats[i] = n_data[i].name;
    str = str +'{"y":'+ n_data[i].y+',"name":'+n_data[i].x+'},';
  }
  str = str.slice(0, -1);
  str = '['+str+']';
  var dats = JSON.parse(str);
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
      categories: cats,
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
      headerFormat: '',
      pointFormat: '<br><b>${point.y:.1f}</b><br><b>{point.name:.1f} UND</b>'
    },
    plotOptions: {
      bar: {
        dataLabels: {
          enabled: true
        }
      }
    },
    credits: {
      enabled: false
    },
    series: [{
        name: 'Productos',
        data: dats
      }]
  });
}

function transpose(a) {
    return Object.keys(a[0]).map(function(c) {
        return a.map(function(r) { return r[c]; });
    });
}

function setDataVendorsCat(data){
  var str = '', aux='', serie='';
  var cats=new Array(), dats = new Array();
  for ( var i = 0; i < data.all_data.length; i++) {
    var vendors = data.all_data[i].data;
    str = str+'{'+
      '"name": "'+data.all_data[i].sucursal+'",'+
      '"categories":[';
    for(var y=0; y<vendors.length; y++){
      str = str + '"VEND' + vendors[y].id_usuario + '",';

      var obj = vendors[y].data;
      aux = aux + '[';
      for (var x = 0; x < obj.length; x++) {
        aux = aux + obj[x].total+',';
        cats[x] = obj[x].categoria;
      }
      aux = aux.slice(0, -1);
      aux = aux+'],';
    }
    str = str.slice(0, -1);
    str = str + ']},';
  }
  str = str.slice(0, -1);
  str = '['+str+']';
  aux = aux.slice(0, -1);

  aux = '['+aux+']';
  var aux_2 = JSON.parse(aux);
  dats = transpose(aux_2);
  for(i=0; i<cats.length; i++){
    serie = serie +'{"name":"'+ cats[i]+'",'+
                  '"data":['+dats[i]+']},';
  }
  serie = serie.slice(0, -1);
  serie = '['+serie+']';
  serie_data = JSON.parse(serie);

  var categories = JSON.parse(str);
  var chart = new Highcharts.Chart({
    chart: {
      renderTo: "container6",
      type: "column",
    },
    title: {
      text: 'Ventas de Categorías Por Vendedor'
    },
    plotOptions: {
      series: {
        stacking: 'normal',
        dataLabels: {
          enabled: true,
          color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
        }
      }
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Total ventas por categorías'
      },
      stackLabels: {
        enabled: true,
        style: {
          fontWeight: 'bold',
          color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
        }
      }
    },
    xAxis: {
      categories: categories
    },
    series: serie_data
  });
}

function callAjax(ye, cbox, funct, setData){
  var url = window.location.href;
  url = url.slice(0, -5)
  $.ajax({
    url: url +funct,
    data: {action: cbox, year: ye},
    type: 'post',
    success: function(output) {
      var out=JSON.parse(output);
      if (setData == 'vendors')
      setDataVendors(out);
      if (setData == 'sucursal')
      setDataSucursal(out);
      if (setData == 'categorie')
      setDataCategories(out);
      if (setData == 'products')
      setDataProducts(out);
      if (setData == 'vendors_cat')
      setDataVendorsCat(out);
    }
  });
}

$(document).ready(function() {
  var cbox = [], year='';
  $.each($("input[name='cbSucursal']:checked"), function(){
    cbox.push($(this).val());
  });
  year=$('select[name=lstAnio]').val();
  draw();
  callAjax(year, cbox, 'GetDataVendors', 'vendors');
  callAjax(year, cbox, 'GetDataSucursales', 'sucursal');
  callAjax(year, cbox, 'GetDataCategories', 'categorie');
  callAjax(year, cbox, 'GetDataProducts', 'products');
  callAjax(year, cbox, 'GetDataVendorsCategories', 'vendors_cat');

  $('.form-check-input').click(function(){
    var cbox = [], year='';
    $.each($("input[name='cbSucursal']:checked"), function(){
      cbox.push($(this).val());
    });
    year=$('select[name=lstAnio]').val();
    draw();
    callAjax(year, cbox, 'GetDataVendors', 'vendors');
    callAjax(year, cbox, 'GetDataSucursales', 'sucursal');
    callAjax(year, cbox, 'GetDataCategories', 'categorie');
    callAjax(year, cbox, 'GetDataProducts', 'products');
    callAjax(year, cbox, 'GetDataVendorsCategories', 'vendors_cat');
  });

  $("#lstAnio").on('change', function() {
    var cbox = [], year='';
    $.each($("input[name='cbSucursal']:checked"), function(){
      cbox.push($(this).val());
    });
    year=$(this).val();
    draw();
    callAjax(year, cbox, 'GetDataVendors', 'vendors');
    callAjax(year, cbox, 'GetDataSucursales', 'sucursal');
    callAjax(year, cbox, 'GetDataProducts', 'products');
    callAjax(year, cbox, 'GetDataCategories', 'categorie');
    callAjax(year, cbox, 'GetDataVendorsCategories', 'vendors_cat');
  });

});
