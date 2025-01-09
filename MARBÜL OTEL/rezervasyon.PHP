<?php
$host = 'localhost'; // Veritabanı sunucusu
$dbname = 'Marbül_otel'; // Veritabanı adı
$username = 'root'; // Veritabanı kullanıcı adı (yerel sunucuda genellikle root kullanılır)
$password = ''; // Veritabanı parolanız (yerel sunucuda genellikle boş bırakılır)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // PDO hata modunu ayarlayalım
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>


<?php


// GET ile gelen oda adı ve fiyatını alalım
if (isset($_GET['oda_ismi']) && isset($_GET['fiyat'])) {
    $oda_ismi = $_GET['oda_ismi'];
    $fiyat = $_GET['fiyat'];
} else {
    // Eğer gelen veri yoksa, varsayılan değerler
    $oda_ismi = "Bilinmiyor";
    $fiyat = "Bilinmiyor";
}

// POST ile gelen rezervasyon verilerini kaydedelim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form verilerini alalım
    $giris_tarihi = $_POST['giris_tarihi'];
    $cikis_tarihi = $_POST['cikis_tarihi'];
    $yetiskin_sayisi = $_POST['yetiskin_sayisi'];
    $cocuk_sayisi = $_POST['cocuk_sayisi'];
    $oda_ismi = $_POST['oda_ismi'];
    $fiyat = $_POST['fiyat'];

    // SQL sorgusu
    $sql = "INSERT INTO oda_bilgileri (giris_tarihi, cikis_tarihi, yetiskin, cocuk, oda, fiyat) 
            VALUES (:giris_tarihi, :cikis_tarihi, :yetiskin_sayisi, :cocuk_sayisi, :oda_ismi, :fiyat)";

    $stmt = $pdo->prepare($sql);

    // Parametreleri bağlayalım
    $stmt->bindParam(':giris_tarihi', $giris_tarihi);
    $stmt->bindParam(':cikis_tarihi', $cikis_tarihi);
    $stmt->bindParam(':yetiskin_sayisi', $yetiskin_sayisi);
    $stmt->bindParam(':cocuk_sayisi', $cocuk_sayisi);
    $stmt->bindParam(':oda_ismi', $oda_ismi);
    $stmt->bindParam(':fiyat', $fiyat);

    // Sorguyu çalıştırarak kaydedelim
    if ($stmt->execute()) {
        // Başarılıysa, kartbilgileri.php sayfasına yönlendir
        header("Location: kartbilgileri.php");
        exit(); // yönlendirme yapıldıktan sonra işlem durur
    } else {
        echo "Rezervasyon kaydedilemedi.";
    }
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otel Rezervasyonu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="search-container">
        <div class="date-picker">
            <div class="date-picker-giris">
                <label for="date-range">Giriş Tarihi</label>
                <input type="date" id="date-range-giris">
            </div>
            <div class="date-picker-cıkıs">
                <label for="date-range">Çıkış Tarihi</label>
                <input type="date" id="date-range-cıkıs">
            </div>
        </div>
        <div class="guest-picker">
            <p>Misafirler</p>
            <div class="counter">
                <span>Yetişkin</span>
                <button class="minus">-</button>
                <input type="text" value="1" readonly>
                <button class="plus">+</button>
            </div>
            <div class="counter">
                <span>Çocuk</span>
                <button class="minus">-</button>
                <input type="text" value="0" readonly>
                <button class="plus">+</button>
            </div>
        </div>
        <div class="fiyatbutton-cont">
            <button id="fiyat-ver-button">Fiyat Ver</button>
        </div>
    </div>

    <div class="Rezerve-container" style="display: none;">
        <div class="rezerve-picker">
            <div class="information-div">
                <label for="giris-date">Giriş Tarihi</label>
                <p id="giris-tarihi"></p>
            </div>
            <div class="information-div">
                <label for="çıkıs-date">Çıkış Tarihi</label>
                <p id="cikis-tarihi"></p>
            </div>
            <div class="information-div">
                <label for="yetiskin">Yetişkin Sayısı</label>
                <p id="yetiskin-sayisi"></p>
            </div>
            <div class="information-div">
                <label for="cocuk">Çocuk Sayısı</label>
                <p id="cocuk-sayisi"></p>
            </div>
            <div class="information-div">
                <label for="oda">Oda</label>
                <p id="oda-ismi"><?php echo htmlspecialchars($oda_ismi); ?></p>
            </div>
            <div class="information-div">
                <label for="fiyat">Fiyat</label>
                <p id="fiyat"><?php echo htmlspecialchars($fiyat); ?> Euro</p>
            </div>
        </div>
        <div class="rezervebutton-cont">
            <form method="POST" action="">
                <input type="hidden" name="giris_tarihi" id="giris-tarihi-input">
                <input type="hidden" name="cikis_tarihi" id="cikis-tarihi-input">
                <input type="hidden" name="yetiskin_sayisi" id="yetiskin-sayisi-input">
                <input type="hidden" name="cocuk_sayisi" id="cocuk-sayisi-input">
                <input type="hidden" name="oda_ismi" value="<?php echo htmlspecialchars($oda_ismi); ?>">
                <input type="hidden" name="fiyat" id="fiyat-input">
               <a href=""><button type="submit" id="rezerve-button">Rezerve Et</button></a> 
            </form>
        </div>
    </div>

    <script src="php.js"></script>
</body>
</html>
