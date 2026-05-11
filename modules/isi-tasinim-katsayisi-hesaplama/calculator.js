function hcConvCoeffHesapla() {
    const q = parseFloat(document.getElementById('hc-cc-q').value);
    const a = parseFloat(document.getElementById('hc-cc-a').value);
    const dt = parseFloat(document.getElementById('hc-cc-dt').value);

    if (isNaN(q) || isNaN(a) || isNaN(dt) || a <= 0 || dt <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // h = Q / (A * dt)
    const h = q / (a * dt);

    document.getElementById('hc-cc-res-val').innerText = h.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' W/m²·K';
    
    document.getElementById('hc-cc-result').classList.add('visible');
}
