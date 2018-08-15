<!DOCTYPE HTML>
<html>
    <head>
        <!--<meta http-equiv="refresh" content="300">-->
        <title>Grafik</title>
        <script src="<?php echo base_url(); ?>assets/backend/js/plugins/jquery.js"></script>
        <script type="text/javascript">
            var chart;
            $(document).ready(function () {
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'container',
                        type: 'line',
                        zoomType: 'x',
                        events: {
                            load: requestData
                        },
                        resetZoomButton: {
                    position: {
                        x: 0,
                        y: -42
                    }
                }
                    },
                    title: {
                        text: 'Grafik Tegangan Baterai <?php echo $namapos->nama_pos; ?>'
                    },
                    subtitle: {
                        text: document.ontouchstart === undefined ?
                                'Klik dan tarik area grafik untuk memperbesar' :
                                'Pinch the chart to zoom in'
                    },
                    xAxis: {
                        type: 'datetime'
                    },
                    yAxis: {
                        title: {
                            text: 'Nilai Tegangan Baterai (Volt)'
                        },
                        lineWidth: 2,
                        min: 10,
                        max: 15,
                tickInterval: 1,
                         plotLines: [{
                color: 'red', // Color value
                dashStyle: 'longdashdot', // Style of the plot line. Default to solid
                value: 13.8, // Value of where the line will appear
                width: 1 // Width of the line    
              },{
                color: 'green', // Color value
                dashStyle: 'longdashdot', // Style of the plot line. Default to solid
                value: 12, // Value of where the line will appear
                width: 1 // Width of the line    
              },{
                color: 'red', // Color value
                dashStyle: 'longdashdot', // Style of the plot line. Default to solid
                value: 11.2, // Value of where the line will appear
                width: 1 // Width of the line    
              }]
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
                            name: 'Tegangan Baterai',
                            lineWidth: 2,
                            data: []
                        }]
                });
            });


            function requestData() {
                $.ajax({
                    url: '<?php echo site_url()."backend/tegangan/datalive/".$this->uri->segment(4); ?>',
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
