function hcCableSizeHesapla() {
    const p = parseFloat(document.getElementById('hc-cs-p').value);
    const l = parseFloat(document.getElementById('hc-cs-l').value);
    const v = parseFloat(document.getElementById('hc-cs-v').value);
    const e = parseFloat(document.getElementById('hc-cs-e').value);
    const k = 56; // Bakır iletkenlik katsayısı

    if (isNaN(p) || isNaN(l) || isNaN(e) || p <= 0 || l <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    let s = 0;
    if (v === 220) {
        // Monofaze: S = (200 * L * P) / (k * %e * V^2)
        s = (200 * l * p) / (k * e * Math.pow(v, 2));
    } else {
        // Trifaze: S = (100 * L * P) / (k * %e * V^2)
        s = (100 * l * p) / (k * e * Math.pow(v, 2));
    }

    document.getElementById('hc-cs-res-val').innerText = s.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' mm²';
    
    // Standard sizes
    const standardSizes = [0.75, 1, 1.5, 2.5, 4, 6, 10, 16, 25, 35, 50, 70, 95, 120, 150];
    let stdS = standardSizes.find(size => size >= s);
    
    document.getElementById('hc-cs-res-std').innerText = 'Önerilen Standart Kesit: ' + (stdS ? stdS + ' mm²' : 'Özel imalat gerekir');
    
    document.getElementById('hc-cs-result').classList.add('visible');
}
