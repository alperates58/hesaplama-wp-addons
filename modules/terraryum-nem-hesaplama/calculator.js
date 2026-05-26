function hcTerraryumNemHesapla() {
    var hacim = parseFloat(document.getElementById('hc-tnh-hacim').value) || 0;
    var mevcut = parseFloat(document.getElementById('hc-tnh-mevcut').value) || 0;
    var hedef = parseFloat(document.getElementById('hc-tnh-hedef').value) || 0;
    var havalandirma = parseFloat(document.getElementById('hc-tnh-havalandirma').value) || 1;

    if (hacim <= 0) {
        alert('Lütfen terraryum hacmini giriniz.');
        return;
    }

    if (hedef <= mevcut) {
        document.getElementById('hc-tnh-res-artis').innerText = 'Artış Gerekmiyor';
        document.getElementById('hc-tnh-res-hacim').innerText = '0 ml';
        document.getElementById('hc-tnh-res-frekans').innerText = 'Sadece izleyin, spreyleme yapmayın.';
        document.getElementById('hc-tnh-result').classList.add('visible');
        return;
    }

    var fark = hedef - mevcut;
    var gunlukSu = hacim * (fark / 100) * 0.2 * havalandirma;
    if (gunlukSu < 5) gunlukSu = 5;

    var frekans = '';
    if (hedef >= 80) {
        frekans = 'Günde 3-4 kez (veya otomatik nemlendirici/sisleme)';
    } else if (hedef >= 60) {
        frekans = 'Günde 2 kez (sabah ve akşam)';
    } else {
        frekans = 'Günde 1 kez veya gün aşırı';
    }

    document.getElementById('hc-tnh-res-artis').innerText = '%' + fark.toFixed(0);
    document.getElementById('hc-tnh-res-hacim').innerText = Math.round(gunlukSu) + ' ml';
    document.getElementById('hc-tnh-res-frekans').innerText = frekans;

    document.getElementById('hc-tnh-result').classList.add('visible');
}