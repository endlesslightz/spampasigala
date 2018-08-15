<!DOCTYPE html>
<html>
    <head>
        <title>Peta</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <style>
            html, body, #map-canvas {
                height: 100%;
                margin: 0px;
                padding: 0px
            }
        </style>
        <style>
            #legend {
                font-family: Arial, sans-serif;
                background: #fff;
                padding: 10px;
                margin: 10px;
                border: 3px solid #000;
            }
            #floating-panel {
                position: absolute;
                top: 10px;
                left: 10%;
                z-index: 5;
                background-color: #fff;
                padding: 5px;
                border: 1px solid #999;
                text-align: center;
                font-family: 'Roboto','sans-serif';
                line-height: 30px;
                padding-left: 10px;
            }

        </style>



        <?php
        $con = mysqli_connect("localhost", "saddang_pasigala", "Pasigala", "saddang_pasigala");
        $sql = "SELECT `id_pos`, `nama_pos`, `long`, `lat`, `alamat`, `id_sensor`, sensor.tipe FROM pos INNER JOIN sensor USING (id_pos)";
        $result = mysqli_query($con, $sql);
        $pos = array();
        $no = 0;
        while ($rows = mysqli_fetch_array($result)) {
            $pos[$no][0] = $rows['nama_pos'];
            $pos[$no][1] = $rows['lat'];
            $pos[$no][2] = $rows['long'];
            $pos[$no][3] = $rows['id_pos'];
            $pos[$no][4] = 'normal';
            $pos[$no][5] = $rows['tipe'];
//    if ($rows['TMA'] >= $rows['lwl'] && $rows['TMA'] < $rows['crest']) {
//      $pos[$no][4] = 'normal';
//    }
//    else if ($rows['TMA'] >= $rows['hwl'] && $rows['TMA'] < $rows['crest']) {
//      $pos[$no][4] = 'siaga';
//    }
//    else if ($rows['TMA'] >= $rows['crest']) {
//      $pos[$no][4] = 'bahaya';
//    }
//    else if ($rows['TMA'] < $rows['lwl']){
//      $pos[$no][4] = 'kosong';
//    }
//    $pos[$no][5] = $rows['TMA'];
            $no = $no + 1;
        }
        ?>


        <script>
            var beach;
            var tipe;
            var pos;
            var gmarker = [];
            function initialize() {
                //var myLatlng = new google.maps.LatLng(-7.476857,111.600952);
                // var myLatlng = new google.maps.LatLng(-5.227717,119.846191);
                var myLatlng = new google.maps.LatLng(-4.209437, 119.638450);
                var mapOptions = {
                    center: myLatlng,
                    zoom: 8,
                    zoomControl: true,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.DEFAULT,
                    },
                    disableDoubleClickZoom: true,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                    },
                    scaleControl: true,
                    scrollwheel: true,
                    streetViewControl: true,
                    draggable: true,
                    overviewMapControl: true,
                    overviewMapControlOptions: {
                        opened: false,
                    },
                    mapTypeId: google.maps.MapTypeId.TERRAIN,

                };
                pos = <?php echo json_encode($pos); ?>;

                var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
                var icons = {
                    TA: {
                        name: 'Stasiun Pengukuran',
                        //icon: iconBase + 'library_maps.png'
                        icon: '<?php echo base_url(); ?>assets/backend/images/map/awlr_siaga1.png'
                    }
                    // ,
                    // TD: {
                    //     name: 'Tekanan Air Sedang',
                    //     //icon: iconBase + 'library_maps.png'
                    //     icon: '<?php echo base_url(); ?>assets/backend/images/map/awlr_siaga2.png'
                    // },
                    // RF: {
                    //     name: 'Tekanan Air Tinggi',
                    //     icon: '<?php echo base_url(); ?>assets/backend/images/map/awlr_siaga3.png'
                    // }
                };

                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                var legend = document.getElementById('legend');
                for (var key in icons) {
                    var type = icons[key];
                    var name = type.name;
                    var icon = type.icon;
                    var div = document.createElement('div');
                    div.innerHTML = '<img src="' + icon + '"> ' + name;
                    legend.appendChild(div);
                }
                map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('legend'));
                setMarkers(map, pos);

            }


            function setMarkers(map, locations) {

                var shape = {
                    coord: [1, 1, 1, 20, 18, 20, 18, 1],
                    type: 'poly'
                };
                for (var i = 0; i < locations.length; i++) {
                    beach = locations[i];
                    var myLatLng = new google.maps.LatLng(parseFloat(beach[1]), parseFloat(beach[2]));
                    tipe = beach[5];
                    var simbol = {
                        TA: {
                            icon: '<?php echo base_url(); ?>assets/backend/images/map/awlr_siaga1.png'
                        }
                        // ,
                        // TD: {
                        //     icon: '<?php echo base_url(); ?>assets/backend/images/map/awlr_siaga2.png'
                        // },
                        // RF: {
                        //     icon: '<?php echo base_url(); ?>assets/backend/images/map/awlr_siaga3.png'
                        // }
                    };

                    var image = {
                        url: simbol[tipe].icon,
                        size: new google.maps.Size(35, 32),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(0, 32)
                    };
                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        icon: image,
                        //icon: icons[tipe].icon,
                        category:beach[5],
                        shape: shape,
                        title: "Pos Stasiun " + beach[0],
                        zIndex: Number(beach[3])
                    });
                    
                    gmarker.push(marker);
                    
                    var infowindow = new google.maps.InfoWindow({
                        maxWidth: 320,
                        maxHeight: 320,
                        content: '<h3>Pos Stasiun ' + beach[0] + '</h3><p>Longitude: ' + beach[2] + '</p><p>Latitude: ' + beach[1] + '</p>'
                    });

                    makeInfoWindowEvent(map, infowindow, marker);
                }
            }


            function makeInfoWindowEvent(map, infowindow, marker) {
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });
            }

            filterMarkers = function (category) {
                for (i = 0; i < pos.length; i++) {
                   lokasi=gmarker[i];
//                    alert(lokasi);
                    if (lokasi.category == category || category.length === 0) {
                        lokasi.setVisible(true);
                    }
                    else {
                        lokasi.setVisible(false);
                    }
                }
            }

            function loadScript() {
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAd9y51NHJatP8XlzDnG7Yf8owDzSithT4&callback=initialize";
                document.body.appendChild(script);
            }

            window.onload = loadScript;

        </script>
    </head>
    <body>
        <div id="map-canvas"></div>
        <div id="legend">
            Legenda
        </div>

    </body>
</html>