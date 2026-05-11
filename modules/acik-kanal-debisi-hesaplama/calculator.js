function hcAcikKanalDebisiHesapla() {
    const A = parseFloat(document.getElementById('hc-debi-alan').value);
    const P = parseFloat(document.getElementById('hc-debi-cevre').value);
    const S = parseFloat(document.getElementById('hc-debi-egim').value);
    const n = parseFloat(document.getElementById('hc-debi-n').value);

    if (!A || !P || !S || !n) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    // Hidrolik Yarıçap R = A / P
    const R = A / P;

    // Manning Formülü: Q = (1/n) * A * R^(2/3) * S^(1/2)
    const Q = (1 / n) * A * Math.pow(R, 2/3) * Math.sqrt(S);
    
    // Hız v = Q / A
    const v = Q / A;

    const sonucDiv = document.getElementById('hc-acik-kanal-result');
    document.getElementById('hc-acik-res-q').innerText = Q.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' m³/s';
    document.getElementById('hc-acik-res-v').innerText = v.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' m/s';
    
    const noteDiv = document.getElementById('hc-acik-res-note');
    noteDiv.innerText = `Hidrolik Yarıçap (R): ${R.toFixed(3).toLocaleString('tr-TR')} m olarak hesaplandı.`;

    sonucDiv.classList.add('visible');
}
