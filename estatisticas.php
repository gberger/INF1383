<?php 
require "layout/layoutTop.php" ; 
require_once "StatsHelper.class.php" ;
?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h2>Quantidade de Atividades por Filial</h2>
      <div id="chart1"></div>
    </div>
    <div class="col-md-6">
      <h2>Quantidade de Funcionários por Filial</h2>
      <div id="chart2"></div>
    </div>
    <div class="col-md-6">
      <h2>Distribuição de Voluntários por Idade</h2>
      <div id="chart3"></div>
    </div>
  </div>
</div>

<script src="/assets/js/highcharts.js"></script>
<script>
  $(document).ready(function(){
    $('#chart1').highcharts({
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
        name: 'Browser share',
        data: <?php echo json_encode(StatsHelper::obterAtividadesPorFilial()) ?>
      }]
    });

    $('#chart2').highcharts({
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
        name: 'Browser share',
        data: <?php echo json_encode(StatsHelper::obterFuncionariosPorFilial()) ?>
      }]
    });

    $('#chart3').highcharts({
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
        name: 'Browser share',
        data: <?php echo json_encode(StatsHelper::obterSegmentosDeIdadeDeVoluntarios()) ?>
      }]
    });

  }); //doc.ready
</script>    

<?php require "layout/layoutBottom.php" ; ?>