function hcThermalCondHesapla() {
    const q = parseFloat(document.getElementById('hc-tk-q').value);
    const d = parseFloat(document.getElementById('hc-tk-d').value);
    const a = parseFloat(document.getElementById('hc-tk-a').value);
    const dt = parseFloat(document.getElementById('hc-tk-dt').value);

    if (isNaN(q) || isNaN(d) || isNaN(a) || isNaN(dt) || a <= 0 || dt <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // k = (Q * d) / (A * dt)
    const k = (q * d) / (a * dt);

    document.getElementById('hc-tk-res-val').innerText = k.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' W/m·K';
    
    document.getElementById('hc-tk-result').classList.add('visible');
}
