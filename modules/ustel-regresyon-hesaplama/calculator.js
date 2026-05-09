function hcExpRegHesapla() {
    const input = document.getElementById('hc-er-data').value;
    const lines = input.split('\n').map(l => l.split(',').map(x => parseFloat(x.trim()))).filter(p => p.length === 2 && !isNaN(p[0]) && !isNaN(p[1]));

    if (lines.length < 2) {
        alert('Lütfen en az 2 veri çifti girin.');
        return;
    }

    // y = a * e^(bx)  =>  ln(y) = ln(a) + bx
    // This becomes a linear regression where Y' = ln(y), A' = ln(a), B = b
    let sumX = 0, sumYprime = 0, sumXX = 0, sumXYprime = 0;
    const n = lines.length;

    for (let i = 0; i < n; i++) {
        const x = lines[i][0];
        const y = lines[i][1];
        if (y <= 0) {
            alert('Üstel regresyon için Y değerleri pozitif olmalıdır.');
            return;
        }
        const yPrime = Math.log(y);
        sumX += x;
        sumYprime += yPrime;
        sumXX += x * x;
        sumXYprime += x * yPrime;
    }

    const b = (n * sumXYprime - sumX * sumYprime) / (n * sumXX - sumX * sumX);
    const aPrime = (sumYprime - b * sumX) / n;
    const a = Math.exp(aPrime);

    document.getElementById('hc-res-er-a').innerText = a.toFixed(4);
    document.getElementById('hc-res-er-b').innerText = b.toFixed(4);
    document.getElementById('hc-res-er-eq').innerText = `y = ${a.toFixed(2)} * e^(${b.toFixed(2)}x)`;
    
    document.getElementById('hc-exp-reg-result').classList.add('visible');
}
