function hcAEHesapla() {
    const t1c = parseFloat(document.getElementById('hc-ae-t1').value);
    const k1 = parseFloat(document.getElementById('hc-ae-k1').value);
    const t2c = parseFloat(document.getElementById('hc-ae-t2').value);
    const k2 = parseFloat(document.getElementById('hc-ae-k2').value);

    if (isNaN(t1c) || isNaN(k1) || isNaN(t2c) || isNaN(k2)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const R = 8.314462618; // J/(mol·K)
    const t1 = t1c + 273.15;
    const t2 = t2c + 273.15;

    // ln(k2/k1) = (Ea/R) * (1/T1 - 1/T2)
    // Ea = (ln(k2/k1) * R) / (1/T1 - 1/T2)
    const ea = (Math.log(k2 / k1) * R) / ( (1 / t1) - (1 / t2) );

    document.getElementById('hc-ae-val').innerText = (ea / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kJ/mol';
    document.getElementById('hc-ae-result').classList.add('visible');
}
