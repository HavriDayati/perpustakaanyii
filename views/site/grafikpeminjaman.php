<?php 
  use app\models\Peminjaman; 
?>
<script>

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "grafik-peminjaman",
        "width": "100%",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption" : "Grafik Peminjaman Per Buku",
              "xAxisName": "Peminjaman Per Buku",
              "yAxisName": "Jumlah",
              "theme": "fint"
           },
          "data":        
              [ <?php print Peminjaman::getGrafikPerBuku(); ?> ]
        }
    });
    revenueChart.render();
})
        
</script> 
<div id="grafik-peminjaman"> FusionChart XT will load here! </div>