function hcGYHesapla() {
    const p = parseFloat(document.getElementById('hc-gy-p').value);
    const mw = parseFloat(document.getElementById('hc-gy-mw').value);
    const tc = parseFloat(document.getElementById('hc-gy-t').value);

    if (isNaN(p) || isNaN(mw) || isNaN(tc)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const R = 0.082057; // L·atm/(mol·K)
    const t = tc + 273.15;

    // d = (P * Ma) / (R * T)
    const density = (p * mw) / (R * t);

    document.getElementById('hc-gy-val').innerText = density.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' g/L';
    document.getElementById('hc-gy-result').classList.add('visible');
}
