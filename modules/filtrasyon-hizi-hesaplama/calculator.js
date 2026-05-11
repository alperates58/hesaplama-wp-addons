function hcFilterRateHesapla() {
    const q = parseFloat(document.getElementById('hc-fr-q').value);
    const a = parseFloat(document.getElementById('hc-fr-a').value);

    if (isNaN(q) || isNaN(a) || a <= 0 || q < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // v = Q / A
    const rate = q / a;

    document.getElementById('hc-fr-res-val').innerText = rate.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m/h';
    
    document.getElementById('hc-fr-result').classList.add('visible');
}
