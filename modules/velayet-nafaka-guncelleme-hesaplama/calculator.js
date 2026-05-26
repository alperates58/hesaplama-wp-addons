function hcVelayetNafakaGuncellemeHesapla() {
    var tutar = parseFloat(document.getElementById('hc-vng-tutar').value) || 0;
    var baslangicYil = parseInt(document.getElementById('hc-vng-yil').value);
    var hedefYil = parseInt(document.getElementById('hc-vng-hedef').value);
    var ozelOran = parseFloat(document.getElementById('hc-vng-ozel-oran').value);

    if (tutar <= 0) {
        alert('Lütfen geçerli bir nafaka tutarı giriniz.');
        return;
    }

    if (baslangicYil >= hedefYil) {
        alert('Hedef yıl, başlangıç yılından büyük olmalıdır.');
        return;
    }

    // Yıllık TÜFE 12 Aylık Ortalaması Enflasyon Oranları
    var tufeRates = {
        2021: 0.1960,
        2022: 0.6427,
        2023: 0.5386,
        2024: 0.5540,
        2025: 0.4390,
        2026: 0.2850
    };

    var finalRate = 1.0;
    
    if (!isNaN(ozelOran) && ozelOran > 0) {
        finalRate = 1.0 + (ozelOran / 100);
    } else {
        // Enflasyon birikimli hesaplama
        for (var y = baslangicYil; y < hedefYil; y++) {
            var r = tufeRates[y + 1] || 0.25;
            finalRate = finalRate * (1.0 + r);
        }
    }

    var yeniTutar = tutar * finalRate;
    var artis = yeniTutar - tutar;
    var oranGosterge = ((finalRate - 1) * 100).toFixed(2);

    document.getElementById('hc-vng-res-eski').innerText = tutar.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-vng-res-oran').innerText = '%' + oranGosterge;
    document.getElementById('hc-vng-res-artis').innerText = '+' + Math.round(artis).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-vng-res-yeni').innerText = Math.round(yeniTutar).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-vng-result').classList.add('visible');
}