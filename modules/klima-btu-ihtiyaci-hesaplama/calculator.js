function hcKlimaBtuHesapla() {
    var alan = parseFloat(document.getElementById('hc-kbtu-alan').value) || 0;
    var bolgeKatsayi = parseFloat(document.getElementById('hc-kbtu-bolge').value) || 385;
    var kisi = parseInt(document.getElementById('hc-kbtu-kisi').value) || 0;
    var gunes = parseFloat(document.getElementById('hc-kbtu-gunes').value) || 1.0;
    var ekIsi = parseFloat(document.getElementById('hc-kbtu-isi').value) || 0;

    if (alan <= 0) {
        alert('Lütfen geçerli bir oda alanı giriniz.');
        return;
    }

    var alanBtu = alan * bolgeKatsayi;
    var kisiBtu = Math.max(0, kisi - 1) * 600; // İlk kişiden sonrası için 600 BTU/kişi eklenir
    var toplamBtu = (alanBtu + kisiBtu + ekIsi) * gunes;

    // Öneri bul
    var oneri = '';
    if (toplamBtu <= 9000) {
        oneri = '9.000 BTU';
    } else if (toplamBtu <= 12000) {
        oneri = '12.000 BTU';
    } else if (toplamBtu <= 18000) {
        oneri = '18.000 BTU';
    } else if (toplamBtu <= 24000) {
        oneri = '24.000 BTU';
    } else {
        oneri = '24.000 BTU ve üzeri (veya birden fazla klima)';
    }

    document.getElementById('hc-kbtu-res-alan').innerText = Math.round(alanBtu).toLocaleString('tr-TR') + ' BTU';
    document.getElementById('hc-kbtu-res-kisi').innerText = Math.round(kisiBtu).toLocaleString('tr-TR') + ' BTU';
    document.getElementById('hc-kbtu-res-cihaz').innerText = Math.round(ekIsi).toLocaleString('tr-TR') + ' BTU';
    document.getElementById('hc-kbtu-res-toplam').innerText = Math.round(toplamBtu).toLocaleString('tr-TR') + ' BTU';
    document.getElementById('hc-kbtu-res-oneri').innerText = oneri;

    document.getElementById('hc-kbtu-result').classList.add('visible');
}