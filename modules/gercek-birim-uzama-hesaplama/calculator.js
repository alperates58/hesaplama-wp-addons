function hcTrueStrainHesapla() {
    const l0 = parseFloat(document.getElementById('hc-ts-l0').value);
    const l = parseFloat(document.getElementById('hc-ts-l').value);

    if (isNaN(l0) || isNaN(l) || l0 <= 0 || l <= 0) {
        alert('Lütfen geçerli boy değerleri girin.');
        return;
    }

    // Engineering Strain = (L - L0) / L0
    const engStrain = (l - l0) / l0;
    
    // True Strain = ln(L / L0)
    const trueStrain = Math.log(l / l0);

    document.getElementById('hc-ts-res-val').innerText = trueStrain.toLocaleString('tr-TR', { maximumFractionDigits: 5 });
    document.getElementById('hc-ts-res-eng').innerText = 'Mühendislik Uzaması (e): ' + engStrain.toLocaleString('tr-TR', { maximumFractionDigits: 5 });
    
    document.getElementById('hc-ts-result').classList.add('visible');
}
