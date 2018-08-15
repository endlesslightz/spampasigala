<!DOCTYPE HTML>
<html>
    <head>
        <!--<meta http-equiv="refresh" content="300">-->
        <title>Grafik</title>
        <script src="<?php echo base_url(); ?>assets/backend/js/plugins/jquery.js"></script>

        <?php
//        $arraydata = array();
//        foreach ($item->result() as $itemnya) {
//            $time = strtotime($itemnya->waktu . "+2hours") * 1000;
//            $arraydata[] = "[$time,$itemnya->TMA]";
//        }
//        $datanya = join($arraydata, ',');
        ?>

        <script type="text/javascript">
            var chart;
            $(document).ready(function () {
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'container',
                        type: 'area',
                        zoomType: 'x',
                        events: {
                            load: requestData
                        }
                    },
                    title: {
                        text: 'Grafik Tinggi Muka Air <?php echo $namapos->nama_pos; ?>'
                    },
                    subtitle: {
                        text: document.ontouchstart === undefined ?
                                'Klik dan tarik area grafik untuk memperbesar' :
                                'Pinch the chart to zoom in'
                    },
                    xAxis: {
                        type: 'datetime'
                    }, 
                    tooltip: {
                        xDateFormat: '%A, %b %e, %H:00'
                    },
                    yAxis: {
                        title: {
                            text: 'Nilai Ketinggian (meter)'
                        },
                        lineWidth: 2,
                        min: 0
                    },
                    legend: {
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    plotOptions: {
                        area: {
                            fillColor: {
                                linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                                stops: [
                                    [0, Highcharts.getOptions().colors[0]],
                                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                ]
                            },
                            marker: {
                                radius: 2
                            },
                            lineWidth: 1,
                            states: {
                                hover: {
                                    lineWidth: 1
                                }
                            },
                            threshold: null
                        }
                    },
                    series: [{
                            name: 'Tinggi Muka Air',
                            lineWidth: 2,
                            data: []
                        }]
                });
            });


            function requestData() {
                $.ajax({
                    url: '<?php echo site_url()."backend/tekanan/datalive4/".$this->uri->segment(4); ?>',
                    dataType: 'text',
                    success: function (data) {
                        chart.series[0].setData(JSON.parse(data));
                        setTimeout(requestData, 6000);
                    },
                    cache: false
                });
            }
        </script>
    </head>
    <body>
        <script src="<?php echo base_url(); ?>assets/highchart/js/highcharts.js"></script>
        <script src="<?php echo base_url(); ?>assets/highchart/js/modules/exporting.js"></script>
        <div id="container" style="min-width: 310px; height: 310px; margin: 0 auto;" ></div>
    </body>
</html>
