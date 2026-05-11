function hcLcHesapla() {
    const lVal = parseFloat(document.getElementById('hc-lc-l').value);
    const lUnit = parseFloat(document.getElementById('hc-lc-lunit').value);
    const cVal = parseFloat(document.getElementById('hc-lc-c').value);
    const cUnit = parseFloat(document.getElementById('hc-lc-cunit').value);

    if (isNaN(lVal) || isNaN(cVal) || lVal <= 0 || cVal <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const l = lVal * lUnit;
    const c = cVal * cUnit;

    // f = 1 / (2 * PI * sqrt(L * C))
    const freq = 1 / (2 * Math.PI * Math.sqrt(l * c));

    if (freq >= 1000000) {
        document.getElementById('hc-lc-res-val').innerText = (freq / 1000000).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' MHz';
    } else if (freq >= 1000) {
        document.getElementById('hc-lc-res-val').innerText = (freq / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kHz';
    } else {
        document.getElementById('hc-lc-res-val').innerText = freq.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Hz';
    }
    
    document.getElementById('hc-lc-result').classList.add('visible');
}
