<?php
// Veritabanı bağlantısı için gerekli bilgiler
$servername = "localhost";
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "marbül_otel"; // Veritabanı ismi

// Veritabanına bağlantı
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Form verileri POST yöntemiyle alınıyor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formun eksik veya yanlış doldurulmasını kontrol edin
    if (!empty($_POST['ad']) && !empty($_POST['soyad']) && !empty($_POST['telefon']) &&
        !empty($_POST['tc']) && !empty($_POST['kart-numarasi']) && 
        !empty($_POST['son-kullanma']) && !empty($_POST['cvc'])) {

        $ad = $_POST['ad'];
        $soyad = $_POST['soyad'];
        $telefon = $_POST['telefon'];
        $tc = $_POST['tc'];
        $kart_numarasi = $_POST['kart-numarasi'];
        $son_kullanma = $_POST['son-kullanma'];
        $cvc = $_POST['cvc'];

        $sql = "INSERT INTO musteri_bilgileri (isim, soyisim, telefon, tc, kartnumarası, kartskt, kartccv)
                VALUES ('$ad', '$soyad', '$telefon', '$tc', '$kart_numarasi', '$son_kullanma', '$cvc')";

        if ($conn->query($sql) === TRUE) {
            echo "Kayıt başarılı!";
            header("Location: Tamamlandı.html");
            exit(); // yönlendirme yapıldıktan sonra işlem durur
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    } else {
        
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim ve Ödeme Bilgileri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        h1, h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .card-section {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .flex-container {
            display: flex;
            justify-content: space-between;
        }
        .small-input {
            width: calc(50% - 12px);
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .footer-text {
            font-size: 0.9em;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <form action="kartbilgileri.php" method="POST">
        <h1>İletişim Bilgileri</h1>
        <label for="ad">Ad:</label>
        <input type="text" id="ad" name="ad" required>

        <label for="soyad">Soyad:</label>
        <input type="text" id="soyad" name="soyad" required>

        <label for="telefon">Telefon:</label>
        <input type="tel" id="telefon" name="telefon" maxlength="11" pattern="\d{11}" title="11 haneli bir telefon numarası giriniz" required>

        <label for="tc">T.C. Kimlik Numarası:</label>
        <input type="text" id="tc" name="tc" maxlength="11" pattern="\d{11}" title="11 haneli bir T.C. kimlik numarası giriniz" required>

        <h2>Ödeme Bilgileri</h2>

        <div class="card-section">
            <label for="kart-numarasi">Kart Numarası:</label>
            <input type="text" id="kart-numarasi" name="kart-numarasi" maxlength="16" pattern="\d{16}" title="16 haneli bir kart numarası giriniz" required>

            <div class="flex-container">
                <div>
                    <label for="son-kullanma">MM/YYYY:</label>
                    <input type="text" id="son-kullanma" name="son-kullanma" pattern="\d{2}/\d{4}" placeholder="MM/YYYY" title="Ay/Yıl formatında giriniz (örneğin: 12/2025)" required>
                </div>
                <div>
                    <label for="cvc">CVC:</label>
                    <input type="text" id="cvc" name="cvc" maxlength="3" pattern="\d{3}" title="3 haneli bir CVC kodu giriniz" required>
                </div>
            </div>

            <label for="kart-ad">Ad:</label>
            <input type="text" id="kart-ad" name="kart-ad" required>

            <label for="kart-soyad">Soyad:</label>
            <input type="text" id="kart-soyad" name="kart-soyad" required>

            <p class="footer-text">
                Tahsil edilecek tutar EUR 733,5 <br>
                Bu rezervasyonu tamamlamayı seçerek <a href="#">Koşul ve Sınırlamaları</a> okuduğumu ve kabul ettiğimi onaylarım, <a href="#">Kurallar</a>, <a href="#">Koşullar</a> ve <a href="#">Gizlilik Politikası</a>.
            </p>
        </div>

        <button type="submit">Gönder</button>
    </form>

</body>
</html>
