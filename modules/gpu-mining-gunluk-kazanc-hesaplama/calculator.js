function hcGpuMiningKazancHesapla() {
    var hashrate = parseFloat(document.getElementById('hc-gmk-has').value) || 0;
    var fiyat = parseFloat(document.getElementById('hc-gmk-fiyat').value) || 0;
    var katsayi = parseFloat(document.getElementById('hc-gmk-odul').value) || 0;
    var guc = parseFloat(document.getElementById('hc-gmk-guc').value) || 0;
    var elektrik = parseFloat(document.getElementById('hc-gmk-elektrik').value) || 0;
    var kur = parseFloat(document.getElementById('hc-gmk-kur').value) || 0;

    if (hashrate <= 0 || fiyat <= 0 || katsayi <= 0) {
        alert('Lütfen temel hashrate ve kazanç katsayılarını giriniz.');
        return;
    }

    var gunlukCoin = (hashrate / 100) * katsayi;
    var gunlukGelirUsd = gunlukCoin * fiyat;
    var gunlukGelirTl = gunlukGelirUsd * kur;

    var gunlukKwh = (guc * 24) / 1000;
    var gunlukGiderTl = gunlukKwh * elektrik;

    var netTl = gunlukGelirTl - gunlukGiderTl;

    document.getElementById('hc-gmk-res-coin').innerText = gunlukCoin.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' Coin';
    document.getElementById('hc-gmk-res-gelir-usd').innerText = gunlukGelirUsd.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' $';
    document.getElementById('hc-gmk-res-gelir-tl').innerText = gunlukGelirTl.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-gmk-res-gider-tl').innerText = '-' + gunlukGiderTl.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    
    var netEl = document.getElementById('hc-gmk-res-net-tl');
    netEl.innerText = (netTl >= 0 ? '+' : '') + netTl.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    netEl.style.color = netTl >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    document.getElementById('hc-gmk-result').classList.add('visible');
}