<?php 
require "layout/layoutTop.php" ; 
require_once "StatsHelper.class.php" ;
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Atividades por Período por Filial</h2>
      <div id="chart6"></div>
    </div>
  <div class="row">
    <div class="col-md-6">
      <h2>Quantidade de Atividades por Filial</h2>
      <div id="chart1"></div>
    </div>
    <div class="col-md-6">
      <h2>Quantidade de Funcionários por Filial</h2>
      <div id="chart2"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h2>Distribuição de Voluntários por Idade</h2>
      <div id="chart3"></div>
    </div>
    <div class="col-md-6">
      <h2>Distribuição de Voluntários por Escolaridade</h2>
      <div id="chart4"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2>Línguas Faladas pelos Voluntários</h2>
      <div id="chart5"></div>
    </div>
  </div>
</div>

<script src="<?php echo URL_PREFIX; ?>/assets/js/highcharts.js"></script>
<script>
  $(document).ready(function(){
    $('#chart1').highcharts({
      credits: {enabled: false},
      title: {
        text: ''
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            color: '#000000',
            connectorColor: '#000000',
            format: '<b>{point.name}</b>: {point.y}'
          }
        }
      },
      series: [{
        type: 'pie',
        name: 'Atividades',
        data: <?php echo json_encode(StatsHelper::obterAtividadesPorFilial()) ?>
      }]
    });

    $('#chart2').highcharts({
      credits: {enabled: false},
      title: {
        text: ''
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            color: '#000000',
            connectorColor: '#000000',
            format: '<b>{point.name}</b>: {point.y}'
          }
        }
      },
      series: [{
        type: 'pie',
        name: 'Funcionários',
        data: <?php echo json_encode(StatsHelper::obterFuncionariosPorFilial()) ?>
      }]
    });

    $('#chart3').highcharts({
      credits: {enabled: false},
      title: {
        text: ''
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            color: '#000000',
            connectorColor: '#000000',
            format: '<b>{point.name}</b>: {point.y}'
          }
        }
      },
      series: [{
        type: 'pie',
        name: 'Voluntários',
        data: <?php echo json_encode(StatsHelper::obterSegmentosDeIdadeDeVoluntarios()) ?>
      }]
    });

    $('#chart4').highcharts({
      credits: {enabled: false},
      title: {
        text: ''
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            color: '#000000',
            connectorColor: '#000000',
            format: '<b>{point.name}</b>: {point.y}'
          }
        }
      },
      series: [{
        type: 'pie',
        name: 'Voluntários',
        data: <?php echo json_encode(StatsHelper::obterSegmentosDeEscolaridadeDeVoluntarios()) ?>
      }]
    });

    var vals = <?php echo json_encode(StatsHelper::obterLinguasENiveis()) ?>;

    var languages = vals.reduce(function(prev, curr){
      if(prev.indexOf(curr[0]) == -1){
        prev.push(curr[0]);
      }
      return prev;
    }, []);

    var series = [{
      name: 'iniciante',
      data: languages.map(function(l){
        var i;
        for(i=0; i<vals.length; i++){
          if(vals[i][0] == l && vals[i][1] == 'iniciante'){
            return vals[i][2];
          }
        }
        return 0;
      })
    }, {
      name: 'medio',
      data: languages.map(function(l){
        var i;
        for(i=0; i<vals.length; i++){
          if(vals[i][0] == l && vals[i][1] == 'medio'){
            return vals[i][2];
          }
        }
        return 0;
      })
    }, {
      name: 'fluente',
      data: languages.map(function(l){
        var i;
        for(i=0; i<vals.length; i++){
          if(vals[i][0] == l && vals[i][1] == 'fluente'){
            return vals[i][2];
          }
        }
        return 0;
      })
    }]

    $('#chart5').highcharts({
      credits: {enabled: false},
      chart: {
        type: 'bar'
      },
      title: {
        text: ''
      },
      xAxis: {
        categories: languages
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Voluntários'
        },
        allowDecimals: false
      },
      legend: {
        backgroundColor: '#FFFFFF',
        reversed: true
      },
      plotOptions: {
        series: {
          stacking: 'normal'
        }
      },
      series: series
    });

    var vals = <?php echo json_encode(StatsHelper::obterAtivPorFilialMes()); ?>;

    $('#chart6').highcharts({
      credits: {enabled: false},
      title: {
        text: '',
      },
      xAxis: {
        categories: vals.categories
      },
      yAxis: {
        title: {
          text: 'Quantidade de Atividades'
        },
        plotLines: [{
          value: 0,
          width: 1,
          color: '#808080'
        }],
        min: 0,
        allowDecimals: false
      },
      legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
        borderWidth: 0
      },
      series: vals.series
    });


  }); //doc.ready

</script>    

<?php require "layout/layoutBottom.php" ; ?>