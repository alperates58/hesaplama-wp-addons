function hcAkisHiziTipDegistir() {
    const tip = document.getElementById('hc-ah-kesit-tipi').value;
    document.querySelectorAll('.hc-ah-input-group').forEach(el => el.style.display = 'none');
    document.getElementById('hc-ah-in-' + tip).style.display = 'block';
}

function hcAkisHiziHesapla() {
    const debiVal = parseFloat(document.getElementById('hc-ah-debi').value);
    const debiBirim = document.getElementById('hc-ah-debi-birim').value;
    const tip = document.getElementById('hc-ah-kesit-tipi').value;

    if (!debiVal) {
        alert('Lütfen debi değerini giriniz.');
        return;
    }

    // m3/s birimine çevir
    let Q = debiVal;
    if (debiBirim === 'm3h') Q = debiVal / 3600;
    if (debiBirim === 'ls') Q = debiVal / 1000;

    let A = 0;
    if (tip === 'daire') {
        const D = parseFloat(document.getElementById('hc-ah-cap').value) / 1000; // m
        if (!D) { alert('Lütfen çapı giriniz.'); return; }
        A = Math.PI * Math.pow(D / 2, 2);
    } else if (tip === 'dikdortgen') {
        const w = parseFloat(document.getElementById('hc-ah-genislik').value);
        const h = parseFloat(document.getElementById('hc-ah-yukseklik').value);
        if (!w || !h) { alert('Lütfen genişlik ve yüksekliği giriniz.'); return; }
        A = w * h;
    } else {
        A = parseFloat(document.getElementById('hc-ah-alan').value);
        if (!A) { alert('Lütfen alanı giriniz.'); return; }
    }

    // v = Q / A
    const v = Q / A;

    const sonucDiv = document.getElementById('hc-akis-hiz-result');
    document.getElementById('hc-ah-res-v').innerText = v.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' m/s';
    
    const noteDiv = document.getElementById('hc-ah-res-note');
    noteDiv.innerText = `Kesit Alanı: ${A.toFixed(4).toLocaleString('tr-TR')} m² olarak hesaplandı.`;

    sonucDiv.classList.add('visible');
}
