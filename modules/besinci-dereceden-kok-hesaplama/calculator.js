function hcBesinciKokHesapla() {
    const x = parseFloat(document.getElementById('hc-fr-val').value);

    if (isNaN(x)) {
        alert('Lütfen bir sayı girin.');
        return;
    }

    // nth root of x is x^(1/n)
    // For negative numbers, if n is odd, the result is negative.
    const root = x >= 0 ? Math.pow(x, 1/5) : -Math.pow(-x, 1/5);

    document.getElementById('hc-res-fr-val').innerText = root.toLocaleString('tr-TR', { maximumFractionDigits: 10 });
    document.getElementById('hc-res-fr-pow').innerText = `x^(1/5)`;

    document.getElementById('hc-fr-result').classList.add('visible');
}
