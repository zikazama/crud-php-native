<!DOCTYPE html>
<html>

<head>
    <title>Data Kombinasi Paket Barang</title>
</head>

<body>
    <h1>Data Paket Barang</h1>
    <p><a href="<?php echo $_SESSION['dashboard']; ?>">Kembali ke Dashboard</a></p>

    <?php
    for ($i = 1; $i <= count($barangList); $i++) {
        $combinations = getCombinations($barangList, $i);
        echo "Kombinasi Paket " . $i . " barang: "; ?>
        <ul> <?php
                foreach ($combinations as $combination) { ?>
                    <li>
                        <?php
                            foreach ($combination as $index => $item) {
                                echo $item->getNamaBarang();
                                if($index+1 != count($combination)) {
                                    echo ", ";
                                }
                            }
                        ?>
                    </li>
                <?php }
                ?>
        </ul>
    <?php echo "<br><br><br>";
    }
    ?>
</body>

</html>