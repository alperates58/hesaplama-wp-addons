function hcPulDegeriHesapla() {
    var katalog = parseFloat(document.getElementById('hc-pkd-katalog').value) || 0;
    var kondisyon = parseFloat(document.getElementById('hc-pkd-kondisyon').value) || 1.0;
    var sertifika = parseFloat(document.getElementById('hc-pkd-sertifika').value) || 1.0;
    var hata = parseFloat(document.getElementById('hc-pkd-hata').value) || 0;

    if (katalog <= 0) {
        alert('Lütfen pul katalog değerini giriniz.');
        return;
    }

    // Tahmini Piyasa Değeri = Katalog * Kondisyon * Sertifika * (1 + Hata)
    var piyasaDegeri = katalog * kondisyon * sertifika * (1 + hata);

    document.getElementById('hc-pkd-res-kond-carp').innerText = kondisyon.toFixed(2) + 'x';
    document.getElementById('hc-pkd-res-varyete').innerText = '+' + (hata * 100) + '%';
    document.getElementById('hc-pkd-res-piyasa').innerText = piyasaDegeri.toLocaleString('tr-TR', {minimumFractionDigits: 2});

    document.getElementById('hc-pkd-result').classList.add('visible');
}