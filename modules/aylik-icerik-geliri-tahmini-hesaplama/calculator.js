function hcAylikIcerikGeliriTahminiHesapla() {
    var youtube = parseFloat(document.getElementById('hc-aig-youtube').value) || 0;
    var twitch = parseFloat(document.getElementById('hc-aig-twitch').value) || 0;
    var sponsor = parseFloat(document.getElementById('hc-aig-sponsor').value) || 0;
    var affiliate = parseFloat(document.getElementById('hc-aig-affiliate').value) || 0;
    var diger = parseFloat(document.getElementById('hc-aig-diger').value) || 0;

    var gider = parseFloat(document.getElementById('hc-aig-gider').value) || 0;
    var vergiOran = parseFloat(document.getElementById('hc-aig-vergi').value) / 100;

    if (youtube < 0 || twitch < 0 || sponsor < 0 || affiliate < 0 || diger < 0 || gider < 0) {
        alert('Tutar alanları negatif olamaz.');
        return;
    }

    var brut = youtube + twitch + sponsor + affiliate + diger;
    var vergiKesintisi = brut * vergiOran;
    var net = brut - vergiKesintisi - gider;
    var yillik = net * 12;

    var fmtPara = function(val) {
        var prefix = val < 0 ? '-' : '';
        return prefix + Math.abs(val).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    };

    document.getElementById('hc-aig-res-brut').textContent = fmtPara(brut);
    document.getElementById('hc-aig-res-kesinti').textContent = fmtPara(vergiKesintisi);
    document.getElementById('hc-aig-res-gider').textContent = fmtPara(gider);
    
    var netEl = document.getElementById('hc-aig-res-net');
    netEl.textContent = fmtPara(net);
    if (net < 0) {
        netEl.style.color = 'var(--hc-front-red)';
    } else {
        netEl.style.color = 'var(--hc-front-green)';
    }

    var yillikEl = document.getElementById('hc-aig-res-yillik');
    yillikEl.textContent = fmtPara(yillik);
    if (yillik < 0) {
        yillikEl.style.color = 'var(--hc-front-red)';
    } else {
        yillikEl.style.color = 'var(--hc-front-green)';
    }

    document.getElementById('hc-aylik-icerik-geliri-result').classList.add('visible');
}
