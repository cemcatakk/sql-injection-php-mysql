<?php
$vt = mysqli_connect("localhost", "root", "", "sqlinjection");

if (isset($_POST['korumasizkayit'])) {
    $tc = $_POST['tc'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $meslek = $_POST['meslek'];
    $telefon = $_POST['telefon'];
    $sorgu = "INSERT INTO kayitlar(tc,ad,soyad,meslek,telefon) VALUES('$tc','$ad','$soyad','$meslek','$telefon')";
    $sonuc = $vt->query($sorgu);
    if ($sonuc) {
        echo "<p style='color:green;'>Kayıt başarılı!</p>";
    } else {
        echo "<p style='color:red;'>Kayıt başarısız!</p>";
        echo "<p>Hata: " . $vt->error . "</p>";
    }
    echo "<a href='Korumasiz.php'>Devam Et</a>";
}
if (isset($_POST['korumalikayit'])) {
    $tc = $_POST['tc'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $meslek = $_POST['meslek'];
    $telefon = $_POST['telefon'];
    $sorgu = "INSERT INTO kayitlar(tc,ad,soyad,meslek,telefon) VALUES(?,?,?,?,?)";
    $sonuc = $vt->prepare($sorgu);
    $sonuc->bind_param("sssss", $tc, $ad, $soyad, $meslek, $telefon);
    $sonuc->execute();
    if ($sonuc) {
        echo "<p style='color:green;'>Kayıt başarılı!</p>";
    } else {
        echo "<p style='color:red;'>Kayıt başarısız!</p>";
        echo "<p>Hata: " . $vt->error . "</p>";
    }
    echo "<a href='Korumali.php'>Devam Et</a>";
}

$tabloSorgu = "CREATE TABLE IF NOT EXISTS `kayitlar` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `tc` bigint(20) NOT NULL,
    `ad` varchar(100) NOT NULL,
    `soyad` varchar(100) NOT NULL,
    `meslek` varchar(100) NOT NULL,
    `telefon` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
  ) ";
$sonuc = $vt->query($tabloSorgu);
if ($sonuc) {
    "Silinen tablo yeniden oluşturuldu!";
}
