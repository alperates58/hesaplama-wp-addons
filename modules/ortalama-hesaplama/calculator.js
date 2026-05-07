function hcOrtalamaHesapla() {
    const input = document.getElementById('hc-avg-input').value;
    const data = input.split(/[,\s]+/)
        .map(n => parseFloat(n.trim()))
        .filter(n => !isNaN(n));

    if (data.length < 1) {
        alert('Lütfen en az bir sayı giriniz.');
        return;
    }

    const n = data.length;
    
    // Arithmetic
    const sum = data.reduce((a, b) => a + b, 0);
    const arithmetic = sum / n;

    // Geometric
    const product = data.reduce((a, b) => a * b, 1);
    const geometric = Math.pow(product, 1 / n);

    // Harmonic
    const invSum = data.reduce((a, b) => a + (1 / b), 0);
    const harmonic = n / invSum;

    document.getElementById('hc-res-arithmetic').innerText = arithmetic.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-geometric').innerText = (product > 0) ? geometric.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) : 'Tanımsız';
    document.getElementById('hc-res-harmonic').innerText = (invSum !== 0) ? harmonic.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) : 'Tanımsız';

    document.getElementById('hc-avg-result').classList.add('visible');
    document.getElementById('hc-avg-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
