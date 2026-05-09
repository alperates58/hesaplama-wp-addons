function hcAYDHesapla() {
    const w = parseFloat(document.getElementById('hc-ayd-w').value);
    const t = parseFloat(document.getElementById('hc-ayd-t').value);

    if (isNaN(w) || isNaN(t)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rad = w * t;
    const deg = rad * (180 / Math.PI);

    document.getElementById('hc-ayd-rad').innerText = rad.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' rad';
    document.getElementById('hc-ayd-deg').innerText = deg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + '°';
    
    document.getElementById('hc-ayd-result').classList.add('visible');
}
