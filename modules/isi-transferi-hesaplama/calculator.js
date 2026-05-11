function hcHeatTransHesapla() {
    const k = parseFloat(document.getElementById('hc-ht-k').value);
    const a = parseFloat(document.getElementById('hc-ht-a').value);
    const dt = parseFloat(document.getElementById('hc-ht-dt').value);
    const d = parseFloat(document.getElementById('hc-ht-d').value);

    if (isNaN(k) || isNaN(a) || isNaN(dt) || isNaN(d) || a <= 0 || d <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Q = k * A * dt / d
    const q = (k * a * dt) / d;

    document.getElementById('hc-ht-res-val').innerText = q.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Watt';
    
    document.getElementById('hc-ht-result').classList.add('visible');
}
