function hcBilimselDonustur() {
    let raw = document.getElementById('hc-sc-val').value.trim();
    if (!raw) {
        alert('Lütfen bir sayı girin.');
        return;
    }

    const val = parseFloat(raw.replace(',', '.'));

    if (isNaN(val)) {
        alert('Lütfen geçerli bir sayı girin.');
        return;
    }

    // Scientific
    const sci = val.toExponential();
    
    // Standard (avoiding e notation for standard view)
    const std = val.toLocaleString('tr-TR', { maximumFractionDigits: 20 });

    // Engineering (Exponent must be multiple of 3)
    const exp = Math.floor(Math.log10(Math.abs(val)));
    const engExp = Math.floor(exp / 3) * 3;
    const engBase = val / Math.pow(10, engExp);
    const eng = `${engBase.toFixed(3)} × 10^${engExp}`;

    document.getElementById('hc-res-sc-sci').innerText = sci.replace('e', ' × 10^');
    document.getElementById('hc-res-sc-std').innerText = std;
    document.getElementById('hc-res-sc-eng').innerText = eng;

    document.getElementById('hc-sc-result').classList.add('visible');
}
