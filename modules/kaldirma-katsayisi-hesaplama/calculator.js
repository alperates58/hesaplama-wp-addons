function hcLiftCoeffHesapla() {
    const l = parseFloat(document.getElementById('hc-cl-l').value);
    const rho = parseFloat(document.getElementById('hc-cl-rho').value);
    const v = parseFloat(document.getElementById('hc-cl-v').value);
    const s = parseFloat(document.getElementById('hc-cl-s').value);

    if (isNaN(l) || isNaN(rho) || isNaN(v) || isNaN(s) || v === 0 || s === 0) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    // Cl = L / (0.5 * rho * v^2 * s)
    const dynamicPressure = 0.5 * rho * Math.pow(v, 2);
    const cl = l / (dynamicPressure * s);

    document.getElementById('hc-cl-res-val').innerText = cl.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    
    document.getElementById('hc-cl-result').classList.add('visible');
}
