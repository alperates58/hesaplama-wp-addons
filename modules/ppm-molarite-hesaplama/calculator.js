function hcPpmMolariteHesapla() {
    const ppm = parseFloat(document.getElementById('hc-ppm-val').value);
    const molarMass = parseFloat(document.getElementById('hc-molar-mass').value);

    if (isNaN(ppm) || isNaN(molarMass) || ppm <= 0 || molarMass <= 0) {
        alert('Lütfen geçerli PPM ve Mol Kütlesi değerleri giriniz.');
        return;
    }

    // M = PPM / (Molar Mass * 1000)
    const molarity = ppm / (molarMass * 1000);

    // Yüksek hassasiyet için bilimsel gösterim veya 6 basamak
    let resultText;
    if (molarity < 0.0001) {
        resultText = molarity.toExponential(4);
    } else {
        resultText = molarity.toLocaleString('tr-TR', { 
            minimumFractionDigits: 4, 
            maximumFractionDigits: 6 
        });
    }

    document.getElementById('hc-res-molarity').innerText = resultText;
    document.getElementById('hc-ppm-result').classList.add('visible');
    document.getElementById('hc-ppm-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
