document.addEventListener("DOMContentLoaded", () => {
    const minusButtons = document.querySelectorAll('.minus');
    const plusButtons = document.querySelectorAll('.plus');


    minusButtons.forEach(button => {
        button.addEventListener('click', () => {
            let input = button.nextElementSibling;
            let value = parseInt(input.value);
            if (value > 0) {
                input.value = value - 1;
            }
        });
    });

    plusButtons.forEach(button => {
        button.addEventListener('click', () => {
            let input = button.previousElementSibling;
            let value = parseInt(input.value);
            input.value = value + 1;
        });
    });
});

/* ------------------------------------------------------------ */
document.getElementById('fiyat-ver-button').addEventListener('click', function () {
    // Tarihleri al
    const girisTarihi = document.getElementById('date-range-giris').value;
    const cikisTarihi = document.getElementById('date-range-cıkıs').value;

    // Tarihler geçerli mi kontrol et
    if (!girisTarihi || !cikisTarihi) {
        alert('Lütfen geçerli bir giriş ve çıkış tarihi seçin.');
        return;
    }

    // Tarihleri Date objelerine çevir
    const girisDate = new Date(girisTarihi);
    const cikisDate = new Date(cikisTarihi);

    // Gün sayısını hesapla
    const timeDiff = cikisDate - girisDate;
    const days = timeDiff / (1000 * 3600 * 24); // Milisaniye cinsinden farkı alıp, gün sayısına çevir

    if (days <= 0) {
        alert('Çıkış tarihi giriş tarihinden sonra olmalıdır.');
        return;
    }

    // Misafir sayısını al
    const yetiskinSayisi = document.querySelector('.guest-picker .counter input[value="1"]').value; // Düzelttik
    const cocukSayisi = document.querySelector('.guest-picker .counter input[value="0"]').value; // Eğer çocuk sayısı başka şekilde belirlenmişse ona göre al

    // Oda ismi ve fiyatını PHP'den al
    const odaIsmi = document.getElementById('oda-ismi').textContent;
    let fiyat = parseFloat(document.getElementById('fiyat').textContent.replace(' Euro', ''));

    // Fiyatı gün sayısı ve kişi sayısıyla çarp
    const toplamFiyat = fiyat * days * yetiskinSayisi;

    // Giriş tarihi, çıkış tarihi, yetişkin ve çocuk sayısını yazdır
    document.getElementById('giris-tarihi').textContent = girisTarihi;
    document.getElementById('cikis-tarihi').textContent = cikisTarihi;
    document.getElementById('yetiskin-sayisi').textContent = yetiskinSayisi;
    document.getElementById('cocuk-sayisi').textContent = cocukSayisi;

    // Oda ismi ve toplam fiyatı yazdır
    document.getElementById('oda-ismi').textContent = odaIsmi;
    document.getElementById('fiyat').textContent = toplamFiyat + " Euro";

    // Gizli alanları güncelle
    document.getElementById('giris-tarihi-input').value = girisTarihi;
    document.getElementById('cikis-tarihi-input').value = cikisTarihi;
    document.getElementById('yetiskin-sayisi-input').value = yetiskinSayisi;
    document.getElementById('cocuk-sayisi-input').value = cocukSayisi;
    document.getElementById('fiyat-input').value = toplamFiyat;

    // Rezerve-container'ı göster
    document.querySelector('.Rezerve-container').style.display = 'block';
});
