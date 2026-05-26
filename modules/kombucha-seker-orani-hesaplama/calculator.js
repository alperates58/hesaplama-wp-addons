function hcKombuchaHesapla() {
    var hacim = parseFloat(document.getElementById('hc-kom-hacim').value) || 0;
    var baslangic = parseFloat(document.getElementById('hc-kom-baslangic').value) || 80;
    var gun = parseInt(document.getElementById('hc-kom-gun').value) || 0;
    var isi = parseFloat(document.getElementById('hc-kom-isi').value) || 24;

    if (hacim <= 0 || gun <= 0) {
        alert('Lütfen geçerli hacim ve gün değerleri giriniz.');
        return;
    }

    // Şeker azalma formülü (Hız sıcaklığa bağlıdır)
    // 24 derecede günlük tüketim oranı ~ %6.5 civarıdır.
    var sicaklikFaktoru = Math.pow(1.05, isi - 24);
    var tuketimHizi = 0.065 * sicaklikFaktoru;
    
    // Kalan Şeker (g/L)
    var kalanSekerLitre = baslangic * Math.exp(-tuketimHizi * gun);
    var kalanSekerToplam = kalanSekerLitre * hacim;

    // Bardak kalori (1 bardak = 250ml = 1/4 Litre)
    var bardakSeker = kalanSekerLitre / 4;
    var kalori = bardakSeker * 4; // 1 gram şeker = 4 kcal

    // Lezzet tahmini
    var tat = 'Tatlı';
    if (kalanSekerLitre < 15) {
        tat = 'Çok Sirkemsi / Keskin Ekşi (2. Fermantasyon veya Sirkelik)';
    } else if (kalanSekerLitre < 30) {
        tat = 'Hafif Ekşi / Dengeli (İdeal İçim)';
    } else if (kalanSekerLitre < 50) {
        tat = 'Yarı Tatlı / Hafif Mayhoş';
    }

    document.getElementById('hc-kom-res-seker-litre').innerText = kalanSekerLitre.toFixed(1) + ' g / L';
    document.getElementById('hc-kom-res-seker-top').innerText = kalanSekerToplam.toFixed(1) + ' g';
    document.getElementById('hc-kom-res-kalori').innerText = Math.round(kalori) + ' kcal';
    document.getElementById('hc-kom-res-tat').innerText = tat;

    document.getElementById('hc-kom-result').classList.add('visible');
}