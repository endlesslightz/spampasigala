<ul>
    <li> Sensor: <?php echo '1'; ?></li>
    <li> Nilai: <?php echo $nilai; ?> bar</li>
    <li> Waktu: <?php echo $waktu; ?></li>
    <li> Tegangan: <?php
    if (isset($_GET['teg'])){
            echo $_GET['teg'];
        } else {
            echo '0';
        } ?>
    Volt</li>
    <li> Kode: <?php
    if (isset($_GET['kode'])){
         echo $_GET['kode'];
    } ?>
    </li>
</ul>
