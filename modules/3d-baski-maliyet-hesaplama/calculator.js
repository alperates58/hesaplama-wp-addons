function hc3dBaskiMaliyetHesapla() {
    var filamentG = parseFloat(document.getElementById('hc-3dm-filament').value) || 0;
    var filFiyat = parseFloat(document.getElementById('hc-3dm-fil-fiyat').value) || 0;
    var sure = parseFloat(document.getElementById('hc-3dm-sure').value) || 0;
    var elektrikSaat = parseFloat(document.getElementById('hc-3dm-elektrik').value) || 0;
    var amortismanSaat = parseFloat(document.getElementById('hc-3dm-amortisman').value) || 0;
    var iscilikSure = parseFloat(document.getElementById('hc-3dm-iscilik').value) || 0;
    var iscilikSaat = parseFloat(document.getElementById('hc-3dm-iscilik-saat').value) || 0;
    var hata = parseFloat(document.getElementById('hc-3dm-hata').value) || 0;

    if (filamentG <= 0 || sure <= 0) {
        alert('Lütfen kullanılan filament ağırlığı ve baskı süresi değerlerini giriniz.');
        return;
    }

    var filMaliyet = (filamentG / 1000) * filFiyat;
    var elemMaliyet = sure * elektrikSaat;
    var amortismanMaliyet = sure * amortismanSaat;
    var iscilikMaliyet = iscilikSure * iscilikSaat;

    var temelMaliyet = filMaliyet + elemMaliyet + amortismanMaliyet + iscilikMaliyet;
    var toplamMaliyet = temelMaliyet * (1 + (hata / 100));

    document.getElementById('hc-3dm-res-filament').innerText = filMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-3dm-res-elektrik').innerText = elemMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-3dm-res-amortisman').innerText = amortismanMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-3dm-res-iscilik').innerText = iscilikMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-3dm-res-toplam').innerText = toplamMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-3dm-result').classList.add('visible');
}