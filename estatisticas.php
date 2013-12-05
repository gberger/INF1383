<?php 
require "layout/layoutTop.php" ; 
require_once "StatsHelper.class.php" ;
?>

<div class="container">
  <h2>Quantidade de Atividades por Filial</h2>

  <div id="chart1"></div>
</div>

<script src="/assets/js/highcharts.js"></script>
<script>
  $(function () {
      $('#chart1').highcharts({
          title: {
              text: 'Atividades por Filial'
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
  });
</script>    

<?php require "layout/layoutBottom.php" ; ?>