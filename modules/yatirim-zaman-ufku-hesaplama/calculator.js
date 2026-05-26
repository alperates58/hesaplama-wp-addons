function hcZamanUfkuHesapla() {
    var hedef = parseFloat(document.getElementById('hc-yzu-hedef').value) || 0;
    var baslangic = parseFloat(document.getElementById('hc-yzu-baslangic').value) || 0;
    var aylik = parseFloat(document.getElementById('hc-yzu-aylik').value) || 0;
    var getiriYillik = parseFloat(document.getElementById('hc-yzu-getiri').value) || 0;

    if (hedef <= 0) {
        alert('Lütfen ulaşmak istediğiniz hedef tutarı giriniz.');
        return;
    }

    if (baslangic >= hedef) {
        alert('Başlangıç birikiminiz zaten hedefe ulaşıyor.');
        return;
    }

    if (aylik <= 0 && getiriYillik <= 0) {
        alert('Hedefe ulaşabilmek için aylık tasarruf veya yıllık getiri oranı olmalıdır.');
        return;
    }

    // Aylık getiri oranını hesapla (yıllık / 12)
    var r = (getiriYillik / 100) / 12;
    var bakiye = baslangic;
    var ay = 0;

    // Simülasyon
    while (bakiye < hedef && ay < 1200) { // Max 100 yıl limiti
        ay++;
        if (r > 0) {
            bakiye = bakiye * (1 + r) + aylik;
        } else {
            bakiye += aylik;
        }
    }

    var yil = Math.floor(ay / 12);
    var kalanAy = ay % 12;

    var sureStr = '';
    if (yil > 0) sureStr += yil + ' Yıl ';
    if (kalanAy > 0) sureStr += kalanAy + ' Ay';
    if (ay >= 1200) sureStr = '100 Yıldan Fazla (Hedef çok yüksek veya getiri/tasarruf yetersiz)';

    var toplamKatki = baslangic + (aylik * ay);
    var nemalandirma = bakiye - toplamKatki;

    document.getElementById('hc-yzu-res-sure').innerText = sureStr;
    document.getElementById('hc-yzu-res-ana-para').innerText = toplamKatki.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    document.getElementById('hc-yzu-res-nemalandirma').innerText = (nemalandirma > 0 ? nemalandirma : 0).toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';

    document.getElementById('hc-yzu-result').classList.add('visible');
}