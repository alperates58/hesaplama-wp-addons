function hcDamitmaHesapla() {
    const xd = parseFloat(document.getElementById('hc-dk-xd').value);
    const xw = parseFloat(document.getElementById('hc-dk-xw').value);
    const alpha = parseFloat(document.getElementById('hc-dk-alpha').value);

    if (isNaN(xd) || isNaN(xw) || isNaN(alpha) || alpha <= 1) {
        alert('Lütfen geçerli değerler girin (α > 1 olmalıdır).');
        return;
    }

    if (xd >= 1 || xw <= 0 || xd <= xw) {
        alert('Lütfen geçerli mol kesirleri girin (0 < xw < xd < 1).');
        return;
    }

    // Fenske Equation: Nmin = log10([xd / (1-xd)] * [(1-xw) / xw]) / log10(alpha)
    const term1 = xd / (1 - xd);
    const term2 = (1 - xw) / xw;
    const Nmin = Math.log10(term1 * term2) / Math.log10(alpha);

    document.getElementById('hc-dk-res-val').innerText = Nmin.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-dk-result').classList.add('visible');
}
