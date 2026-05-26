function hcKriptoDcaGetiriHesapla() {
    var tutar = parseFloat(document.getElementById('hc-kdg-tutar').value) || 0;
    var siklik = parseInt(document.getElementById('hc-kdg-sıklık').value) || 12;
    var yil = parseFloat(document.getElementById('hc-kdg-yil').value) || 0;
    var artis = parseFloat(document.getElementById('hc-kdg-artis').value) || 0;

    if (tutar <= 0 || yil <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    var toplamDonem = Math.round(siklik * yil);
    var donemlikFaiz = (artis / 100) / siklik;
    
    var toplamYatirim = tutar * toplamDonem;
    var gelecekDeger = 0;

    for (var i = 0; i < toplamDonem; i++) {
        gelecekDeger = (gelecekDeger + tutar) * (1 + donemlikFaiz);
    }

    var netKar = gelecekDeger - toplamYatirim;
    var roi = (netKar / toplamYatirim) * 100;

    document.getElementById('hc-kdg-res-toplam').innerText = toplamYatirim.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-kdg-res-deger').innerText = gelecekDeger.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    
    var karEl = document.getElementById('hc-kdg-res-kar');
    karEl.innerText = (netKar >= 0 ? '+' : '') + netKar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    karEl.style.color = netKar >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    var roiEl = document.getElementById('hc-kdg-res-roi');
    roiEl.innerText = (roi >= 0 ? '+' : '') + roi.toFixed(2) + '%';
    roiEl.style.color = roi >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    document.getElementById('hc-kdg-result').classList.add('visible');
}