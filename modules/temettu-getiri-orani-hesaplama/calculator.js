function hcTemettuGetiriHesapla() {
    var hisse = parseFloat(document.getElementById('hc-tgo-hisse').value) || 0;
    var tutar = parseFloat(document.getElementById('hc-tgo-tutar').value) || 0;

    if (hisse <= 0) {
        alert('Lütfen geçerli bir hisse senedi fiyatı giriniz.');
        return;
    }

    var brutVerim = (tutar / hisse) * 100;
    // Türkiye'de %10 stopaj kesintisi vardır temettülerde
    var netVerim = brutVerim * 0.9;

    var sinif = 'Düşük Temettü Verimi';
    var renk = '#6b7280';
    if (brutVerim >= 8.0) {
        sinif = 'Çok Yüksek Temettü Verimi (Büyüme Hızı İkincil Olabilir)';
        renk = 'var(--hc-front-green)';
    } else if (brutVerim >= 5.0) {
        sinif = 'Yüksek Temettü Verimi (İdeal Emeklilik Seviyesi)';
        renk = '#22c55e';
    } else if (brutVerim >= 2.5) {
        sinif = 'Orta Derece Temettü Verimi (Dengeli Şirket)';
        renk = '#3b82f6';
    }

    document.getElementById('hc-tgo-res-verim').innerText = '%' + brutVerim.toFixed(2);
    document.getElementById('hc-tgo-res-net-verim').innerText = '%' + netVerim.toFixed(2);
    document.getElementById('hc-tgo-res-sinif').innerText = sinif;
    document.getElementById('hc-tgo-res-sinif').style.color = renk;

    document.getElementById('hc-tgo-result').classList.add('visible');
}