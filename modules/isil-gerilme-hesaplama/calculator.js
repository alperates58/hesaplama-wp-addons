function hcThermalStressHesapla() {
    const eGpa = parseFloat(document.getElementById('hc-ts-e').value);
    const alpha = parseFloat(document.getElementById('hc-ts-alpha').value);
    const dt = parseFloat(document.getElementById('hc-ts-dt').value);

    if (isNaN(eGpa) || isNaN(alpha) || isNaN(dt)) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // sigma = E * alpha * DeltaT
    // E in MPa = E(GPa) * 1000
    const stress = (eGpa * 1000) * alpha * dt;

    document.getElementById('hc-ts-res-val').innerText = Math.abs(stress).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' MPa';
    
    document.getElementById('hc-ts-result').classList.add('visible');
}
