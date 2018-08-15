<ul>
    <li> Sensor: <?php echo '1'; ?></li>
    <li> Nama: <?php echo $nama; ?></li>
    <li> Waktu: <?php echo $waktu; ?></li>
    <li> Isi: </li>
    <table border='1' width="50%">

<?php
$row = 1;
if (($handle = fopen(base_url()."assets/upload/".$_GET['nama'], "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        echo "<tr>";
        for ($c=0; $c < $num; $c++) {
            echo "<td>".$data[$c]."</td>";
        }
        echo "</tr>";
    }
    fclose($handle);
}
?>
    </table>
</ul>
