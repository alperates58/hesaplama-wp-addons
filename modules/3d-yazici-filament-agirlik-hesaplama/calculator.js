function hcFilamentGirisTipiDegisti() {
    var tip = document.getElementById('hc-3df-giris-tipi').value;
    document.getElementById('hc-3df-input-uzunluk').style.display = tip === 'uzunluk' ? 'block' : 'none';
    document.getElementById('hc-3df-input-hacim').style.display = tip === 'hacim' ? 'block' : 'none';
}

function hcFilamentAgirlikHesapla() {
    var yogunluk = parseFloat(document.getElementById('hc-3df-tur').value) || 1.24;
    var tip = document.getElementById('hc-3df-giris-tipi').value;
    var ruloFiyat = parseFloat(document.getElementById('hc-3df-rulo-fiyat').value) || 0;

    var hacimCc = 0;

    if (tip === 'uzunluk') {
        var uzunlukM = parseFloat(document.getElementById('hc-3df-uzunluk').value) || 0;
        var capMm = parseFloat(document.getElementById('hc-3df-cap').value) || 1.75;
        if (uzunlukM <= 0) {
            alert('Lütfen filament uzunluğunu giriniz.');
            return;
        }
        var yaricapCm = capMm / 20; // mm -> cm / 2
        var uzunlukCm = uzunlukM * 100;
        hacimCc = Math.PI * Math.pow(yaricapCm, 2) * uzunlukCm;
    } else {
        hacimCc = parseFloat(document.getElementById('hc-3df-hacim').value) || 0;
        if (hacimCc <= 0) {
            alert('Lütfen baskı hacmini giriniz.');
            return;
        }
    }

    var agirlikG = hacimCc * yogunluk;
    var ruloYuzdesi = (agirlikG / 1000) * 100;
    var maliyet = (agirlikG / 1000) * ruloFiyat;

    document.getElementById('hc-3df-res-agirlik').innerText = agirlikG.toFixed(2) + ' gram';
    document.getElementById('hc-3df-res-maliyet').innerText = maliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-3df-res-yuzde').innerText = '%' + ruloYuzdesi.toFixed(1);

    document.getElementById('hc-3df-result').classList.add('visible');
}