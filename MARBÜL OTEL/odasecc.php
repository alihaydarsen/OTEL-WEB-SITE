<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REZERVASYON-MARBÜL HOTEL</title>
    <link
      rel="icon"
      href="FOTOĞRAFLAR/OTEL LOGO_preview_rev_1.png"
      type="image/png"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik+Vinyl&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Agu+Display&family=Oswald:wght@200..700&family=Rubik+Vinyl&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Agu+Display&family=Cinzel:wght@400..900&family=Oswald:wght@200..700&family=Rubik+Vinyl&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <div
      style="
        background-image: url('FOTOĞRAFLAR/OTEL\ DENEME\ ARK\ 2.jpg');
        background-size: cover;
        background-position: center;
        border-radius: 30px;
      "
    >
      <br />
      <br />

      <table align="left">
        <tr>
          <th align="left" style="width: 100px">
            <img
              src="FOTOĞRAFLAR/OTEL LOGO_preview_rev_1.png"
              alt="LOGO"
              width="300px"
              height="300px"
              style="border-radius: 5px"
            />
          </th>
          <th style="width: 300px">
            <a
              href="ANASAYFA.HTML"
              style="
                color: gray;
                font-size: x-large;
                font-family: Oswald;
                text-decoration: none;
                background-color: white;
              "
              >ANASAYFA</a
            >
          </th>
          <th style="width: 300px">
            <a
              href="HAKKIMIZDA.HTML"
              style="
                color: gray;
                font-size: x-large;
                font-family: Oswald;
                text-decoration: none;
                background-color: white;
              "
              >HAKKIMIZDA</a
            >
          </th>
          <th style="width: 300px">
            <a
              href="İLETİŞİM.HTML"
              style="
                color: gray;
                font-size: x-large;
                font-family: Oswald;
                text-decoration: none;
                background-color: white;
              "
              >İLETİŞİM</a
            >
          </th>
          <th style="width: 300px">
            <a
              href="ODALAR.HTML"
              style="
                color: gray;
                font-size: x-large;
                font-family: Oswald;
                text-decoration: none;
                background-color: white;
              "
              >ODALAR</a
            >
          </th>
        </tr>
      </table>
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
    </div>

    <br />
    <div style="background-color: gray">
      <h1 style="text-align: center; font-family: Cinzel; font-size: xx-large">
        REZERVASYON
      </h1>
    </div>

    <br />
    <br />

    <?php
    $rooms = [
      ["name" => "Deluxe Oda", "price" => 120, "image" => "-ODA1.png"],
      ["name" => "Deluxe Oda Küvetli", "price" => 150, "image" => "-ODA2.png"],
      ["name" => "Deluxe Oda Bahçeli", "price" => 200, "image" => "-ODA3.png"],
      ["name" => "Deluxe Oda Manzaralı", "price" => 400, "image" => "-ODA4.png"],
      ["name" => "Premium Oda", "price" => 450, "image" => "-ODA5.png"],
      ["name" => "Premium Oda Manzaralı", "price" => 500, "image" => "-ODA6.png"],
      ["name" => "Premium Oda Jakuzili", "price" => 700, "image" => "-ODA7.png"],
      ["name" => "Premium Oda Havuzlu", "price" => 750, "image" => "-ODA8.png"],
      ["name" => "Premium Suit", "price" => 800, "image" => "-ODA9.png"]
    ];

    foreach ($rooms as $room) {
      $urlName = urlencode($room['name']); // Odaların isimlerini URL dostu hale getirir
      echo "<div style='background-color: rgb(212, 190, 163); border-radius: 40px'>
              <br />
              <table>
                <tr>
                  <th align='left' style='width: 500px'>
                    <img
                      src='FOTOĞRAFLAR/{$room['image']}'
                      style='border-radius: 30px'
                      title=''
                      width='400'
                      height='300'
                    />
                  </th>
                  <th align='center' style='width: 1500px'>
                    <img
                      src='FOTOĞRAFLAR/OTEL LOGO_preview_rev_1.png'
                      alt=''
                      height='300px'
                      width='300px'
                    />
                  </th>
                  <th>
                    <h2 style='font-family: Oswald'>{$room['name']}</h2>
                    <br />
                    <h2 style='font-family: Oswald'>Gecelik fiyat: \${$room['price']}</h2>
                    <br />
                    <a href='rezervasyon.php?oda_ismi={$urlName}&fiyat={$room['price']}'>
                      <button 
                        style='height: 50px; width: 240px; font-family: Oswald; border-radius: 30px; color: white; background-color: gray;'>
                        REZERVE ET
                      </button>
                    </a>
                  </th>
                </tr>
              </table>
              <br />
            </div>
            <br />";
    }
    ?>

  </body>
</html>
