function hcFreelanceYillikGelirHesapla() {
    var hedef = parseFloat(document.getElementById('hc-ygh-hedef').value) || 0;
    var gider = parseFloat(document.getElementById('hc-ygh-gider').value) || 0;
    var hafta = parseFloat(document.getElementById('hc-ygh-hafta').value) || 48;
    var saat = parseFloat(document.getElementById('hc-ygh-saat').value) || 25;

    if (hedef <= 0 || hafta <= 0 || saat <= 0) {
        alert('Lütfen geçerli yıllık hedef, hafta ve saat giriniz.');
        return;
    }

    var toplamBrutCiro = hedef + gider;
    var toplamSaat = hafta * saat;
    var saatlikUcret = toplamBrutCiro / toplamSaat;

    document.getElementById('hc-ygh-res-ciro').innerText = toplamBrutCiro.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-ygh-res-toplam-saat').innerText = toplamSaat.toLocaleString('tr-TR') + ' Saat';
    document.getElementById('hc-ygh-res-saatlik').innerText = saatlikUcret.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-ygh-result').classList.add('visible');
}