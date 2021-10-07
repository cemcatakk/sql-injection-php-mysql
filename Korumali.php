<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection Korumalı Girdi</title>
</head>

<body>
    <a href="Korumasiz.php">Korumasız Sorgu</a>

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
                <td><input type="submit" class="btn btn-primary" value="Kaydet" name="korumalikayit"></td>
            </tr>
        </table>
    </form>
    <h1>Kayıtlar</h1>
    <form action="Korumali.php" class="container" method="post">
        <table>
            <tr>
                <td>Ad:</td>
                <td><input type="text" name="ad" class="form-control">

                </td>
                <td><input class="form-control btn btn-primary" type="submit" value="Ara" name="ara"></td>
            </tr>
        </table>
    </form>
    <p>Korumasız sorgu ekranındaki arama sekmesinde çalışan sorgular, bu sayfada çalışmaz.</p>
    <table class="table">
        <tr>
            <th>TC</th>
            <th>Ad</th>
            <th>Soyad</th>
            <th>Meslek</th>
            <th>Telefon</th>
        </tr>
        <?php
        $vt = mysqli_connect("localhost", "root", "", "sqlinjection");
        if (isset($_POST['ara'])) {
            $arananAd = $_POST['ad'];
            $sorgu = "SELECT * FROM kayitlar WHERE ad LIKE ?";
            $sonuc = $vt->prepare($sorgu);
            $sonuc->bind_param("s", $arananAd);
            $sonuc->execute();
            $sonuc->bind_result($id,$tc, $ad, $soyad, $meslek, $telefon,$sifre);
            while ($sonuc->fetch()) {
        ?>
                <tr>
                    <td><?php echo $tc; ?></td>
                    <td><?php echo $ad; ?></td>
                    <td><?php echo $soyad; ?></td>
                    <td><?php echo $meslek; ?></td>
                    <td><?php echo $telefon; ?></td>
                </tr> <?php
                    }
                } else {
                    $sorgu = "SELECT * FROM kayitlar";
                    $sonuc = $vt->query($sorgu);
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