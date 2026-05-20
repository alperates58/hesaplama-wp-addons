function hcPcBuildToplamGucHesapla() {
    var cpu = parseFloat(document.getElementById('hc-pc-cpu').value);
    var gpu = parseFloat(document.getElementById('hc-pc-gpu').value) || 0;
    var diger = parseFloat(document.getElementById('hc-pc-diger').value) || 0;
    var yukSaat = parseFloat(document.getElementById('hc-pc-yuk-saat').value) || 0;
    var bostaSaat = parseFloat(document.getElementById('hc-pc-bosta-saat').value) || 0;
    var kwhFiyat = parseFloat(document.getElementById('hc-pc-kwh').value);

    if (isNaN(cpu) || cpu <= 0 || gpu < 0 || diger < 0) {
        alert('Lütfen geçerli donanım TDP ve adet değerleri girin.');
        return;
    }
    if (yukSaat < 0 || bostaSaat < 0 || (yukSaat + bostaSaat) > 24) {
        alert('Günlük toplam kullanım saatleri 24 saati aşamaz.');
        return;
    }
    if (isNaN(kwhFiyat) || kwhFiyat <= 0) {
        alert('Lütfen geçerli bir elektrik kWh fiyatı girin.');
        return;
    }

    var maxGuc = cpu + gpu + (diger * 5) + 40; // 40W anakart ve temel güç
    
    // Normal şartlarda yük altında tam güç kullanılmaz, ortalama %80 güç çekilir.
    var ortalamaYuk = maxGuc * 0.8;
    
    // Boşta güç çekimi (ortalama 70 Watt)
    var ortalamaBosta = 70;

    var gunlukTuketim = ((ortalamaYuk * yukSaat) + (ortalamaBosta * bostaSaat)) / 1000; // kWh
    var aylikTuketim = gunlukTuketim * 30;
    var aylikMaliyet = aylikTuketim * kwhFiyat;
    var yillikMaliyet = aylikMaliyet * 12;

    var fmtWatt = function(val) {
        return Math.round(val).toLocaleString('tr-TR') + ' W';
    };

    var fmtKwh = function(val) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' kWh';
    };

    var fmtPara = function(val) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    };

    document.getElementById('hc-pc-res-max').textContent = fmtWatt(maxGuc);
    document.getElementById('hc-pc-res-gunluk-kwh').textContent = fmtKwh(gunlukTuketim);
    document.getElementById('hc-pc-res-aylik-kwh').textContent = fmtKwh(aylikTuketim);
    document.getElementById('hc-pc-res-fatura').textContent = fmtPara(aylikMaliyet);
    document.getElementById('hc-pc-res-yillik').textContent = fmtPara(yillikMaliyet);

    document.getElementById('hc-pc-build-guc-result').classList.add('visible');
}
