function hcKorelasyonHesapla() {
    const xInput = document.getElementById('hc-corr-x').value;
    const yInput = document.getElementById('hc-corr-y').value;

    const parse = (input) => input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n));
    const x = parse(xInput);
    const y = parse(yInput);

    if (x.length < 2 || y.length < 2) {
        alert('En az 2 veri noktası girmelisiniz.');
        return;
    }

    if (x.length !== y.length) {
        alert('X ve Y veri setlerinin boyutları aynı olmalıdır.');
        return;
    }

    const n = x.length;
    const xMean = x.reduce((a, b) => a + b, 0) / n;
    const yMean = y.reduce((a, b) => a + b, 0) / n;

    let numerator = 0;
    let sumX2 = 0;
    let sumY2 = 0;

    for (let i = 0; i < n; i++) {
        const dx = x[i] - xMean;
        const dy = y[i] - yMean;
        numerator += dx * dy;
        sumX2 += dx * dx;
        sumY2 += dy * dy;
    }

    const denominator = Math.sqrt(sumX2 * sumY2);
    
    if (denominator === 0) {
        alert('Standart sapma sıfır olduğu için korelasyon hesaplanamaz (veriler sabit).');
        return;
    }

    const r = numerator / denominator;
    const r2 = r * r;

    const fmt = (val) => val.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 });

    document.getElementById('hc-res-corr-r').innerText = fmt(r);
    document.getElementById('hc-res-corr-r2').innerText = fmt(r2);

    let desc = "";
    const absR = Math.abs(r);
    if (absR >= 0.7) desc = "Güçlü bir ilişki var.";
    else if (absR >= 0.3) desc = "Orta düzeyde bir ilişki var.";
    else if (absR > 0) desc = "Zayıf bir ilişki var.";
    else desc = "Doğrusal bir ilişki yok.";

    if (r > 0) desc += " (Pozitif yönde)";
    else if (r < 0) desc += " (Negatif yönde)";

    document.getElementById('hc-corr-desc').innerText = desc;
    document.getElementById('hc-korelasyon-result').classList.add('visible');
}
