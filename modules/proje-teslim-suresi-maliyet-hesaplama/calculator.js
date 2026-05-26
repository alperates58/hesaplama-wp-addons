function hcProjeTeslimMaliyetHesapla() {
    var deger = parseFloat(document.getElementById('hc-ptm-deger').value) || 0;
    var gecikme = parseFloat(document.getElementById('hc-ptm-gecikme').value) || 0;
    var cezaOran = parseFloat(document.getElementById('hc-ptm-ceza').value) || 0;
    var ekSaat = parseFloat(document.getElementById('hc-ptm-ek-saat').value) || 0;
    var saatlik = parseFloat(document.getElementById('hc-ptm-saatlik').value) || 0;

    if (deger <= 0) {
        alert('Lütfen proje kontrat değerini giriniz.');
        return;
    }

    // Ceza tutarı = Değer * (Ceza Oranı / 100) * Gecikme Gün
    var cezaTutar = deger * (cezaOran / 100) * gecikme;
    var eforMaliyet = gecikme * ekSaat * saatlik;
    var toplamMaliyet = cezaTutar + eforMaliyet;
    var netGelir = deger - toplamMaliyet;

    document.getElementById('hc-ptm-res-ceza').innerText = cezaTutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-ptm-res-efor').innerText = eforMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-ptm-res-toplam').innerText = toplamMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-ptm-res-net').innerText = netGelir.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-ptm-result').classList.add('visible');
}