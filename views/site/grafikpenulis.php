<?php 
  use app\models\Buku; 
?>
<script>

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "grafik-penulis",
        "width": "100%",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption" : "Grafik Buku Per Penulis",
              "xAxisName": "Buku Per Penulis",
              "yAxisName": "Jumlah",
              "theme": "fint"
           },
          "data":        
              [ <?php print Buku::getGrafikPerPenulis(); ?> ]
        }
    });
    revenueChart.render();
})
        
</script> 
<div id="grafik-penulis"> FusionChart XT will load here! </div>