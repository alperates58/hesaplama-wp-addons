function hcDryRateHesapla() {
    const w1 = parseFloat(document.getElementById('hc-dr-w1').value);
    const w2 = parseFloat(document.getElementById('hc-dr-w2').value);
    const a = parseFloat(document.getElementById('hc-dr-a').value);
    const t = parseFloat(document.getElementById('hc-dr-t').value);

    if (isNaN(w1) || isNaN(w2) || isNaN(a) || isNaN(t) || a <= 0 || t <= 0 || w1 < w2) {
        alert('Lütfen geçerli değerler girin. Başlangıç ağırlığı son ağırlıktan büyük olmalıdır.');
        return;
    }

    // R = (W1 - W2) / (A * t)
    const rate = (w1 - w2) / (a * t);

    document.getElementById('hc-dr-res-val').innerText = rate.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg/m²h';
    
    document.getElementById('hc-dr-result').classList.add('visible');
}
