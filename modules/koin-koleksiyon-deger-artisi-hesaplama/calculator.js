function hcKoinArtisHesapla() {
    var alis = parseFloat(document.getElementById('hc-kkd-alis').value) || 0;
    var guncel = parseFloat(document.getElementById('hc-kkd-guncel').value) || 0;
    var yil = parseFloat(document.getElementById('hc-kkd-yil').value) || 1;

    if (alis <= 0 || guncel <= 0 || yil < 1) {
        alert('Lütfen satın alma fiyatı, güncel değer ve yıl değerlerini geçerli şekilde giriniz.');
        return;
    }

    var artis = guncel - alis;
    var yuzde = (artis / alis) * 100;
    
    // CAGR = (Guncel / Alis) ^ (1 / Yil) - 1
    var cagr = (Math.pow((guncel / alis), (1 / yil)) - 1) * 100;

    var sinif = 'Düşük Performans';
    if (cagr >= 15) {
        sinif = 'Olağanüstü Getiri (Mükemmel Yatırım)';
    } else if (cagr >= 8) {
        sinif = 'Yüksek Getiri (Enflasyon Üstü Kar)';
    } else if (cagr >= 3) {
        sinif = 'Orta / Kararlı Performans';
    }

    document.getElementById('hc-kkd-res-artis').innerText = artis.toLocaleString('tr-TR', {minimumFractionDigits: 2});
    document.getElementById('hc-kkd-res-yuzde').innerText = '%' + yuzde.toFixed(1);
    document.getElementById('hc-kkd-res-cagr').innerText = '%' + cagr.toFixed(2);
    document.getElementById('hc-kkd-res-sinif').innerText = sinif;

    document.getElementById('hc-kkd-result').classList.add('visible');
}