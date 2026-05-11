function hcRadHeatHesapla() {
    const eps = parseFloat(document.getElementById('hc-rh-eps').value);
    const a = parseFloat(document.getElementById('hc-rh-a').value);
    const t1c = parseFloat(document.getElementById('hc-rh-t1').value);
    const t2c = parseFloat(document.getElementById('hc-rh-t2').value);
    const sigma = 5.670373e-8; // Stefan-Boltzmann Constant

    if (isNaN(eps) || isNaN(a) || isNaN(t1c) || isNaN(t2c) || a <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Convert to Kelvin
    const t1k = t1c + 273.15;
    const t2k = t2c + 273.15;

    // Q = eps * sigma * A * (T1^4 - T2^4)
    const q = eps * sigma * a * (Math.pow(t1k, 4) - Math.pow(t2k, 4));

    document.getElementById('hc-rh-res-val').innerText = q.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Watt';
    
    document.getElementById('hc-rh-result').classList.add('visible');
}
