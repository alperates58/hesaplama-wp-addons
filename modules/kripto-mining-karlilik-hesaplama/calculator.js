function hcKriptoMiningKarlilikHesapla() {
    var hashrate = parseFloat(document.getElementById('hc-kmk-has').value) || 0;
    var odul = parseFloat(document.getElementById('hc-kmk-odul').value) || 0;
    var zorluk = parseFloat(document.getElementById('hc-kmk-zorluk').value) || 0;
    var fiyat = parseFloat(document.getElementById('hc-kmk-fiyat').value) || 0;
    var tuketim = parseFloat(document.getElementById('hc-kmk-tuketim').value) || 0;
    var elektrik = parseFloat(document.getElementById('hc-kmk-elektrik').value) || 0;

    if (hashrate <= 0 || zorluk <= 0 || fiyat <= 0) {
        alert('Lütfen temel ağ parametrelerini geçerli giriniz.');
        return;
    }

    // Basit günlük kazanç formülü (MH/s payı)
    // Günlük toplam blok sayısı varsayımı: madencilik algoritmasına göre değişir.
    // Varsayılan olarak pay oranı üzerinden hesaplama yapıyoruz.
    var gunlukBloklar = 720; // örn. ortalama 2 dakikada bir blok çıkaran bir zincir
    var gunlukToplamOdul = gunlukBloklar * odul;
    var payOrani = hashrate / zorluk;
    var gunlukCoin = gunlukToplamOdul * payOrani;
    
    var gunlukGelir = gunlukCoin * fiyat;
    var gunlukElektrikTuketimi = (tuketim * 24) / 1000; // kWh
    var gunlukGider = gunlukElektrikTuketimi * elektrik;
    
    var gunlukNet = gunlukGelir - gunlukGider;

    var formatResult = function(val, isColor) {
        var str = val.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        return str;
    };

    var setRow = function(prefix, multiplier) {
        var gelir = gunlukGelir * multiplier;
        var gider = gunlukGider * multiplier;
        var net = gunlukNet * multiplier;

        document.getElementById('hc-kmk-res-' + prefix + '-gelir').innerText = formatResult(gelir) + ' $';
        document.getElementById('hc-kmk-res-' + prefix + '-gider').innerText = formatResult(gider);
        
        var netEl = document.getElementById('hc-kmk-res-' + prefix + '-net');
        netEl.innerText = formatResult(net);
        netEl.style.color = net >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';
    };

    setRow('gun', 1);
    setRow('ay', 30);
    setRow('yil', 365);

    document.getElementById('hc-kmk-result').classList.add('visible');
}