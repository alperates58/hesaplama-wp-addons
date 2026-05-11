function hcShearModulusHesapla() {
    const tau = parseFloat(document.getElementById('hc-sm-tau').value);
    const gamma = parseFloat(document.getElementById('hc-sm-gamma').value);

    if (isNaN(tau) || isNaN(gamma) || gamma === 0) {
        alert('Lütfen geçerli değerler girin. Şekil değişimi sıfır olamaz.');
        return;
    }

    // G = tau / gamma
    const gMpa = tau / gamma;
    const gGpa = gMpa / 1000;

    document.getElementById('hc-sm-res-val').innerText = gGpa.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' GPa';
    
    document.getElementById('hc-sm-result').classList.add('visible');
}
