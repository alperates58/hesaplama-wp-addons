function hcEvChargeHesapla() {
    var batarya = parseFloat(document.getElementById('hc-esc-batarya').value) || 60;
    var sarjAraligi = document.getElementById('hc-esc-sarj').value;
    var birimFiyat = parseFloat(document.getElementById('hc-esc-istasyon').value) || 3.0;

    var oran = 1.0;
    if (sarjAraligi === '20-80') oran = 0.6;
    else if (sarjAraligi === '10-100') oran = 0.9;

    var gerekenGuc = batarya * oran;
    // Şarj esnasındaki %10 güç kaybını hesaba katıyoruz (şarj verimliliği %90)
    var cekilenGuc = gerekenGuc / 0.9; 
    var maliyet = cekilenGuc * birimFiyat;

    // Ortalama 100km'de 16 kWh tüketim referans alınmıştır
    var kmMaliyet = (16 / 100) * birimFiyat;

    document.getElementById('hc-esc-res-guc').innerText = cekilenGuc.toFixed(1) + ' kWh';
    document.getElementById('hc-esc-res-maliyet').innerText = maliyet.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-esc-res-km-maliyet').innerText = kmMaliyet.toFixed(2) + ' ₺ / km';

    document.getElementById('hc-esc-result').classList.add('visible');
}