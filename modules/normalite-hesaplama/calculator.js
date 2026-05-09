function hcNormaliteHesapla() {
    const mass = parseFloat(document.getElementById('hc-norm-mass').value);
    const molarMass = parseFloat(document.getElementById('hc-norm-molar').value);
    const z = parseFloat(document.getElementById('hc-norm-z').value);
    const volume = parseFloat(document.getElementById('hc-norm-vol').value);

    if (isNaN(mass) || isNaN(molarMass) || isNaN(z) || isNaN(volume) || mass <= 0 || molarMass <= 0 || z <= 0 || volume <= 0) {
        alert('Lütfen tüm alanlara geçerli pozitif değerler giriniz.');
        return;
    }

    // N = (m / (MA / z)) / V
    const normality = (mass / (molarMass / z)) / volume;

    document.getElementById('hc-res-normality').innerText = normality.toLocaleString('tr-TR', { 
        minimumFractionDigits: 2, 
        maximumFractionDigits: 4 
    });

    document.getElementById('hc-norm-result').classList.add('visible');
    document.getElementById('hc-norm-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
